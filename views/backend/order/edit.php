<?php

use App\Models\Order;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$order = Order::find($id);
if ($order == NULL) {
   MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
   header("location:index.php?option=order");
}

?>
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
   <?php require_once '../views/backend/header.php'; ?>
   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật đơn đặt hàng</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <button class="btn btn-sm btn-success" type="
                  submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>
               <a href="index.php?option=order" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $order->id; ?>">
                        <label>Tên người nhận (*)</label>
                        <input type="text" value="<?= $order->deliveryname; ?>" name="deliveryname" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Địa chỉ nhận hàng</label>
                        <input type="text" value="<?= $order->deliveryaddress; ?>" name="deliveryaddress" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Số điện thoại</label>
                        <input type="text" value="<?= $order->deliveryphone; ?>" name="deliveryphone" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="text" value="<?= $order->deliveryemail; ?>" name="deliveryemail" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($order->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($order->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>