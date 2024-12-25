<main class="main__dashboard pb-5">
    <div class="container">
        <ul class="d-flex justify-content-start gap-5 list-unstyled pt-5 mt-5" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active fs-3 fw-bold main__detail-tab-btn" id="simple-tab-0"
                    data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0"
                    aria-selected="true">Thống kê</a>
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
                <div class="row my-5 gy-5">
                    <div class="col-12 col-sm-6">
                        <div class="bg-info p-5 rounded-5">
                            <h4>Tổng số sản phẩm: <span><?= $quantityProduct['SL'] ?></span></h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="bg-info p-5 rounded-5">
                            <h4>Tổng số tiền thu được: <span><?= number_format($sumPrice['TongTien']) . 'đ' ?></span></h4>
                        </div>
                    </div>
                </div>
                <h3 class="fs-2 mb-4">Thống kê số lượng sản phẩm bán ra theo tháng</h3>
                <div class="row my-5">
                    <div class="col-12 d-flex justify-content-center">
                        <canvas id="product-by-month" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
                <h3 class="fs-2 mb-4">Thống kê số tiền thu được theo tháng</h3>
                <div class="row my-5">
                    <div class="col-12 d-flex justify-content-center">
                        <canvas id="price-by-month" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
                <h3 class="fs-2 mb-4">Thống kê số tài khoản được tạo theo tháng</h3>
                <div class="row my-5">
                    <div class="col-12 d-flex justify-content-center">
                        <canvas id="user-register-by-month" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
            </div>

            <!-- tab 2 review -->
            <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                <div class="row">
                    <h3 class="fs-2 mb-5 pb-5">Đơn khách đã đặt</h3>
                </div>
                <div class="panel-body">
                    <?php if (!empty($sp)): ?>
                        <?php foreach ($sp as $item): ?>
                            <div class="row row-list-data" data-index="<?= $item['SoHoaDon'] ?>">
                                <div class="col-12 col-sm-9">
                                    <button type="button" class="border-0 bg-transparent hoadon" data-index="<?= $item['SoHoaDon'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <div class="row mb-5 product-list">
                                            <div class="col-md-1"><img src="./public/images/<?= empty($item['AnhDaiDien']) ? 'avatar.png' : $item['AnhDaiDien'] ?>" class="media-object img-thumbnail" /></div>
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex align-items-start flex-column gap-2">
                                                        <div class="pull-right"><label class=" fs-3 label label-danger text-status"><?= $item['TinhTrang'] === 0 ? 'Chưa xác nhận' : ($item['TinhTrang'] === 1 ? 'Đang giao' : 'Đã giao hàng') ?></label></div>
                                                        <span class="fs-4"><strong>Trạng thái: </strong> <span class="trangthai fs-4 label label-info"><?= $item['TrangThai'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?></span></span>
                                                        <span class="fs-4">Thành tiền hóa đơn : <?= number_format($item['ThanhTienHoaDon']) . 'đ' ?>, Phí vận chuyển: <?= number_format($item['PhiVanChuyen']) . 'đ' ?>, Tổng tiền: <?= number_format($item['TongTienHoaDon']) . 'đ' ?></span>
                                                    </div>
                                                    <div class="col-md-12 fs-4 d-flex justify-content-start mt-2">Thời gian đặt: <?= $item['ThoiGianDatHang'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div class="action-list col-12 col-sm-3 d-flex justifi-content-center gap-5 align-items-center">
                                    <div class="fs-3 btn-group">
                                        <?php if ($item['TinhTrang'] === 0): ?>
                                            <button class="btn btn-primary fs-3 xacnhan">xác nhận</button>
                                        <?php elseif ($item['TinhTrang'] === 1): ?>
                                            <button class="btn btn-primary fs-3 dagiaohang">Đã giao hàng</button>
                                        <?php else: ?>
                                            <p class="fs-3 text-success d-inline-block">Xong</p>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <span class="fs-1 delete-order">
                                            <i class="fa-solid fa-trash" style="color: #f10e0e;"></i>
                                        </span>
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

<!-- model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Hóa đơn</h1>
                <button type="button" class="btn-close fs-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="fs-3 text-center mb-4 sohoadon">Số hóa đơn: <span>...</span></h3>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h4 class="tennguoidat">Tên: <span>...</span></h4>
                        <h4 class="diachi">Địa chỉ: <span>...</span></h4>
                        <h4 class="email">Email: <span></span></h4>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h4 class="thoigian">Thời gian đặt hàng: <span>...</span></h4>
                        <h4 class="trangthai">Trạng thái: <span>...</span></h4>
                        <h4 class="hinhthuc">Hình thức thanh toán: <span>...</span></h4>
                        <h4 class="tinhtrang">Tình trạng: <span>Đã hủy đơn</span></h4>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 overflow-x-auto">
                        <table class="w-100 fs-4" style="min-width: 400px; ">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <h4 class="phivanchuyen">Phí vận chuyển: <span>...</span></h4>
                    <h4 class="tongtien">Tổng tiền: <span>...</span></h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    const xValues = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
    const barColors = ["red", "green", "blue", "orange", "brown", "yellow", "pink", "purple", "gray", "black", "cyan", "magenta"];
    const productByMonth = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    <?php foreach ($productByMonth as $value): ?>
        <?php for ($i = 0; $i < 12; $i++) : ?>
            <?php if ($value['Thang'] === $i + 1): ?>
                productByMonth[<?= $i ?>] = <?= $value['SL'] ?>;
            <?php else: ?>
            <?php endif; ?>
        <?php endfor; ?>
    <?php endforeach; ?>

    new Chart("product-by-month", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: productByMonth
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Số lượng sản phẩm bán ra theo tháng"
            }
        }
    });
