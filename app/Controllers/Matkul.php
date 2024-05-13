<?php

namespace App\Controllers;

use App\Models\MatkulModel;
use App\Models\DosenModel;

class Matkul extends BaseController
{
    protected $matkul;
    protected $dosen;
    protected $rules;

    public function __construct()
    {
        $this->matkul = new MatkulModel();
        $this->dosen = new DosenModel();

        $this->rules = [
            'nama_dosen' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required'
        ];
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }
        $data = [
            'data' => $this->matkul->join('dosen', 'dosen.id_dosen = matkul.id_dosen')
                ->paginate('5', 'matkul'),
            'title' => 'Data Mata Kuliah',
            'pager' => $this->matkul->pager,
        ];
        return view('matkul/index', $data);
    }


    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Mata Kuliah',
            'dosen' => $this->dosen->findAll()
        ];
        return view('matkul/tambah', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->matkul->save($data);
        return redirect()->route('Matkul::index')->with('message', 'Tambah Data Berhasil');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Mata Kuliah',
            'data' => $this->matkul->join('dosen', 'dosen.id_dosen = matkul.id_dosen')
                ->findAll(),
            'matkul' => $this->matkul->find($id),
            'dosen' => $this->dosen->findAll()
        ];

        return view('matkul/ubah', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->matkul->update($id, $data);

        return redirect()->route('Matkul::index')->with('message', 'Ubah Data Berhasil');
    }

    public function hapus($id)
    {
        $this->matkul->delete($id);
        return redirect()->route('Matkul::index')->with('message', 'Hapus Data Berhasil');
    }
}
