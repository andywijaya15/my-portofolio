<?php $this->view("_layouts/header") ?>
<link rel="stylesheet" href="/assets/plugins/datatables/jquery.dataTables.min.css">

<div class="card" id="content" hidden="hidden">
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#daftarmurid" type="button" role="tab">Daftar Murid</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tambahmurid" type="button" role="tab" id="tabtambah">Tambah Murid</button>
            </li>
        </ul>
        <script>
            var tabEl = document.querySelectorAll('#btndaftarmurid');
            console.log(tabEl);
            tabEl.addEventListener('shown.bs.tab', function(event) {
                event.target // newly activated tab
                event.relatedTarget // previous active tab
            })
        </script>
        <!-- <script>
            const tabTambah = document.querySelector("#tabtambah");

        </script> -->
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
                        <table id="murid" class="table table-bordered table-striped table-sm" style="cursor: default;">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">TELP</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tambahmurid" role="tabpanel">
                <form id="formtambahmurid">
                    <div class="mb-3">
                        <label class="form-label">Nama Murid</label>
                        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <input type="text" class="form-control" name="telp" id="telp" autocomplete="off" pattern="[0-9]+">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let murid;
    const deleteMurid = async (e) => {
        e.preventDefault();
        const ask = await Swal.fire({
            title: 'Apakah kamu yakin ingin menghapus murid ini ?',
            text: "Data yang dihapus tidak bisa dikembalikan...",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: `Tidak`
        });
        if (ask.isConfirmed) {
            const response = await fetch(e.target.href);
            const result = await response.json();
            if (result.status == "pass") {
                noty("success", "Berhasil menghapus murid");
                murid.ajax.reload();
            } else {
                noty("error", "Gagal menghapus murid")
            }
        }


    }
</script>
<script src="/assets/plugins/jquery/jquery-3.6.0.min.js"></script>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        murid = new DataTable('#murid', {
            serverSide: true,
            responsive: true,
            pageLength: 50,
            deferRender: true,
            scrollY: "265px",
            dom: 'rtp',
            ajax: {
                url: "/Readmurid",
                type: 'POST'
            },
            columnDefs: [{
                orderable: false,
                targets: [2, 3]
            }, {
                className: 'text-nowrap',
                targets: [1, 3]
            }]
        });

        socket.on("connect", () => {
            murid.columns.adjust();
        });

        const formSearchmurid = document.querySelector("#formsearchmurid");
        const inputSearchmurid = document.querySelector("#searchboxdt");

        formSearchmurid.addEventListener("submit", (e) => {
            e.preventDefault();
            murid.search(inputSearchmurid.value).draw();
        });

        const formTambahmurid = document.querySelector("#formtambahmurid");
        const inputNama = document.querySelector("#nama");
        const inputTelp = document.querySelector("#telp");

        const addMurid = async () => {
            const data = new FormData(formTambahmurid);
            const response = await fetch("/Addmurid", {
                method: "POST",
                body: data
            });
            const result = await response.json();
            return result.status;

        }

        formTambahmurid.addEventListener("submit", async (e) => {
            e.preventDefault();
            const result = await addMurid();
            if (result == "pass") {
                noty("success", "Berhasil menambahkan murid");
            } else {
                noty("error", "Gagal menambahkan murid")
            }
        });
    });
</script>

<?php $this->view("_layouts/footer") ?>