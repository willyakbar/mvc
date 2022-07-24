<!-- konten -->
<div class="row">
    <div class="col-lg-6">

        <?php
        if (isset($_SESSION['flash'])) {
            Helper::flash();
        }
        ?>

        <!-- tombol modal tambah menu -->
        <a href="" class="btn btn-primary text-capitalize mb-3 btn-add-role" data-toggle="modal" data-target="#modal">
            Add Role
        </a>


        <!-- data tabel user_menu -->
        <table class="table table-hover text-capitalize text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['role'] as $role) : ?>
                    <tr>
                        <th scope="row"><?= $role['role_id'] ?></th>
                        <td><?= $role['username'] ?></td>
                        <td>
                            <a href="<?= base ?>admin/roleAccess/<?= $role['role_id'] ?>" class="btn btn-sm btn-warning">access</a>
                            <a href="<?= base ?>admin/deleteRoleById/<?= $role['role_id'] ?>" class="btn btn-sm btn-danger btn-delete-role">delete</a>
                            <a href="" class="btn btn-sm btn-success btn-change-role" data-toggle="modal" data-target="#modal" data-id="<?= $role['role_id'] ?>">change</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <!-- akhir data tabel user_menu -->



    </div>
</div>
<!-- akhir konten -->


<!-- Modal tambah data user_menu -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-capitalize">
                <h5 class="modal-title" id="ModalLabel">add new role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-modal" action="<?= base ?>admin/addRole" method="post">
                    <input type="hidden" id="id" name='id'>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autocomplete="off">
            </div>
            <div class="modal-footer text-capitalize">
                <button type="button" class="btn btn-danger text-capitalize" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary text-capitalize btn-modal">create</button>
            </div>
            </form>
        </div>
    </div>
</div>