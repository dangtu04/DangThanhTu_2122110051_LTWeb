<?php


use App\Models\User;
use App\Libraries\MyClass;

if (isset($_POST['CAPNHAT'])) {
   $id = $_POST['id'];
   $user = User::find($id);
   if ($user == NULL) {
       MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
       header("location:index.php");
   }
   //lấy từ form  
   $user->password = $_POST['password'];
   //tư sinh ra
   var_dump($user);
   //luu vao csdl
   //ínet
   $user->save();
   //
   header("location:index.php");
}

?>


<?php require_once 'views/frontend/header.php'; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
         </ol>
      </nav>
   </div>
</section>
<form action="" method="post">
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="call-login--register border-bottom">
            <!-- <ul class="nav nav-fills py-0 my-0">
               <li class="nav-item">
                  <a class="nav-link" href="index.php?option=customer&logout=true">
                     <i class="fa fa-phone-square" aria-hidden="true"></i>
                     0343383117
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php?option=customer&logout=true">Đăng nhập</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php?option=register">Đăng ký</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php?option=profile">name</a>
               </li>
            </ul> -->
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
            <table class="table table-borderless">
               <tr>
                  <td style="width:20%;">Mật khẩu cũ</td>
                  <td>
                     <input type="password" name="password_old" class="form-control" />
                  </td>
               </tr>
               <tr>
                  <td>Mật khẩu</td>
                  <td>
                     <input type="password" name="password" class="form-control" />
                  </td>
               </tr>
               <tr>
                  <td>Xác nhận mật khẩu</td>
                  <td>
                     <input type="password" name="password_re" class="form-control" />
                  </td>
               </tr>
               <tr>
                  <td>Địa chỉ</td>
                  <td>
                     <button class="btn btn-main" type="submit" name="CHANEGPASSWORD">
                        Đổi mật khẩu
                     </button>
                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</section>
</form>

<?php require_once 'views/frontend/footer.php'; ?>