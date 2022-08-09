<!DOCTYPE html>
<html lang="en">

<head>
    <title>Keep It Simple</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="KIS - Keep It Simple">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="/assets/images/icons8-tree-pastel-16.png">

    <!-- FontAwesome JS-->
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="<?= base_url(); ?>"><img class="logo-icon me-2" src="/assets/images/icons8-tree-pastel-96.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">Log in to KIS</h2>
                    <div class="auth-form-container text-start">
                        <?php echo $this->session->flashdata('alert') ?>
                        <form class="auth-form login-form" id="formlogin" method="POST" action="/Auth/login">
                            <div class="email mb-3">
                                <!-- <label class="sr-only" for="namauser">Nama</label> -->
                                <input name="namauser" id="namauser" type="text" class="form-control email" placeholder="Nama" required="required" autocomplete="off">
                            </div>
                            <div class="email mb-3">
                                <!-- <label class="sr-only" for="email">Email</label> -->
                                <input name="email" id="email" type="email" class="form-control email" placeholder="Alamat Email" required="required" autocomplete="off">
                            </div>
                            <!-- <div class="password mb-3">
                                <label class="sr-only" for="password">Password</label>
                                <input name="password" type="password" class="form-control password" placeholder="Password" required="required">
                                <div class="extra mt-3 row justify-content-between">
                                </div>
                            </div> -->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
            </div>
        </div>

    </div>
</body>

</html>