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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Makanan</th>
                        <th scope="col">Tanggal Order</th>
                        <th scope="col">Deskripsi Order</th>
                        <th scope="col">Tanggal Pengambilan/Pengantaran</th>
                        <th scope="col">Alamat Pengiriman Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($order as  $o) : ?>
                        <?php if ($user['id'] == $o['id_user']) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $o['nama_makanan']; ?></td>
                                <td><?= $o['order_date']; ?></td>
                                <td><?= $o['order_des']; ?></td>
                                <td><?= $o['order_time']; ?></td>
                                <td><?= $o['order_alamat']; ?></td>
                                <td>
                                    <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                    <a href="#" class="badge badge-pill badge-success">Edit</a>
                                    <a href="<?= base_url('user/deleteOrder/' . $o['id_order']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin delete??')">Delete</a>
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