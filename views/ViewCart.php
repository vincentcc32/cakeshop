<main class="main__cart py-5">
    <div class="container mt-5">
        <div class="row gy-4">
            <?php if (isset($_SESSION['cart'])): ?>
                <div class="col-lg-8 overflow-x-auto mb-5">
                    <h2 class="text-center fs-1 font-cursive mb-5">Giỏ hàng của tôi (<span class="quantity-cart"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>)</h2>
                    <table class="d-block fs-3 w-100" style="min-width: 600px;">
                        <thead class="w-100">
                            <tr class="bg-white" style="border-bottom: 1px solid #000 ;border-top: 1px solid #000 ;">
                                <th colspan="2" class="py-3 ps-4" style="width: 45%;">Chi tiết món</th>
                                <th class="py-3 text-center" style="width: 20%;">Giá</th>
                                <th class="py-3" style="width: 20%;">Số lượng</th>
                                <th colspan="2" class="py-3 pe-4" style="width: 20%;">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody class="w-100">
                            <?php $sumMoneyCart = 0;
                            $indexArr = 0;
                            if (isset($_SESSION['cart'])): ?>
                                <?php foreach ($_SESSION['cart'] as $value): ?>
                                    <tr class="table-row" data-index="<?= $indexArr ?>">
                                        <td class="py-4 object-fit-cover" style="min-width: 80px; max-width: 80px; ">
                                            <img src="./public/images/<?= $value['Anh'] ?>" alt="" class="w-100 object-fit-cover">
                                        </td>
                                        <td class=" " style=" min-width: 180px; overflow: hidden;">
                                            <span class="d-block w-100" class="" style=" min-width: 180px;">
                                                <?= $value['TenSanPham'] ?>
                                        </td>
                                        </span>
                                        <td class="money text-center" data-money="<?= empty($value['GiaGiam']) ? $value['Gia'] : $value['GiaGiam'] ?>"><?= empty($value['GiaGiam']) ? number_format($value['Gia']) : number_format($value['GiaGiam']) ?>đ</td>
                                        <td>
                                            <span class="border-1 d-inline-block rounded-3 me-4">
                                                <span class="cursor-pointer border-0 p-2 btn-down"
                                                    style="outline: none; background: none;">
                                                    <i class="fa-solid fa-minus"></i>
                                                </span>
                                                <button class="border-0 p-2 quantity"
                                                    style="outline: none; background: none;" data-id="<?= $value['MaSanPham'] ?>"><?= $value['SoLuong'] ?></button>
                                                <span class="cursor-pointer border-0 p-2 btn-up"
                                                    style="outline: none; background: none;">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </span>
                                        </td>
                                        <td class="sum-money" data-sum-money="<?= empty($value['GiaGiam']) ? $value['Gia'] * $value['SoLuong'] : $value['GiaGiam'] * $value['SoLuong'] ?>"><?= empty($value['GiaGiam']) ? number_format($value['Gia'] * $value['SoLuong']) : number_format($value['GiaGiam'] * $value['SoLuong']) ?>₫</td>
                                        <td class="">
                                            <span class="delete-cart cursor-pointer" data-delete="<?= $value['MaSanPham'] ?>">
                                                <i class="fa-regular fa-circle-xmark fs-2 "></i>
                                            </span>
                                        </td>
                                    </tr>
                                <?php empty($value['GiaGiam']) ? $sumMoneyCart += ($value['Gia'] * $value['SoLuong']) : $sumMoneyCart += ($value['GiaGiam'] * $value['SoLuong']);
                                    $indexArr++;
                                endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
                <div class="col-lg-4">
                    <div>
                        <div class="rounded-5 px-4 pb-3" style="background-color: #ffdec5;">
                            <h2 class="text-center fs-1 pb-5 font-cursive" style="border-bottom: 1px solid #000">
                                Thông
                                tin đơn hàng</h2>
                            <div class="py-4" style="border-bottom: 1px solid #000">
                                <h3 class="fs-4">Các món giao ngay (<span class="quantity-cart-1"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>)</h3>
                            </div>
                            <div style="border-bottom: 1px solid #000">
                                <div class="d-flex justify-content-between">
                                    <h4 class="fs-4 py-2">Tổng đơn:</h4>
                                    <h4 class="fs-4 py-2 total" data-total="<?= $sumMoneyCart ?>"><?= number_format($sumMoneyCart) ?>đ</h4>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h4 class="fs-4 py-2">Phí vận chuyển:</h4>
                                    <h4 class="fs-4 py-2">15,000 đ</h4>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pt-4">
                                <h3 class="fs-4 py-2">Tổng tiền thanh toán:</h3>
                                <h3 class="fs-4 py-2 sum-total"><?= number_format($sumMoneyCart + 15000) ?>đ</h3>
                            </div>
                            <?php if (isset($_SESSION['user'])): ?>
                                <a href="index.php?ctrl=product&view=checkout"
                                    class="fs-3 text-center text-decoration-none d-block w-100 py-3 border-0 mb-4 mt-4 rounded-5 btn-checkout">Thanh
                                    Toán</a>
                            <?php else: ?>
                                <a href="index.php?ctrl=user&view=login"
                                    class="fs-3 text-center text-decoration-none d-block w-100 py-3 border-0 mb-4 mt-4 rounded-5 btn-checkout">Vui lòng đăng nhập </a>
                            <?php endif; ?>
                            <a href="index.php"
                                class="fs-3 text-center text-decoration-none d-block w-100 py-3 border-0 mb-4 rounded-5 btn-continue-buy">Tiếp
                                Tục
                                Mua
                                Hàng</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="w-100">
                    <img src="./public/images/empty.jpg" alt="" class="w-100 h-100">
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>


