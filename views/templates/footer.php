<footer class="footer ">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h3 class="footer__heading">Contact</h3>
                <h5 class="fs-3 fw-bolder d-flex align-items-center">
                    <div style="width: 30px;">
                        <img src="./public/images/mini-logo.png" alt="" class="w-100 h-100">
                    </div>
                    Restaurant
                </h5>
                <p>
                    <i class="fa-solid fa-phone fs-4"></i>
                    0789475518
                </p>
                <p>
                    <i class="fa-solid fa-location-dot fs-4"></i>
                    Số 601 Phong Bắc 2b Cẩm Lệ Đà Nẵng đường Trần Quý 2
                </p>
                <h5 class="fs-3 fw-bolder d-flex align-items-center">
                    <div style="width: 30px;">
                        <img src="./public/images/mini-logo.png" alt="" class="w-100 h-100">
                    </div>
                    Bakery
                </h5>
                <p>
                    <i class="fa-solid fa-phone fs-4"></i>
                    0366409378
                </p>
                <p>
                    <span class="d-block mb-4">
                        <i class="fa-solid fa-location-dot fs-4"></i>
                        Số 597 núi Thành Đà Nẵng
                    </span>
                    <span class="d-block mb-4">
                        <i class="fa-solid fa-location-dot fs-4"></i>
                        213 Trường Chinh Đà Nẵng
                    </span>
                    <span class="d-block">
                        <i class="fa-solid fa-location-dot fs-4"></i>
                        73 Hà Huy Tập Đà Nẵng
                    </span>
                </p>
            </div>
            <div class="col-md-4">
                <h3 class="footer__heading">GET SUGARY LETTERS</h3>
                <h5 class="fs-3 fw-bolder">Policy</h5>
                <p><a href="#" class="text-decoration-none" style="color: #9d573c;">1. CHÍNH SÁCH ĐỔI TRẢ SẢN
                        PHẨM</a></p>
                <p><a href="#" class="text-decoration-none" style="color: #9d573c;">2. CHÍNH SÁCH BẢO MẬ</a></p>
                <p><a href="#" class="text-decoration-none" style="color: #9d573c;">3. CHÍNH SÁCH VẬN CHUYỂN</a></p>
                <p><a href="#" class="text-decoration-none" style="color: #9d573c;">4. CHÍNH SÁCH KIỂM HÀNG</a></p>
                <p><a href="#" class="text-decoration-none" style="color: #9d573c;">5. CHÍNH SÁCH THANH TOÁN</a></p>
            </div>
            <div class="col-md-4">
                <h3 class="footer__heading">OUR PRODUCT</h3>
                <h5 class="fs-3 fw-bolder">Bakery Store</h5>
                <p>Công ty TNHH Cake Shop GPKD số 0316713744 cấp ngày 09/02/2021 tại Sở Kế hoạch và Đầu tư Tp. Đà Nẵng</p>
                <p>Email:cakeshop@gmail.vn Website:https://www.cakeshop.vn/</p>
            </div>
        </div>
    </div>
    <div class="py-5" style="background-color: #9d573c;">
        <div class="container">
            <h4 class="text-center fs-4 m-0 text-white">2021 CAKE SHOP All right reserved</h4>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog d-flex align-items-center" style="height: 500px;">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="bg-transparent border-0 text-end mb-4" data-bs-dismiss="modal">
                <i class="fa-solid fa-circle-xmark text-white fs-1"></i>
            </button>
            <div>
                <input type="text" placeholder="Search..." class="fs-4 p-3 w-100 rounded-5 search-input">
            </div>
        </div>
    </div>
</div>


<!-- <script src="./public/js/bootstrap.bundle.min.js"></script> -->
<script src="./public/fontawesome-free-6.6.0-web/js/all.min.js"></script>
<script src="./public/js/app.js"></script>
<!-- <script type="text/javascript">
        var message = ""; function clickIE() { if (document.all) { (message); return false; } } function clickNS(e) { if (document.layers || (document.getElementById && !document.all)) { if (e.which == 2 || e.which == 3) { (message); return false; } } } if (document.layers) { document.captureEvents(Event.MOUSEDOWN); document.onmousedown = clickNS; } else { document.onmouseup = clickNS; document.oncontextmenu = clickIE; document.onselectstart = clickIE } document.oncontextmenu = new Function("return false")
    </script> -->

<script>
    function convert(title) {
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        return slug;
    }

    searchInput = document.querySelector('.search-input');

    searchInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            let key = convert(searchInput.value);
            window.location.href = `index.php?ctrl=product&view=search&key=${key}`;
        }

    });
</script>
</body>

</html>