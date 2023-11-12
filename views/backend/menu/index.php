<?php

use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
use App\Libraries\MyClass;
//SELECT*FROM menu WHERE status !=0 AND ODERBY created DESC

$list = Menu::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get();
$list_category = Category::where('status', '!=', 0)
   ->get();
$list_brand = Brand::where('status', '!=', 0)
   ->get();
$list_topic = Topic::where('status', '!=', 0)
   ->get();
$list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])
   ->get();

?>
<?php require_once '../views/backend/header.php'; ?>
<form action="index.php?option=menu&cat=process" method="post">

   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Tất cả Menu</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                     <li class="breadcrumb-item active">Tất cả Menu</li>
                  </ol>
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
                     <a class="btn btn-sm btn-danger" href="index.php?option=menu&cat=trash">
                        <i class="fas fa-trash"></i>Thùng rác
                     </a>
                  </div>
                  <div class="card-body">
                     <?php require '../views/backend/message.php'; ?>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="accordion" id="accordionExample">
                              <div class="card position">
                                 <div class="card-body">
                                    <label>Vị trí Menu</label>
                                    <select name="position" class="form-control">
                                       <option value="mainmenu">Main menu</option>
                                       <option value="footermenu">Footer menu</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="card">
                                 <div class="card-header" id="headingCategory">
                                    <h2 class="mb-0">
                                       <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                          Danh mục sản phẩm
                                       </button>
                                    </h2>
                                 </div>

                                 <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                                    <div class="card-body">
                                       <?php foreach ($list_category as $category) : ?>
                                          <div class="form-check">
                                             <input name="categoryId[]" class="form-check-input" type="checkbox" value="<?= $category->id; ?>" id="categoryCheck<?= $category->id; ?>">
                                             <label class="form-check-label" for="categoryCheck<?= $category->id; ?>">
                                                <?= $category->name; ?>
                                             </label>
                                          </div>
                                       <?php endforeach; ?>
                                       <div class="mb-3">
                                          <input name="THEMCATEGORY" type="submit" value="Thêm menu" class="btn btn-sm btn-success form-control">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <div class="card-header" id="headingBrand">
                                    <h2 class="mb-0">
                                       <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                                          Thương hiệu
                                       </button>
                                    </h2>
                                 </div>
                                 <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionExample">
                                    <div class="card-body">
                                       <?php foreach ($list_brand as $brand) : ?>
                                          <div class="form-check">
                                             <input name="brandId[]" class="form-check-input" type="checkbox" value="<?= $brand->id; ?>" id="brandCheck<?= $brand->id; ?>">
                                             <label class="form-check-label" for="brandCheck<?= $brand->id; ?>">
                                                <?= $brand->name; ?>
                                             </label>
                                          </div>
                                       <?php endforeach; ?>
                                       <div class="mb-3">
                                          <input name="THEMBRAND" type="submit" value="Thêm menu" class="btn btn-sm btn-success form-control">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <div class="card-header" id="headingTopic">
                                    <h2 class="mb-0">
                                       <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="false" aria-controls="collapseTopic">
                                          Chủ đề bài viết
                                       </button>
                                    </h2>
                                 </div>
                                 <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionExample">
                                    <div class="card-body">
                                       <?php foreach ($list_topic as $topic) : ?>
                                          <div class="form-check">
                                             <input name="topicId[]" class="form-check-input" type="checkbox" value="<?= $topic->id; ?>" id="topicCheck<?= $topic->id; ?>">
                                             <label class="form-check-label" for="topicCheck<?= $topic->id; ?>">
                                                <?= $topic->name; ?>
                                             </label>
                                          </div>
                                       <?php endforeach; ?>
                                       <div class="mb-3">
                                          <input name="THEMTOPIC" type="submit" value="Thêm menu" class="btn btn-sm btn-success form-control">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <div class="card-header" id="headingPage">
                                    <h2 class="mb-0">
                                       <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage">
                                          Trang đơn
                                       </button>
                                    </h2>
                                 </div>
                                 <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                                    <div class="card-body">
                                       <?php foreach ($list_page as $page) : ?>
                                          <div class="form-check">
                                             <input name="pageId[]" class="form-check-input" type="checkbox" value="<?= $page->id; ?>" id="pageCheck<?= $page->id; ?>">
                                             <label class="form-check-label" for="pageCheck<?= $page->id; ?>">
                                                <?= $page->title; ?>
                                             </label>
                                          </div>
                                       <?php endforeach; ?>
                                       <div class="mb-3">
                                          <input name="THEMPAGE" type="submit" value="Thêm menu" class="btn btn-sm btn-success form-control">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <div class="card-header" id="headingCustom">
                                    <h2 class="mb-0">
                                       <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseCustom" aria-expanded="false" aria-controls="collapseCustom">
                                          Tùy liên kết
                                       </button>
                                    </h2>
                                 </div>
                                 <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                                    <div class="card-body">
                                       <div class="mb-3">
                                          <label>Tên menu</label>
                                          <input type="text" name="name" class="form-control">
                                       </div>
                                       <div class="mb-3">
                                          <label>Liên kết</label>
                                          <input type="text" name="link" class="form-control">
                                       </div>
                                       <div class="mb-3">
                                          <input name="THEMCUSTOM" type="submit" value="Thêm menu" class="btn btn-sm btn-success form-control">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
                        <div class="col-md-9">
                           <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th class="text-center" style="width:30px;">
                                       <input type="checkbox">
                                    </th>
                                    <th>Tên Menu</th>
                                    <th>Liên kết</th>
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
                                                <?= $item->name; ?>
                                             </div>
                                             <div class="function_style">
                                                <?php if ($item->status == 1) : ?>
                                                   <a href="index.php?option=menu&cat=status&id=<?= $item->id; ?>" class="btn btn-success">
                                                      <i class="fas fa-toggle-on"></i> Hiện</a> |
                                                <?php else : ?>
                                                   <a href="index.php?option=menu&cat=status&id=<?= $item->id; ?>" class="btn btn-danger">
                                                      <i class="fas fa-toggle-off"></i> Ẩn</a> |
                                                <?php endif; ?>
                                                <a href="index.php?option=menu&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary">
                                                   <i class="fas fa-edit"></i> Chỉnh sửa</a> |
                                                <a href="index.php?option=menu&cat=show&id=<?= $item->id; ?>" class="btn btn-info">
                                                   <i class="fas fa-eye"></i> Chi tiết</a> |
                                                <a href="index.php?option=menu&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger">
                                                   <i class="fas fa-trash"></i> Xoá</a>
                                             </div>
                                          </td>
                                          <td><?= $item->link; ?></td>
                                       </tr>
                                    <?php endforeach; ?>
                                 <?php endif; ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  Footer
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>