<?php

use App\Models\User;

$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();
if (isset($_POST['CHANEGADDRESS'])) {
   $id = $customer->id;
   $user = User::find($id);
   $user->address = $_POST['address'];
   $user->save();
   header('location:index.php?option=profile');
 
}





?>
<?php require_once "views/frontend/header.php"; ?>
<form action="index.php?option=changeaddress" method="post" name="logincustomer">
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Đổi địa chỉ</li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="call-login--register border-bottom">
               <ul class="nav nav-fills py-0 my-0">
                  <li class="nav-item">
                     <a class="nav-link" href="#">
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                        <?= $customer->phone; ?>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?option=profile"><?= $customer->name; ?></a>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main">Thay đổi địa chỉ </h1>
               <table class="table table-borderless">
                  <tr>
                     <td>Địa chỉ cũ</td>
                     <td>
                        <input type="text" name="address" value="<?= $customer->address; ?>" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Địa chỉ mới</td>
                     <td>
                        <input type="text" name="address" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Xác nhận thao tác thực hiện </td>
                     <td>
                        <button class="btn btn-main" type="submit" name="CHANEGADDRESS">
                           Đổi Địa chỉ 
                        </button>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </section>
</form>

<?php require_once "views/frontend/footer.php"; ?>