<?php $this->view("_layouts/header") ?>
<h1 class="app-page-title">Realtime Apps</h1>

<script src="/assets/plugins/socket.io/socket.io.min.js"></script>
<script>
    const socket = io("https://socket-ndik.herokuapp.com");

    socket.emit("connected", {
        username: '<?= $this->session->userdata("nama_user"); ?>'
    });

    socket.on("nyambung", (res) => {
        console.log(res);
    });
</script>

<?php $this->view("_layouts/footer") ?>