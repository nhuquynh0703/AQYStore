<?php


function getUserById($id){
	return db_fetch_row("SELECT * FROM `tbl_customer` WHERE `id` = '$id'");
}

?>
