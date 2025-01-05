<main class="main__home pb-5 bg-primary-color">
    <div class="container pt-5">
        <h1 class="color-primary my-4 fs-1 fw-bold">Tin tức và sự kiện</h1>
        <div class="row py-4 mt-5 gy-5 justify-content-center">
            <?php if (!empty($blog)): ?>
                <?php foreach ($blog as $value): ?>
                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                        <div class="p-5 text-center d-flex flex-column align-items-center bg-white overflow-hidden"
                            style="border-top-left-radius: 50%; border-top-right-radius: 50%; max-width: 345px;">
                            <div class="overflow-hidden w-100 "
                                style="border-top-left-radius: 50%; border-top-right-radius: 50%; max-width: 200px; max-height: 200px; min-width: 200px; min-height: 200px;">
                                <img src="./public/images/<?= $value['AnhNen'] ?>" alt="" class="w-100 mx-auto">
                            </div>
                            <div class="d-flex mt-5 justify-content-between align-items-center w-100">
                                <h4 class="color-primary my-4 fs-4 fw-bold overflow-hidden text-start"
                                    style="max-width: 250px; max-height: 40px;"><?= $value['TieuDe'] ?></h4>
                                <a href="index.php?ctrl=page&view=detailblog&id=<?= $value['MaBaiViet'] ?>"
                                    class="btn btn-primary fs-5 px-5 py-0 rounded-5 d-block cursor-pointer"
                                    style="height: 40px; line-height: 40px;">Xem</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="w-100">
                    <img src="./public/images/empty.jpg" alt="" class="w-100 h-100">
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>