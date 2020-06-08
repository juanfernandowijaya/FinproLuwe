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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Artikel">Tambah Promo</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Komentar</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Link Instagram</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($artikel as  $art) : ?>
                        <?php if ($user['id'] == $art['id_user']) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $user['name']; ?></td>
                                <td><?= $art['komentar_cust']; ?></td>
                                <td><?= $user['image']; ?></td>
                                <td><?= $art['tgl_cust']; ?></td>
                                <td><?= $art['link_instagram']; ?></td>
                                <td>
                                    <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                    <a href="" class="badge badge-pill badge-success">Edit</a>
                                    <a href="<?= base_url('user/deleteArtikel/' . $art['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endif; ?>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>



</div>

<div class="modal fade" id="Artikel" tabindex="-1" role="dialog" aria-labelledby="Artikel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PromoData">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/addArtikel'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $user['id']; ?>" hidden>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="gambar_user" name="gambar_user" value="<?= $user['image']; ?>" hidden>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tgl_cust" name="tgl_cust" value="<?= date('m/d/Y H:i:s', time());  ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="komentar_cust" name="komentar_cust" placeholder="Komentar">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="link_instagram" name="link_instagram" placeholder="Link">
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