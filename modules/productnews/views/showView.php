<?php get_header(); ?>

<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?modules=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo($data['0']['name']) ; ?></a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo($data['0']['name']) ; ?></h3>
                    <div class="filter-wp fl-right">
                         <p class="desc">Hiển thị <?php echo $data['7']; ?> trên <?php echo $data['6']; ?> sản phẩm</p>
                        <div class="form-filter">
                             <form method="POST" action="">
                                <select name="select">
                                    <option value="0" <?php if(isset($_POST['select']) && $_POST['select'] == 0) echo 'selected'; ?>>Sắp xếp</option>
                                    <option value="1" <?php if(isset($_POST['select']) && $_POST['select'] == 1) echo 'selected'; ?>>Từ A-Z</option>
                                    <option value="2" <?php if(isset($_POST['select']) && $_POST['select'] == 2) echo 'selected'; ?>>Từ Z-A</option>
                                    <option value="3" <?php if(isset($_POST['select']) && $_POST['select'] == 3) echo 'selected'; ?>>Giá cao xuống thấp</option>
                                    <option value="4" <?php if(isset($_POST['select']) && $_POST['select'] == 4) echo 'selected'; ?>>Giá thấp lên cao</option>
                                </select>
                                    <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">

                        <?php foreach ($data['1'] as $key => $value) {?>
                        <li>
                            <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="thumb">
                                <img src="<?php echo $value['image']; ?>">
                            </a>
                            <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="product-name"><?php echo $value['name']; ?></a>
                            <div class="price">
                                <span style="display: block;" class="new"><?php echo number_format((int)$value['promotional_price'], 0, ',', '.') . ' VNĐ'; ?></span>
                                <span style="display: block;" class="old"><?php echo number_format((int)$value['price'], 0, ',', '.') . ' VNĐ'; ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="<?php $id = $value['id']; if(!empty($_SESSION['id_customer'])) $urlll ="?modules=carts&controllers=index&action=add&id=$id" ;else $urlll ="?modules=users&controllers=index&action=index&report=1" ;echo $urlll;?> " title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="<?php $id = $value['id']; if(!empty($_SESSION['id_customer'])) $urlll ="?modules=carts&controllers=index&action=addByNow&id=$id"; else $urlll ="?modules=users&controllers=index&action=index&report=1" ;echo $urlll;?> " title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }; ?>

                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php for ($i=1; $i <= $data['2'] ; $i++) { ?>
                        <li>
<?php 
    $id_cat = $data['3'];
    $current_page = $data['4'];
    $id_brand = isset($data['5']) ? $data['5'] : null; 
?>

<a 
    <?php if($i == $current_page) echo 'style="background-color: green;"'; ?> 
    href="?modules=productnews&controllers=index&action=show&id_cat=<?php echo $id_cat; ?>&<?php if($id_brand) echo "id_brand=$id_brand&"; ?>page=<?php echo $i; ?>" 
    title=""><?php echo $i; ?></a>
                        </li>
                        <?php }; ?>
                    </ul>
                </div>
            </div>
        </div>
<?php get_sidebar('sidebar02'); ?>

    </div>
</div>

<?php get_footer(); ?>