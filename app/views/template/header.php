<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $data['title'] ?></title>

    <link href="<?= base ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- pembungkus halaman -->
    <div id="wrapper">

        <!-- sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- sidebar brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $data['title'] ?></div>
            </div>
            <!-- akhir sidebar brand -->

            <!-- sidebar admin -->
            <hr class="sidebar-divider">
            <?php foreach ($data['sidebar'] as $menu) : ?>
                <div class="sidebar-heading">
                    <?= $menu[0]['menu'] ?>
                </div>

                <?php foreach ($menu as $submenu) : ?>

                    <?php if ($data['title'] == $submenu['title']) : ?>
                        <li class="nav-item text-capitalize active">
                        <?php else : ?>
                        <li class="nav-item text-capitalize ">
                        <?php endif ?>
                        <a class="nav-link pb-0" href="<?= base ?><?= $submenu['url'] ?>">
                            <i class="<?= $submenu['icon'] ?>"></i>
                            <span><?= $submenu['title'] ?></span></a>
                        </li>
                    <?php endforeach ?>

                    <hr class="sidebar-divider mt-2">

                <?php endforeach ?>


                <!-- sidebar keluar -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base ?>user/logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Keluar</span></a>
                </li>
                <!-- akhir sidebar keluar -->

                <!-- Pengalih sidebar -->
                <hr class="sidebar-divider d-none d-md-block">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
                <!-- akhir pengalih sidebar -->
        </ul>
        <!-- akhir sidebar -->

        <!-- pembungkus utama -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- id kontent -->
            <div id="content">

                <!-- topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- pengalih topbar -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- akhir pengalih topbar -->


                    <!-- manu topbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- topbar informasi pengguna -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $data['user']['full_name'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= base ?>assets/img/user/<?= $data['user']['image'] ?>">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pengaturan
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- akhir topbar -->

                <!-- pembungkus konten -->
                <div class="container-fluid">