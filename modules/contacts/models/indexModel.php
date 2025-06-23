<?php


function getUserById($id){
	return db_fetch_row("SELECT * FROM `tbl_customer` WHERE `id` = '$id'");
}

// function insertContact($custom_id, $fullname, $mail,$phone, $address, $note, $create_date){
// $data = [
// 	'custom_id ' =>$custom_id ,
// 	'full_name' => $fullname,
// 	'mail' => $mail,
// 	'phone' => $phone,
// 	'address' => $address,
// 	'note' => $note,
// 	'create_date' => $create_date
// ];


// db_insert("tbl_contact", $data);
// }

function insertContact($fullname, $mail, $phone, $address, $note, $create_date){
    $data = [
        'fullname'     => $fullname,
        'mail'         => $mail,
        'phone'        => $phone,
        'address'      => $address,
        'note'         => $note,
        'create_date'  => $create_date
    ];

    db_insert("tbl_contact", $data);
}


?>



