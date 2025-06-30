<?php get_header(); ?>

<?php 
        if(!empty($_SESSION['messa'])) 
            {echo " <script type='text/javascript'> alert('bạn cần chọn phương thức thanh toán!!!');</script>";
            unset($_SESSION['messa']);}

        if(!empty($_SESSION['messBuy'])) 
            {echo " <script type='text/javascript'> alert('bạn cần mua ít nhất 1 sản phẩm!!!');</script>";
            unset($_SESSION['messBuy']);}

?>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form method="post" action="?modules=checkouts&controllers=index&action=checkout" name="form-checkout">

        <div id="wrapper" class="wp-inner clearfix">

            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">


                    <?php if(!empty($data)) { foreach ($data as  $value) {?>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" value="<?php echo $value['fullname']; ?>">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo $value['mail']; ?>">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="<?php echo $value['address']; ?>">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" value="<?php echo $value['phone']; ?>">
                        </div>
                    </div>
                    <?php }};if(empty($data)){ ?>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone">
                        </div>
                    </div>
                    <?php }; ?>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>

                <div class="section-detail">
                    <table class="shop-table" width="500px" height="20px">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(isset($_SESSION['cart']['buy']) ){?>
                            <?php foreach ($_SESSION['cart']['buy'] as $key => $value) { ?>
                            <tr class="cart-item">
                                <td class="product-name"><?php echo $value['name']; ?><strong class="product-quantity">   x
                                        <?php echo $value['qty']; ?></strong></td>
                                <td class="product-total"><?php echo number_format((int)$value['sub_total'], 0, ',', '.') ." VND"; ?></td>
                            </tr>
                            <?php }}; ?>

                            
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td>
                                    <strong class="total-price">
                                        <?php if(isset($_SESSION['cart']['buy'])) 
                                            {$tong= $_SESSION['cart']['info']['total']; 
                                            echo number_format($tong, 0, ',', '.') . " VND"; }
                                            else {
                                                $tong =0;
                                                echo "VND";
                                            } ?>

                                    </strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div id="payment-checkout-wp">
                        <ul id="payment_methods">
                            <!-- <li>
                                <input type="radio" id="direct-payment" name="redirect" value="VNPAY">
                                <label for="direct-payment">Thanh toán online VNpay</label>
                            </li> -->
                            <li>

                            </li>
                            <li>
                                <input type="hidden" id="payment-home" name="payment_method" value="home_payment">
                                <!-- <label for="payment-home">Thanh toán tại nhà</label> -->
                            </li>
                        </ul>
                    </div>

                    <div class="place-order-wp clearfix">
                        <input
                            style="width: 25% !important;margin-left: 376px;background: linear-gradient(135deg, #5ddda1 0%, #4ba271 100%) !important;"
                            type="submit" id="order-now" value="Đặt hàng" name="btn_submit">
                            
                    </div>
                </div>
            </div>
            <div>
    </form>


    <form action="./modules/checkouts/views/Xulypay.php" method="POST">
        <input type="hidden" name="amount" value="<?php echo $tong;?>">


        <?php if(!empty($data)) { foreach ($data as  $value) {?>

        <input type="hidden" name="fullname" id="fullname" value="<?php echo $value['fullname']; ?>">

        <input type="hidden" name="email" id="email" value="<?php echo $value['mail']; ?>">

        <input type="hidden" name="address" id="address" value="<?php echo $value['address']; ?>">

        <input type="hidden" name="phone" id="phone" value="<?php echo $value['phone']; ?>">

        <?php }}else{echo("no data");}?>


        <button class="btn_vnpay" style="
                    
    width: 16%;
    padding: 12px 25px;
    border: none !important;
    border-radius: 12px !important;
    font-size: 13px !important;
    font-weight: normal;
    cursor: pointer !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    height: auto !important;
    position: absolute;
    left: 330px;
    bottom: 40px;
    transition: color 0.3s ease !important;
    z-index: 99;


            " name="redirect">Thanh toán VNpay</button>
    </form>
</div>


<!-- <form action="./Xulypay.php" method=post>   
                            <label for="payment-home">Thanh toán online</label>
                            <input  type="submit" name="redirect" >
                </form> -->


</div>



</div>
</div>

<?php get_footer(); ?>