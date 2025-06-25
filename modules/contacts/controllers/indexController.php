<?php 
function construct() {

	load_model('index');
}
// function introduceAction(){

// 	load_view('introduce');
// }

function indexAction(){
    $data = array();
    if(!empty($_SESSION['id_customer'])){
        $data[] = getUserById($_SESSION['id_customer']);
    }
    load_view('index', $data);
}


// function contactAction(){
//     if(!empty($_POST['btn_submit_crate'])){
//         if(isset($_SESSION['id_customer'])){
//             $custom_id = $_SESSION['id_customer'];
//             $fullname = $_SESSION['fullname'];
//             $mail = $_SESSION['mail'];
//             $phone = $_SESSION['phone'];
//             $address = $_SESSION['address'];
//             $note = $_POST['note'];
//             $create_date = date("d/m/Y",time());

//             insertContact($custom_id, $fullname, $mail,$phone, $address, $note, $create_date);

//         }
//     }
// }

function contactAction(){
    if (!empty($_POST['btn_submit_crate'])) {
        if (isset($_SESSION['id_customer'])) {
            $fullname = $_SESSION['fullname'] ?? '';
            $mail = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            $note = $_POST['note'] ?? '';
            $create_date = date("Y-m-d", time()); // nên lưu đúng định dạng SQL

            insertContact($fullname, $mail, $phone, $address, $note, $create_date);
        }
    }
            echo "<script>alert('Cảm ơn bạn đã đóng góp ý kiến!');</script>";
    
    load_view('index');
}

 ?>