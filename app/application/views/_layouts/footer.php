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