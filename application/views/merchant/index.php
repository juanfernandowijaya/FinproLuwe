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
                        <th scope="col">Id User</th>
                        <th scope="col">Nama Order</th>
                        <th scope="col">Tanggal Order</th>
                        <th scope="col">Order Deskripsi</th>
                        <th scope="col">Tanggal Pengiriman/Pengambilan</th>
                        <th scope="col">Alamat Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($userName as  $or) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $or['id_user']; ?></td>
                            <td><?= $or['nama_makanan']; ?></td>
                            <td><?= $or['order_date']; ?></td>
                            <td><?= $or['order_des']; ?></td>
                            <td><?= $or['order_time']; ?></td>
                            <td><?= $or['order_alamat']; ?></td>
                            <td>
                                <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                <a href="<?= base_url('admin/deleteOr/' . $or['id_order']);  ?>" class="badge badge-pill badge-success" onclick="return confirm('yakin?? Order yang terhapus tidak dapat dikembalikan!!')">Process Order</a>
                                <a href="<?= base_url('merchant/cancelOrder/' . $or['id_order']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin?? Order yang terhapus tidak dapat dikembalikan!!')">Cancel Order</a>
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