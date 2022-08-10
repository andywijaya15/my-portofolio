<?php $this->view("_layouts/header") ?>

<div class="row gy-4">
    <div class="col-12 col-lg-12">
        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                    <div class="col-auto">
                        <div class="app-icon-holder">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>
                        <!--//icon-holder-->

                    </div>
                    <!--//col-->
                    <div class="col-auto">
                        <h4 class="app-card-title">Profile</h4>
                    </div>
                    <!--//col-->
                </div>
                <!--//row-->
            </div>
            <!--//app-card-header-->
            <div class="app-card-body px-4 w-100">
                <!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Nama</strong></div>
                            <div class="item-data" id="textnama"><?= $this->session->userdata("nama_user"); ?></div>
                        </div>
                        <!--//col-->
                        <div class="col text-end">
                            <button type="button" class="btn btn-sm btn-warning" id="btneditnama" data-bs-toggle="button">Change</button>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <div class="input-group input-group-sm mb-3" hidden="hidden" id="formeditnama">
                    <input type="email" class="form-control" id="inputeditnama" value="<?= $this->session->userdata("nama_user"); ?>">
                    <button class="btn btn-success btn-sm" id="btnupdatenama">Update</button>
                </div>
                <!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Email</strong></div>
                            <div class="item-data" id="textemail"><?= $this->session->userdata("email_user"); ?></div>
                        </div>
                        <!--//col-->
                        <div class="col text-end">
                            <button type="button" class="btn btn-sm btn-warning" id="btneditemail" data-bs-toggle="button">Change</button>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <div class="input-group input-group-sm mb-3" hidden="hidden" id="formeditemail">
                    <input type="email" class="form-control" id="inputeditemail" value="<?= $this->session->userdata("email_user"); ?>">
                    <button class="btn btn-success btn-sm" id="btnupdateemail">Update</button>
                </div>
                <!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Website</strong></div>
                            <div class="item-data">
                                https://ndik.helloworld.my.id
                            </div>
                        </div>
                    </div>
                    <!--//row-->
                </div>
            </div>
        </div>
        <!--//app-card-->
    </div>
</div>
<script>
    const textEmail = document.querySelector("#textemail");
    const btnEditemail = document.querySelector("#btneditemail");
    const formEditemail = document.querySelector("#formeditemail");
    const inputEditemail = document.querySelector("#inputeditemail");
    const btnUpdateemail = document.querySelector("#btnupdateemail");
    const textNama = document.querySelector("#textnama");
    const btnEditnama = document.querySelector("#btneditnama");
    const formEditnama = document.querySelector("#formeditnama");
    const inputEditnama = document.querySelector("#inputeditnama");
    const btnUpdatenama = document.querySelector("#btnupdatenama");

    const showHiddeninput = (field, e) => {
        if (e.target.className.includes("active")) {
            field.removeAttribute("hidden");
        } else {
            field.setAttribute("hidden", "hidden");
        }
    }

    btnEditemail.addEventListener("click", (e) => {
        showHiddeninput(formEditemail, e);
    });

    btnEditnama.addEventListener("click", (e) => {
        showHiddeninput(formEditnama, e);
    });

    const changeData = async (type, value, where, group, btnlocation) => {
        const data = new FormData();
        data.append("type", type);
        data.append("value", value);
        const response = await fetch(`/Updateinfo`, {
            method: "POST",
            body: data
        });
        const result = await response.json();
        if (result.status == "pass") {
            noty("success", "Berhasil Mengubah Data");
            where.textContent = value;
            btnlocation.click();

        } else if (result.status == "fail") {
            noty("failed", "Gagal Mengubah Data");

        } else {
            noty("failed", "Session telah Habis silahkan login kembali");
            window.location.href = "http://ndik.helloworld.my.id";
        }
    }

    btnUpdateemail.addEventListener("click", () => {
        changeData("email_user", inputEditemail.value, textEmail, formEditemail, btnEditemail);
    });

    btnUpdatenama.addEventListener("click", () => {
        changeData("nama_user", inputEditnama.value, textNama, formEditnama, btnEditnama);
    })
</script>

<?php $this->view("_layouts/footer") ?>