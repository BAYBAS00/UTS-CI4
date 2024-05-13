<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $users;
    protected $rules;

    public function __construct()
    {
        $this->users = new usersModel();

        $this->rules = [
            'username' => 'required',
            'password' => 'required',
            'nama_user' => 'required',
        ];
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'data' => $this->users->paginate('5', 'Users'),
            'title' => 'Data Users',
            'pager' => $this->users->pager,
        ];
        return view('users/index', $data);
    }

    public function tambah()
    {
        return view('users/tambah', ['title' => 'Tambah Data Users']);
    }

    public function save()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama_user' => $this->request->getVar('nama_user')
        ];
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->users->save($data);
        return redirect()->route('Users::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Users',
            'users' => $this->users->find($id),
        ];

        return view('Users/ubah', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama_user' => $this->request->getVar('nama_user')
        ];
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->users->update($id, $data);

        return redirect()->route('Users::index')->with('message', 'Ubah Data Bsehasil');
    }

    public function hapus($id)
    {
        $this->users->delete($id);
        return redirect()->route('Users::index')->with('message', 'Hapus Data Bsehasil');
    }
}
