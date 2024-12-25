<main class="main__product pb-5">
    <div class="main__product-banner">
        <img src="./public/images/banner-product.png" alt="" class="w-100">
    </div>
    <div class="main__product-wapper">
        <div class="text-center">
            <h2 class="text-uppercase text-center d-inline-block main-heading"><?= $tenDm['TenDanhMuc'] ?></h2>
        </div>
        <div class="container mt-5">
            <div class="row gy-5 gx-4 mb-5 pb-5">
                <?php if (!empty($spById)): ?>
                    <?php foreach ($spById as $sp) : ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="index.php?ctrl=product&view=detail&category=<?= $sp['MaDanhMuc'] ?>&id=<?= $sp['MaSanPham'] ?>" class="text-decoration-none">
                                <div class="main__product-item p-5 position-relative">
                                    <div class="w-100">
                                        <img src="./public/images/<?= $sp['Anh'] ?>" alt="" class="w-75">
                                    </div>
                                    <div class="main__product-item-hover">
                                        Đặt Ngay
                                    </div>
                                </div>
                                <div class="my-4">
                                    <h4 class="text-uppercase main__product-item-heading text-decoration-none fz-ex-18px"><?= $sp['TenSanPham'] ?></h4>
                                    <?php if (empty($sp['GiaGiam'])): ?>
                                        <p class="fs-3 text-decoration-none text-secondary"><?= number_format($sp['Gia']) . 'đ' ?></p>
                                    <?php else: ?>
                                        <div class="d-flex gap-3">
                                            <p class="fs-3 text-decoration-line-through text-secondary"><?= number_format($sp['Gia']) . 'đ' ?></p>
                                            <p class="fs-3 text-decoration-none text-secondary"><?= number_format($sp['GiaGiam']) . 'đ' ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="w-100">
                        <img src="./public/images/empty.jpg" alt="" class="w-100 h-100">
                    </div>
                <?php endif; ?>
            </div>
            <div class="pagi mt-5 pt-5">
                <?php if ($sl > 0): ?>
                    <div class="d-flex justify-content-center gap-4">
                        <span class="fs-3 fw-medium bg-white p-2 pagi-item">
                            <?php if (isset($_GET['page'])): ?>
                                <a class="text-decoration-none color-primary d-inline-block" href="index.php?ctrl=product&view=category&id=<?= $_GET['id'] ?><?= $_GET['page'] > 1 ? '&page=' . (int)$_GET['page'] - 1 : '' ?>">Trang Trước</a>
                            <?php else: ?>
                                Trang Trước
                            <?php endif; ?>
                        </span>
                        <span class="fs-3 fw-medium p-2 pagi-item pagi-item--bg-color">
                            <?php if (isset($_GET['page'])): ?>
                                <?php if ((int) $_GET['page'] < $sl): ?>
                                    <a class="text-decoration-none text-white d-inline-block" href="index.php?ctrl=product&view=category&id=<?= $_GET['id'] ?>&page=<?= (int) $_GET['page'] + 1 ?>">Trang Kế Tiếp</a>
                                <?php else: ?>
                                    Trang Kế Tiếp
                                <?php endif; ?>
                            <?php else: ?>
                                <a class="text-decoration-none text-white d-inline-block" href="index.php?ctrl=product&view=category&id=<?= $_GET['id'] ?>&page=1">Trang Kế Tiếp</a>
                            <?php endif; ?>
                        <?php else: ?>
                            Trang Kế Tiếp
                        <?php endif; ?>
                        </span>
                    </div>
                    <div class="text-center mt-5">
                        <ul class="pagination pagination-lg justify-content-center">
                            <?php for ($i = 1; $i <= $sl; $i++) : ?>
                                <li class="page-item"><a class="page-link fs-4 <?= isset($_GET['page']) && (int)$_GET['page'] === $i ? 'pagi-item--bg-color' : '' ?>"
                                        href="index.php?ctrl=product&view=category&id=<?= $_GET['id'] ?>&page=<?= $i ?>"><?= $i ?>
                                    </a></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</main>