<?php
use App\Models\Topic;
use App\Libraries\MyClass;
//SELECT*FROM category WHERE status !=0 AND ODERBY created DESC
$id = $_REQUEST['id'];
$topic = Topic::find($id);
if ($topic == NULL)
{
   MyClass::set_flash('message',['msg' =>'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=topic");
}

?>
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật chủ đề</h1>
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
                  <a href="index.php?option=topic" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                           <input type="hidden" name = "id" value="<?= $topic->id;?>">
                           <label>Tên chủ đề (*)</label>
                           <input type="text" value="<?= $topic->name;?>" name= "name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" value="<?= $topic->slug;?>"name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($topic->status==1)?'selected':'';?> >Xuất bản</option>
                              <option value="2"<?=($topic->status==2)?'selected':'';?>>Chưa xuất bản</option>
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
<?php require_once '../views/backend/footer.php';?>