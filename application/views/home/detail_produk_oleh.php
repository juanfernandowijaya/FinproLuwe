<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rekomendasi</title>

    <link href="<?= base_url('assets_home/') ?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets_home/') ?>/css/home_menu.css">
</head>

<body>
    <section id="sidebar_menu">
        <div class="sidebar" id="menu_bar">
            <header>
                <a href="<?= base_url('home'); ?>">
                    <img src="<?= base_url('assets_home/') ?>images/luwe03.png" width="70%" height="auto" alt="" loading="lazy">
                </a>
            </header>
            <ul>
                <?php if ($this->session->userdata('email')) : ?>
                    <li class="bg-danger"><a href="<?= base_url('auth'); ?>"><i class="fas fa-fw fa-user-alt"></i>Hi,<?= $user['name']; ?></a></li>
                <?php endif; ?>
                <li><a href="<?= base_url('home/detail_makananTradisional'); ?>"><i class="fas fa-fw fa-utensils"></i>Makanan Tradisional</a></li>
                <li><a href="<?= base_url('home/detail_Minuman'); ?>"><i class="fas fa-fw fa-wine-glass-alt"></i>Minuman</a></li>
                <li><a href="<?= base_url('home/detail_OlehOleh'); ?>"><i class="fas fa-fw fa-shopping-bag"></i>Oleh-Oleh</a></li>
            </ul>
        </div>
        <!--Menu-->
        <div id="kuliner_makanan_tradisional" class="gallery-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="judul">
                            <h2 class="block-title text-center">
                                Oleh Oleh Khas Malang</h2>
                        </div>
                        <div class="gal-container">
                            <div class="row">
                                <?php foreach ($getOleh as $getO) : ?>
                                    <div class="col-4 col-md-4 col-sm-4">
                                        <div class="box">
                                            <a href="#" data-toggle="modal" data-target="#<?= $getO['oleh_data_target']; ?>">
                                                <img src="<?= base_url('assets_home/images/'); ?><?= $getO['gambar_oleh']; ?>" alt="" />
                                            </a>
                                            <div class="modal fade" id="<?= $getO['oleh_data_target']; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><?= $getO['nama_oleh']; ?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="container container-modal">
                                                            <div class="row">
                                                                <?php foreach ($getOlehGalleri as $getOG) : ?>
                                                                    <?php if ($getOG['id_oleh'] == $getO['id']) : ?>
                                                                        <div class="col-md-6 modal-item">
                                                                            <img src="<?= base_url('assets_home/images/') ?><?= $getOG['gambar_oleh']; ?>">
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul>
                                                                <li>Lokasi &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <span id="lok"><?= $getO['lokasi_oleh']; ?></span></li>
                                                                <li>Jam Buka/Tutup :&nbsp<span id="jam"><?= $getO['jambuka_oleh']; ?></span></li>
                                                                <li>Harga &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <span id="harga">Rp.<?= $getO['harga_oleh']; ?></span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?= $getO['oleh_item_target'];  ?>">Pesan</button>
                                                            <div class="modal fade" id="<?= $getO['oleh_item_target'];  ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $getO['oleh_item_target'];  ?>" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-primary">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Pesan&nbsp <span class="text-primary"> <?= $getO['nama_oleh']; ?></span> </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">No</th>
                                                                                    <th scope="col">Nama Oleh-Oleh</th>
                                                                                    <th scope="col">Harga</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $k = 1; ?>
                                                                                <?php foreach ($getOlehItem as $getOI) : ?>
                                                                                    <?php if ($getO['id'] == $getOI['oleholeh_id']) : ?>
                                                                                        <tr>
                                                                                            <th scope="row"><?= $k; ?></th>
                                                                                            <td><?= $getOI['nama_oleh']; ?></td>
                                                                                            <td>Rp. <?= $getOI['harga_oleh']; ?></td>
                                                                                        </tr>
                                                                                        <?php $k++ ?>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; ?>
                                                                            </tbody>
                                                                        </table>

                                                                        <form action="<?= base_url('home/detail_MakananTradisional'); ?> " method="POST">
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">Pesanan & Jumlah</label>
                                                                                <textarea class="form-control" id="pesanMinuman" name="pesanMinuman" rows="3" placeholder="tulis orderan disini"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="pesanTanggal" name="pesanTanggal" placeholder="Tanggal Pesanan Diambil/Diantar">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="pesanAlamat" name="pesanAlamat" placeholder="Alamat Pengiriman">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="order_date" name="order_date" value="<?= date('m/d/Y H:i:s', time());  ?>" hidden>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $user['id'];  ?>" hidden>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" value="<?= $getO['nama_oleh'];  ?>" hidden>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                                <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- end gal-container -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end gallery-main -->

    </section>
</body>

</html>