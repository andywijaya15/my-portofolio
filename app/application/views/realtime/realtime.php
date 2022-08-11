<?php $this->view("_layouts/header") ?>

<div class="card" id="content" hidden="hidden">
    <h4 class="card-header">
        Realtime data dengan node js
    </h4>
    <div class="card-body">
        <p class="card-text">Silahkan login di perangkat berbeda karena
        <p class="fw-bold">Fitur ini bekerja saat ada lebih dari 1 orang yang online,bisa 1 HP dan 1 PC atau 1 PC 2 Browser berbeda(Chrome dan Firefox)</p>
        dan login dengan nama dan email yang berbeda lalu klik tombol dibawah ini dan lihat apa yang terjadi : </p>
        <button class="btn btn-danger" id="btnsapa">Sapa Semua Orang yang online</button>
    </div>
</div>


<script>
    const btnSapa = document.querySelector("#btnsapa");

    const click_log = async () => {
        const data = new FormData();
        data.append("user", '<?= $this->session->userdata("nama_user"); ?>');
        const response = await fetch("/log_click", {
            method: "POST",
            body: data
        });
        const result = await response.json();
        return result.status;
    }

    btnSapa.addEventListener("click", async () => {
        const result = await click_log();
        if (result == "success") {
            socket.emit("sapa", {
                username: '<?= $this->session->userdata("nama_user"); ?>'
            });
        } else {
            noty("error", `Database error`);
        }
    });

    socket.on("nooneonline", () => {
        noty("error", `Maaf tidak ada yang online di ndik.helloworld.my.id`);
    })
</script>

<?php $this->view("_layouts/footer") ?>