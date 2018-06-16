    <?php
        include '../public/view/header.php';
        include '../app/config/database.php';
        include '../app/functions/product.php';
    ?>

    <?php
      // ログインしていない時ログイン画面へ
      if(!isset($_SESSION['user'])){
          header("Location:login.php");
      }
    ?>

    <div class="container mt-5">
        <div class="d-flex border-bottom mb-3">
          <div class="mr-auto">
            <h2>商品一覧</h2>
          </div>
          <div>
            <a href="detail.php" class="btn btn-primary ml-3" role="button">新規</a>
          </div>
        </div>
        
        <?php
          $products_data = select_products($mysqli);
          foreach($products_data as $product_data){
        ?>
            <div class="media mb-3 border-bottom">
              <img class="mr-3" src="" alt="">
              <div class="media-body">
                <h5 class="mt-0"><?php echo $product_data['product_name'] ?></h5>
                <?php echo $product_data['product_review'] ?>
              </div>
              <a href="detail.php?id=<?php echo $product_data['product_id'] ?>" class="btn btn-outline-primary ml-3" role="button">詳細へ</a>
            </div>
        <?php  }?>
            
    </div>
    
    <?php include '../public/view/footer.php'; ?>