<?php 
use App\Models\Category;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$category = Category::find($id);
if ($category == null)
{
   MyClass::set_flash('message',['msg' =>'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=category");
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết danh mục</h1>
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
                     <a href="index.php?option=category" class="btn btn-sm btn-info">
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
                                 <td><?= $category->id; ?></td>
                              </tr>
                              <tr>
                                 <td>Tên loại sản phẩm</td>
                                 <td><?= $category->name; ?></td>
                              </tr>
                              <tr>
                                 <td>Slug</td>
                                 <td><?= $category->slug; ?></td>
                              </tr>
                              <tr>
                                 <td>Parent_id</td>
                                 <td><?= $category->parent_id; ?></td>
                              </tr>
                              <tr>
                                 <td>Hình ảnh</td>
                                 <td><img style="width :100px;" src="../public/images/category/<?= $category->image; ?>" 
                                       alt="<?= $category->image; ?>"></td>
                              </tr>
                              <tr>
                                 <td>Thứ tự</td>
                                 <td><?= $category->sort_order; ?></td>
                              </tr>
                              <tr>
                                 <td>Mô tả</td>
                                 <td><?= $category->description; ?></td>
                              </tr>
                              <tr>
                                 <td>Ngày tạo</td>
                                 <td><?= $category->created_at; ?></td>
                              </tr>
                              <tr>
                                 <td>Người tạo</td>
                                 <td><?= $category->created_by; ?></td>
                              </tr>
                              <tr>
                                 <td>Ngày sửa</td>
                                 <td><?= $category->updated_at; ?></td>
                              </tr>
                              <tr>
                                 <td>Người sửa</td>
                                 <td><?= $category->updated_by; ?></td>
                              </tr>
                              <tr>
                                 <td>Trạng thái</td>
                                 <td><?= $category->status; ?></td>
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