<?php 
use App\Models\Topic;

$list = Topic::where('status', '=', 0)
   ->orderBy('created_at', 'DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng Rác</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6">
                     <a href="index.php?option=topic" class="btn btn-primary">Tất cả</a>                       
                     </div>
                     <div class="col-md-6 text-right">
                     <a href="index.php?option=topic" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                     </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>  
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên chủ đề</th>
                                 <th>Tên slug</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php if (count($list) > 0) : ?>   
                                 <?php foreach ($list as $item): ?>                  
                                    <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                 <img src="../public/images/<?= $item->image; ?>" 
                                       alt="<?= $item->image; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                    <?= $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                       <a href="index.php?option=topic&cat=retore&id=<?= $item->id; ?>" class="btn btn-info">
                                          <i class="fas fa-undo"></i> Khôi phục</a> |
                                       <a href="index.php?option=topic&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger">
                                          <i class="fas fa-trash"></i> Xoá</a>
                                    </div>
                                 </td>
                                 <td><?= $item->slug; ?></td>
                              </tr>
                                 <?php endforeach; ?>
                              <?php endif; ?>
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