<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Quản Trị</title>
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <style>
        .swapper {
            max-width: 600px;
            margin: auto;
            box-shadow: 1px 3px 5px gray;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php 
        require_once "../vendor/autoload.php";

        use App\Models\User;
        $error = "";
        if(isset($_POST['DANGNHAP'])) {
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            $args = [
                ['password' , '=' , $password],
                ['roles' , '=' , 1],
                ['status' , '=' , 1],

            ];
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $args[] = ['email', '=', $username];
              }
            else {
                $args[] = ['username', '=', $username];
            }
            // var_dump($args);
            $user = User::where($args)->first();
            if($user !== null) {
                $_SESSION['useradmin'] = $username;
                $_SESSION['user_id'] = $user->id;
                $_SESSION['name'] =  $user->name;
                $_SESSION['image'] =  $user->image;
                header('location:index.php');
            }
            else{
                $error = "Tài khoản không hợp lệ!";
            }
           
        }
    ?>
    <form action="login.php" method="post" class="mt-5">
        <div class="swapper mt-5-p-4">
            <h1 class="fs-3 text-center text-danger">ĐĂNG NHẬP</h1>
            <div class="mb-3 mx-5">
                <label for="" class="my-2"><strong>Tên tài khoản(*)</strong>
                </label>
                <input class="form-control" type="text" name="username" placeholder="Tên đăng nhập hoặc email" required> 
            </div>
            <div class="mb-3 mx-5">
                <label for="" class="my-2"><strong>Mật khẩu(*)</strong>
                </label>
                <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required> 
            </div>
            <div class="mb-3 text-end">
                <input type="submit" value="Đăng nhập" name="DANGNHAP" class="bg-success py-2 mx-5 border border-1 text-white rounded"> 
            </div>
            <div class="mb-3">
                <p class="mx-5 pb-3"><i>Chú ý: (*) Không được bỏ trống</i></p>
                <?php if($error != ""): ?>
                    <p class="text-danger"> <?= $error;?></p>
                <?php endif; ?>
            </div>
        </div>
    </form>
</body>
</html>