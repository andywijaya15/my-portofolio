<?php $this->view("_layouts/header") ?>

<div id="content">
    <div class="row">
        <div class="col">
            <div class="card" id="chatroom">
                <h1 class="card-header">
                    Chat Room
                </h1>
                <div class="card-body">
                    <ul class="list-group" id="msgroom" style="height: 145px;overflow-y: auto;">

                    </ul>
                </div>
                <div class="card-footer">
                    <form id="formmsg">
                        <div class="row">
                            <div class="col-9 col-lg-9">
                                <input type="text" class="form-control" id="inputmsg" autocomplete="off">
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

        const userConnected = (name) => {
            const el = `<div class="text-center"><span class="badge bg-success">${name} join chatroom</span></div>`;
            fieldMsg.innerHTML = fieldMsg.innerHTML + el;
        }

        const userDisconnected = () => {
            const el = `<span class="badge bg-danger">${name} left chatroom</span>`
        }

        socket.emit("openchatroom", {
            username: `<?= $this->session->userdata("nama_user"); ?>`
        });

        socket.on("noone", () => {
            const el = `<div class="text-center"><span class="badge bg-danger">No user online</span></div>`
            fieldMsg.innerHTML = fieldMsg.innerHTML + el;
        });

        socket.on("joinedroom", (res) => {
            userConnected(res.username);
        });

        const addChat = (type, text, from) => {
            let color;
            if (type == "send") {
                color = `list-group-item-secondary`;
            } else if (type == "rec") {
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
            fieldMsg.scrollTop = fieldMsg.scrollHeight;
        }

        formMsg.addEventListener("submit", (e) => {
            e.preventDefault();
            if (inputMsg.value != "") {
                socket.emit("sendmsg", inputMsg.value);
                addChat("send", inputMsg.value, `<?= $this->session->userdata("nama_user"); ?>`);
                formMsg.reset();
                inputMsg.focus();
            } else {
                noty("error", "Pesan masih kosong");
                inputMsg.focus();
            }
        });

        socket.on("recmsg", (data) => {
            addChat("rec", data.msg, data.username);
        });


        // formLoginchat.addEventListener("submit", (e) => {
        //     e.preventDefault();
        //     if (inputUsernamechat.value != "") {
        //         // socket.emit("add user", inputUsernamechat.value);
        //         tabLogin.setAttribute("hidden", "hidden");
        //         tabLogout.removeAttribute("hidden");
        //         tabChatroom.removeAttribute("hidden");
        //         textLoginas.textContent = `Welcome ${inputUsernamechat.value}`;
        //         inputMsg.focus();
        //     } else {
        //         noty("error", "Input username masih kosong");
        //     }
        // });

        // btnKeluar.addEventListener("click", () => {
        //     textLoginas.textContent = "";
        //     tabLogout.setAttribute("hidden", "hidden");
        //     tabChatroom.setAttribute("hidden", "hidden");
        //     tabLogin.removeAttribute("hidden");
        // });

    });
</script>

<?php $this->view("_layouts/footer") ?>