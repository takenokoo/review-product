    <?php
        include '../public/view/header.php';
        include '../app/config/database.php';
        include '../app/functions/product.php';
    ?>

    <?php
        //  送信ボタンが押された時に下記を実行
        if ( $_POST ) {

            // 必須項目に情報が入っているかを確認する
            if (
                !empty( $_POST['product_name']) &&
                !empty( $_POST['product_review']) 
            ) {

                //  エラーがない場合
                $product_name = $_POST['product_name'];
                $product_review = $_POST['product_review'];

                // 商品レビューを投稿する
                save_product($product_name, $product_review, $mysqli);

            } else {
                echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                商品名と商品の感想は必須項目です</div>";
            }
        }
    ?>
    
    <?php
        // ログインしていない時ログイン画面へ
        if(!isset($_SESSION['user'])){
            header("Location:login.php");
        }
    ?>

    <?php
        $select_product_name = "";
        $select_product_review = "";
        if(isset($_GET["id"])){
            $product_id = $_GET["id"];
            $products_data = select_product($product_id, $mysqli);
            foreach($products_data as $product_data){
                $select_product_name = $product_data['product_name'];
                $select_product_review = $product_data['product_review'];
            }
        }
    ?>

    <div class="container mt-5">
        <div class="border-bottom">
            <h2>商品詳細</h2>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label>商品名</label>
                <input type="text" class="form-control" name="product_name" required value="<?php echo $select_product_name ?>">
            </div>
            <div class="form-group">
                <label>商品の感想</label>
                <textarea class="form-control" name="product_review" id="" rows="3"><?php echo $select_product_review ?></textarea>
            </div>

            <?php 
                if(!isset($_GET["id"])){ ?>
                    <input type="submit" class="btn btn-primary mb-3" value="投稿する">
            <?php 
                } 
            ?>
        </form>

        <a href="index.php">一覧画面に戻る</a>

    </div>
    
    <?php include '../public/view/footer.php'; ?>