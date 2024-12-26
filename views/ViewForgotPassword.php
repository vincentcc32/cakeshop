<main class="main__cart py-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form method="post" action="">
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required name="email" type="email" id="form2Example1" class="form-control py-2 fs-4 px-2" />
                        <label class="form-label fs-4" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required name="pass" type="password" id="form2Example2" class="form-control py-2 fs-4 px-2" />
                        <label class="form-label fs-4" for="form2Example2">Mật khẩu</label>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required name="repass" type="password" id="form2Example3" class="form-control py-2 fs-4 px-2" />
                        <label class="form-label fs-4" for="form2Example3">Nhập lại mật khẩu</label>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required name="code" minlength="4" maxlength="4" type="text" id="form2Example4" class="form-control py-2 fs-4 px-2" />
                        <label class="form-label fs-4" for="form2Example4">Mã xác nhận được gửi về email</label>
                    </div>
                    <?php if (isset($_SESSION['mess'])): ?>
                        <h3 class="fs-4 alert alert-warning"><?= $_SESSION['mess'] ?></h3>
                    <?php unset($_SESSION['mess']);
                    endif; ?>
                    <!-- Submit button -->
                    <div class="d-flex justify-content-between">
                        <button name="changepass" type="submit" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-block mb-4 fs-4 px-4 py-2">Đổi mật khẩu</button>
                        <button name="sendcode" type="button"
                            class="btn btn-primary btn-block mb-4 fs-4 px-4 py-2">Gửi mã</button>
                    </div>
                    <!-- Register buttons -->
                    <div class="text-center">
                        <p class="fs-4">Chưa có tài khoản? <a href="index.php?ctrl=user&view=register">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function sendEmail(email) {
        const xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", `index.php?ctrl=user&view=forgotpassword&action=sendcode&email=${email}`);
        xmlhttp.send();
    }

    sendCodeBtn = document.querySelector('button[name="sendcode"]');
    changePassBtn = document.querySelector('button[name="changepass"]');
    emailInput = document.querySelector('input[name="email"]');
    passInput = document.querySelector('input[name="pass"]');
    rePassInput = document.querySelector('input[name="repass"]');
    regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    sendCodeBtn.onclick = () => {
        if (emailInput.value.length > 0 && regex.test(emailInput.value)) {

            sendEmail(emailInput.value);
            alert('Kiểm tra mã xác nhận được gửi qua email!');
        } else {
            alert('Nhập email để gửi mã xác nhận!');
        }
    }

    changePassBtn.onclick = (e) => {
        if (passInput.value !== rePassInput.value) {
            e.preventDefault();
            alert('Mật khẩu không khớp!');
        }
    }
</script>