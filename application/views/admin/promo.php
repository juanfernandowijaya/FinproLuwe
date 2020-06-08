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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#PromoData">Tambah Promo</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Promo</th>
                        <th scope="col">Deskripsi Promo</th>
                        <th scope="col">Gambar Promo</th>
                        <th scope="col">Promo data target</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($promo as  $pro) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $pro['promo_nama']; ?></td>
                            <td><?= $pro['promo_deskripsi']; ?></td>
                            <td><?= $pro['promo_gambar']; ?></td>
                            <td><?= $pro['promo_data_target']; ?></td>
                            <td>
                                <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                <a href="" class="badge badge-pill badge-warning" data-toggle="modal" data-target="#<?= $pro['promo_data_target'];  ?>">Add</a>
                                <a href="" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url('admin/deletePromo/' . $pro['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete</a>
                            </td>
                        </tr>
                        <?php $j = 1; ?>
                        <?php foreach ($getPromo as $gp) :  ?>
                            <?php if ($gp['id_kode_promo'] == $pro['id']) : ?>
                                <tr class="bg-dark">
                                    <th class="text-success" scope="row"><?= $i; ?>.<?= $j; ?></th>
                                    <td class="text-white font-weight-bold"><?= $gp['kode_promo']; ?></td>
                                    <td class="text-white"><?= $gp['kuota_promo']; ?></td>
                                    <td>
                                        <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                        <a href="" class="badge badge-pill badge-success">Edit</a>
                                        <a href="<?= base_url('admin/deleteSubPromo/' . $gp['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete</a>
                                    </td>
                                </tr>
                                <?php $j++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php $i++; ?>
                        <div class="modal fade" id="<?= $pro['promo_data_target'];  ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $pro['promo_data_target'];  ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $pro['promo_data_target'];  ?>">Tambah Promo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/addSubPromo/'); ?><?= $pro['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="<?= $pro['id']; ?>" name="<?= $pro['id']; ?>" placeholder="<?= $pro['promo_nama']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="kode_promo" name="kode_promo" placeholder="Kode Promo">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="kuota_promo" name="kuota_promo" placeholder="Kuota Promo">
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
                <h5 class="modal-title" id="PromoData">Tambah Promo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addPromo'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="promo_nama" name="promo_nama" placeholder="Nama Promo">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="promo_deskripsi" name="promo_deskripsi" placeholder="Deskripsi Promo">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="promo_gambar" name="promo_gambar" placeholder="Gambar Promo">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="promo_data_target" name="promo_data_target" placeholder="Data Target Promo">
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