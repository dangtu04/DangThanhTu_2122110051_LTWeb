<?php
use App\Models\Menu;
//SELECT*FROM menu WHERE status !=0 AND ODERBY created DESC

$list = Menu::where('status','=',0)
->select('status','id','name','type','link','position')
 ->orderBy('created_at','DESC')
 ->get();


?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng rác Menu</h1>
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

                  </div>
                  <div class="col-md-6 text-right"><a href="index.php?option=menu" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a></div>
                  
                  </div>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>  
                  <div class="row">
                    
                     <div class="card-body">
                        <div class="row">
                     <div class="col-md-12">
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
                           <?php if (count ($list) > 0) : ?> 
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
                                       <a href="index.php?option=menu&cat=retore&id=<?= $item->id; ?>" class="btn btn-info">
                                          <i class="fas fa-undo"></i> Khôi phục</a> |
                                       <a href="index.php?option=menu&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger">
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
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once '../views/backend/footer.php';?>      
     