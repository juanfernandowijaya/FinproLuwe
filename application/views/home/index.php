<div id="loader">
    <div id="status"></div>
</div>
<div id="site-header">
    <header id="header" class="header-block-top">
        <div class="container">
            <div class="row">
                <div class="main-menu">
                    <!-- navbar -->
                    <nav class="navbar navbar-default" id="mainNav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="logo">
                                <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                                    <img src="<?= base_url('assets_home/'); ?>images/logo luwe 02.png" width="100" height="65" alt="">
                                </a>
                            </div>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="#banner">Home</a></li>
                                <li><a href="#about">Tentang Kami</a></li>
                                <li><a href="#rekomendasi">Rekomendasi</a></li>
                                <li><a href="#promo">Promo</a></li>
                                <li><a href="#gallery">Menu Favorit</a></li>
                                <li><a href="#blog">Artikel</a></li>
                                <li><a href="<?= base_url('auth'); ?>"> Login </a></li>
                            </ul>
                        </div>
                        <!-- end nav-collapse -->
                    </nav>
                    <!-- end navbar -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </header>
    <!-- end header -->
</div>
<!-- end site-header -->

<div id="banner" class="banner full-screen-mode parallax">
    <div class="container pr">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="banner-static">
                <div class="banner-text">
                    <div class="banner-cell">
                        <!---  <h1>Dinner with us <span class="typer" id="some-id" data-delay="200" data-delim=":"
                                    data-words="Friends:Family:Officemates" data-colors="red"></span><span
                                    class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>-->
                        <img src="<?= base_url('assets_home/'); ?>images/logo bunder.png" width="450" height="450" alt="">
                        <p>Temukan kuliner terbaik di kota Malang</p>
                        <div class="book-btn">
                            <a href="#reservation" class="table-btn hvr-underline-from-center">Booking Kuliner
                                Favorit anda</a>
                        </div>
                    </div>
                    <!-- end banner-cell -->
                </div>
                <!-- end banner-text -->
            </div>
            <!-- end banner-static -->
        </div>
        <!-- end col -->
    </div>
    <!-- end container -->
</div>
<!-- end banner -->


<!-- tentang kami -->
<div id="about" class="about-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2 class="block-title"> Luwe </h2>
                    <h3>APA ITU LUWE??</h3>
                    <p> Luwe.com adalah sebuah website yang menyediakan berbagai informasi tentang kuliner
                        terutama di kota Malang. Kami memberikan informasi rekomendasi kuliner di kota Malang
                        hingga yang paling jarang disorot, informasi promo dan diskon bagi kalian yang ingin
                        berhemat dan tempat oleh-oleh untuk kerabat di kampung halaman. Selain itu kami juga
                        menyediakan artikel tentang kuliner yang gak ketinggalan zaman.</p>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <div class="about-images">
                        <img class="about-main" src="<?= base_url('assets_home/'); ?>images/gambarhome1.png" alt="About Main Image">
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<!--Rekomendasi-->
<section id="rekomendasi">
    <div class="special-menu pad-top-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title color-white text-center m"> Rekomendasi Hari ini </h2>
                        <h3 class="rec_header block-title"> Rekomendasi kuliner tebaik hanya di luwe
                        </h3>
                    </div>
                    <div class="special-box">
                        <div id="owl-demo">
                            <!--looping menu-->
                            <?php foreach ($rekomendasi as $reko) : ?>
                                <div class="item item-type-zoom">
                                    <a href="<?= $reko['link_produk']; ?>" class="item-hover">
                                        <div class="item-info">
                                            <div class="headline">
                                                <?= $reko['nama_produk']; ?>
                                                <div class="line"></div>
                                                <div class="dit-line"><?= $reko['deskripsi_produk']; ?></div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="item-img">
                                        <img src="<?= base_url('assets_home/'); ?>images/<?= $reko['gambar_produk']; ?>" alt="sp-menu">
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <!-- end special-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end special-menu -->
</section>

