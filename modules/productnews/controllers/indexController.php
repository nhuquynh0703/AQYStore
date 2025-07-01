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
	$data = [$name, $res, $same_cat];
	load_view('detail',$data);
}

function showAction(){
    $id_cat = $_GET['id_cat'];
    $name = getNameCatById($id_cat);
    $data_tmp = getAllByIDCat($id_cat);
    $id_brand = $_GET['id_brand'] ?? null;

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

    // Lấy sản phẩm theo danh mục và hãng (nếu có)
    if (!empty($id_brand)) {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat} AND `id_brand` = {$id_brand}");
    } else {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat}");
    }

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

    $id = $id_cat;
	$total_product = $numProduct;
    $displaying_count = count($res);

    $data = [$name, $res, $num, $id, $page, $id_brand, $total_product, $displaying_count]; // Nếu cần truyền $id_brand
    load_view('show', $data);
}

function show1Action(){
    $id_cat = $_GET['id_cat'];
    $name = getNameCatById($id_cat);
    $data_tmp = getAllByIDCat($id_cat);
    $id_brand = $_GET['id_brand'] ?? null;

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

    // Lấy sản phẩm theo danh mục và hãng (nếu có)
    if (!empty($id_brand)) {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat} AND `id_brand` = {$id_brand}");
    } else {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat}");
    }

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

    $id = $id_cat;
	$total_product = $numProduct;
    $displaying_count = count($res);

    $data = [$name, $res, $num, $id, $page, $id_brand, $total_product, $displaying_count]; // Nếu cần truyền $id_brand
    load_view('show1', $data);
}


function show2Action(){
    $id_cat = $_GET['id_cat'];
    $name = getNameCatById($id_cat);
    $data_tmp = getAllByIDCat($id_cat);
    $id_brand = $_GET['id_brand'] ?? null;

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

    // Lấy sản phẩm theo danh mục và hãng (nếu có)
    if (!empty($id_brand)) {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat} AND `id_brand` = {$id_brand}");
    } else {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat}");
    }

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

    $id = $id_cat;
	$total_product = $numProduct;
    $displaying_count = count($res);

    $data = [$name, $res, $num, $id, $page, $id_brand, $total_product, $displaying_count]; // Nếu cần truyền $id_brand
    load_view('show2', $data);
}