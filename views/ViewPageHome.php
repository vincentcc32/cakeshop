<main class="main__home pb-5">
    <div class="main__home-banner">
        <img src="./public/images/banner.png" alt="" class="w-100">
    </div>
    <div class="main__home-category text-center">
        <h2 class="text-uppercase text-center d-inline-block main-heading">Danh Mục</h2>
        <div class="container " style="min-width: 90%; max-width: 90%;">
            <div class="main__home-category-list">
                <div class="row gy-5">
                    <?php if (isset($dssm)): ?>
                        <?php foreach ($dssm as $dm) : ?>
                            <a href="index.php?ctrl=product&view=category&id=<?= $dm['MaDanhMuc'] ?>" class="col-sm-6 d-block position-relative main_home-category-item overflow-hidden">
                                <img src="./public/images/<?= $dm['AnhDanhMuc'] ?>" alt="" style="width: 25rem; border-top-left-radius: 50%; border-top-right-radius: 50%;" class="object-fit-cover">
                                <span class="bg-white fw-bolder position-absolute main__home-category-item-heading"><?= $dm['TenDanhMuc'] ?></span>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="w-100">
                            <img src="./public/images/empty.jpg" alt="" class="w-100 h-100">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>