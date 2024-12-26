<main class="main__cart py-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form method="post" action="" id="form-register">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required type="text" id="form2Example4" name="ten" class="form-control py-2 fs-4 px-2 ten" />
                        <label class="form-label fs-4" for="form2Example4">Tên</label>
                    </div>
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required type="email" id="form2Example1" name="email" class="form-control py-2 fs-4 px-2 email" />
                        <label class="form-label fs-4" for="form2Example1">Email</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required type="password" id="form2Example2" name="pass" class="form-control py-2 fs-4 px-2 pass" />
                        <label class="form-label fs-4" for="form2Example2">Mật khẩu</label>
                    </div>
                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input required type="password" id="form2Example3" name="repass" class="form-control py-2 fs-4 px-2  repass" />
                        <label class="form-label fs-4" for="form2Example3">Nhập lại mật khẩu</label>
                    </div>
                    <?php if (isset($_SESSION['mess'])): ?>
                        <h3 class="fs-4 alert alert-warning"><?= $_SESSION['mess'] ?></h3>
                    <?php unset($_SESSION['mess']);
                    endif; ?>
                    <!-- Submit button -->
                    <button name="register" type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary btn-block mb-4 fs-4 px-4 py-2 register">Đăng ký</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p class="fs-4">Đã có tài khoản? <a href="index.php?ctrl=user&view=login">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    const registerBtn = document.querySelector('.register');
    const formRegister = document.querySelector('#form-register');
    const passElement = document.querySelector('input[name="pass"]');
    const rePassElement = document.querySelector('input[name="repass"]');
</script>