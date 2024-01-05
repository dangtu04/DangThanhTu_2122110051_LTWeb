<?php

use App\Models\Product;

if (isset($_POST["TIM"])) {
    $key = addslashes($_POST["search"]);
    function searchProducts($key)
    {
        // Chuẩn bị từ khóa tìm kiếm
        $searchWord = '%' . strtolower($key) . '%';

        // Thực hiện truy vấn để tìm kiếm sản phẩm
        $list = Product::where(function ($query) use ($searchWord) {
            $query->whereRaw('LOWER(name) LIKE ?', [$searchWord])
                ->orWhereRaw('LOWER(slug) LIKE ?', [$searchWord]);
        })->get();

        // Trả về kết quả tìm kiếm
        return $list;
    }
}

$searchKeyword = $_POST["search"];
$list_product = searchProducts($searchKeyword);



?>
<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
                <li class="breadcrumb-item">
                    <a class="text-main" href="index.php">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tìm kiếm
                </li>
            </ol>
        </nav>
    </div>
</section>
<section class="hdl-maincontent py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 order-2 order-md-1">

                <?php require_once "views/frontend/mod-listcategory.php"; ?>
                <?php require_once "views/frontend/mod-listbrand.php"; ?>
                <?php require_once "views/frontend/mod-product-new.php"; ?>

            </div>
            <div class="col-md-9 order-1 order-md-2">
                <div class="category-title bg-main">
                    <h3 class="fs-5 py-3 text-center">NỘI DUNG TÌM KIẾM</h3>
                </div>
                <div class="product-category mt-3">
                    <div class="row product-list">
                        <?php foreach ($list_product as $product) : ?>
                            <div class="col-6 col-md-3 mb-4">
                                <?php require 'views/frontend/product-item.php'; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>