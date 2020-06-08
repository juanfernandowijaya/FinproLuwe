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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahRekomendasi">Tambah Minuman</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nama Minuman</th>
                        <th scope="col">Lokasi Makanan</th>
                        <th scope="col">Jam Buka/Tutup</th>
                        <th scope="col">Harga Makanan</th>
                        <th scope="col">Link</th>
                        <th scope="col">Data Target 1</th>
                        <th scope="col">Data Target 2</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($minuman as  $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['gambar_minuman']; ?></td>
                            <td><?= $r['nama_minuman']; ?></td>
                            <td><?= $r['lokasi_minuman']; ?></td>
                            <td><?= $r['jambuka_minuman']; ?></td>
                            <td><?= $r['harga_minuman']; ?></td>
                            <td><?= $r['link_minuman']; ?></td>
                            <td><?= $r['minuman_data_target']; ?></td>
                            <td><?= $r['pesan_data_target']; ?></td>
                            <td>
                                <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                <a href="" class="badge badge-pill badge-warning" data-toggle="modal" data-target="#<?= $r['minuman_data_target'];  ?>">Add Menu</a>
                                <a href="" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#<?= $r['pesan_data_target'];  ?>">Add Gambar</a>
                                <a href="" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url('admin/deleteMinuman/' . $r['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin??')">Delete</a>
                            </td>
                        </tr>
                        <?php $j = 1; ?>
                        <?php $a = 1; ?>
                        <?php foreach ($minumanItem as $gp) :  ?>
                            <?php if ($gp['minuman_id'] == $r['id']) : ?>
                                <tr class="bg-dark">
                                    <th class="text-success" scope="row"><?= $i; ?>.<?= $j; ?></th>
                                    <td class="text-white font-weight-bold"><?= $gp['nama_minuman']; ?></td>
                                    <td class="text-white"><?= $gp['harga_minuman']; ?></td>
                                    <td>
                                        <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                        <a href="" class="badge badge-pill badge-success">Edit</a>
                                        <a href="<?= base_url('admin/deleteMenuMinuman/' . $gp['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete</a>
                                    </td>
                                </tr>
                                <?php $j++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php foreach ($minumanGallery as $tg) :  ?>
                            <?php if ($tg['id_minuman'] == $r['id']) : ?>
                                <tr class="bg-warning">
                                    <th class="text-success" scope="row">Gambar <?= $i; ?>.<?= $a; ?></th>
                                    <td class="text-white font-weight-bold"><?= $tg['gambar_minuman']; ?></td>
                                    <td>
                                        <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                        <a href="" class="badge badge-pill badge-success">Edit</a>
                                        <a href="<?= base_url('admin/deleteMinumanGallery/' . $tg['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete Gambar</a>
                                    </td>
                                </tr>
                                <?php $a++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php $i++; ?>
                        <div class="modal fade" id="<?= $r['minuman_data_target'];  ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $r['minuman_data_target'];  ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $r['minuman_data_target'];  ?>">Tambah Minuman</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/addMenuMinuman/'); ?><?= $r['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="<?= $r['id']; ?>" name="<?= $r['id']; ?>" placeholder="<?= $r['nama_minuman']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nama_menu_tradisional" name="nama_menu_tradisional" placeholder="Nama Minuman">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="harga_menu_tradisional" name="harga_menu_tradisional" placeholder="Harga Minuman">
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
                        <div class="modal fade" id="<?= $r['pesan_data_target'];  ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $r['pesan_data_target'];  ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $r['pesan_data_target'];  ?>">Tambah Foto Minuman</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/addMinumanGallery/'); ?><?= $r['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="<?= $r['id']; ?>" name="<?= $r['id']; ?>" placeholder="<?= $r['nama_minuman']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="gambar_minuman" name="gambar_minuman" placeholder="Product Image">
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="tambahRekomendasi" tabindex="-1" role="dialog" aria-labelledby="tambahRekomendasi" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRekomendasi">Tambah Rekomendasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/minuman'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="gambar_produk" name="gambar_produk" placeholder="Gambar Toko">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Toko">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lokasi_produk" name="lokasi_produk" placeholder="Lokasi Toko">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jam_produk" name="jam_produk" placeholder="Jam Buka/Tutup Toko">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="link_produk" name="link_produk" placeholder="Link Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="data_produk1" name="data_produk1" placeholder="Data Target Produk 01">
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