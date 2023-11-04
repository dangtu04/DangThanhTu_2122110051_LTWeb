<?php 
use App\Models\Contact;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == null)
{
   MyClass::set_flash('message',['msg' =>'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=contact");
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thông tin liên hệ</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-12 text-right">
                     <a href="index.php?option=contact" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                     </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                         
                              <tr>
                                 <td>ID</td>
                                 <td><?= $contact->id; ?></td>
                              </tr>
                              <tr>
                                 <td>Tên khách hàng</td>
                                 <td><?= $contact->name; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Email</td>
                                 <td><?= $contact->email; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Số điện thoai</td>
                                 <td><?= $contact->phone; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Tiêu đề</td>
                                 <td><?= $contact->title; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Nội dung</td>
                                 <td><?= $contact->content; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Chi tiết liên hệ</td>
                                 <td><?= $contact->replay_id; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Ngày liên hệ</td>
                                 <td><?= $contact->created_at; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Ngày trả lời</td>
                                 <td><?= $contact->update_at; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>người trả lời</td>
                                 <td><?= $contact->updated_by; ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Trạng thái</td>
                                 <td><?= $contact->status; ?></td>
                              </tr>
                           
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>

      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>