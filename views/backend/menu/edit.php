<?php
use App\Models\Menu;
//SELECT*FROM category WHERE status !=0 AND ODERBY created DESC
$id = $_REQUEST['id'];
$menu = Menu::find($id);
if ($menu == NULL)
{
    header("location:index.php?option=menu");
}

?>
<form action="index.php?option=menu&cat=process" method="post"
enctype="multipart/form-data">
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật Menu</h1>
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
                  <a href="index.php?option=menu" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                           <input type="hidden" name = "id" value="<?= $menu->id;?>">
                           <label>Tên Menu (*)</label>
                           <input type="text" value="<?= $menu->name;?>" name= "name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" value="<?= $menu->slug;?>"name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Liên kết</label>
                           <input name="link"  value="<?= $menu->link;?>" class="form-control"></input>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($menu->status==1)?'selected':'';?> >Xuất bản</option>
                              <option value="2"<?=($menu->status==2)?'selected':'';?>>Chưa xuất bản</option>
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
     