<?php

use App\Models\Order;

$list = Order::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get();
?><?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả đơn hàng</h1>
               <a href="index.php?option=order&cat=create" class="btn btn-sm btn-primary">Thêm đơn hàng</a>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header p-2">
            <a href="index.php?option=order&cat=trash" class="btn btn-danger text-end">
               <i class="fa fa-trash"></i> Thùng rác</a>
         </div>
         <div class="card-body p-2">
            <?php require_once "../views/backend/message.php"; ?>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th style="width:115px; text-align:center;">Mã đơn hàng</th>
                     <th>Tên người nhận</th>
                     <th>Địa chỉ người nhận</th>
                     <th>Số điện thoại</th>
                     <th>Email</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($list) > 0) : ?>
                     <?php foreach ($list as $item) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <div class="name">
                                 <?= $item->id; ?>
                              </div>
                           </td>
                           <td>
                              <div class="name">
                                 <?= $item->deliveryname; ?>
                              </div>
                              <div class="function_style">
                                 <?php if ($item->status == 1) : ?>
                                    <a href="index.php?option=order&cat=status&id=<?= $item->id; ?>" class="btn btn-success">
                                       <i class="fas fa-toggle-on"></i> Hiện</a> |
                                 <?php else : ?>
                                    <a href="index.php?option=order&cat=status&id=<?= $item->id; ?>" class="btn btn-danger">
                                       <i class="fas fa-toggle-off"></i> Ẩn</a> |
                                 <?php endif; ?>
                                 <a href="index.php?option=order&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Chỉnh sửa</a> |
                                 <a href="index.php?option=order&cat=show&id=<?= $item->id; ?>" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Chi tiết</a> |
                                 <a href="index.php?option=order&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Xoá</a>
                              </div>
                           </td>
                           <td><?= $item->deliveryaddress; ?></td>
                           <td><?= $item->deliveryphone; ?></td>
                           <td><?= $item->deliveryemail; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  <?php endif; ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>