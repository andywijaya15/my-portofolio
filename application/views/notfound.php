<?php $this->view("_layouts/header") ?>

<div class="container mb-5">
    <div class="row">
        <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
            <div class="app-branding text-center mb-5">
                <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="/assets/images/icons8-tree-pastel-96.png" alt="logo"><span class="logo-text">KIS</span></a>

            </div>
            <!--//app-branding-->
            <div class="app-card p-5 text-center shadow-sm">
                <h1 class="page-title mb-4">404<br><span class="font-weight-light">Halaman tidak ditemukan</span></h1>
                <div class="mb-4">
                    Halaman yang kamu cari tidak ada...
                </div>
                <a class="btn app-btn-primary" href="<?= base_url(); ?>">Kembali ke Dashboard</a>
            </div>
        </div>
        <!--//col-->
    </div>
    <!--//row-->
</div>
<!--//container-->

<?php $this->view("_layouts/footer") ?>