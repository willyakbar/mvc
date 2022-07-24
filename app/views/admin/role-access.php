<!-- judul konten / halaman -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-capitalize"><?= $data['role']['username'] ?> Access</h1>
</div>

<!-- konten -->
<div class="row">

    <div class="col-lg-6">

        <?php
        if (isset($_SESSION['flash'])) {
            Helper::flash();
        }
        ?>

        <!-- data tabel user_menu -->
        <table class="table table-hover text-capitalize text-center">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">menu</th>
                    <th scope="col">access</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['menu'] as $menu) : ?>
                    <tr>
                        <th scope="row"><?= $menu['menu_id'] ?></th>
                        <td><?= $menu['menu'] ?></td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkbox-role-access" <?= Helper::checkAccess($data['role']['role_id'], $menu['menu_id']) ?> data-role="<?= $data['role']['role_id'] ?>" data-menu="<?= $menu['menu_id'] ?>">
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <!-- akhir data tabel user_menu -->

    </div>
</div>
<!-- akhir konten -->