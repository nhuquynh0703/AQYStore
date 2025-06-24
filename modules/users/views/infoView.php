<?php get_header(); ?>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li><a href="?page=home" title="">Trang chủ</a></li>
                    <li><a href="" title="">Xem thông tin tài khoản</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="wrapper" class="wp-inner clearfix">
        <form method="post" action="?modules=users&controllers=index&action=infoUpdate" name="form-checkout">
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin tài khoản</h1>
                </div>

                <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" name="username" id="username"
                                value="<?php echo $_SESSION['username']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ và tên</label>
                            <input style="height: 38px; width: 250px; border: 1px solid #cccccc;" type="text"
                                name="fullname" id="fullname" value="<?php echo $_SESSION['fullname']; ?>">
                        </div>
                    </div>

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="email">Email</label>
                            <input style="height: 38px; width: 250px; border: 1px solid #cccccc;" type="email"
                                name="mail" id="email"
                                value="<?php echo isset($_SESSION['mail']) ? $_SESSION['mail'] : ''; ?>">
                        </div>
                    </div>

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="phone">Số điện thoại</label>
                            <input style="height: 38px; width: 250px; border: 1px solid #cccccc;" type="text"
                                name="phone" id="phone"
                                value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
                        </div>
                    </div>

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input style="height: 38px; width: 250px; border: 1px solid #cccccc;" type="text"
                                name="address" id="address"
                                value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>" readonly>
                        </div>
                    </div>
                </div>

                <!-- Nút cập nhật thông tin -->
                <div class="form-row clearfix" style="margin-top: 20px;">
                    <input type="submit" name="btn_update" value="Cập nhật"
                        style="padding: 10px 20px; background: green; color: #fff; border: none; border-radius: 4px;">
                </div>
            </div>
        </form>
        <form method="post" action="?modules=users&controllers=index&action=changePassword">
            <div class="section" id="change-password-wp">
                <div class="section-head">
                    <h1 class="section-title">Đổi mật khẩu</h1>
                </div>
                <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="old_password">Mật khẩu hiện tại</label>
                            <input style="height: 38px; width: 250px; border: 1px solid #cccccc;" type="password"
                                name="old_password" id="old_password" required>
                        </div>
                    </div>

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="new_password">Mật khẩu mới</label>
                            <input style="height: 38px; width: 250px; border: 1px solid #cccccc;" type="password"
                                name="new_password" id="new_password" required>
                        </div>
                    </div>

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="confirm_password">Xác nhận mật khẩu mới</label>
                            <input style="height: 38px; width: 250px; border: 1px solid #cccccc;" type="password"
                                name="confirm_password" id="confirm_password" required>
                        </div>
                    </div>

                    <div class="form-row clearfix" style="margin-top: 20px;">
                        <input type="submit" name="btn_change_password" value="Đổi mật khẩu"
                            style="padding: 10px 20px; background: orange; color: #fff; border: none; border-radius: 4px;">
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<?php get_footer(); ?>