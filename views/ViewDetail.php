<main class="main__detail pb-5">
    <div class="main__detail-wapper">
        <div class="container">
            <a href="index.php?ctrl=product&view=category&id=<?= $cate ?>" class="d-flex align-items-center text-decoration-none gap-2 main__detail-heading">
                <i class="fa-solid fa-angle-left fs-2"></i>
                <h2 class="text-uppercase">Tất cả sản phẩm</h2>
            </a>
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="w-100">
                        <img src="./public/images/<?= $sp['Anh'] ?>" alt="" class="w-100">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <h2 class="main__detail-title" data-masp="<?= $sp['MaSanPham'] ?>"><?= $sp['TenSanPham'] ?></h2>
                        <p class="text-secondary fs-2"><?= empty($sp['GiaGiam']) ? number_format($sp['Gia']) : number_format($sp['GiaGiam']) ?> đ</p>
                    </div>
                    <div class="mt-3 d-flex align-items-center gap-3">
                        <span class="border-1 bg-secondary-subtle d-inline-block rounded-3 me-4">
                            <span class="cursor-pointer border-0 p-2 btn-down" style="outline: none; background: none;">
                                <i class="fa-solid fa-minus fs-2"></i>
                            </span>
                            <button class="border-0 p-2 fs-2 quantity"
                                style="outline: none; background: none;"
                                data-id="<?= $sp['MaSanPham'] ?>">1</button>
                            <span class="cursor-pointer border-0 p-2 btn-up" style="outline: none; background: none;">
                                <i class="fa-solid fa-plus fs-2"></i>
                            </span>
                        </span>
                        <button name="buy" class="cursor-pointer text-uppercase main__detail-btn-buy border-0" type="button" id="liveToastBtn">
                            đặt hàng
                        </button>
                    </div>
                    <div class="mt-5">
                        <p class="fs-4 fw-medium text-secondary"><span class="text-black">Category: </span><?= $sp['TenDanhMuc'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main__detail-action py-5 mt-5">
        <div class="container">

            <ul class="d-flex justify-content-start gap-5 list-unstyled" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active fs-3 fw-bold main__detail-tab-btn px-4" id="simple-tab-0"
                        data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0"
                        aria-selected="true">Mô tả</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fs-3 px-5 fw-bold main__detail-tab-btn px-4" id="simple-tab-1"
                        data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1"
                        aria-selected="false">Bình luận</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fs-3 px-5 fw-bold main__detail-tab-btn px-4" id="simple-tab-2"
                        data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2"
                        aria-selected="false">Đánh giá</a>
                </li>
            </ul>
            <div class="tab-content pt-5" id="tab-content">
                <!-- tab 1 description -->
                <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
                    <h3 class="fs-2 mb-4">Mô tả sản phẩm</h3>
                    <p class="fs-4 text-secondary fw-medium w-md-100" style="width: 85%;"><?= $sp['MoTa'] ?></p>
                </div>
                <!-- tab 2 review -->
                <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                    <div class="row gx-4">
                        <div class="col-md-6">
                            <h3 class="fs-2 mb-4">Bình luận</h3>
                            <div class="main__detaill-review-list" style="overflow-x: hidden;">
                                <?php if (!empty($bl)): ?>
                                    <?php foreach ($bl as $value) : ?>
                                        <div class="d-flex gap-3 mb-5 w-100">
                                            <div class="">
                                                <img src="./public/images/<?= empty($value['AnhDaiDien']) ? 'avt.png' : $value['AnhDaiDien'] ?>" alt=""
                                                    style="width: 60px; height: 60px;">
                                            </div>
                                            <div class="w-100">
                                                <h4 class="fs-3 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;"><?= $value['TenTaiKhoan'] ?> - <span><?= $value['ThoiGianBinhLuan'] ?></span>
                                                </h4>
                                                <p class="fs-4 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;"><?= $value['NoiDung'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <h2 class="nocmt fs-3 text-black">Chưa có bình luận nào!</h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="main__detail-review w-100">
                                <h3 class="fs-2 mb-4">Hãy bình luận về sản phẩm</h3>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <form action="" method="post" class="w-100">
                                        <label for="" class="text-secondary fs-4 d-block">Nhập bình luận của bạn</label>
                                        <textarea required name="content" id="" class="d-block w-100 p-3 fs-4"
                                            style="height: 15rem;"></textarea>
                                        <button type="button" name="cmt"
                                            class="border-0 fs-2 main__detail-review-btn-submit">Bình luận</button>
                                    </form>
                                <?php else: ?>
                                    <p><a href="index.php?ctrl=user&view=login" class="fs-3 ">Đăng nhập để bình luận</a></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab 3 ratting -->
                <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
                    <h3 class="fs-2 mb-4">Đánh giá</h3>
                    <div class="mb-5">
                        <?php if (isset($_SESSION['user'])): ?>
                            <form action="" method="post">
                                <div class="rating">
                                    <input type="radio" name="rating" value="5" id="5">
                                    <label style="font-size: 40px;" for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4">
                                    <label style="font-size: 40px;" for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3">
                                    <label style="font-size: 40px;" for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2">
                                    <label style="font-size: 40px;" for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1" checked='true'>
                                    <label style="font-size: 40px;" for="1">☆</label>
                                </div>
                                <textarea name="noidung" id="" class="d-block w-100 p-3 fs-4"
                                    style="height: 15rem;" placeholder="Nhập đánh giá của bạn"></textarea>
                                <button type="submit" name="rating-btn"
                                    class="border-0 fs-2 main__detail-review-btn-submit">Đánh giá</button>
                            </form>
                        <?php else: ?>
                            <p><a href="index.php?ctrl=user&view=login" class="fs-3 ">Đăng nhập để đánh giá</a></p>
                        <?php endif; ?>
                    </div>
                    <div class="main__detaill-rating-list" style="overflow-x: hidden;">
                        <?php if (!empty($rating)): ?>
                            <?php foreach ($rating as $value) : ?>
                                <div class="d-flex gap-3 mb-5 w-100">
                                    <div class="">
                                        <img src="./public/images/<?= empty($value['AnhDaiDien']) ? 'avt.png' : $value['AnhDaiDien'] ?>" alt=""
                                            style="width: 60px; height: 60px;">
                                    </div>
                                    <div class="w-100">
                                        <h4 class="fs-3 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;"><?= $value['TenTaiKhoan'] ?> - <span><?= $value['ThoiGianDanhGia'] ?></span>
                                        </h4>
                                        <div class="w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;">
                                            <?php for ($i = 1; $i <= $value['SoSao']; $i++) : ?>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <?php endfor; ?>
                                            <?php for ($i = $value['SoSao']; $i < 5; $i++) : ?>
                                                <i class="fa-solid fa-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <p class="fs-4 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;"><?= $value['NoiDungDanhGia'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h2 class="nocmt fs-3 text-black">Chưa có đánh giá nào!</h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="detail__randProduct" style="padding-top: 50px;">
                <h2 class="text-uppercase fs-1 color-primary pb-5">Sản phẩm liên quan</h2>
                <div class="row gy-5 gx-4 mb-5 py-5">
                    <?php if (!empty($randProduct)): ?>
                        <?php foreach ($randProduct as $sp) : ?>
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
            </div>
        </div>
    </div>
</main>

<!-- toast -->
<div class="toast-container position-fixed bottom-50 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto fs-4">Thông báo</strong>
            <small class="fs-4">Bây giờ</small>
            <button type="button" class="btn-close fs-4" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-success fs-4">
            Đã thêm vào giỏi hàng
        </div>
    </div>
</div>

<script>
    function addCart(sl, index) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            const quantity = document.querySelector('.quantity-cart');

            quantity.innerText = `(${this.responseText})`;

        }
        xmlhttp.open("GET", `index.php?ctrl=product&view=detail&index=${index}&sl=${sl}`);
        xmlhttp.send();
    }

    function addCmt(content, masp) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", `index.php?ctrl=product&view=detail&cmt=${content}&masp=${masp}`);
        xmlhttp.send();
    }

    function addRating(content, masp, sao) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", `index.php?ctrl=product&view=detail&rating=${content}&masp=${masp}&sao=${sao}`);
        xmlhttp.send();
    }

    const btnUp = document.querySelector('.btn-up');
    const btnDown = document.querySelector('.btn-down');
    const btnBuy = document.querySelector('.main__detail-btn-buy');
    const quantity = document.querySelector('.quantity');
    const listCmt = document.querySelector('.main__detaill-review-list');
    const nocmt = document.querySelector('.nocmt');
    const masp = document.querySelector('.main__detail-title').getAttribute('data-masp');
    const cmtBtn = document.querySelector('button[name="cmt"]');
    const inputCmt = document.querySelector('textarea[name="content"]');


    quantity.onclick = (e) => {
        e.preventDefault();
    }

    btnUp.onclick = (e) => {
        let tmp = parseInt(quantity.innerText)
        quantity.innerText = tmp + 1;


    }
    btnDown.onclick = (e) => {
        let tmp = parseInt(quantity.innerText)
        if (tmp != 1) {
            quantity.innerText = tmp - 1;
        }


    }
    btnBuy.onclick = () => {
        const sl = quantity.innerText;
        const index = quantity.getAttribute('data-id');
        addCart(sl, index);
    }
    if (cmtBtn) {
        cmtBtn.onclick = () => {
            if (inputCmt.value.length > 0) {
                if (nocmt) {
                    nocmt.remove();
                }
                let elemt = `
                <div class="d-flex gap-3 mb-5 w-100">
                    <div class="">
                        <img src="./public/images/<?= empty($value['AnhDaiDien']) ? 'avt.png' : $value['AnhDaiDien'] ?>" alt=""
                            style="width: 60px; height: 60px;">
                    </div>
                    <div class="w-100">
                        <h4 class="fs-3 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;"><?= $_SESSION['user']['TenTaiKhoan'] ?> - <span>Bây giờ</span>
                        </h4>
                        <p class="fs-4 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;">${inputCmt.value}</p>
                    </div>
                </div>
            `;
                const newElement = document.createElement('div');
                newElement.innerHTML = elemt;
                listCmt.insertAdjacentElement('afterbegin', newElement);
                addCmt(inputCmt.value, masp);
                inputCmt.value = '';
            }
        }
    }

    const ratingBtn = document.querySelector('button[name="rating-btn"]');
    if (ratingBtn) {
        ratingBtn.onclick = (e) => {
            e.preventDefault();
            let content = document.querySelector('textarea[name="noidung"]');
            let sao = document.querySelector('input[name="rating"]:checked');
            let elemt = `
                <div class="d-flex gap-3 mb-5 w-100">
                            <div class="">
                                <img src="./public/images/<?= empty($value['AnhDaiDien']) ? 'avt.png' : $value['AnhDaiDien'] ?>" alt=""
                                    style="width: 60px; height: 60px;">
                            </div>
                            <div class="w-100">
                                <h4 class="fs-3 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;"><?= $_SESSION['user']['TenTaiKhoan'] ?> - <span>Bây giờ</span>
                                </h4>
                                <div class="w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <p class="fs-4 w-md-100" style="width: 85%;width: 85%; white-space: normal; word-wrap: break-word;">${content.value}</p>
                            </div>
                        </div>
            `;
            let div = document.createElement('div');
            div.innerHTML = elemt;
            let stars = div.querySelectorAll('i.fa-star');
            for (let i = 0; i < parseInt(sao.value); i++) {
                stars[i].style.color = '#FFD43B';
            }
            document.querySelector('.main__detaill-rating-list').insertAdjacentElement('afterbegin', div);
            addRating(content.value, masp, sao.value);
            content.value = '';
            document.querySelector('input[name="rating"][value="1"]').checked = true;
        }
    }
</script>

<script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastTrigger.addEventListener('click', () => {
            toastBootstrap.show()
        })
    }
</script>