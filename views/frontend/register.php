<?php

use App\Models\User;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $user = new User();
    //lấy từ form
    $user->name = $_POST['name'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    $user->address = (strlen($_POST['address']) > 0) ? $_POST['address'] : MyClass::str_slug($_POST['name']);

    //tư sinh ra
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($user);
    //luu vao csdl
    // insert into user
    $user->save();
    //
    header("location:index.php?option=customer&login=true");
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
            <li class="breadcrumb-item active" aria-current="page">
               Đăng ký tài khoản
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <form action="index.php?option=register" method="post" enctype="multipart/form-data" name="THEM">
      <div class="container">
         <h1 class="fs-2 text-main text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
         <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên(*)</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="nhập họ tên" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại(*)</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
               </div>
               <div class="mb-3">
                  <div class="mb-3">
                     <label for="address" class="text-main">Địa chỉ</label>
                     <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
                  </div>
               </div>
               <div class="mb-3">
                  <label class="text-main">Giới tính</label>
                  <div class="form-check form-switch">
                     <input name="gennder" class="form-check-input" type="checkbox" role="switch" id="genderChecked" checked onchange="changeGender()">
                     <label class="form-check-label" id="labelgender" for="genderChecked">Nam</label>
                  </div>
               </div>
               <script>
                  function changeGender() {
                     const elementGender = document.querySelector("#genderChecked").checked;
                     if (elementGender == true) {
                        document.querySelector("#labelgender").innerHTML = "Nam";
                     } else {
                        document.querySelector("#labelgender").innerHTML = "Nữ";
                     }
                  }
               </script>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="username" class="text-main">Tên tài khoản(*)</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email(*)</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
               </div>
               <div class="mb-3">
                  <label for="password" class="text-main">Mật khẩu(*)</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
               </div>
               <div class="mb-3">
                  <label for="password_re" class="text-main">Xác nhận Mật khẩu(*)</label>
                  <input type="password" name="password_re" id="password_re" class="form-control" placeholder="Xác nhận mật khẩu" required>
               </div>
               <div class="mb-3">
                  <button class="btn btn-main" name="THEM">Đăng ký</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</section>
<?php require_once 'views/frontend/footer.php'; ?>