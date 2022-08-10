<?php $this->view("_layouts/header") ?>

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
        <p class="card-text">Silahkan buka <a href="https://ndik.helloworld.my.id/Realtime" class="fw-bold">https://ndik.helloworld.my.id/Realtime</a> di hp atau browser lain
        <p class="fw-bold fw-italic">(HARUS BERBEDA DARI BROWSER SEKARANG misalkan saat ini login di chrome,maka harus buka website ini di Firefox)</p> dan login dengan nama dan email yang berbeda lalu klik tombol dibawah ini dan lihat apa yang terjadi : </p>
        <button class="btn btn-danger" id="btnsapa">Sapa Semua Orang yang online</button>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {

        const cardOnline = document.querySelector("#online");
        const cardOffline = document.querySelector("#offline");
        const btnSapa = document.querySelector("#btnsapa");

        // const socket = io("https://socket-ndik.herokuapp.com");

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

    });
</script>

<?php $this->view("_layouts/footer") ?>