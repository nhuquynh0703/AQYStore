<?php 


function construct() {

	load_model('index');
}



function addAction(){

	$id = $_GET['id'];
	addCartByID($id);
	header('location: ?modules=carts&controllers=index&action=show');
	if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // Nếu không có referer thì chuyển về trang chủ
        header('Location: ?modules=home');
    }

	// echo json_encode([
    //     'status' => 'success',
    //     'message' => 'Đã thêm vào giỏ hàng',
    //     // 'cart_total' => $_SESSION['cart']['info']['num_order']
    // ]);
    // exit();
}





function addByNowAction(){

	$id = $_GET['id'];
	addCartByID($id);
	header('location: ?modules=checkouts&controllers=index&action=index');
}





function showAction(){

	if (!empty($_SESSION['id_customer'])) {
		if(!empty($_SESSION['cart']['info']['id_customer'])){
			$_SESSION['cart']['info']['id_customer'] = $_SESSION['id_customer'];
			getCartByCustomer($_SESSION['id_customer']);
		}else{
			// echo("Bạn chưa đăng nhập, vui lòng đăng nhập vào đeee!");
		}
	}
	load_view('index');
}





function deleteAction(){

	$id = $_GET['id'];
	deleteItemByID($id);
	header('location: ?modules=carts&controllers=index&action=show');
}






function deleteAllAction(){

	deletecart();
	header('location: ?modules=carts&controllers=index&action=show');
}






function updateAction(){
	$qty = $_POST['qty'];
	
	foreach ($qty as $key => $value) {
		
		$_SESSION['cart']['buy'][$key]['qty'] = $value;
		$_SESSION['cart']['buy'][$key]['sub_total'] = $value * $_SESSION['cart']['buy'][$key]['price'];
		$sub_total_price = $value * $_SESSION['cart']['buy'][$key]['price'];
		$data = ['num_total'=>$value, 'sub_total_price'=>$sub_total_price];
		db_update('tbl_detail_cart', $data, "`id_product` = '$key'");
		
	}

	updateCart($_SESSION['id_customer']);
	header('location: ?modules=carts&controllers=index&action=show');
}


 ?>