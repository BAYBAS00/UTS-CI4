<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Ubah Data Petugas</h2>
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

                    <form action="<?= url_to('Petugas::update', $petugas['id_petugas']) ?>" method="post">
                        <div class="form-group row mb-2">
                            <label for="id_jabatan" class="col-sm-2 col-form-label">Nama Jabatan</label>
                            <div class="col-sm-10">
                                <select name="id_jabatan" id="id_jabatan" class="form-control">'>
                                    <option value="">Status</option>
                                    <?php foreach ($jabatan as $row) : ?>
                                        <option value="<?= $row['id_jabatan'] ?>" <?= $petugas['id_jabatan'] == $row['id_jabatan'] ? 'selected' : '' ?>><?= $row['nama_jabatan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="nama_petugas" class="col-sm-2 col-form-label">Nama petugas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Nama Petugas" value="<?= $petugas['nama_petugas'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $petugas['tgl_lahir'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon" value="<?= $petugas['no_telp'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com" value="<?= $petugas['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $petugas['alamat'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option>Status</option>
                                    <option value="0" <?= $petugas['status'] == 0 ? 'selected' : '' ?>>Tidak Aktif</option>
                                    <option value="1" <?= $petugas['status'] == 1 ? 'selected' : '' ?>>Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= url_to('Petugas::index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>