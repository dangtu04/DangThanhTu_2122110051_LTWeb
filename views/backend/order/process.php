<?php

use App\Models\Order;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $order = new Order();
    //lấy từ form
    // $order->user_id = $_POST['user_id '];
    $order->deliveryaddress = $_POST['deliveryaddress'];
    $order->deliveryname = $_POST['deliveryname'];
    $order->deliveryphone = $_POST['deliveryphone'];
    $order->deliveryemail = $_POST['deliveryemail'];
    $order->note = (strlen($_POST['note']) > 0) ? $_POST['note'] : MyClass::str_slug($_POST['deliveryname']);
    // $order->gender = $_POST['gender'];
    $order->status = $_POST['status'];
   
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = (isset($_SESSION['order_id'])) ? $_SESSION['order_id'] : 1;
    var_dump($order);
    $order->save();
    //
    header("location:index.php?option=order");
}

if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $order = order::find($id);
    //lấy từ form
    // $order->user_id = $_POST['user_id '];
    $order->deliveryaddress = $_POST['deliveryaddress'];
    $order->deliveryname = $_POST['deliveryname'];
    $order->deliveryphone = $_POST['deliveryphone'];
    $order->deliveryemail = $_POST['deliveryemail'];
    $order->note = (strlen($_POST['note']) > 0) ? $_POST['note'] : MyClass::str_slug($_POST['deliveryname']);
    // $order->gender = $_POST['gender'];
    $order->status = $_POST['status'];
   
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = (isset($_SESSION['order_id'])) ? $_SESSION['order_id'] : 1;
    var_dump($order);
    //luu vao csdl
    //ínet
    $order->save();
    //
    header("location:index.php?option=order");
}