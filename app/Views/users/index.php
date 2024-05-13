<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Data Users</h2>
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


            <a href="<?= url_to('Users::tambah') ?>" class="btn btn-md btn-success mb-3 fa fa-plus"> TAMBAH DATA</a>
            <table class="table table-bordered table-striped table-light">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Users</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($data as $users) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $users['username'] ?></td>
                            <td><?php echo $users['nama_user'] ?></td>
                            <td class="text-center">
                                <a href="<?= url_to('Users::edit', $users['id_user']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                <a href="<?= url_to('Users::hapus', $users['id_user']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>