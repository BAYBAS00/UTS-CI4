<?php

namespace App\Controllers;

use App\Models\JabatanModel;

class Jabatan extends BaseController
{
    protected $jabatan;
    protected $rules;

    public function __construct()
    {
        $this->jabatan = new JabatanModel();

        $this->rules = [
            'nama_jabatan' => 'required',
        ];
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'data' => $this->jabatan->paginate('5', 'jabatan'),
            'title' => 'Data Jabatan',
            'pager' => $this->jabatan->pager,
        ];
        return view('jabatan/index', $data);
    }

    public function tambah()
    {
        return view('jabatan/tambah', ['title' => 'Tambah Data jabatan']);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->jabatan->save($data);
        return redirect()->route('Jabatan::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Jabatan',
            'jabatan' => $this->jabatan->find($id),
        ];

        return view('jabatan/ubah', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->jabatan->update($id, $data);

        return redirect()->route('Jabatan::index')->with('message', 'Ubah Data Bsehasil');
    }

    public function hapus($id)
    {
        $this->jabatan->delete($id);
        return redirect()->route('Jabatan::index')->with('message', 'Hapus Data Bsehasil');
    }
}
