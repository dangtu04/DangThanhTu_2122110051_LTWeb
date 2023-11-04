<?php

use App\Models\Contact;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $contact=new Contact();
    //lấy từ form
    $contact->name = $_POST['name'];
    // $contact->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->title = $_POST['title'];
    $contact->content = $_POST['content'];
    $contact->status = $_POST['status'];
    //Xử lí uploadfile
    // if(strlen($_FILES['image']['name'])>0){
    //     $target_dir = "../public/images/contact/";
    //     $target_file= $target_dir . basename($_FILES["image"]["name"]);
    //     $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
    //     {
    //         $filename=$contact->slug.'.'.$extension;
    //         move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
    //         $contact->image =$filename;
    //     }
    // }
    //tư sinh ra
    $contact->created_at = date('Y-m-d-H:i:s');
    // $contact->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    // insert into contact
    $contact->save();
    //
    MyClass::set_flash('message',['msg' =>'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=contact");
}





if(isset($_POST['CAPNHAT']))
{
    $id=$_POST['id'];
    $contact=Contact::find($id);
    if ($contact == NULL)
{
    MyClass::set_flash('message',['msg' =>'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=contact");
}
    //lấy từ form
    $contact->name = $_POST['name'];
    // $contact->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->title = $_POST['title'];
    $contact->content = $_POST['content'];
    $contact->status = $_POST['status'];
    //Xử lí uploadfile
    // if(strlen($_FILES['image']['name'])>0){
    //     //Xóa hình cũ

    //     //Thêm hình mới
    //     $target_dir = "../public/images/contact/";
    //     $target_file= $target_dir . basename($_FILES["image"]["name"]);
    //     $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
    //     {
    //         $filename=$contact->slug.'.'.$extension;
    //         move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
    //         $contact->image =$filename;
    //     }
    // }
    //tư sinh ra
    $contact->updated_at = date('Y-m-d-H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    //ínet
    $contact->save();
    //
    MyClass::set_flash('message',['msg' =>'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=contact");
}