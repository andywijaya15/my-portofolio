<?php $this->view("_layouts/header") ?>

<div class="card" id="content" hidden="hidden">
    <h4 class="card-header">
        Kirim notifikasi email melalui Webside
    </h4>
    <form id="formemail">
        <div class="card-body">
            <div class="row m-2">
                <div class="col col-lg">
                    <label class="form-label">Email Tujuan : </label>
                </div>
            </div>
            <div class="row m-1">
                <div class="col col-lg">
                    <input type="email" class="form-control" id="email_tujuan" value="<?= $this->session->userdata("email_user"); ?>" readonly>
                </div>
                <div class="col-3 col-lg-2">
                    <div class="d-grid gap-2">
                        <a href="/Settings" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
            <div class="row m-1">
                <div class="col">
                    <p class="alert alert-danger">Pastikan gunakan email asli agar email bisa diterima dengan tepat,silahkan ganti email anda di tombol Edit diatas dan kembali lagi ke Menu Notifikasi Email untuk meengirim email dari website</p>
                </div>
            </div>
            <div class="row m-2">
                <div class="col col-lg">
                    <label class="form-label">Isi Pesan :</label>
                </div>
            </div>
            <div class="row m-1">
                <div class="col col-lg">
                    <textarea class="form-control" name="msg" id="msg" col="10" rows="3" style="height:100%;"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-3 col-lg-2">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success" id="btnkirim">Kirim</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const formEmail = document.querySelector("#formemail");
    const btnKirim = document.querySelector("#btnkirim");
    const inputMsg = document.querySelector("#msg");
    const inputEmail = document.querySelector("#email_tujuan");

    const sendMail = async () => {
        const data = new FormData(formEmail);
        const response = await fetch("/Sendmail", {
            method: "POST",
            body: data
        });
        const result = await response.json();
        return result.status;
    }

    formEmail.addEventListener("submit", async (e) => {
        e.preventDefault();
        if (inputMsg.value == "") {
            noty("error", "Isi Pesan dulu!");
            inputMsg.focus();
        } else {
            const result = await sendMail();
            if (result == "pass") {
                noty("success", `Berhasil mengirim email,silahkan cek di ${inputEmail.value}`)
            } else {
                noty("error", `Gagal mengirim email`)
            }
        }
    });
</script>

<?php $this->view("_layouts/footer") ?>