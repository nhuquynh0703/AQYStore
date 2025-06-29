<?php




function construct() {
    load_model('index');
}

function indexAction() {}

function addAction() {
    $name = "";
    $code = "";
    $image = "";
    $description = "";
    $user = "";
    $err = [];

    if (!empty($_POST['btn_submit'])) {
        $name = trim($_POST['name'] ?? '');
        $code = trim($_POST['code'] ?? '');
        $user = trim($_POST['user'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if (empty($name))         $err['name'] = "Tên thương hiệu không được để trống.";
        if (empty($code))         $err['code'] = "Mã code không được để trống.";
        if (empty($user))         $err['user'] = "Người tạo không được để trống.";
        if (empty($description))  $err['description'] = "Mô tả không được để trống.";

        // Kiểm tra file ảnh
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "public/uploads/";
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
            } elseif (file_exists($target_file)) {
                $err['image'] = "Ảnh đã tồn tại trên hệ thống.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = $target_file;
                } else {
                    $err['image'] = "Lỗi khi upload ảnh.";
                }
            }
        } else {
            $err['image'] = "Bạn chưa chọn ảnh hoặc upload ảnh bị lỗi.";
        }

        // Nếu không có lỗi, thêm mới
        if (empty($err)) {
            $create_date = date("d/m/Y", time());
            $data = [
                'name'        => $name,
                'code'        => $code,
                'image'       => $image,
                'description' => $description,
                'create_date' => $create_date,
                'user'        => $user
            ];
            if (insert_category($data)) {
                echo "<script>alert('Thêm mới thành công');window.location='?modules=brands&controllers=index&action=list';</script>";
                exit;
            } else {
                echo "<script>alert('Thêm mới thương hiệu thất bại');</script>";
            }
        }
    }

    // Truyền biến lỗi, biến cũ xuống view
    $data = [
        'err' => $err,
        'old' => [
            'name' => $name,
            'code' => $code,
            'user' => $user,
            'description' => $description,
        ]
    ];
    load_view('add', $data);
}

function listAction() {
    $data_tmp = getAll();
    $page = (!empty($_GET['page'])) ? intval($_GET['page']) : 1;
    $numProduct = count($data_tmp);
    $productOnPage = 5;
    $num = ceil($numProduct / $productOnPage);
    if ($page > $num) $page = $num;
    $start = ($page - 1) * $productOnPage;
    $res = array_slice($data_tmp, $start, $productOnPage);

    $data = [$res, $num, $page];
    load_view('list', $data);
}

function deleteAction() {
    $id = $_GET['id'];
    delete_category_by_id($id);
    header('location:?modules=brands&controllers=index&action=list');
    exit;
}

function editAction() {
    $id = $_GET['id'];
    $data = get_category_by_id($id);
    load_view('show', $data);
}

function updateAction() {
    $id = $_GET['id'];
    $old_data = get_category_by_id($id);
    $data1 = [];
    $err = [];

    if (!empty($_POST['btn_submit'])) {
        $data1['name'] = !empty($_POST['name']) ? trim($_POST['name']) : $old_data[0]['name'];
        $data1['code'] = !empty($_POST['code']) ? trim($_POST['code']) : $old_data[0]['code'];
        $data1['user'] = !empty($_POST['user']) ? trim($_POST['user']) : $old_data[0]['user'];
        $data1['description'] = !empty($_POST['description']) ? trim($_POST['description']) : $old_data[0]['description'];

        // Xử lý lại ảnh nếu có upload mới
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "public/uploads/";
            if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
            $image_name = basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false && $_FILES["image"]["size"] <= 2 * 1024 * 1024
                && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])
                && !file_exists($target_file)
            ) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data1['image'] = $target_file;
                } else {
                    $data1['image'] = $old_data[0]['image'];
                }
            } else {
                $data1['image'] = $old_data[0]['image'];
            }
        } else {
            $data1['image'] = $old_data[0]['image'];
        }
    }

    if (update_category_by_id($id, $data1)) {
        $res = get_category_by_id($id);
        load_view('show', $res);
        echo "<script>alert('Cập nhật thành công');</script>";
    } else {
        load_view('show', $old_data);
        echo "<script>alert('Cập nhật thất bại');</script>";
    }
}