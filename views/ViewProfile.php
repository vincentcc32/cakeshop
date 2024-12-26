<main class="main__detail pt-5">
    <div class="container">
        <ul class="d-flex justify-content-start gap-5 list-unstyled" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active fs-3 fw-bold main__detail-tab-btn" id="simple-tab-0"
                    data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0"
                    aria-selected="true">Thông tin</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link fs-3 px-5 fw-bold main__detail-tab-btn" id="simple-tab-1"
                    data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1"
                    aria-selected="false">Đơn hàng</a>
            </li>
        </ul>
        <div class="tab-content py-5" id="tab-content">
            <!-- tab 1 description -->
            <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
                <h3 class="fs-2 mb-4">Thông tin tài khoản</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header fs-4">Ảnh đại diện</div>
                                <div class="card-body text-center d-flex flex-column align-items-center justify-content-center gap-2">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2" src="./public/images/<?= empty($user['AnhDaiDien']) ? 'avatar.png' : $user['AnhDaiDien'] ?>" alt="">

                                    <label for="inputavt" class="fs-5 btn btn-primary d-inline-block my-3" style="width: 140px;">Tải lên hình ảnh mới</label>
                                    <input type="file" id="inputavt" accept="image/*" name="avt" accept="image/*" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header fs-4">Thông tin tài khoản</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="small mb-1 fs-5" for="inputUsername">Tên tài khoản</label>
                                        <input class="form-control fs-5" name="ten" id="inputUsername" type="text" value="<?= $user['TenTaiKhoan']; ?>" placeholder="Nhập tên tài khoản">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1 fs-5" for="inputemail">Email</label>
                                            <input class="form-control fs-5" name="email" id="inputemail" type="email" value="<?= $user['Email']; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1 fs-5" for="inputsdt">Số điện thoại</label>
                                            <input class="form-control fs-5" name="sdt" id="inputsdt" type="number" value="<?= $user['SoDienThoai']; ?>" placeholder="Nhập số điện thoại tài khoản">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1 fs-5" for="inputoldpass">Mật khẩu cũ</label>
                                        <input class="form-control fs-5" name="matkhau" id="inputoldpass" type="password" placeholder="Nhập mật khẩu cũ">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1 fs-5" for="inputnewpass">Mật khẩu mới</label>
                                            <input class="form-control fs-5" name="matkhaumoi" id="inputnewpass" type="password" placeholder="Nhập mật khẩu mới">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1 fs-5" for="inputrepass">Xác nhận mật khẩu</label>
                                            <input class="form-control fs-5" name="xacnhanmatkhau" id="inputrepass" type="password" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <?php if (isset($_SESSION['mess'])): ?>
                                        <div class="alert alert-<?= $_SESSION['mess']['type'] ?> fs-3" role="alert">
                                            <?= $_SESSION['mess']['text']; ?>
                                        </div>
                                    <?php unset($_SESSION['mess']);
                                    endif; ?>
                                    <button class="btn btn-primary fs-4" name="update" type="submit">Lưu thông tin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- tab 2 review -->
            <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                <div class="row">
                    <h3 class="fs-2 mb-5 pb-5">Thông tin đơn hàng</h3>
                </div>
                <div class="panel-body">
                    <?php if (!empty($sp)): ?>
                        <?php foreach ($sp as $item): ?>
                            <div class="row mb-5 product-list" data-id="<?= $item["MaSanPham"] ?>" data-sohoadon="<?= $item["SoHoaDon"] ?>">
                                <div class="col-md-1"><img src="./public/images/<?= $item['Anh'] ?>" class="media-object img-thumbnail" /></div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right"><label class=" fs-3 label label-danger <?= $item['TinhTrang'] === 0 ? 'text-danger' : ($item['TinhTrang'] === 1 ? 'text-primary' : 'text-success') ?>"><?= $item['TinhTrang'] === 0 ? 'Chưa xác nhận' : ($item['TinhTrang'] === 1 ? 'Đang giao' : 'Đã giao hàng') ?></label></div>
                                            <span class="fs-4"><strong>Tên sản phẩm: </strong></span> <span class="fs-4 label label-info"><?= $item['TenSanPham'] ?></span><br />
                                            <span class="fs-4">Số lượng : <?= $item['SoLuongMua'] ?>, Giá: <?= number_format($item['ThanhTien']) . 'đ' ?></span> <br />
                                            <?= $item['TinhTrang'] === 0 ? '<span class="btn-delete"><a data-placement="top" class="btn btn-danger fs-4 fa-solid fa-trash" title="Danger"></a></span>' : '' ?>
                                        </div>
                                        <div class="col-md-12 fs-4">Thời gian đặt: <?= $item['ThoiGianDatHang'] ?></div>
                                        <div class="col-md-12 fs-4 text-danger">Thời gian Nhận dự kiến: <?= date("Y-m-d H:i:s", strtotime("+1 hour",  strtotime($item['ThoiGianDatHang'])))  ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <img src="./public/images/empty.jpg" alt="" class="w-100">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const sdt = document.querySelector('#inputsdt');
    const oldPass = document.querySelector('#inputoldpass');
    const newPass = document.querySelector('#inputnewpass');
    const rePass = document.querySelector('#inputrepass');
    const form = document.querySelector('form');
    form.addEventListener('submit', (e) => {
        if (newPass.value !== rePass.value) {
            e.preventDefault();
            alert('Mật khẩu mới không khớp!');
        }
    });
    sdt.addEventListener('change', (e) => {
        if (e.target.value.length != 10 || e.target.value[0] != 0) {
            console.log(e.target.value[0]);
            alert('Số điện thoại không hợp lệ!');
            document.querySelector('button[type="submit"]').disabled = true;
        } else {
            document.querySelector('button[type="submit"]').disabled = false;
        }
    });
</script>

<script>
    function deleteProduct(masp, sohoadon) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            if (this.responseText === 'success') {
                alert('Sản phẩm đã được xóa thành công!');
            } else {
                alert('Sản phẩm đã được shop xác nhận nên không thể xóa!');
                window.location.reload();
            }
        }
        xmlhttp.open("GET", `index.php?ctrl=user&view=profile&sp=${masp}&sohoadon=${sohoadon}`);
        xmlhttp.send();
    }

    const deleteBtn = document.querySelectorAll('.btn-delete');
    const rowData = document.querySelectorAll('.product-list');
    for (let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].addEventListener('click', (e) => {
            e.preventDefault();
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                deleteProduct(rowData[i].getAttribute('data-id'), rowData[i].getAttribute('data-sohoadon'));
                rowData[i].remove();
            }
        });
    }
</script>