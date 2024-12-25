<main class="main__product pb-5">
    <div class="main__product-wapper">
        <div class="text-center">
            <h2 class="text-uppercase text-center d-inline-block main-heading">Đã tìm thấy (<?= empty($quantity) ? 0 : $quantity ?>) sản phẩm</h2>
        </div>
        <div class="container mt-5">
            <div class="row gy-5 gx-4 mb-5 pb-5">
                <?php if (!empty($sp)): ?>
                    <?php foreach ($sp as $value): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="#" class="text-decoration-none">
                                <div class="main__product-item p-5 position-relative">
                                    <div class="w-100">
                                        <img src="./public/images/<?= $value['Anh'] ?>" alt="" class="w-75">
                                    </div>
                                    <div class="main__product-item-hover">
                                        Đặt Ngay
                                    </div>
                                </div>
                                <div class="my-4">
                                    <h4 class="text-uppercase main__product-item-heading text-decoration-none fz-ex-18px">
                                        <?= $value['TenSanPham'] ?></h4>
                                    <p class="fs-3 text-decoration-none text-secondary"><?= empty($value['GiaGiam']) ? number_format($value['Gia']) : number_format($value['GiaGiam']) ?>đ</p>
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
        </div>
    </div>
</main>