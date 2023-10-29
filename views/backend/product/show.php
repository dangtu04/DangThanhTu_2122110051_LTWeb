<?php 
use App\Models\Product;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == null)
{
   MyClass::set_flash('message',['msg' =>'Lỗi trang 404', 'type' => 'danger']);
    header("location:index.php?option=product");
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết sản phẩm</h1>
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
                     <a href="index.php?option=product" class="btn btn-sm btn-info">
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
                                 <td><?= $product->id; ?></td>
                              </tr>
                              <tr>
                                 <td>Mã loại sản phẩm</td>
                                 <td><?= $product->category_id; ?></td>
                              </tr>
                              <tr>
                                 <td>brand_id</td>
                                 <td><?= $product->brand_id; ?></td>
                              </tr>                              
                              <tr>
                                 <td>Tên sản phẩm</td>
                                 <td><?= $product->name ?></td>
                              </tr>
                              
                              <tr>
                                 <td>Slug</td>
                                 <td><?= $product->slug; ?></td>
                              </tr>
                              <tr>
                                 <td>Hình ảnh</td>
                                 <td><img style="width :100px;" src="../public/images/product/<?= $product->image; ?>" 
                                       alt="<?= $product->image; ?>"></td>
                              </tr>
                              <tr>
                                 <td>Chi tiết</td>
                                 <td><?= $product->detail; ?></td>
                              </tr>
                              <tr>
                                 <td>Số lượng</td>
                                 <td><?= $product->qty; ?></td>
                              </tr>
                              <tr>
                                 <td>Giá</td>
                                 <td><?= $product->price; ?></td>
                              </tr>
                              <tr>
                                 <td>Giá khuyến mãi</td>
                                 <td><?= $product->pricesale; ?></td>
                              </tr>
                              <tr>
                                 <td>Mô tả</td>
                                 <td><?= $product->description; ?></td>
                              </tr>
                              <tr>
                                 <td>Ngày tạo</td>
                                 <td><?= $product->created_at; ?></td>
                              </tr>
                              <tr>
                                 <td>Người tạo</td>
                                 <td><?= $product->created_by; ?></td>
                              </tr>
                              <tr>
                                 <td>Ngày sửa</td>
                                 <td><?= $product->updated_at; ?></td>
                              </tr>
                              <tr>
                                 <td>Người sửa</td>
                                 <td><?= $product->updated_by; ?></td>
                              </tr>
                              <tr>
                                 <td>Trạng thái</td>
                                 <td><?= $product->status; ?></td>
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