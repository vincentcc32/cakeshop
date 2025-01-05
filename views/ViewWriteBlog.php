<script src="https://cdn.tiny.cloud/1/<?= TINYMCE_KEY ?>/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea.basic-example', // Lựa chọn textarea với class basic-example
        height: 800,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
</script>


<main class="main__home pb-5">
    <div class="container my-5 py-5">
        <form action="" method="post" class="mb-5" enctype="multipart/form-data">
            <label class="fs-1 fw-medium mb-4" for="">Ảnh nền</label> <br>
            <input type="file" name="anhnen" accept="image/*" id="" class="fs-2 mb-4"> <br>
            <label class="fs-1 fw-medium mb-4" for="">Tiêu đề bài viết</label>
            <textarea name="tieude" id="" style="width: 100%; height: 100px;" class="fs-1 fw-bold mb-4 p-2" placeholder="Nhập..."></textarea>
            <label class="fs-1 fw-medium mb-4" for="">Nội dung bài viết</label>
            <textarea class="basic-example" name="blog" class="fs-3" placeholder="Nhập..."></textarea>
            <button type="submit" class="btn btn-primary px-4 mt-4 fs-1" name="gui">Đăng bài</button>
        </form>
        <div class="overflow-auto">
            <table class="table fs-3" style="min-width: 530px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col" style="max-width: 10px;">#</th>
                        <th scope="col" style="max-width: 30px;">Thời gian</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($blog); $i++) : ?>
                        <tr class="tbRow">
                            <th scope="row" style="max-width: 10px;"><?= $i + 1 ?></th>
                            <td style="max-width: 30px;"><?= $blog[$i]['ThoiGian'] ?></td>
                            <td><?= $blog[$i]['TieuDe'] ?></td>
                            <td data-mabaiviet="<?= $blog[$i]['MaBaiViet'] ?>">
                                <div class="d-flex gap-3 justify-content-end">
                                    <span class="delete-blog">
                                        <i class="fs-1 fa-solid fa-trash cursor-pointer " style="color: #e51f1f;"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Button trigger modal -->


<div class="toast-container position-fixed bottom-50 end-0 p-3">
    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto fs-4">Thông báo</strong>
            <small class="fs-4">Bây giờ</small>
            <button type="button" class="btn-close fs-4" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-success fs-4">
            <?= $_SESSION['mess'] ?>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['mess'])): ?>
    <script>
        // Chạy khi trang được tải xong
        window.addEventListener('load', function() {
            var toast = new bootstrap.Toast(document.getElementById('myToast'));
            toast.show(); // Hiển thị toast
        });
    </script>
<?php unset($_SESSION['mess']);
endif; ?>

<script>
    function deleteBlog(maBaiViet) {
        const xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", `admin.php?ctrl=page&view=writeblog&deleteblog&mabaiviet=${maBaiViet}`);
        xmlhttp.send();
    }

    const deleteBtn = document.querySelectorAll('.delete-blog');
    deleteBtn.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            if (confirm('Bạn có chắc chắn muốn xóa bài viết này không?')) {

                deleteBlog(btn.parentElement.parentElement.getAttribute('data-mabaiviet'));
                btn.closest('.tbRow').remove();
            }
        });
    });
</script>