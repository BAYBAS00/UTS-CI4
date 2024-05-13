<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Data Mata Kuliah</h2>
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


            <a href="<?= url_to('Matkul::tambah') ?>" class="btn btn-md btn-success mb-3 fa fa-plus"> TAMBAH DATA</a>
            <table class="table table-bordered table-striped table-light">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nama Dosen</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($data as  $matkul) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo  $matkul['nama_matkul'] ?></td>
                            <td><?php echo  $matkul['id_dosen'] ?></td>
                            <td><?php echo $matkul['sks'] ?></td>
                            <td class="text-center">
                                <a href="<?= url_to('Matkul::edit',  $matkul['id_matkul']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                <a href="<?= url_to('Matkul::hapus',  $matkul['id_matkul']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>