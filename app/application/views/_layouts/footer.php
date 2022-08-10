</div>
</div>

</div>


<!-- Javascript -->
<script src="/assets/plugins/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SweetAlert -->
<script src="/assets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Socket IO -->
<script src="/assets/plugins/socket.io/socket.io.min.js"></script>

<script>
    // prod
    const socket = io("https://socket-ndik.herokuapp.com");
    // dev
    // socket = io("http://10.10.1.100:3000");

    socket.on("dapetsapa", (res) => {
        noty("success", `Halo user <?= $this->session->userdata("nama_user"); ?>,${res} menyapamu..`)
    });

    const tabStatus = document.querySelector("#status");
    const tabContent = document.querySelector("#content");

    socket.on("connect", () => {
        tabStatus.setAttribute("hidden", "hidden");
        tabContent.removeAttribute("hidden");
    });

    socket.on("disconnect", () => {
        tabContent.setAttribute("hidden", "hidden");
        tabStatus.removeAttribute("hidden");
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