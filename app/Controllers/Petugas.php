<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use App\Models\JabatanModel;

class Petugas extends BaseController
{
    protected $petugas;
    protected $jabatan;
    protected $rules;

    public function __construct()
    {
        $this->petugas = new PetugasModel();
        $this->jabatan = new JabatanModel();

        $this->rules = [
            'id_jabatan' => 'required',
            'nama_petugas' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'status' => 'required'
        ];
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'data' => $this->petugas->join('jabatan', 'jabatan.id_jabatan = petugas.id_jabatan')
                ->paginate('5', 'petugas'),
            'title' => 'Data Petugas',
            'pager' => $this->petugas->pager,
        ];
        return view('petugas/index', $data);
    }


    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Petugas',
            'jabatan' => $this->jabatan->findAll()
        ];
        return view('petugas/tambah', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->petugas->save($data);
        return redirect()->route('Petugas::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Petugas',
            'data' => $this->petugas->join('jabatan', 'jabatan.id_jabatan = petugas.id_jabatan')
            ->findAll(),
            'petugas' => $this->petugas->find($id),
            'jabatan' => $this->jabatan->findAll()
        ];

        return view('petugas/ubah', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->petugas->update($id, $data);

        return redirect()->route('Petugas::index')->with('message', 'Ubah Data Berhasil');
    }

    public function hapus($id)
    {
        $this->petugas->delete($id);
        return redirect()->route('Petugas::index')->with('message', 'Hapus Data Berhasil');
    }
}
