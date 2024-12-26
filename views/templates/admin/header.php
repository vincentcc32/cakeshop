<header class="header p-3 position-sticky top-0">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-4 d-flex justify-content-start">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="header__logo">
                    <a href="admin.php" class="d-block w-100 text-center">
                        <img src="./public/images/logo.png" alt="" class="w-100 h-100">
                    </a>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end gap-4">
                <div class="position-relative">
                    <i class="fa-solid fa-bars text-white fs-2 cursor-pointer dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false" role="button"></i>
                    <ul class=" dropdown-menu bg-white py-4 px-3 list-unstyled rounded-5 text-start"
                        style="width: 25rem; border: 1px solid #9e553b;">
                        <li class="p-2" style="border-bottom: 1px solid #9e553b;">
                            <a href="admin.php?ctrl=page&view=dashboard" class="fs-4 text-decoration-none text-black d-block">
                                <img src="./public/images/home.png" alt="" style="width: 3rem;">
                                Thống kê</a>
                        </li>
                        <li class="p-2" style="border-bottom: 1px solid #9e553b;">
                            <a href="admin.php?ctrl=product&view=listproduct" class="fs-4 text-decoration-none text-black d-block">
                                <img src="./public/images/cauchuyen.png" alt="" style="width: 3rem;">
                                Sản phẩm</a>
                        </li>
                        <li class="p-2">
                            <a href="admin.php?ctrl=product&view=listcategory" class="fs-4 text-decoration-none text-black d-block">
                                <img src="./public/images/lienhe.png" alt="" style="width: 3rem;">
                                Danh mục</a>
                        </li>
                        <li class="p-2">
                            <a href="admin.php?ctrl=user&view=logout" class="fs-4 text-decoration-none text-black d-block">
                                <img src="./public/images/taikhoan.png" alt="" style="width: 3rem;">
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>