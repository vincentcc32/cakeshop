<header class="header p-3 position-sticky top-0">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-4 d-flex justify-content-start">
                <div class="d-flex align-items-center gap-3">
                    <span class="d-inline-block header__wapper-icon-search">
                        <i class="header__search-icon fa-solid fa-magnifying-glass fs-2 cursor-pointer" role="button"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i>
                    </span>
                    <span class="fs-3 text-white d-none d-sm-block">Tìm kiếm</span>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="header__logo">
                    <a href="index.php" class="d-block w-100 text-center">
                        <img src="./public/images/logo.png" alt="" class="w-100 h-100">
                    </a>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end gap-4">
                <div class="position-relative">
                    <i class="header__icon-bar fa-solid fa-bars text-white fs-2 cursor-pointer dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false" role="button"></i>
                    <!-- <div class="position-absolute top-100 end-0 bg-white py-4 px-3 list-unstyled rounded-5"
                            style="width: 25rem; border: 1px solid #9e553b;"> -->
                    <ul class=" dropdown-menu bg-white py-4 px-3 list-unstyled rounded-5 text-start"
                        style="width: 25rem; border: 1px solid #9e553b;">
                        <li class="p-2" style="border-bottom: 1px solid #9e553b;">
                            <a href="index.php" class="fs-4 text-decoration-none text-black d-block">
                                <img src="./public/images/home.png" alt="" style="width: 3rem;">
                                Trang Chủ</a>
                        </li>
                        <li class="p-2" style="border-bottom: 1px solid #9e553b;">
                            <a href="index.php?ctrl=page&view=story" class="fs-4 text-decoration-none text-black d-block">
                                <img src="./public/images/cauchuyen.png" alt="" style="width: 3rem;">
                                Câu Chuyện Thương Hiệu</a>
                        </li>
                        <li class="p-2" style="border-bottom: 1px solid #9e553b;">
                            <a href="index.php?ctrl=page&view=contact" class="fs-4 text-decoration-none text-black d-block">
                                <img src="./public/images/lienhe.png" alt="" style="width: 3rem;">
                                Liên Hệ</a>
                        </li>
                        <li class="p-2">
                            <?php if (isset($_SESSION['user'])): ?>
                                <p class="d-inline-flex gap-1">
                                    <button class="btn bg-white border-0 p-0 fs-4 text-decoration-none text-black d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <div class=" ">
                                            <img src="./public/images/taikhoan.png" alt="" style="width: 3rem;">
                                            <p class="fs-4 d-inline-block m-0">Xin chào <span class="text-danger"><?= $_SESSION['user']['TenTaiKhoan'] ?></span></p>
                                        </div>
                                    </button>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <a href="index.php?ctrl=user&view=profile" class="fs-4 text-decoration-none text-black d-block">
                                            <p class="fs-4 d-inline-block ">Thông tin</span></p>
                                        </a>
                                        <a href="index.php?ctrl=user&view=logout" class="fs-4 text-decoration-none text-black d-block">
                                            <p class="fs-4 d-inline-block ">Đăng xuất</span></p>
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="index.php?ctrl=user&view=login" class="fs-4 text-decoration-none text-black d-block">
                                    <img src="./public/images/taikhoan.png" alt="" style="width: 3rem;">
                                    Tài khoản
                                </a>
                            <?php endif; ?>
                        </li>

                    </ul>
                    <!-- </div> -->
                </div>
                <div class="position-relative">
                    <a href="index.php?ctrl=product&view=cart" class="d-block header_icon-cart">
                        <i class="fa-solid fa-cart-shopping text-white fs-2"></i>
                        <span class="quantity-cart position-absolute fs-3 text-white" style="top: -80%; right: -80%;">(<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>