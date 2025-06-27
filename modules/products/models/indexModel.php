<?php 

function getProductById($id){
	
	return db_fetch_row("SELECT * FROM `tbl_product` WHERE `id`='$id'");
}

function getAllByIDCat($id){

	return db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category`='$id'");
}

function getProductById_cat($id_cat){

	return db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category`='$id_cat'");
}

function getIDCatByIDProduct($id){

	$data = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id`='$id'");
	return $data['id_category'];
}

function getNameCatById($id){

	return db_fetch_row("SELECT `name` FROM `tbl_category` WHERE `id`='$id'");
}

// function getNameCatById($id){

// 	return db_fetch_row("SELECT `name` FROM `tbl_category` WHERE `id`='$id'");
// }

function getProductById_catId_brand($id_cat, $id_bra){
	return db_fetch_array("SELECT * FROM `tbl_product` WHERE  (`id_category`='$id_cat') and (`id_brand` = '$id_bra') ");
}

function insertComment($id_product, $id_customer, $content){
    $data = [
        'id_product' => $id_product,
        'id_customer' => $id_customer,
        'content' => $content,
        'created_at' => date('Y-m-d H:i:s')
    ];
    return db_insert('tbl_comment', $data);
}

function getCommentsByProductId($id_product){
	$id_product = (int)$id_product; // Ép kiểu số nguyên

    if ($id_product <= 0) {
        return []; // Trả mảng rỗng nếu ID không hợp lệ
    }

    $sql = "SELECT c.*, cu.fullname 
            FROM `tbl_comment` c 
            JOIN `tbl_customer` cu ON c.id_customer = cu.id
            WHERE c.id_product = {$id_product} 
            ORDER BY c.created_at DESC";
    return db_fetch_array($sql);
}



 ?>