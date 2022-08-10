</div>
<!--//container-fluid-->
</div>
<!--//app-content-->

</div>
<!--//app-wrapper-->


<!-- Javascript -->
<script src="/assets/plugins/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SweetAlert -->
<script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Socket IO -->
<script src="/assets/plugins/socket.io/socket.io.min.js"></script>

<script>
    // prod
    // const socket = io("https://socket-ndik.herokuapp.com");
    // dev
    socket = io("http://localhost:3000");

    socket.on("dapetsapa", (res) => {
        noty("success", `Halo user <?= $this->session->userdata("nama_user"); ?>,${res} menyapamu..`)
    });

    const statusNode = document.querySelector("#stat");
    const statusText = document.querySelector("#stattext");

    const checkTextcolor = (el) => {
        if (el.classList.contains("text-danger")) {
            el.classList.remove("text-danger");
        } else if (el.classList.contains("text-success")) {
            el.classList.remove("text-success");
        }
    }

    socket.on("connect", () => {
        checkTextcolor(statusNode);
        statusNode.classList.add("text-success");
        statusNode.textContent = "ONLINE";
        statusText.textContent = "Kamu bisa menerima data realtime"
    });

    socket.on("disconnect", () => {
        checkTextcolor(statusNode);
        statusNode.classList.add("text-danger");
        statusNode.textContent = "OFFINE";
        statusText.textContent = "Kamu tidak bisa menerima data realtime,silahkan ganti koneksi internetnya sampai status menjadi ONLINE"
    });
</script>

<script>
    const noty = (status, text) => {
        Swal.fire({
            icon: status,
            title: text,
            showConfirmButton: false,
            timer: 2000
        });
    }
</script>

<!-- Page Specific JS -->
<script src="/assets/js/app.js"></script>

</body>

</html>