</script>

<script>
    const priceByMonth = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    <?php foreach ($priceByMonth as $value): ?>
        <?php for ($i = 0; $i < 12; $i++) : ?>
            <?php if ($value['Thang'] === $i + 1): ?>
                priceByMonth[<?= $i ?>] = <?= $value['TongTien'] ?>;
            <?php else: ?>
            <?php endif; ?>
        <?php endfor; ?>
    <?php endforeach; ?>

    new Chart("price-by-month", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: priceByMonth
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Số tiền thu được theo tháng"
            }
        }
    });
</script>

<script>
    const userRegisterByMonth = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    <?php foreach ($userRegisterByMonth as $value): ?>
        <?php for ($i = 0; $i < 12; $i++) : ?>
            <?php if ($value['Thang'] === $i + 1): ?>
                userRegisterByMonth[<?= $i ?>] = <?= $value['SL'] ?>;
            <?php else: ?>
            <?php endif; ?>
        <?php endfor; ?>
    <?php endforeach; ?>

    new Chart("user-register-by-month", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: userRegisterByMonth
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Số tài khoản được tạo theo tháng"
            }
        }
    });
</script>

<script>
    function viewProduct(index) {
        return new Promise((resolve) => {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        const tmp = JSON.parse(this.responseText);
                        resolve(tmp);
                    }
                }
            };
            xmlhttp.open("GET", `admin.php?ctrl=page&view=dashboard&index=${index}`);
            xmlhttp.send();
        })
    }

    const viewBtn = document.querySelectorAll('.hoadon');

    const soHoaDon = document.querySelector('.sohoadon span');
    const tenNguoiDat = document.querySelector('.tennguoidat span');
    const diaChi = document.querySelector('.diachi span');
    const email = document.querySelector('.email span');
    const thoiGian = document.querySelector('.thoigian span');

    const trangThai = document.querySelector('.trangthai span');
    const hinhThuc = document.querySelector('.hinhthuc span');
    const tinhTrang = document.querySelector('.tinhtrang span');

    const tableBody = document.querySelector('.table-body');
    const phiVanChuyen = document.querySelector('.phivanchuyen span');
    const tongTien = document.querySelector('.tongtien span');


    viewBtn.forEach((item) => {
        item.addEventListener('click', async function() {
            const index = item.getAttribute('data-index');
            const data = await viewProduct(index);

            soHoaDon.textContent = data[0].SoHoaDon;
            tenNguoiDat.textContent = data[0].TenNguoiNhan;
            diaChi.textContent = data[0].DiaChiNhanHang;
            email.textContent = data[0].Email;
            thoiGian.textContent = data[0].ThoiGianDatHang;

            trangThai.textContent = data[0].TrangThai ? 'Đã thanh toán' : 'Chưa thanh toán';
            hinhThuc.textContent = data[0].HinhThucThanhToan ? 'Chuyển khoản' : 'COD';
            tinhTrang.textContent = data[0].TinhTrang === 0 ? 'Chưa xác nhận' : (data[0].TinhTrang === 1 ? 'Đang giao' : 'Đã giao hàng');

            phiVanChuyen.textContent = data[0].PhiVanChuyen.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
            tongTien.textContent = data[0].TongTienHoaDon.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
            tableBody.innerHTML = '';
            data.forEach((item) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${item.TenSanPham}</td>
                    <td>${item.SoLuongMua}</td>
                    <td>${item.Gia.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ"}</td>
                    <td>${item.ThanhTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ"}</td>
                `;
                tableBody.appendChild(tr);
            });

        })
    })
</script>

<script>
    function statusUpdate(index, status) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            if (this.responseText === 'error') {
                window.location.reload();
            }
        }
        xmlhttp.open("GET", `admin.php?ctrl=page&view=dashboard&action=donhang&id=${index}&status=${status}`);
        xmlhttp.send();
    }

    function deleteOrder(index) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", `admin.php?ctrl=page&view=dashboard&action=delete&id=${index}`);
        xmlhttp.send();
    }

    const xacnhan = document.querySelectorAll('.row-list-data .xacnhan');
    let dagiaohang = document.querySelectorAll('.row-list-data .dagiaohang');
    let deleteOrderBtn = document.querySelectorAll('.row-list-data .delete-order');

    xacnhan.forEach(item => {
        item.onclick = () => {
            statusUpdate(item.closest('.row-list-data').getAttribute('data-index'), 1);
            alert('Xác nhận thành công!');
            item.closest('.row-list-data').querySelector('.text-status').textContent = 'Đang giao';
            item.parentElement.innerHTML = `<button class="btn btn-primary fs-3 dagiaohang">Đã giao hàng</button>`;
            dagiaohang = document.querySelectorAll('.row-list-data .dagiaohang');
            danggiaohang();
        }
    });

    function danggiaohang() {
        dagiaohang.forEach(item => {
            item.onclick = () => {
                statusUpdate(item.closest('.row-list-data').getAttribute('data-index'), 2);
                alert('Đã nhận hàng');
                item.closest('.row-list-data').querySelector('.text-status').textContent = 'Đã giao hàng';
                item.closest('.row-list-data').querySelector('.trangthai').textContent = 'Đã thanh toán';
                item.parentElement.innerHTML = `<p class="fs-3 text-success d-inline-block">Xong</p>`;
            }
        });
    }
    danggiaohang();

    deleteOrderBtn.forEach(item => {
        item.onclick = () => {
            if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')) {
                deleteOrder(item.closest('.row-list-data').getAttribute('data-index'));
                item.closest('.row-list-data').remove();
            }
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.addEventListener('hide.bs.modal', function(event) {
            if (document.activeElement) {
                document.activeElement.blur();
            }
        });
    });
</script>