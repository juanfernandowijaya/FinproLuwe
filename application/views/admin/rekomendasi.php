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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahRekomendasi">Tambah Rekomendasi</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Link Produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rekomendasi as  $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['gambar_produk']; ?></td>
                            <td><?= $r['nama_produk']; ?></td>
                            <td><?= $r['deskripsi_produk']; ?></td>
                            <td><?= $r['link_produk']; ?></td>
                            <td>
                                <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                <a href="" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url('admin/deleteRekomendasi/' . $r['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin??')">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
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
            <form action="<?= base_url('admin/Addrekomendasi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" class="form-control" id="gambar_produk" name="gambar_produk" placeholder="Gambar Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Deskripsi Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="link_produk" name="link_produk" placeholder="Link Produk">
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