<?php

use App\Models\Menu;
use App\Libraries\MyClass;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

if (isset($_POST['THEMCATEGORY'])) {
    if (isset($_POST['categoryId'])) {

        $listid = $_POST['categoryId'];
        foreach ($listid as $id) {
            $category = Category::find($id);
            $menu = new Menu;
            $menu->name = $category->name;
            $menu->link = 'index.php?option=product&cat=' . $category->slug;
            $menu->type = 'category';
            $menu->table_id = $category->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }

        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    }

   else{
    MyClass::set_flash('message', ['msg' => 'Chưa chọn danh mục', 'type' => 'danger']);
    header("location:index.php?option=menu");
   }
}
if (isset($_POST['THEMBRAND'])) {
    if (isset($_POST['brandId'])) {
        $listid = $_POST['brandId'];
        foreach ($listid as $id) {
            $brand = Brand::find($id);
            $menu = new Menu;
            $menu->name = $brand->name;
            $menu->link = 'index.php?option=brand&cat=' . $brand->slug;
            $menu->type = 'brand';
            $menu->table_id = $brand->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }

        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    }
    else{
        MyClass::set_flash('message', ['msg' => 'Chưa chọn thương hiệu', 'type' => 'danger']);
    header("location:index.php?option=menu");
    }
}
if (isset($_POST['THEMTOPIC'])) {
    if (isset($_POST['topicId'])) {
        $listid = $_POST['topicId'];
        foreach ($listid as $id) {
            $topic = Topic::find($id);
            $menu = new Menu;
            $menu->name = $topic->name;
            $menu->link = 'index.php?option=post&cat=' . $topic->slug;
            $menu->type = 'topic';
            $menu->table_id = $topic->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }

        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    }
    else{
        MyClass::set_flash('message', ['msg' => 'Chưa chọn chủ đề', 'type' => 'danger']);
    header("location:index.php?option=menu");
    }
}
if (isset($_POST['THEMPAGE'])) {
    if (isset($_POST['pageId'])) {
        $listid = $_POST['pageId'];
        foreach ($listid as $id) {
            $page = Post::find($id);
            $menu = new Menu;
            $menu->name = $page->title;
            $menu->link = 'index.php?option=page&cat=' . $page->slug;
            $menu->type = 'page';
            $menu->table_id = $page->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }

        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Chưa chọn trang đơn', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}
if (isset($_POST['THEMCUSTOM'])) {
    if (strlen($_POST['name']) > 0 && strlen($_POST['link']) > 0) {
        $menu = new Menu;
        $menu->name = $_POST['name'];
        $menu->link = $_POST['link'];
        $menu->type = 'custom';
        $menu->sort_order = 1;
        $menu->status = 2;
        $menu->position = $_POST['position'];
        $menu->parent_id = 0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Chưa đủ thông tin', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $menu = Menu::find($id);
    if ($menu == NULL) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
    //lấy từ form
    $menu->name = $_POST['name'];
    $menu->link = $_POST['link'];
    // $menu->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    // $menu->description = $_POST['description'];
    $menu->status = $_POST['status'];
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        //Xóa hình cũ

        //Thêm hình mới
        $target_dir = "../public/images/menu/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $menu->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $menu->image = $filename;
        }
    }
    //tư sinh ra
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($menu);
    //luu vao csdl
    //ínet
    $menu->save();
    //
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=menu");
}
