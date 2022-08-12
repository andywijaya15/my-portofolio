</div>
</div>

</div>


<!-- Javascript -->
<script src="/assets/plugins/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script>
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

    socket.on("resreftable", (data) => {
        if (data.location == window.location.href) {
            switch (data.table) {
                case "murid":
                    murid.ajax.reload();
                    break;
            }
        }
    });
</script>
<script>
    const sidebar = document.querySelectorAll("nav>ul>li>a.nav-link");
    sidebar.forEach(menu => {
        if (window.location.pathname == menu.pathname) {
            menu.classList.add("active");
        }
    });
</script>

<!-- Page Specific JS -->
<script src="/assets/js/app.js"></script>

</body>

</html>