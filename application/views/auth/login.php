<!DOCTYPE html>
<html lang="en">

<head>
    <title>Keep It Simple</title>

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
                        <form class="auth-form login-form" method="POST" action="/Auth/login">
                            <div class="email mb-3">
                                <label class="sr-only" for="namauser">Nama</label>
                                <input name="namauser" type="text" class="form-control email" placeholder="Nama Lengkap" required="required">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="email">Email</label>
                                <input name="email" type="email" class="form-control email" placeholder="Email address" required="required">
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
                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

                    </div>
                </footer>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    <div class="overlay-content p-3 p-lg-4 rounded">
                        <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                        <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
                    </div>
                </div>
            </div>
            <!--//auth-background-overlay-->
        </div>
        <!--//auth-background-col-->

    </div>
    <!--//row-->


</body>

</html>