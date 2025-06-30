<?php

function construct() {
    load_model('index');
}

function listAction() {
    $data_tmp = getAll();
    $page = (!empty($_GET['page'])) ? intval($_GET['page']) : 1;
    $numBlog = count($data_tmp);
    $blogOnPage = 5;
    $num = ceil($numBlog / $blogOnPage);
    if ($page > $num) $page = $num;
    $start = ($page - 1) * $blogOnPage;
    $res = array_slice($data_tmp, $start, $blogOnPage);

    $data = [$res, $num, $page];
    load_view('list', $data);
}

function addAction() {
    $title = "";
    $user = "";
    $content = "";
    $create_date = "";
    $description = "";
    $image = "";
    $err = [];

    if (!empty($_POST['btn_submit'])) {
        $title = trim($_POST['title'] ?? '');
        $user = trim($_POST['user'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if (empty($title))        $err['title'] = "Tiêu đề không được để trống.";
        if (empty($user))         $err['user'] = "Người viết không được để trống.";
        if (empty($content))      $err['content'] = "Nội dung không được để trống.";
        if (empty($description))  $err['description'] = "Mô tả không được để trống.";

        // Xử lý upload ảnh
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "public/uploads/";
            $target_save =  $_SERVER['DOCUMENT_ROOT'] . "/AQYStore/public/uploads/";
            
            if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
            $image_name = basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                $err['image'] = "File tải lên không phải là ảnh.";
            } elseif ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
                $err['image'] = "Ảnh quá lớn (tối đa 2MB).";
            } elseif (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                $err['image'] = "Chỉ chấp nhận file jpg, jpeg, png, gif.";
            } // elseif (file_exists($target_file)) {
            //     $err['image'] = "Ảnh đã tồn tại trên hệ thống.";
            //} 
            else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_save . $_FILES["image"]["name"])) {
                    $image = $target_file;
                } else {
                    $err['image'] = "Lỗi khi upload ảnh.";
                }
            }
        } else {
            $err['image'] = "Bạn chưa chọn ảnh hoặc upload ảnh bị lỗi.";
        }

        // Nếu không có lỗi, thêm mới vào DB
        if (empty($err)) {
            $create_date = date("d/m/Y", time());
            $data = [
                'title'       => $title,
                'user'        => $user,
                'content'     => $content,
                'create_date' => $create_date,
                'description' => $description,
                'image'       => $image
            ];
            if (insert_blog($data)) {
                echo "<script>alert('Thêm bài viết thành công!');window.location='?modules=blogs&controllers=index&action=list';</script>";
                exit;
            } else {
                echo "<script>alert('Thêm bài viết thất bại.');</script>";
            }
        }
    }

    // Truyền lỗi và giá trị cũ về view
    $data = [
        'err' => $err,
        'old' => [
            'title' => $title,
            'user' => $user,
            'content' => $content,
            'description' => $description
        ]
    ];
    load_view('add', $data);
}

function deleteAction() {
    $id = $_GET['id'];
    delete_blog_by_id($id);
    header('location:?modules=blogs&controllers=index&action=list');
}