<main class="main__cart fs-4" style="padding: 80px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title fs-3">Số sản phẩm <span class="text-muted fw-normal ms-2">(<?= $sl ?>)</span></h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <button type="button" class="btn btn-primary border-0 fs-3 px-4" data-bs-toggle="modal" data-bs-target="#modaladd">
                            Thêm mới
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless" style="min-width: 850px;">
                            <thead class="w-100">
                                <tr>
                                    <th style="min-width: 20%;" scope="col">Tên sản phẩm</th>
                                    <th style="min-width: 20%;" scope="col">Giá</th>
                                    <th style="min-width: 20%;" scope="col">Giả giảm</th>
                                    <th style="min-width: 20%;" scope="col">Tên danh mục</th>
                                    <th style="min-width: 20%;" scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="w-100">
                                <?php if (isset($dssp)): ?>
                                    <?php foreach ($dssp as $sp) : ?>
                                        <tr class="table-row">
                                            <input type="hidden" name="id" value="<?= $sp['MaSanPham'] ?>">
                                            <td><img src="./public/images/<?= $sp['Anh'] ?>" alt="" class="avatar-sm rounded-circle me-2"
                                                    style="min-width: 40px; min-height:40px" />
                                                <a href="#" class="text-body text-decoration-none" style="white-space: normal; word-wrap: break-word;"><?= $sp['TenSanPham'] ?></a>
                                            </td>
                                            <td><span class="badge badge-soft-success mb-0"><?= number_format($sp['Gia']) . 'đ' ?></span></td>
                                            <td><?= empty($sp['GiaGiam']) ? 0 . "đ" : number_format($sp['GiaGiam']) . 'đ' ?></td>
                                            <td style="white-space: normal; word-wrap: break-word;"><?= $sp['TenDanhMuc'] ?></td>
                                            <td>
                                                <ul class="list-inline mb-0 d-flex align-items-center">
                                                    <li class="list-inline-item">
                                                        <button data-index="<?= $sp['MaSanPham'] ?>" type="button" class="btn text-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="fa-solid fa-pen-to-square fs-3"></i>
                                                        </button>
                                                    </li>
                                                    <li data-index="<?= $sp['MaSanPham'] ?>" class="list-inline-item deletebtn cursor-pointer">
                                                        <i class="fa-solid fa-trash fs-3 p-2 text-danger"></i>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0 align-items-center pb-4">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <div class="float-sm-end">
                    <?php if ($slpage > 0): ?>
                        <ul class="pagination mb-sm-0 d-flex align-items-center gap-2">
                            <li class="page-item">
                                <?php if (isset($_GET['page'])): ?>
                                    <a href="admin.php?ctrl=product&view=listproduct<?= $_GET['page'] > 1 ? '&page=' . (int)$_GET['page'] - 1 : '' ?>" class="page-link d-inline-block"><i class="fa-solid fa-chevron-left fs-3"></i></a>
                                <?php else: ?>
                                    <i class="fa-solid fa-chevron-left fs-3"></i>
                                <?php endif; ?>
                            </li>
                            <?php for ($i = 1; $i <= $slpage; $i++) : ?>
                                <li class="page-item <?= isset($_GET['page']) && $_GET['page'] == $i ? 'active' : '' ?> fs-3"><a href="admin.php?ctrl=product&view=listproduct&page=<?= $i ?>" class="page-link fs-4 py-1 px-3 d-inline-block"><?= $i ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item">
                                <?php if (isset($_GET['page'])): ?>
                                    <?php if ((int) $_GET['page'] < $slpage): ?>
                                        <a href="admin.php?ctrl=product&view=listproduct&page=<?= (int) $_GET['page'] + 1 ?>" class="page-link d-inline-block"><i class="fa-solid fa-chevron-right fs-3"></i></a>
                                    <?php else: ?>
                                        <i class="fa-solid fa-chevron-right fs-3"></i>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="admin.php?ctrl=product&view=listproduct&page=1" class="page-link d-inline-block"><i class="fa-solid fa-chevron-right fs-3"></i></a>
                                <?php endif; ?>
                            <?php endif; ?>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- modal add product -->
