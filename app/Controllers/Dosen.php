<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $dosen;
    protected $rules;

    public function __construct()
    {
        $this->dosen = new DosenModel();

        $this->rules = [
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'status_dosen' => 'required'
        ];
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'data' => $this->dosen->paginate('5', 'dosen'),
            'title' => 'Data Dosen',
            'pager' => $this->dosen->pager,
        ];
        return view('dosen/index', $data);
    }

    public function tambah()
    {
        return view('dosen/tambah', ['title' => 'Tambah Data Dosen']);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->save($data);
        return redirect()->route('Dosen::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Dosen',
            'dosen' => $this->dosen->find($id),
        ];
        return view('dosen/ubah', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->update($id, $data);

        return redirect()->route('Dosen::index')->with('message', 'Ubah Data Berhasil');
    }

    public function hapus($id)
    {
        $this->dosen->delete($id);
        return redirect()->route('Dosen::index')->with('message', 'Hapus Data Berhasil');
    }
}
