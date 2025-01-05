<main class="main__home pb-5 bg-primary-color">
    <div>
        <img src="./public/images/bannerblog.jpg" alt="" class="w-100">
    </div>
    <div class="container pt-5 text-center">
        <h1 class="color-primary my-5 fw-bold" style="font-size: 4rem;"><?= $blog['TieuDe'] ?></h1>
        <div class="fs-2 blog__content">
            <?= $blog['NoiDung'] ?>
        </div>
        <p class="fs-2 mt-5">Thời gian đăng bài: <?= $blog['ThoiGian'] ?></p>
    </div>
</main>