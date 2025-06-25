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
    $id_brand = $_GET['id_brand'] ?? null;

    $name = getNameCatById($id_cat);

    // Lấy sản phẩm theo danh mục và hãng (nếu có)
    if (!empty($id_brand)) {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat} AND `id_brand` = {$id_brand}");
    } else {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat}");
    }

    $id = $id_cat;
    $page = $_GET['page'] ?? 1;

    $numProduct = count($data_tmp);
    $productOnPage = 5;
    $num = ceil($numProduct / $productOnPage);

    if ($page > $num) {
        $page = $num;
    }

    $start = ($page - 1) * $productOnPage;
    $res = [];

    for ($i = $start; $i < $start + $productOnPage; $i++) {
        if (isset($data_tmp[$i]))
            $res[] = $data_tmp[$i];
    }

    $data = [$name, $res, $num, $id, $page, $id_brand]; // Nếu cần truyền $id_brand
    load_view('show', $data);
}

function show1Action(){
    $id_cat = $_GET['id_cat'];
    $id_brand = $_GET['id_brand'] ?? null;

    $name = getNameCatById($id_cat);

    // Lấy sản phẩm theo danh mục và hãng (nếu có)
    if (!empty($id_brand)) {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat} AND `id_brand` = {$id_brand}");
    } else {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat}");
    }

    $id = $id_cat;
    $page = $_GET['page'] ?? 1;

    $numProduct = count($data_tmp);
    $productOnPage = 5;
    $num = ceil($numProduct / $productOnPage);

    if ($page > $num) {
        $page = $num;
    }

    $start = ($page - 1) * $productOnPage;
    $res = [];

    for ($i = $start; $i < $start + $productOnPage; $i++) {
        if (isset($data_tmp[$i]))
            $res[] = $data_tmp[$i];
    }

    $data = [$name, $res, $num, $id, $page, $id_brand]; // Nếu cần truyền $id_brand
    load_view('show1', $data);
}


function show2Action(){
    $id_cat = $_GET['id_cat'];
    $id_brand = $_GET['id_brand'] ?? null;

    $name = getNameCatById($id_cat);

    // Lấy sản phẩm theo danh mục và hãng (nếu có)
    if (!empty($id_brand)) {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat} AND `id_brand` = {$id_brand}");
    } else {
        $data_tmp = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = {$id_cat}");
    }

    $id = $id_cat;
    $page = $_GET['page'] ?? 1;

    $numProduct = count($data_tmp);
    $productOnPage = 5;
    $num = ceil($numProduct / $productOnPage);

    if ($page > $num) {
        $page = $num;
    }

    $start = ($page - 1) * $productOnPage;
    $res = [];

    for ($i = $start; $i < $start + $productOnPage; $i++) {
        if (isset($data_tmp[$i]))
            $res[] = $data_tmp[$i];
    }

    $data = [$name, $res, $num, $id, $page, $id_brand]; // Nếu cần truyền $id_brand
    load_view('show2', $data);
}

