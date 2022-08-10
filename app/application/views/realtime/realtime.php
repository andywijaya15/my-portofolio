<?php $this->view("_layouts/header") ?>
<h1 class="app-page-title">Realtime Apps</h1>

<div class="card">
    <div class="card-header">
        Realtime data dengan node js
    </div>
    <div class="card-body" id="offline">
        <!-- <h5 class="card-title">Realtime data dengan node js</h5> -->
        <p class="card-text fw-bold">Fitur realtime tidak bisa digunakan karna anda tidak terhubung ke node js atau akses ke node js terblok oleh koneksi anda,silahkan gunakan koneksi internet yang lain..</p>
    </div>
    <div class="card-body" id="online" hidden="hidden">
        <!-- <h5 class="card-title">Realtime data dengan node js</h5> -->
        <p class="card-text">Silahkan buka <a href="https://ndik.helloworld.my.id/Realtime" class="fw-bold">https://ndik.helloworld.my.id/Realtime</a> di hp dan login dengan nama dan email yang berbeda lalu klik tombol dibawah ini dan lihat apa yang terjadi : </p>
        <button class="btn btn-danger" id="btnsapa">Sapa Semua Orang yang online</button>
    </div>
</div>


<script src="/assets/plugins/socket.io/socket.io.min.js"></script>
<script>
    const cardOnline = document.querySelector("#online");
    const cardOffline = document.querySelector("#offline");
    const btnSapa = document.querySelector("#btnsapa");

    const socket = io("https://socket-ndik.herokuapp.com");

    socket.on("connect", () => {
        cardOnline.removeAttribute("hidden");
        cardOffline.setAttribute("hidden", "hidden");
    });

    socket.on("disconnect", () => {
        cardOffline.removeAttribute("hidden");
        cardOnline.setAttribute("hidden", "hidden");
    });

    btnSapa.addEventListener("click", () => {
        socket.emit("sapa", {
            username: '<?= $this->session->userdata("nama_user"); ?>'
        });
    });

    socket.on("dapetsapa", (res) => {
        noty("success", `Halo user <?= $this->session->userdata("nama_user"); ?>,${res} menyapamu..`)
    });
</script>

<?php $this->view("_layouts/footer") ?>