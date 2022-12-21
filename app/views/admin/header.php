<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="base_url" content="<?= BASEURL ?>">

    <title><?= APP_NAME ?> - Landing</title>
    <link rel="icon" href="<?= BASEURL ?>/favicon.ico" type="image/png">


    <!-- UI -->
    <link rel="stylesheet" href="<?= BASEURL ?>/light/css/app-light.css" id="lightTheme">

    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?= BASEURL ?>/light/css/feather.css">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?= BASEURL ?>/light/css/daterangepicker.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

</head>

<body class="vertical  light  ">

    <!-- Memanggil sideba-->
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            </button>
            <ul class="nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="<?= BASEURL ?>/light/assets/avatars/profile.png" alt="..." class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= BASEURL ?>/admin/logout" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                            <i class="fas fa-sign-out-alt fa-sm mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>


        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?= BASEURL ?>/admin">

                        <img src="<?= BASEURL ?>/light/assets/avatars/logo.png" alt="logo" width="70%">
                    </a>
                </div>

                <ul class="navbar-nav flex-fill w-100 mb-2">

                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= BASEURL ?>/admin">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Dashboard</span>
                        </a>
                    </li>

                </ul>


                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Apps</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">



                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= BASEURL ?>/admin/approve_pinjaman">
                            <i class="fe fe-check-circle fe-16"></i>
                            <span class="ml-3 item-text">Apporval Peminjaman</span>
                        </a>
                    </li>


                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= BASEURL ?>/admin/daftar-pinjaman">
                            <i class="fe fe-grid fe-16"></i>
                            <span class="ml-3 item-text">Daftar Peminjaman</span>
                        </a>
                    </li>



                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= BASEURL ?>/admin/daftar-barang">
                            <i class="fe fe-box fe-16"></i>
                            <span class="ml-3 item-text">Daftar Barang</span>
                        </a>
                    </li>


                    <li class="nav-item w-100">
                        <a class="nav-link" href="<?= BASEURL ?>/admin/daftar-user">
                            <i class="fe fe-user-plus fe-16"></i>
                            <span class="ml-3 item-text">Daftar User</span>
                        </a>
                    </li>


            </nav>
        </aside>




        <main role="main" class="main-content">