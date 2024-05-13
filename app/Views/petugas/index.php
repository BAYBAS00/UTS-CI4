<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Data Petugas</h2>
    </div>
</div>
<div class="container mt-3">

    <div class="row">
        <div class="col">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        <?php echo session()->getFlashdata('message'); ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php endif ?>


            <a href="<?= url_to('Petugas::tambah') ?>" class="btn btn-md btn-success mb-3 fa fa-plus"> TAMBAH DATA</a>
            <table class="table table-bordered table-striped table-light">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Nama petugas</th>
                        <th>Tanggal Lahir</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($data as  $petugas) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo  $petugas['nama_jabatan'] ?></td>
                            <td><?php echo  $petugas['nama_petugas'] ?></td>
                            <td><?php echo $petugas['tgl_lahir'] ?></td>
                            <td><?php echo $petugas['no_telp'] ?></td>
                            <td><?php echo $petugas['email'] ?></td>
                            <td><?php echo $petugas['alamat'] ?></td>
                            <td><?php echo ($petugas['status'] == 1) ? 'Aktif' : 'Tidak Aktif' ?></td>
                            <td class="text-center">
                                <a href="<?= url_to('Petugas::edit',  $petugas['id_petugas']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                <a href="<?= url_to('Petugas::hapus',  $petugas['id_petugas']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>