        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                 <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?modules=products&controllers=index&action=show&id_cat=13" title="">Điện Thoại</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show&id_cat=13&id_brand=1" title="">iPhone</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show&id_cat=13&id_brand=2" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show&id_cat=13&id_brand=3" title="">Xiaomi</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show&id_cat=13&id_brand=4" title="">OPPO</a>
                                </li>
                            </ul>
                        </li> 
                        <li>
                            <a href="?modules=products&controllers=index&action=show1&id_cat=14" title="">Tablet</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show1&id_cat=14&id_brand=5" title="">iPad</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show1&id_cat=14&id_brand=2"title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show1&id_cat=14&id_brand=3" title="">Xiaomi</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show1&id_cat=14&id_brand=6" title="">Huawei</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?modules=products&controllers=index&action=show2&id_cat=12" title="">Laptop</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show2&id_cat=12&id_brand=7" title="">Mac</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show2&id_cat=12&id_brand=8" title="">ASUS</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show2&id_cat=12&id_brand=9" title="">Lenovo</a>
                                </li>
                                <li>
                                    <a href="?modules=productnews&controllers=index&action=show2&id_cat=12&id_brand=10" title="">Dell</a>
                                </li>
                            </ul>
                        </li> 
                        <!-- <li>
                            <a href="?modules=products&controllers=index&action=show&id_cat=13" title="">Camera</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Oppo</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Xiaomi</a>
                                </li>
                            </ul>
                        </li>  -->
                        <!-- <li>
                            <a href="?modules=products&controllers=index&action=show&id_cat=14" title="">Máy Tính Bảng</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Oppo</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Bphone</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li>
                            <a href="?modules=products&controllers=index&action=show&id_cat=12" title="">Lap Top</a> -->
                            <!-- <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Oppo</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Bphone</a>
                                </li>
                            </ul> -->
                        <!-- </li> -->
                        <!-- <li>
                            <a href="?modules=home" title="">Tai Nghe</a>
                        </li>
                        <li>
                            <a href="?modules=home" title="">Thời Trang</a>
                        </li>
                        <li>
                            <a href="?modules=home" title="">Đồ Gia Dụng</a>
                        </li>
                        <li>
                            <a href="?modules=home" title="">Thiết Bị Văn Phòng</a>
                        </li> -->
                     </ul>
                </div> 
            </div>
            <div class="section" id="selling-wp">
                <!-- <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">

                        <?php if(!empty($_SESSION['product_hot'])){ $i=0; foreach ($_SESSION['product_hot'] as  $value) {?>
                            <?php $i++; if($i>9) break; ?>
                        <li class="clearfix">
                            <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="thumb fl-left">
                                <img src="<?php echo $value['image']; ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="product-name"><?php echo $value['name']; ?></a>
                                <div class="price">
                                    <span style="display: block;" class="new"><?php echo $value['promotional_price'].' VNĐ'; ?></span>
                                    <span style="display: block;" class="old"><?php echo $value['price'].' .VNĐ'; ?></span>
                                </div>
                                <a href="<?php $id = $value['id']; if(!empty($_SESSION['id_customer'])) $urlll ="?modules=carts&controllers=index&action=addByNow&id=$id"; else $urlll ="?modules=users&controllers=index&action=index&report=1" ;echo $urlll;?> " title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                    <?php }}; ?>
                        
                    </ul>
                </div> -->
                <div class="section-detail banner1">
                    <img src="public/images/banner2.webp" alt="">
                </div>
                <div class="section-detail">
                    
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner00.jpg" alt="">
                    </a>
                     <!-- <a href="" title="" class="thumb" style="margin-top: 10px;">
                        <img src="public/images/bigsale.jpg" alt="">
                    </a> -->
                </div>
            </div>
        </div>