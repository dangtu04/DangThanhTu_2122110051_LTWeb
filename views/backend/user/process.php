<?php

use App\Models\User;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $user = new User();
    //lấy từ form
    $user->name = $_POST['name'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']);
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    $user->address = (strlen($_POST['address']) > 0) ? $_POST['address'] : MyClass::str_slug($_POST['name']);
    $user->gender = $_POST['gender'];
    $user->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/user/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$user->username.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $user->image =$filename;
        }
    }
    //tư sinh ra
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($user);
    //luu vao csdl
    // insert into user
    $user->save();
    //
    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=user");
}





if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $user = User::find($id);
    if ($user == NULL) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=user");
    }
    //lấy từ form
    $user->name = $_POST['name'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']);
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    $user->address = (strlen($_POST['address']) > 0) ? $_POST['address'] : MyClass::str_slug($_POST['name']);
    $user->gender = $_POST['gender'];
    $user->status = $_POST['status'];
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        //Xóa hình cũ

        //Thêm hình mới
        $target_dir = "../public/images/user/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $user->username . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $user->image = $filename;
        }
    }
    //tư sinh ra
    $user->updated_at = date('Y-m-d H:i:s');
    $user->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($user);
    //luu vao csdl
    //ínet
    $user->save();
    //
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=user");
}