<script>
    function addCart(sl, index) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", `index.php?ctrl=product&view=cart&index=${index}&sl=${sl}`);
        xmlhttp.send();
    }

    function deleteCart(index) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", `index.php?ctrl=product&view=cart&action=delete&index=${index}`);
        xmlhttp.send();
    }

    const btnUp = document.querySelectorAll('.btn-up');
    const btnDown = document.querySelectorAll('.btn-down');
    const quantity = document.querySelectorAll('.quantity');
    const money = document.querySelectorAll('.money');
    const sumMoney = document.querySelectorAll('.sum-money');
    const total = document.querySelector('.total');
    const sumTotal = document.querySelector('.sum-total');
    let deleteCartBtn = document.querySelectorAll('.delete-cart');
    let tableRow = document.querySelectorAll('.table-row');




    for (let i = 0; i < btnUp.length; i++) {
        btnUp[i].onclick = () => {
            let tmp = parseInt(quantity[i].innerText)
            quantity[i].innerText = tmp + 1;
            let tien = parseInt(sumMoney[0].getAttribute('data-sum-money')) + parseInt(money[0].getAttribute('data-money'));
            sumMoney[i].innerText = tien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
            sumMoney[i].setAttribute('data-sum-money', tien);
            total.innerText = (parseInt(total.getAttribute('data-total')) + parseInt(money[0].getAttribute('data-money'))).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
            total.setAttribute('data-total', (parseInt(total.getAttribute('data-total')) + parseInt(money[0].getAttribute('data-money'))));
            sumTotal.innerText = (parseInt(total.getAttribute('data-total')) + 15000).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
            addCart(quantity[i].innerText, quantity[i].getAttribute('data-id'));
        }
    }

    for (let i = 0; i < btnDown.length; i++) {
        btnDown[i].onclick = (e) => {
            let tmp = parseInt(quantity[i].innerText)
            if (tmp != 1) {
                quantity[i].innerText = tmp - 1;
                let tien = parseInt(sumMoney[0].getAttribute('data-sum-money')) - parseInt(money[0].getAttribute('data-money'));
                sumMoney[i].innerText = tien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                sumMoney[i].setAttribute('data-sum-money', tien);
                total.innerText = (parseInt(total.getAttribute('data-total')) - parseInt(money[0].getAttribute('data-money'))).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                total.setAttribute('data-total', (parseInt(total.getAttribute('data-total')) - parseInt(money[0].getAttribute('data-money'))));
                sumTotal.innerText = (parseInt(total.getAttribute('data-total')) + 15000).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                addCart(quantity[i].innerText, quantity[i].getAttribute('data-id'));
            }
        }
    }



    deleteCartBtn.forEach((btn, index) => {
        btn.onclick = () => {
            const button = deleteCartBtn[index];
            if (button) {
                // Các thao tác xóa giỏ hàng như trên
                const totalValue = parseInt(total.getAttribute('data-total'));
                const itemTotal = parseInt(sumMoney[index].getAttribute('data-sum-money'));
                const newTotal = totalValue - itemTotal;
                total.innerText = newTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";
                total.setAttribute('data-total', newTotal);

                const newSumTotal = newTotal + 15000;
                sumTotal.innerText = newSumTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "đ";

                deleteCart(button.getAttribute('data-delete'));

                tableRow[index].remove();

                // Cập nhật số lượng giỏ hàng
                document.querySelector('.quantity-cart-1').textContent = parseInt(document.querySelector('.quantity-cart-1').textContent) - 1;
                document.querySelector('.quantity-cart').textContent = parseInt(document.querySelector('.quantity-cart').textContent) - 1;
                document.querySelector('.quantity-cart-header').textContent = parseInt(document.querySelector('.quantity-cart-header').textContent) - 1;
            }
        };
    });
</script>