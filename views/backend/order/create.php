<?php

use App\Models\Order;

$list = Order::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thêm đơn hàng mới</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=order" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-success" type="submit" name="THEM">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Thêm
               </button>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
               <div class="row">
                  <div class="col-md-8">
                     <div class="mb-3">
                        <label>Tên người nhận</label>
                        <input type="text" name="deliveryname" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Địa chỉ người nhận</label>
                        <input type="text" name="deliveryaddress" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="deliveryemail" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Mã khách hàng</label>
                        <input type="text" name="user_id" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Code đơn đặt hàng</label>
                        <input type="text" name="note" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Số điện thoại</label>
                        <input type="text" name="deliveryphone" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
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
<?php require_once "../views/backend/footer.php"; ?>