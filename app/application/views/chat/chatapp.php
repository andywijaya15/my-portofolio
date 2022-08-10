<?php $this->view("_layouts/header") ?>

<div class="row mb-2">
    <div class="col">
        <div class="card" id="content">
            <div class="card-body" id="tablogin">
                <form id="loginchat">
                    <div class="row">
                        <div class="col col-lg">
                            <input type="text" class="form-control" placeholder="Masukkan Username" id="usernamechat" autocomplete="off">
                        </div>
                        <div class="col-3 col-lg-2">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success" id="btnmasuk">Masuk</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body" id="tablogout" hidden="hidden">
                <div class="row">
                    <div class="col col-lg">
                        <h5 id="textloginas"></h5>
                    </div>
                    <div class="col-3 col-lg">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-danger" id="btnkeluar">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card" id="chatroom" hidden="hidden">
            <h1 class="card-header">
                Chat Room
            </h1>
            <div class="card-body">
                <ul class="list-group" id="msgroom">

                </ul>
            </div>
            <div class="card-footer">
                <form id="formmsg">
                    <div class="row">
                        <div class="col-9 col-lg-9">
                            <input type="text" class="form-control" id="inputmsg">
                        </div>
                        <div class="col-3 col-lg-3">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success" id="btnkirim">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const formLoginchat = document.querySelector("#loginchat");
        const inputUsernamechat = document.querySelector("#usernamechat");
        const btnMasuk = document.querySelector("#btnmasuk");
        const btnKeluar = document.querySelector("#btnkeluar");
        const tabLogin = document.querySelector("#tablogin");
        const tabLogout = document.querySelector("#tablogout");
        const textLoginas = document.querySelector("#textloginas");
        const tabChatroom = document.querySelector("#chatroom");
        const formMsg = document.querySelector("#formmsg");
        const inputMsg = document.querySelector("#inputmsg");
        const fieldMsg = document.querySelector("#msgroom");

        const addChat = (type, text, from) => {
            let color;
            if (type = "send") {
                color = `list-group-item-secondary`;
            } else if (type = "rec") {
                color = ``;
            }
            const el = `<li class="list-group-item ${color}">
                           <div class="row">
                               <div class="col">${from}</div>
                           </div>
                           <div class="row">
                               <div class="col">${text}</div>
                           </div>
                        </li>`;
            fieldMsg.innerHTML = fieldMsg.innerHTML + el;
        }

        formMsg.addEventListener("submit", (e) => {
            e.preventDefault();
            socket.emit("sendmsg", {
                username: inputUsernamechat.value,
                text: inputMsg.value
            });
            addChat("send", inputMsg.value, inputUsernamechat.value);
            formMsg.reset();
        });

        socket.on("recmsg", (data) => {
            addChat("rec", data.text, data.username);
        });


        formLoginchat.addEventListener("submit", (e) => {
            e.preventDefault();
            if (inputUsernamechat.value != "") {
                // socket.emit("add user", inputUsernamechat.value);
                tabLogin.setAttribute("hidden", "hidden");
                tabLogout.removeAttribute("hidden");
                tabChatroom.removeAttribute("hidden");
                textLoginas.textContent = `Welcome ${inputUsernamechat.value}`;
                inputMsg.focus();
            } else {
                noty("error", "Input username masih kosong");
            }
        });

        btnKeluar.addEventListener("click", () => {
            textLoginas.textContent = "";
            tabLogout.setAttribute("hidden", "hidden");
            tabChatroom.setAttribute("hidden", "hidden");
            tabLogin.removeAttribute("hidden");
        });

    });
</script>

<?php $this->view("_layouts/footer") ?>