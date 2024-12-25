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
                        <label class="form-label fs-4" for="form2Example2">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">

                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!" class="fs-4">Forgot password?</a>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['mess'])): ?>
                        <h3 class="fs-4 alert alert-warning"><?= $_SESSION['mess'] ?></h3>
                    <?php unset($_SESSION['mess']);
                    endif; ?>
                    <!-- Submit button -->
                    <button name="login" type="submit" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-primary btn-block mb-4 fs-4 px-4 py-2">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p class="fs-4">Not a member? <a href="index.php?ctrl=user&view=register">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>