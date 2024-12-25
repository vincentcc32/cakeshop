<?php if (isset($_SESSION['cart'])): ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-body">
                            <ol class="activity-checkout mb-0 px-4 mt-3">
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-receipt text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="fs-3 mb-1">Đặt hàng</h5>
                                            <div class="mb-3">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label fs-4" for="billing-name">Tên</label>
                                                                <input required type="text" name="ten" class="fs-4 form-control" id="billing-name" placeholder="Nhập tên người nhận hàng">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label fs-4" for="billing-phone">Số điện thoại</label>
                                                                <input required name="sdt" type="number" minlength="10" maxlength="10" min="0" class="fs-4 form-control" id="billing-phone" placeholder="Nhập số điện thoại nhận hàng">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fs-4" for="billing-address">Số nhà</label>
                                                        <textarea required name="sonha" class="fs-4 form-control" id="billing-address" rows="3" placeholder="Nhập số nhà..."></textarea>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label fs-4">Quận</label>
                                                                <select required name="quan" class="fs-4 form-control form-select" title="quan">
                                                                    <option value="">Chọn quận</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label fs-4">Phường</label>
                                                                <select required name="phuong" class="fs-4 form-control form-select" title="phuong">
                                                                    <option value="">Chọn phường</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="fs-3 mb-1">Hình thức thanh toán</h5>
                                        </div>
                                        <div>
                                            <h5 class="fs-4 mb-3">Chọn hình thức thanh toán</h5>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div data-bs-toggle="collapse">
                                                        <label class="fs-4 card-radio-label">
                                                            <input checked="" type="radio" name="pay-method" value="cod" id="pay-methodoption1" class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                Thanh toán nhận hàng
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div>
                                                        <label class="fs-4 card-radio-label">
                                                            <input type="radio" name="pay-method" value="bank" id="pay-methodoption2" class="card-radio-input">
                                                            <span class="card-radio py-3 text-center text-truncate">
                                                                Thanh toán chuyển khoản
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (isset($_SESSION['mess'])): ?>
                                                <div class="alert alert-danger mt-3 fs-3" role="alert">
                                                    <?= $_SESSION['mess'] ?>
                                                </div>
                                            <?php unset($_SESSION['mess']);
                                            endif; ?>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <a href="index.php?ctrl=page&view=home" class="fs-3 btn btn-link text-muted">
                                <i class="mdi mdi-arrow-left me-1"></i> Tiếp tục mua hàng </a>
                        </div> <!-- end col -->
                        <div class="col">
                            <div class="text-end mt-2 mt-sm-0">
                                <button name="dathang" type="submit" class="btn btn-success fs-3">
                                    <input type="hidden" name="vanchuyen" value="30000">
                                    <i class="mdi mdi-cart-outline me-1"></i> Đặt hàng </button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </form> <!-- end row-->
            </div>
            <div class="col-xl-4">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-3">
                            <h5 class="fs-3 mb-0">Chi tiết đơn hàng</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <thead>
                                    <tr class="fs-3">
                                        <th class="border-top-0" style="width: 110px;" scope="col">Sản phẩm</th>
                                        <th class="border-top-0" scope="col">Tên sản phẩm</th>
                                        <th class="border-top-0" scope="col">Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sum = 0;
                                    foreach ($_SESSION['cart'] as $item) : ?>
                                        <tr>
                                            <th scope="row"><img src="./public/images/<?= $item['Anh'] ?>" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                            <td>
                                                <h5 class="fs-3 text-truncate"><a class="text-dark"><?= $item['TenSanPham'] ?></a></h5>
                                                <p class="fs-4 text-muted mb-0 mt-1"><?= empty($item['GiaGiam']) ? number_format($item['Gia']) . 'đ' : number_format($item['GiaGiam']) . 'đ' ?>x <?= $item['SoLuong'] ?></p>
                                            </td>
                                            <td class="fs-3"><?= empty($item['GiaGiam']) ? number_format($item['Gia'] * $item['SoLuong']) . 'đ' : number_format($item['GiaGiam'] * $item['SoLuong']) . 'đ' ?></td>
                                        </tr>
                                    <?php empty($item['GiaGiam']) ? $sum += ($item['Gia'] * $item['SoLuong']) : $sum += ($item['GiaGiam'] * $item['SoLuong']);
                                    endforeach; ?>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="fs-4 m-0">Thành tiền</h5>
                                        </td>
                                        <td class="fs-4">
                                            <?= number_format($sum) . 'đ' ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="fs-4 m-0">Tiền vận chuyển</h5>
                                        </td>
                                        <td class="fs-4">
                                            30,000đ
                                        </td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td colspan="2">
                                            <h5 class="fs-4 m-0">Tổng tiền:</h5>
                                        </td>
                                        <td class="fs-4">
                                            <?= number_format($sum + 30000) . 'đ' ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>


    <script>
        const url = 'https://esgoo.net/api-tinhthanh/2/48.htm';
        fetch(url)
            .then(response => response.json())
            .then(data => {
                let quan = document.querySelector('select[title="quan"]');
                let phuong = document.querySelector('select[title="phuong"]');
                data.data.forEach(element => {
                    let option = document.createElement('option');
                    option.value = element.name;
                    option.setAttribute('data-id', element.id);
                    option.textContent = element.name;
                    quan.appendChild(option);
                });
                quan.onchange = function() {
                    if (quan.value === '') {
                        phuong.innerHTML = '<option value="">Chọn phường</option>';
                        return;
                    } else {
                        let id = quan.options[quan.selectedIndex].getAttribute('data-id')
                        fetch(`https://esgoo.net/api-tinhthanh/3/${id}.htm`)
                            .then(response => response.json())
                            .then(data => {
                                data.data.forEach(element => {
                                    let option = document.createElement('option');
                                    option.value = element.name;
                                    option.textContent = element.name;
                                    phuong.appendChild(option);
                                });
                            });
                    }
                }
            });
    </script>

    <script>
        const sdtInput = document.querySelector('input[name="sdt"]');
        sdtInput.onchange = (e) => {
            if (e.target.value.length != 10 || e.target.value[0] != 0) {
                console.log(e.target.value[0]);
                alert('Số điện thoại không hợp lệ!');
                document.querySelector('button[type="submit"]').disabled = true;
            } else {
                document.querySelector('button[type="submit"]').disabled = false;
            }
        }
    </script>
<?php else: ?>
    <div>
        <img src="./public/images/empty.jpg" class="w-100" alt="">
    </div>
<?php endif; ?>