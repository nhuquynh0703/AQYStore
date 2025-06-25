<?php 

function construct() {

	load_model('index');
}

function indexAction(){

	if(isset($_GET['report']))
		echo " <script type='text/javascript'> alert('Bạn cần đăng nhập để mua hàng');</script>";

	load_view('index');
}

function logoutAction(){
	
	logout();
	header('location:?modules=home');
	exit();
	exit();
}

function loginAction(){
	$username;
	$password;
	$err = array();
	if (!empty($_POST['btn_submit'])) {
			
		if (!empty($_POST['username'])) {
			$username = $_POST['username'];
		}else{
			$err['username'] = "username không được để rỗng";
		}

		if (!empty($_POST['password'])) {
			$password = $_POST['password'];
		}else{
			$err['password'] = "password không được để rỗng";
		}

		if(empty($err)){

			if(checkLogin($username, $password)){

				$dataUser = getUser($username, $password);
				$_SESSION['id_customer'] = $dataUser['id'];
				$_SESSION['username'] = $dataUser['username'];
				$_SESSION['fullname'] = $dataUser['fullname'];
				header('location:?modules=home');
				exit();
				exit();
			}else{
				echo " <script type='text/javascript'> alert('Thông tin tài khoản không đúng!!!');</script>";
				echo " <script type='text/javascript'> alert('Thông tin tài khoản không đúng!!!');</script>";
			}
		}else{
			echo " <script type='text/javascript'> alert('Bạn phải điền đầy đủ thông tin!!!');</script>";
		}

	}

	load_view('index');

}

function crateAcountAction(){
	$err = array();

	if(!empty($_POST['btn_submit_crate'])){

		if (!empty($_POST['username'])) {
			$username = $_POST['username'];
		}else{
			$err['username'] = "username không được để rỗng";
		}

		if (!empty($_POST['password'])) {
			$password = $_POST['password'];
		}else{
			$err['password'] = "password không được để rỗng";
		}

		if (!empty($_POST['mail'])) {
			$mail = $_POST['mail'];
		}else{
			$err['mail'] = "mail không được để rỗng";
		}

		if (!empty($_POST['phone'])) {
			$phone = $_POST['phone'];
		}else{
			$err['phone'] = "phone không được để rỗng";
		}

		if (!empty($_POST['fullname'])) {
			$fullname = $_POST['fullname'];
		}else{
			$err['fullname'] = "fullname không được để rỗng";
		}

		if (!empty($_POST['address'])) {
			$address = $_POST['address'];
		}else{
			$err['address'] = "address không được để rỗng";
		}

		if(empty($err)){
			if(checkUser($username, $mail, $phone)){

				$create_date = date("d/m/Y",time());
				insertUser($username, $password, $fullname, $mail, $phone, $address, $create_date);
				echo " <script type='text/javascript'> alert('Chúc mừng bạn đăng ki tài khoản thành công!!!');</script>";
				
			}else{

				echo " <script type='text/javascript'> alert('Thông tin tài khoản đã tồn tại trên hệ thống!!!');</script>";
				
			}

		}else{

			echo " <script type='text/javascript'> alert('Bạn phải điền đầy đủ thông tin!!!');</script>";
			
		}
	}


	load_view('index');
}

function infoAction(){
    $id = $_SESSION['id_customer'];
    $dataUser = getUserInfo($id);
    if ($dataUser) {
        $_SESSION['username'] = $dataUser['username'];
        $_SESSION['fullname'] = $dataUser['fullname'];
        $_SESSION['mail'] = $dataUser['mail'];
        $_SESSION['phone'] = $dataUser['phone'];
        $_SESSION['address'] = $dataUser['address'];
    }
    load_view('info');
}
function infoUpdateAction(){
	$err = array();

	if(!empty($_POST['btn_update'])){

		if (!empty($_POST['fullname'])) {
			$fullname = $_POST['fullname'];
		}else{
			$err['fullname'] = "fullname không được để rỗng";
		}

		if (!empty($_POST['mail'])) {
			$mail = $_POST['mail'];
		}else{
			$err['mail'] = "mail không được để rỗng";
		}

		if (!empty($_POST['phone'])) {
			$phone = $_POST['phone'];
		}else{
			$err['phone'] = "phone không được để rỗng";
		}
		if (!empty($_POST['address'])) {
			$address = $_POST['address'];
		}else{
			$err['address'] = "address không được để rỗng";
		}
		if(empty($err)){
			$id = $_SESSION['id_customer']; // Lấy id user từ session
			updateUserInfo($id, $fullname, $mail, $phone, $address);

			 $_SESSION['fullname'] = $fullname;
            $_SESSION['mail'] = $mail;
            $_SESSION['phone'] = $phone;
			$_SESSION['address'] = $address;
			// Hiển thị thông báo thành công
			echo " <script type='text/javascript'> alert('Cập nhật thông tin thành công!!!');</script>";
            // // Chuyển hướng
            // header('Location: ?modules=users&controllers=index&action=info');
			// exit();
		}else{

			echo " <script type='text/javascript'> alert('Bạn phải điền đầy đủ thông tin!!!');</script>";
			
		}

		
		
	}
	load_view('info');
}

function changePasswordAction() {
    if (!isset($_SESSION['id_customer'])) {
        header('location:?modules=users&controllers=index&action=index');
        exit();
    }

    if (isset($_POST['btn_change_password'])) {
        $old = $_POST['old_password'];
        $new = $_POST['new_password'];
        $confirm = $_POST['confirm_password'];

        $user = getUserInfo($_SESSION['id_customer']);
        if (!password_verify($old, $user['password'])) {
            echo "<script>alert('Mật khẩu hiện tại không đúng');</script>";
        } elseif ($new != $confirm) {
            echo "<script>alert('Mật khẩu xác nhận không khớp');</script>";
        } else {
            $hashed = password_hash($new, PASSWORD_DEFAULT);
            updateUserPassword($_SESSION['id_customer'], $hashed);
            echo "<script>alert('Đổi mật khẩu thành công!');</script>";
        }
    }

    load_view('info'); // Hoặc view riêng nếu bạn tách riêng trang đổi mật khẩu
}

 ?>