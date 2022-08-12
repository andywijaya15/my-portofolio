<!DOCTYPE html>
<html lang="en">

<head>
    <title>KIS - Keep It Simple</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="/assets/images/icons8-tree-pastel-16.png">

    <!-- FontAwesome JS-->
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap-icons/bootstrap-icons.css">

    <!-- SweetAlert -->
    <script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Socket IO -->
    <script src="/assets/plugins/socket.io/socket.io.min.js"></script>

    <script>
        const noty = (status, text) => {
            Swal.fire({
                icon: status,
                title: text,
                showConfirmButton: false,
                timer: 2000
            });
        }

        // prod
        const socket = io("https://socket-ndik.herokuapp.com");
        // dev
        // socket = io("http://10.10.1.206:3000");
    </script>

</head>

<body class="app">

    <?php $this->view("_layouts/topnav") ?>

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-4 mb-4" id="status">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Koneksi ke Node JS</h4>
                                <div class="stats-figure text-danger">OFFLINE</div>
                                <div class="stats-meta">Kamu tidak bisa menerima data realtime,silahkan ganti koneksi internetnya sampai status menjadi ONLINE supaya semua fitur berjalan normal</div>
                            </div>
                        </div>
                    </div>
                </div>