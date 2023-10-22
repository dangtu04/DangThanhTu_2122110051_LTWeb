<?php

use App\Models\Product;

$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == null)
{
    header("location:index.php?option=product");
}
$product->status = ($product->status == 1) ? 2 : 1;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$product->save();
header("location:index.php?option=product");