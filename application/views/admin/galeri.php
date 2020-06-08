<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();  ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message');  ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#PromoData">Tambah Gambar Galleri</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Deskripsi Galleri</th>
                        <th scope="col">Gambar Galleri</th>
                        <th scope="col">Galleri data Target</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($galleri as  $gal) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $gal['galeri_deskripsi']; ?></td>
                            <td><?= $gal['galeri_gambar']; ?></td>
                            <td><?= $gal['galeri_data_target']; ?></td>
                            <td>
                                <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                <a href="" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url('admin/deleteGalleri/' . $gal['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>



</div>

<div class="modal fade" id="PromoData" tabindex="-1" role="dialog" aria-labelledby="PromoData" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PromoData">Tambah Gambar Galleri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addGambar'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="galeri_deskripsi" name="galeri_deskripsi" placeholder="Deskripsi Gambar">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="galeri_gambar" name="galeri_gambar" placeholder="Gambar">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="galeri_data_target" name="galeri_data_target" placeholder="Data Target Gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>