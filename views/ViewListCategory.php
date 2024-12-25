<main class="main__cart fs-4" style="padding: 80px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title fs-3">Danh mục sản phẩm</h5>
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
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead class="w-100">
                                <tr>
                                    <th scope="col">Tên Danh mục</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="w-100">
                                <?php if (isset($dsdm)): ?>
                                    <?php foreach ($dsdm as $dm) : ?>
                                        <tr class="table-row">
                                            <input type="hidden" name="id" value="<?= $dm['MaDanhMuc'] ?>">
                                            <td><img src="./public/images/<?= $dm['AnhDanhMuc'] ?>" alt="" class="avatar-sm me-2"
                                                    style="min-width: 40px; min-height:40px" />
                                                <a href="#" class="text-body text-decoration-none" style="white-space: normal; word-wrap: break-word;"><?= $dm['TenDanhMuc'] ?></a>
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0 d-flex align-items-center">
                                                    <li class="list-inline-item">
                                                        <button data-index="<?= $dm['MaDanhMuc'] ?>" type="button" class="btn text-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="fa-solid fa-pen-to-square fs-3"></i>
                                                        </button>
                                                    </li>
                                                    <li data-index="<?= $dm['MaDanhMuc'] ?>" class="list-inline-item deletebtn cursor-pointer">
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
    </div>
</main>

<!-- modal add -->
<div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="modaladdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="modaladdLabel">Thêm Danh Mục</h1>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="fs-4" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Ảnh Danh Mục</label>
                        <input name="anh" class="fs-4 d-block w-100 p-2" type="file" required>
                    </div>

                    <div class="mb-3">
                        <label for="productName" class="form-label">Tên Danh Mục</label>
                        <input name="ten" class="fs-4 d-block w-100 p-2" type="text" class="form-control" id="productName" placeholder="Nhập tên danh mục" required>
                    </div>
                    <!-- Nút submit -->
                    <button type="submit" name="add" class="btn btn-primary fs-4">Thêm Danh Mục</button>
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
                            <label for="productName" class="form-label">Ảnh Danh Mục</label>
                            <input name="anh" class="fs-4 d-block w-100 p-2" type="file">
                        </div>

                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên Danh Mục</label>
                            <input name="ten" value="" class="edit-ten fs-4 d-block w-100 p-2" type="text" class="form-control" id="productName">
                        </div>

                        <!-- Nút submit -->
                        <input type="hidden" name="edit-id" class="edit-id" value="">
                        <button type="submit" name="edit" class="btn btn-primary fs-4">Sửa Danh Mục</button>
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
    function editCategory(index) {
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
            xmlhttp.open("GET", `admin.php?ctrl=product&view=listcategory&index=${index}`);
            xmlhttp.send();
        })
    }

    function deleteCategory(index) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", `admin.php?ctrl=product&view=listcategory&delete=${index}`);
        xmlhttp.send();
    }


    btnEdit = document.querySelectorAll('.edit');
    btnEdit.forEach(element => {
        element.onclick = async () => {
            const content = await editCategory(element.getAttribute('data-index'));
            console.log(content);

            const anh = document.querySelector('.edit-anh');
            const ten = document.querySelector('.edit-ten');
            const id = document.querySelector('.edit-id');
            anh.src = `public/images/${content.AnhDanhMuc}`;
            ten.value = content.TenDanhMuc;
            id.value = element.getAttribute('data-index');
        }
    });

    const deleteBtn = document.querySelectorAll('.deletebtn');
    const tableRow = document.querySelectorAll('.table-row');
    for (let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].onclick = async () => {
            const dele = confirm('Bạn có chắc chắn muốn danh mục?');
            if (dele) {
                await deleteCategory(deleteBtn[i].getAttribute('data-index'));
                tableRow[i].remove();
                const toastHTML = `
                        <div class="toast toast1 position-fixed " role="alert" aria-live="assertive" aria-atomic="true" style="top: 50%; right: 1%;">
                            <div class="toast-header">
                                <strong class="me-auto fs-3 text-danger">Thông báo</strong>
                                <small class="text-body-secondary fs-3">Now</small>
                                <button type="button" class="btn-close fs-3" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body fs-4">
                                Đã xóa 1 danh mục
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