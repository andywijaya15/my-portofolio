<?php $this->view("_layouts/header") ?>

<div id="content" hidden="hidden">
    <div class="row">
        <div class="col">
            <div class="card" id="chatroom">
                <h5 class="card-header">
                    Welcome to Chat Room <?= $this->session->userdata("nama_user"); ?>
                </h5>
                <div class="card-body">
                    <ul class="list-group" id="msgroom" style="height: 200px;overflow-y: auto;">

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

        socket.emit("openchatroom", {
            username: `<?= $this->session->userdata("nama_user"); ?>`
        });

        socket.on("noone", () => {
            const el = `<div class="text-center"><span class="badge bg-danger">No user online</span></div>`
            const el2 = `<li class="alert alert-danger m-1">
                           <div class="row">
                               <div class="col text-center">Silahkan login di 2 perangkat berbeda untuk menggunakan chat room</div>
                           </div>
                        </li>`;
            fieldMsg.innerHTML = fieldMsg.innerHTML + el + el2;
        });

        socket.on("joinedroom", (res) => {
            userConnected(res.username);
        });

        const addChat = (type, text, from) => {
            let color;
            let textalign;
            if (type == "send") {
                color = `alert-primary`;
                textalign = `text-end`;
            } else if (type == "rec") {
                color = `alert-info`;
                textalign = `text-start`;
            }
            const el = `<li class="alert ${color} m-1">
                           <div class="row">
                               <div class="col ${textalign}">${from}</div>
                           </div>
                           <div class="row">
                               <div class="col ${textalign}">${text}</div>
                           </div>
                        </li>`;
            fieldMsg.innerHTML = fieldMsg.innerHTML + el;
            fieldMsg.scrollTop = fieldMsg.scrollHeight;
        }

        formMsg.addEventListener("submit", (e) => {
            e.preventDefault();
            if (inputMsg.value != "") {
                socket.emit("sendmsg", {
                    username: `<?= $this->session->userdata("nama_user"); ?>`,
                    msg: inputMsg.value
                });
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

    });
</script>

<?php $this->view("_layouts/footer") ?>