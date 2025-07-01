<?php

function construct() {

	load_model('index');

}

function indexAction() {

	load_view('index');
}

function addAction() {
	
}

function detailAction() {

    
	$id = $_GET['id'];
	$id_cat = getIDCatByIDProduct($id);
	$name = getNameCatById($id_cat);
	$same_cat = getProductById_cat($id_cat);
	$res = getProductById($id);
    $comments = getCommentsByProductId($id);
	$data = [$name, $res, $same_cat,$comments];
	load_view('detail',$data);

}

function showAction(){
    $id_cat = $_GET['id_cat'];
    $name = getNameCatById($id_cat);
    $data_tmp = getAllByIDCat($id_cat);

    // Xử lý lọc
    $order = isset($_POST['select']) ? $_POST['select'] : 0;

    switch ($order) {
        case 1:
            usort($data_tmp, function($a, $b) {
                return strcmp($b['name'], $a['name']);
            });
            break;
        case 2:
            usort($data_tmp, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
            break;
        case 3:
            usort($data_tmp, function($a, $b) {
                return $b['promotional_price'] - $a['promotional_price'];
            });
            break;
        case 4:
            usort($data_tmp, function($a, $b) {
                return $a['promotional_price'] - $b['promotional_price'];
            });
            break;
    }

    $page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $numProduct = count($data_tmp);
    $productOnPage = 12;
    $num = ceil($numProduct / $productOnPage);
    if (!empty($_GET['page']) && $_GET['page'] > $num) {
        $page = $num;
    }

    $start = ($page - 1) * $productOnPage;
    $res = [];
    for ($i = $start; $i < $start + $productOnPage; $i++) {
        if (isset($data_tmp[$i]))
            $res[] = $data_tmp[$i];
    }

	$total_product = $numProduct;
    $displaying_count = count($res);

    $data = [$name, $res, $num, $id_cat, $page, $total_product, $displaying_count];
    load_view('show', $data);
}

function show1Action(){
    $id_cat = $_GET['id_cat'];
    $name = getNameCatById($id_cat);
    $data_tmp = getAllByIDCat($id_cat);

    // Xử lý lọc
    $order = isset($_POST['select']) ? $_POST['select'] : 0;

    switch ($order) {
        case 1:
            usort($data_tmp, function($a, $b) {
                return strcmp($b['name'], $a['name']);
            });
            break;
        case 2:
            usort($data_tmp, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
            break;
        case 3:
            usort($data_tmp, function($a, $b) {
                return $b['promotional_price'] - $a['promotional_price'];
            });
            break;
        case 4:
            usort($data_tmp, function($a, $b) {
                return $a['promotional_price'] - $b['promotional_price'];
            });
            break;
    }

    $page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $numProduct = count($data_tmp);
    $productOnPage = 12;
    $num = ceil($numProduct / $productOnPage);
    if (!empty($_GET['page']) && $_GET['page'] > $num) {
        $page = $num;
    }

    $start = ($page - 1) * $productOnPage;
    $res = [];
    for ($i = $start; $i < $start + $productOnPage; $i++) {
        if (isset($data_tmp[$i]))
            $res[] = $data_tmp[$i];
    }

	$total_product = $numProduct;
    $displaying_count = count($res);

    $data = [$name, $res, $num, $id_cat, $page, $total_product, $displaying_count];
    load_view('show1', $data);
}

function show2Action(){
    $id_cat = $_GET['id_cat'];
    $name = getNameCatById($id_cat);
    $data_tmp = getAllByIDCat($id_cat);

    // Xử lý lọc
    $order = isset($_POST['select']) ? $_POST['select'] : 0;

    switch ($order) {
        case 1:
            usort($data_tmp, function($a, $b) {
                return strcmp($b['name'], $a['name']);
            });
            break;
        case 2:
            usort($data_tmp, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
            break;
        case 3:
            usort($data_tmp, function($a, $b) {
                return $b['promotional_price'] - $a['promotional_price'];
            });
            break;
        case 4:
            usort($data_tmp, function($a, $b) {
                return $a['promotional_price'] - $b['promotional_price'];
            });
            break;
    }

    $page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $numProduct = count($data_tmp);
    $productOnPage = 12;
    $num = ceil($numProduct / $productOnPage);
    if (!empty($_GET['page']) && $_GET['page'] > $num) {
        $page = $num;
    }

    $start = ($page - 1) * $productOnPage;
    $res = [];
    for ($i = $start; $i < $start + $productOnPage; $i++) {
        if (isset($data_tmp[$i]))
            $res[] = $data_tmp[$i];
    }

	$total_product = $numProduct;
    $displaying_count = count($res);

    $data = [$name, $res, $num, $id_cat, $page, $total_product, $displaying_count];
    load_view('show2', $data);
}

function commentAction() {
    $id = $_GET['id']; // id sản phẩm


    // Xử lý gửi bình luận
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_comment'])) {
        if (!empty($_SESSION['id_customer'])) {
            $content = trim($_POST['comment']);
            if (!empty($content)) {
                insertComment($id, $_SESSION['id_customer'], $content);
                echo "<script>alert('Gửi bình luận thành công'); </script>";
                // header("Location: ?modules=products&controllers=index&action=detail&id=$id");
            } else {
                echo "<script>alert('Bình luận không được để trống!'); window.location.href='?modules=products&controllers=index&action=detail&id=$id';</script>";
                exit;
                
            }
        } else {
            $error = "Bạn cần đăng nhập để bình luận!";
        }
    }

    // Dù comment thành công hay lỗi, cũng cần load lại dữ liệu để hiển thị
    
    $id_cat = getIDCatByIDProduct($id);
	$name = getNameCatById($id_cat);
	$same_cat = getProductById_cat($id_cat);
	$res = getProductById($id);
    $id = $_GET['id'];

    $comments = getCommentsByProductId($id);
	$data = [$name, $res, $same_cat,$comments];

    // Gửi về view
    

    load_view('detail', $data);
}
 ?>