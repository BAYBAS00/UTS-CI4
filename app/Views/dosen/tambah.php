<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Data Dosen</h2>
                </div>
                <div class="card-body">
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>
                                <ul class="mb-0">
                                    <?php foreach (session()->getFlashdata('message') as $data) : ?>
                                        <li>
                                            <?= $data ?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>

                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php endif ?>

                    <form action="<?= url_to('Dosen::save') ?>" method="post">
                        <div class="form-group row mb-2">
                            <label for="kode_dosen" class="col-sm-2 col-form-label">Kode Dosen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" placeholder="Kode Dosen">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="nama_dosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Nama Dosen">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="no_telp" class="col-sm-2 col-form-label">No telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="email" class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="status_dosen" class="col-sm-2 col-form-label">Status Dosen</label>
                            <div class="col-sm-10">
                                <select name="status_dosen" id="status_dosen" class="form-control">
                                    <option value="">Status</option>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= url_to('Dosen::index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>