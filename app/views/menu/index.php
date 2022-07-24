<!-- konten -->
<div class="row">
    <div class="col-lg-6">

        <?php
        if (isset($_SESSION['flash'])) {
            Helper::flash();
        }
        ?>

        <!-- tombol modal tambah menu -->
        <a href="" class="btn btn-primary text-capitalize mb-3 btn-add-menu" data-toggle="modal" data-target="#modal">
            add menu
        </a>


        <!-- data tabel user_menu -->
        <table class="table table-hover text-capitalize text-center">
            <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">menu</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>

                <?php $no = 1 ?>
                <?php foreach ($data['menu'] as $menu) : ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $menu['menu'] ?></td>
                        <td>
                            <a href="<?= base ?>menu/deleteMenuById/<?= $menu['menu_id'] ?>" class="btn btn-sm btn-danger btn-delete-menu">delete</a>
                            <a href="" class="btn btn-sm btn-success btn-change-menu" data-toggle="modal" data-target="#modal" data-id="<?= $menu['menu_id'] ?>">change</a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
        <!-- akhir data tabel user_menu -->



    </div>
</div>
<!-- akhir konten -->


<!-- Modal tambah data user_menu -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-capitalize">
                <h5 class="modal-title" id="modalLabel">add new meu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-modal" action="<?= base ?>menu/createNewMenu" method="post">
                    <input type="hidden" id="menuId" name="menuId">
                    <input type="text" class="form-control" id="menuName" name="menuName" placeholder="Enter name" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-capitalize" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary text-capitalize btn-modal">created</button>
            </div>
            </form>
        </div>
    </div>
</div>