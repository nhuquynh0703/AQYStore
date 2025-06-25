<?php

function insertUser($username, $password, $fullname, $mail, $phone, $address, $create_date){

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$data = [

		'username' => $username,
		'password' => $hashed_password,
		'fullname' => $fullname,
		'mail' => $mail,
		'phone' => $phone,
		'address' =>$address,
		'create_date' => $create_date
		];

	return db_insert("tbl_customer", $data);

}


function checkUser($username, $mail, $phone){

	$check =true;
	if(db_num_rows("SELECT * FROM `tbl_customer` WHERE `username` = '$username'")>0){
		$check = false;
	};
	if(db_num_rows("SELECT * FROM `tbl_customer` WHERE `mail` = '$mail'")>0){
		$check = false;
	};
	if(db_num_rows("SELECT * FROM `tbl_customer` WHERE `phone` = '$phone'")>0){
		$check = false;
	};

	return $check;

}



function checkLogin($username, $password) {
    global $conn; // dùng biến kết nối CSDL đã có

    // Chuẩn bị câu lệnh SQL an toàn
    $stmt = $conn->prepare("SELECT * FROM tbl_customer WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // So sánh mật khẩu với bản mã hóa trong DB
        if (password_verify($password, $user['password'])) {
            return true;
        }
    }

    return false;
}





function getUser($username, $password) {
    $user = db_fetch_row("SELECT * FROM `tbl_customer` WHERE `username` = '$username'");

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}




function logout(){

	unset($_SESSION['cart']);
	unset($_SESSION['id_customer']);
	unset($_SESSION['fullname']);

}


function getUserInfo($id){
    return db_fetch_row("SELECT * FROM `tbl_customer` WHERE `id` = {$id}");
}


function updateUserInfo($id, $fullname, $mail, $phone, $address){
	$data = [
		'fullname' => $fullname,
		'mail' => $mail,
		'phone' => $phone,
		'address' => $address 
	];

	return db_update("tbl_customer", $data, "`id` = {$id}");

}


function updateUserPassword($id, $new_password) {
    return db_update('tbl_customer', ['password' => $new_password], "`id` = '{$id}'");
}
