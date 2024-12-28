<main class="main__home pb-5">
    <div class="main__home-banner">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="./public/images/banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="./public/images/banner.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon fs-2" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon fs-2" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
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

<div class="icon-zalo">
    <a href="https://zalo.me/0789475518" target="_blank">
        <img src="./public/images/icon-zalo.png" alt="" class="w-100">
    </a>
</div>