<?php get_header(); 
$err = $data['err'] ?? [];
$old = $data['old'] ?? [];
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới thương hiệu sản phẩm</h3>
                    <a href="?modules=brands&controllers=index&action=list" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    

                    <form method="POST" action="?modules=brands&controllers=index&action=add" enctype="multipart/form-data">
                        <div style="display: flex;">
                            <div style="width: 400px;">
                                <label for="title">Tên danh mục</label>
                                <input type="text" name="name" id="title" style="display: block;width: 300px;" value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">
                                <div style="color:red;"><?php echo $err['name'] ?? ''; ?></div>
                                <label for="code">Mã Code</label>
                                <input type="text" name="code" id="code" style="display: block;width: 300px;" value="<?php echo htmlspecialchars($old['code'] ?? ''); ?>">
                                <div style="color:red;"><?php echo $err['code'] ?? ''; ?></div>
                                <label for="user">Người tạo</label>
                                <input type="text" name="user" id="user" style="display: block;width: 300px;" value="<?php echo htmlspecialchars($old['user'] ?? ''); ?>">
                                <div style="color:red;"><?php echo $err['user'] ?? ''; ?></div>
                            </div>
                            <div id="uploadFile" style="width: 400px;">
                                <label>Hình ảnh</label>
                                <input type="file" name="image" id="upload-thumb" accept="image/*">
                                <div style="color:red;"><?php echo $err['image'] ?? ''; ?></div>
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <label for="desc">Mô tả</label>
                        <textarea name="description" id="desc" class="ckeditor"><?php echo htmlspecialchars($old['description'] ?? ''); ?></textarea>
                        <div style="color:red;"><?php echo $err['description'] ?? ''; ?></div>
                        <input type="submit" name="btn_submit" id="btn-submit" value="Thêm Mới" style="height: 40px;
                                                                                                border-radius: 60px;
                                                                                                width: 150px;
                                                                                                color: green;
                                                                                                border-color: white;
                                                                                                color: white;
                                                                                                background-color: #48ad48;">
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>