<!-- konten -->
<div class="row">
    <div class="col">

        <?php
        if (isset($_SESSION['flash'])) {
            Helper::flash();
        }
        ?>

        <!-- tombol modal tambah menu -->
        <a href="" class="btn btn-primary text-capitalize mb-3 btn-add-submenu" data-toggle="modal" data-target="#modal">
            add submenu
        </a>


        <!-- data tabel user_menu -->
        <table class="table table-hover text-capitalize text-center">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">menu</th>
                    <th scope="col">name</th>
                    <th scope="col">url</th>
                    <th scope="col">icon</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data['submenu'] as $menu) : ?>
                    <tr>
                        <td><?= $menu['menu'] ?></td>
                        <td><?= $menu['title'] ?></td>
                        <td><?= $menu['url'] ?></td>
                        <td class="text-lowercase"><?= $menu['icon'] ?></td>
                        <td>
                            <a href="<?= base ?>menu/deleteSubmenuById/<?= $menu['submenu_id'] ?>" class="btn btn-sm btn-danger btn-delete-submenu">delete</a>
                            <a href="" class="btn btn-sm btn-success btn-change-submenu" data-toggle="modal" data-target="#modal" data-id="<?= $menu['submenu_id'] ?>">change</a>
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
                <h5 class="modal-title" id="modal-submenu">add new submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-modal" action="<?= base ?>menu/createNewSubmenu" method="post">
                    <input type="hidden" name="submenuId" id="submenuId">
                    <div class="form-group">
                        <select name="menuId" id="menuId" class="form-control">
                            <option value="">Pilih Menu :</option>
                            <?php foreach ($data['menu'] as $menu) : ?>
                                <option value="<?= $menu['menu_id'] ?>"><?= $menu['menu'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama Submenu" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon" autocomplete="off">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-capitalize" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary text-capitalize btn-modal">add</button>
            </div>
            </form>
        </div>
    </div>
</div>