<div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="modaladdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="modaladdLabel">Thêm sản phẩm</h1>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="fs-4" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Ảnh Sản Phẩm</label>
                        <input name="anh" class="fs-4 d-block w-100 p-2" type="file" accept="image/*" required>
                    </div>

                    <!-- Tên sản phẩm -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Tên Sản Phẩm</label>
                        <input name="ten" class="fs-4 d-block w-100 p-2" type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm" required>
                    </div>

                    <!-- Giá sản phẩm -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input name="gia" class="fs-4 d-block w-100 p-2" type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm" required>
                    </div>

                    <!-- Giá giảm -->
                    <div class="mb-3">
                        <label for="discountPrice" class="form-label">Giá Giảm</label>
                        <input name="giagiam" class="fs-4 d-block w-100 p-2" type="number" class="form-control" id="discountPrice" placeholder="Nhập giá giảm (nếu có)">
                    </div>

                    <!-- Mô tả sản phẩm -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả</label>
                        <textarea name="mota" class="form-control fs-4" id="description" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
                    </div>

                    <!-- Chọn danh mục -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Chọn Danh Mục</label>
                        <select class="form-select fs-4" id="category" name="danhmuc" required>
                            <option value="" disabled selected>Chọn danh mục sản phẩm</option>
                            <?php foreach ($cate as $value): ?>
                                <option value="<?= $value['MaDanhMuc'] ?>"><?= $value['TenDanhMuc'] ?></option>
                            <?php endforeach; ?>
                            <!-- Thêm các danh mục khác nếu cần -->
                        </select>
                    </div>

                    <!-- Nút submit -->
                    <button type="submit" name="add" class="btn btn-primary fs-4">Thêm Sản Phẩm</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="editModal">
    <div class="modal fade modelEdit" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Cập nhật sản phẩm</h1>
                    <button type="button" class="btn-close fs-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" class="fs-4" enctype="multipart/form-data">
                        <div class="mb-3">
                            <img src="./public/images/sp1.png" class="edit-anh" alt="" style="min-width: 40px; max-width: 40px; min-height:40px ; max-height: 40px;">
                            <label for="productName" class="form-label">Ảnh Sản Phẩm</label>
                            <input name="anh" class="fs-4 d-block w-100 p-2" type="file" accept="image/*">
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên Sản Phẩm</label>
                            <input name="ten" value="" class="edit-ten fs-4 d-block w-100 p-2" type="text" class="form-control" id="productName">
                        </div>

                        <!-- Giá sản phẩm -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input name="gia" value="" min="0" class="edit-gia fs-4 d-block w-100 p-2" type="number" class="form-control" id="price">
                        </div>

                        <!-- Giá giảm -->
                        <div class="mb-3">
                            <label for="discountPrice" class="form-label">Giá Giảm</label>
                            <input name="giagiam" value="" min="0" class="edit-gia-giam fs-4 d-block w-100 p-2" type="number" class="form-control" id="discountPrice">
                        </div>

                        <!-- Mô tả sản phẩm -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô Tả</label>
                            <textarea name="mota" class="form-control fs-4 edit-mo-ta" id="description" rows="3">

                            </textarea>
                        </div>

                        <!-- Chọn danh mục -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Chọn Danh Mục</label>
                            <select class="form-select fs-4 edit-danh-muc" id="category" name="danhmuc">
                                <?php foreach ($cate as $value): ?>
                                    <option value="<?= $value['MaDanhMuc'] ?>"><?= $value['TenDanhMuc'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Nút submit -->
                        <input type="hidden" name="edit-id" class="edit-id" value="">
                        <button type="submit" name="edit" class="btn btn-primary fs-4">Sửa sản phẩm</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if (isset($_SESSION['mess'])): ?>
    <div class="toast toast1 position-fixed " role="alert" aria-live="assertive" aria-atomic="true" style="top: 50%; right: 1%;">
        <div class="toast-header">
            <strong class="me-auto fs-3 text-success">Thông báo</strong>
            <small class="text-body-secondary fs-3">Now</small>
            <button type="button" class="btn-close fs-3" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body fs-4">
            <?= $_SESSION['mess'] ?>
        </div>
    </div>
<?php unset($_SESSION['mess']);
endif; ?>

<script>
    function editProduct(index) {
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
            xmlhttp.open("GET", `admin.php?ctrl=product&view=listproduct&index=${index}`);
            xmlhttp.send();
        })
    }

    function deleteProduct(index) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", `admin.php?ctrl=product&view=listproduct&delete=${index}`);
        xmlhttp.send();
    }

    btnEdit = document.querySelectorAll('.edit');
    btnEdit.forEach(element => {
        element.onclick = async () => {
            const content = await editProduct(element.getAttribute('data-index'));

            const anh = document.querySelector('.edit-anh');
            const ten = document.querySelector('.edit-ten');
            const gia = document.querySelector('.edit-gia');
            const giaGiam = document.querySelector('.edit-gia-giam');
            const moTa = document.querySelector('.edit-mo-ta');
            const danhMuc = document.querySelector('.edit-danh-muc');
            const id = document.querySelector('.edit-id');
            anh.src = `public/images/${content.Anh}`;
            ten.value = content.TenSanPham;
            gia.value = content.Gia;
            if (content.GiaGiam == null) {
                giaGiam.value = 0
            } else {
                giaGiam.value = content.GiaGiam;

            }
            moTa.value = content.MoTa;
            danhMuc.value = content.MaDanhMuc;
            id.value = element.getAttribute('data-index');
        }
    });

    const deleteBtn = document.querySelectorAll('.deletebtn');
    const tableRow = document.querySelectorAll('.table-row');
    for (let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].onclick = async () => {
            const dele = confirm('Bạn có chắc chắn muốn xóa sản phẩm?');
            if (dele) {
                await deleteProduct(deleteBtn[i].getAttribute('data-index'));
                tableRow[i].remove();
                const toastHTML = `
                        <div class="toast toast1 position-fixed " role="alert" aria-live="assertive" aria-atomic="true" style="top: 50%; right: 1%;">
                            <div class="toast-header">
                                <strong class="me-auto fs-3 text-danger">Thông báo</strong>
                                <small class="text-body-secondary fs-3">Now</small>
                                <button type="button" class="btn-close fs-3" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body fs-4">
                                Đã xóa 1 sản phẩm
                            </div>
                        </div>`;

                // Thêm vào cuối body
                document.body.insertAdjacentHTML('beforeend', toastHTML);
                const toast = new bootstrap.Toast(document.querySelector('.toast1'));
                toast.show();
            }
        }
    }
</script>

<script
    script defer>
    document.addEventListener('DOMContentLoaded', function() {
        // Kiểm tra phần tử tồn tại trước khi khởi tạo Toast
        var toastEl = document.querySelector('.toast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, {
                delay: 3000
            });
            toast.show();
        }
    });
</script>