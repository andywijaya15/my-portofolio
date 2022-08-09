<?php $this->view("_layouts/header") ?>
<link rel="stylesheet" href="/assets/plugins/datatables/jquery.dataTables.min.css">
<h1 class="app-page-title">Datatable</h1>

<!-- <div class="app-card shadow-sm mb-5"> -->
<!-- <div class="app-card-body"> -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-2">
                        <button class="btn bg-success" data-toggle="modal" data-target="#addcustomer" data-backdrop='static' data-keyboard='false'><i class="fas fa-plus-circle"></i> Tambah Data Murid</button>
                    </div>
                    <div class="col col-md-2">
                        <button class="btn bg-success" data-toggle="modal" data-target="#addcustomer" data-backdrop='static' data-keyboard='false'><i class="fas fa-plus-circle"></i> Tambah Data Murid</button>
                    </div>
                </div>
            </div>
            <div class="card-body text-sm">
                <form onsubmit="searchCustomer(event)">
                    <div class="row">
                        <div class="col-md mb-1">
                            <input type="text" class="form-control form-control-sm" id="searchboxdt" autocomplete="off" placeholder="Cari disini...">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-block btn-sm bg-success"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <!-- <table id="murid" class="table table-bordered table-striped table-sm" style="cursor: default;display: none"> -->
                    <table id="murid" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="bg-gradient-blue text-center">
                                <th>KODE SISWA</th>
                                <th>NAMA</th>
                                <th>TELP</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//table-responsive-->

<!-- </div> -->
<!--//app-card-body-->
<!-- </div> -->

<script src="/assets/plugins/jquery/jquery-3.6.0.slim.min.js"></script>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#murid').DataTable();
    });
</script>

<?php $this->view("_layouts/footer") ?>