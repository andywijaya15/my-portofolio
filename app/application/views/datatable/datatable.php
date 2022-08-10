<?php $this->view("_layouts/header") ?>
<link rel="stylesheet" href="/assets/plugins/datatables/jquery.dataTables.min.css">

<div class="card" id="content" hidden="hidden">
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#daftarmurid" type="button" role="tab">Daftar Murid</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tambahmurid" type="button" role="tab">Tambah Murid</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="daftarmurid" role="tabpanel">
                <form id="formsearchmurid">
                    <div class="row mb-1">
                        <div class="col">
                            <input type="text" class="form-control form-control-sm" id="searchboxdt" autocomplete="off" placeholder="Cari disini...">
                        </div>
                        <div class="col-3 col-lg-2">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mb-1">
                    <div class="table-responsive">
                        <!-- <table id="murid" class="table table-bordered table-striped table-sm" style="cursor: default;display: none"> -->
                        <table id="murid" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr class="bg-info text-center">
                                    <th>NAMA</th>
                                    <th>TELP</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tambahmurid" role="tabpanel">

            </div>
        </div>
    </div>
</div>

<script src="/assets/plugins/jquery/jquery-3.6.0.slim.min.js"></script>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let murid = new DataTable('#murid', {
            dom: 'rtp',
            columnDefs: [{
                orderable: false,
                targets: [1, 2]
            }]
        });
    });
</script>

<?php $this->view("_layouts/footer") ?>