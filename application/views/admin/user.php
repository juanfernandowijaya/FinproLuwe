<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Member Semenjak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($userA as  $us) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $us['name']; ?></td>
                            <td><?= $us['email']; ?></td>
                            <td><?= $us['image']; ?></td>
                            <td><?= date('d F Y', $us['date_created']); ?></td>
                            <td>
                                <!-- <a href="?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-warning" disabled>Access</a>-->
                                <a href="<?= base_url('admin/deleteRekomendasi/' . $us['id']);  ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin??')">Delete</a>
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