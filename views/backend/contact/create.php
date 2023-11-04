<?php 
use App\Models\Contact;

$list = Contact::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Thêm mới liên hệ</h1>
                     </div>
                  </div>
               </div>
            </section>
            <section class="content">
               <div class="card">
                  <div class="card-header text-right">
                  <a href="index.php?option=contact" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                     </a>
                     <button type="submit" class="btn btn-sm btn-success" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm liên hệ
                     </button>
                  </div>
                  <div class="card-body">
                  <?php require_once "../views/backend/message.php"; ?>                 
                     <div class="row">
                        <div class="col-md-8">
                           <div class="mb-3">
                              <label>Tên liên hệ (*)</label>
                              <input type="text" placeholder="Nhập tên liên hệ" name="name" class="form-control">
                           </div>
                           <div class="mb-3">
                              <label>Email (*)</label>
                              <input type="text" placeholder="Nhập Email" name="email" class="form-control">
                           </div>

                           <div class="mb-3">
                              <label>Tiêu đề (*)</label>
                              <input name="title" placeholder="Nhập tiêu đề" rows="5"
                                 class="form-control"></input>
                           </div>

                           <div class="mb-3">
                              <label>Nội dung (*)</label>
                              <textarea name="content" placeholder="Nhập nội dung" rows="5"
                                 class="form-control"></textarea>
                           </div>
                        </div>
                        <div class="col-md-4">
                          
                        <div class="mb-2">
                              <label>Số điện thoại (*)</label>
                              <input name="phone" placeholder="Nhập số điện thoại liên hệ" rows="5"
                                 class="form-control"></input>
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