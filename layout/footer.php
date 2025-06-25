<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">AQYStore</h3>
                <p class="desc">AQYStore luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu
                    đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="public/images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Thông tin cửa hàng</h3>
                <ul class="list-item">
                    <li>
                        <p>68 - Phú Diễn - Bắc Từ Liêm - Hà Nội</p>
                    </li>
                    <li>
                        <p>0848.454.796 - 0822.225.286</p>
                    </li>
                    <li>
                        <p>nhom7@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Chính sách chung</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="">Chính sách vận chuyển</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách bảo hành</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách cho doanh nghiệp</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách kiểm hàng</a>
                    </li>
                    <li>
                        <a href="" title="">Bảo mật thông tin khách hàng</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">Bảng tin</h3>
                <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                <div id="form-reg">
                    <form method="POST" action="">
                        
                        <input type="email" name="email" id="email" placeholder="Nhập email của bạn">
                        <button type="submit" id="sm-reg" class= "btn-subscribe">Đăng ký ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">© Bản quyền thuộc về NHOM7 | AQYStore</p>
        </div>
    </div>
</div>
</div>

<div id="btn-top"><img src="public/images/icon-to-top.png" alt="" /></div>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
document.querySelector('.btn-subscribe').addEventListener('click', function(e) {
    e.preventDefault();

    const email = document.querySelector('#email').value.trim();


    // Biểu thức kiểm tra email hợp lệ
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email == '') {
        alert("Vui lòng nhập email trước khi đăng ký!");
    } else if (!emailRegex.test(email)) {
        alert("Email bạn nhập không hợp lệ. Vui lòng kiểm tra lại!");
    } else {
        document.getElementById('email').value = '';
        alert("Cảm ơn bạn đã đăng ký nhận bản tin!");
        // Có thể xử lý gửi dữ liệu tại đây
    }
});
</script>







</body>

</html>