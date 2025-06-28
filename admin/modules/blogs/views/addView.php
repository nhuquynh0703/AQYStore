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
                    <h3 id="index" class="fl-left">Thêm bài viết mới</h3>
                    <a href="?modules=blogs&controllers=index&action=list" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="post" action="?modules=blogs&controllers=index&action=add" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($old['title'] ?? ''); ?>">
                        <div style="color:red;"><?php echo $err['title'] ?? ''; ?></div>
                        <label for="user">Người viết</label>
                        <input type="text" name="user" id="user" value="<?php echo htmlspecialchars($old['user'] ?? ''); ?>">
                        <div style="color:red;"><?php echo $err['user'] ?? ''; ?></div>
                        <div id="uploadFile" style="width: 400px;">
                            <label>Hình ảnh</label>
                            <input type="file" name="image" id="upload-thumb" accept="image/*">
                            <div style="color:red;"><?php echo $err['image'] ?? ''; ?></div>
                        </div>
                        <label for="description">Mô tả ngắn</label>
                        <textarea name="description" id="description"><?php echo htmlspecialchars($old['description'] ?? ''); ?></textarea>
                        <div style="color:red;"><?php echo $err['description'] ?? ''; ?></div>
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo htmlspecialchars($old['content'] ?? ''); ?></textarea>
                        <div style="color:red;"><?php echo $err['content'] ?? ''; ?></div>
                        <input type="submit" name="btn_submit" id="btn-submit" value="Thêm mới" style="height: 40px;
                                                                                            border-radius: 60px;
                                                                                            width: 150px;
                                                                                            color: white;
                                                                                            background-color: #48ad48;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>