<!--Promo-->
<section id="promo">
    <div id="our_team" class="team-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="promo_header">
                        <h2>Promo Dompet Digital</h2>
                        <p>Dompet Lapar, Perut Jangan. Promo Dompet Digital Menantimu</p>
                    </div>
                    <div class="team-box">
                        <div class="row">
                            <?php foreach ($promo as $pro) : ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="sf-team">
                                        <div class="thumb">
                                            <a data-toggle="modal" data-target="#<?= $pro['promo_data_target']; ?>" href="#"><img src="<?= base_url('assets_home/images/'); ?><?= $pro['promo_gambar'];  ?>" alt=""></a>
                                        </div>
                                        <div class="text-col">
                                            <h3><?= $pro['promo_nama']; ?></h3>
                                            <p>..</p>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="<?= $pro['promo_data_target']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Gojek Promo Untung
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Syarat dan Ketentuan</h6>
                                                    <li>1. Akun dapat menggunakan ...</li>
                                                    <h5>Kode Promo</h5>
                                                    <?php foreach ($kode_promo as $kode) : ?>
                                                        <?php if ($pro['id'] == $kode['id_kode_promo']) : ?>
                                                            <h4><?= $kode['kode_promo'];  ?><span> <?= $kode['kuota_promo'];  ?></span></h4>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end team-box -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end team-main -->
</section>

<!--Menu-->
<div id="gallery" class="gallery-main pad-top-100 pad-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">

                    <h2 class="block-title text-center">
                        Galeri Menu Favorit
                    </h2>
                    <p class="title-caption text-center">Membeli kuliner di kota malang <span>Mudah</span> dengan
                        <span class="luwe01">Luwe</span></p>
                </div>
                <div class="gal-container clearfix">
                    <?php foreach ($galleri as $gal) : ?>
                        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                            <div class="box">
                                <a href="#" data-toggle="modal" data-target="#<?= $gal['galeri_data_target']; ?>">
                                    <img src="<?= base_url('assets_home/images/'); ?><?= $gal['galeri_gambar']; ?>" alt="" />
                                </a>
                                <div class="modal fade" id="<?= $gal['galeri_data_target']; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <div class="modal-body">
                                                <img src="<?= base_url('assets_home/images/'); ?><?= $gal['galeri_gambar']; ?>" alt="" />
                                            </div>
                                            <div class="col-md-12 description">
                                                <h4><?= $gal['galeri_deskripsi']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

<!---Artikel--->
<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="block-title text-center">
                    Artikel
                </h2>
                <div class="blog-box clearfix">
                    <?php foreach ($artikel as $arti) : ?>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                    <div class="blog-img-box">
                                        <img src="<?= base_url('assets/img/profile/'); ?><?= $arti['gambar_user']; ?>" width="700" height="350" alt="" />
                                        <div class="overlay">
                                            <a href="<?= $arti['link_instagram']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-dit">
                                        <h1><?= $arti['nama_user'];  ?></h1>
                                        <p><?= $arti['komentar_cust'];  ?></p>
                                        <h4><?= $arti['tgl_cust'];  ?></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- end blog-box -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end blog-main -->

<div id="footer" class="footer-main">
    <!-- end footer-news -->
    <div class="footer-box pad-top-70">
        <div class="container">
            <div class="row">
                <div class="footer-in-main">
                    <div class="footer-logo">
                        <div class="text-center">
                            <img src="images/logo bunder.png" width="250" height="250" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-box-a">
                            <h3>Tentang Kami</h3>
                            <p>Luwe dibuat atas dasar tugas final project binus malang, dengan tema kuliner.</p>
                            <ul class="socials-box footer-socials pull-left">
                                <li>
                                    <a href="#">
                                        <div class="social-circle-border"><i class="fa  fa-facebook"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="social-circle-border"><i class="fa fa-twitter"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="social-circle-border"><i class="fa fa-google-plus"></i></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="social-circle-border"><i class="fa fa-github"></i></div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                        <!-- end footer-box-a -->
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-box-c">
                            <h3>Kontak Luwe</h3>
                            <p>
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                <span>
                                    +62 81235 581122
                                </span>
                            </p>
                            <p>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span><a href="#">kuliner.luwe@gmail.com</a></span>
                            </p>
                        </div>
                        <!-- end footer-box-c -->
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-box-d">
                            <h3>Jam Beroperasi</h3>
                            <ul>
                                <li>
                                    <p>Senin - Sabtu </p>
                                    <span> 10.00 - 21.00</span>
                                </li>
                                <li>
                                    <p>Minggu </p>
                                    <span> 8.00 - 22.00</span>
                                </li>
                            </ul>
                        </div>
                        <!-- end footer-box-d -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end footer-in-main -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        <div id="copyright" class="copyright-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6 class="copy-title"> Copyright &copy; 2020 Luwe <a href="#" target="_blank"></a> </h6>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end copyright-main -->
    </div>
    <!-- end footer-box -->
</div>
<!-- end footer-main -->