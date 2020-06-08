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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahRekomendasi">Tambah Makanan Tradisional</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nama Makanan</th>
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
                    <?php foreach ($tradisional as  $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['gambar_makanan']; ?></td>
                            <td><?= $r['nama_makanan']; ?></td>
                            <td><?= $r['lokasi_makanan']; ?></td>
                            <td><?= $r['jambuka_makanan']; ?></td>
                            <td><?= $r['harga_makanan']; ?></td>
                            <td><?= $r['link_makanan']; ?></td>
                            <td><?= $r['detail_data_target']; ?></td>
                            <td><?= $r['detail_item_target']; ?></td>
                            <td>
                                <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                <a href="" class="badge badge-pill badge-warning" data-toggle="modal" data-target="#<?= $r['detail_data_target'];  ?>">Add Menu</a>
                                <a href="" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#<?= $r['detail_item_target'];  ?>">Add Gambar</a>
                                <a href="" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url('admin/deleteMakananTradisional/' . $r['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin??')">Delete</a>
                            </td>
                        </tr>
                        <?php $j = 1; ?>
                        <?php $a = 1; ?>
                        <?php foreach ($tradisionalItem as $gp) :  ?>
                            <?php if ($gp['makanan_id'] == $r['id']) : ?>
                                <tr class="bg-dark">
                                    <th class="text-success" scope="row"><?= $i; ?>.<?= $j; ?></th>
                                    <td class="text-white font-weight-bold"><?= $gp['nama_makanan']; ?></td>
                                    <td class="text-white"><?= $gp['harga_makanan']; ?></td>
                                    <td>
                                        <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                        <a href="" class="badge badge-pill badge-success">Edit</a>
                                        <a href="<?= base_url('admin/deleteTradisionalMenu/' . $gp['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete</a>
                                    </td>
                                </tr>
                                <?php $j++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php foreach ($tradisionalGambar as $tg) :  ?>
                            <?php if ($tg['id_kode_tradisional'] == $r['id']) : ?>
                                <tr class="bg-warning">
                                    <th class="text-success" scope="row">Gambar<?= $i; ?>.<?= $a; ?></th>
                                    <td class="text-white font-weight-bold"><?= $tg['tradisional_gambar']; ?></td>
                                    <td>
                                        <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                        <a href="" class="badge badge-pill badge-success">Edit</a>
                                        <a href="<?= base_url('admin/deleteTradisionalGalleri/' . $tg['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete Gambar</a>
                                    </td>
                                </tr>
                                <?php $a++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php $i++; ?>
                        <div class="modal fade" id="<?= $r['detail_data_target'];  ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $r['detail_data_target'];  ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $r['detail_data_target'];  ?>">Tambah Promo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/addMenuTradisional/'); ?><?= $r['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="<?= $r['id']; ?>" name="<?= $r['id']; ?>" placeholder="<?= $r['nama_makanan']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nama_menu_tradisional" name="nama_menu_tradisional" placeholder="Nama Menu">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="harga_menu_tradisional" name="harga_menu_tradisional" placeholder="Harga Menu">
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
                        <div class="modal fade" id="<?= $r['detail_item_target'];  ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $r['detail_item_target'];  ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $r['detail_item_target'];  ?>">Tambah Promo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/addTradisionalGallery/'); ?><?= $r['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="<?= $r['id']; ?>" name="<?= $r['id']; ?>" placeholder="<?= $r['nama_makanan']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="gambar_tradisional" name="gambar_tradisional" placeholder="Product Image">
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
            <form action="<?= base_url('admin/tradisional'); ?>" method="post">
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
                    <div class="form-group">
                        <input type="text" class="form-control" id="data_produk2" name="data_produk2" placeholder="Data Target Produk 02">
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