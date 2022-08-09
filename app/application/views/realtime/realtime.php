<?php $this->view("_layouts/header") ?>
<h1 class="app-page-title">Realtime Apps</h1>

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>


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