<?php $this->view("_layouts/header") ?>

<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
    <div class="inner">
        <div class="app-card-body p-3 p-lg-4">
            <h3 class="mb-3">Welcome, <?= $this->session->userdata("nama_user"); ?></h3>
            <div class="row gx-5 gy-3">
                <div class="col-12 col-lg-9">

                    <div>Kumpulan Fitur Project yang pernah saya buat dengan Bootstrap 5</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view("_layouts/footer") ?>