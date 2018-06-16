
    <?php
        include '../public/view/header.php';
        include '../app/config/database.php';
        include '../app/functions/user.php';
    ?>

    <?php
        //  送信ボタンが押された時に下記を実行
        if ( $_POST ) {

            // 必須項目に情報が入っているかを確認する
            if (
                !empty( $_POST['user_email']) &&
                !empty( $_POST['user_password']) 
            ) {

                //  エラーがない場合
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];

                // ログインする
                login_user($user_email, $user_password, $mysqli);
            
            } else {
                echo "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                メールアドレスとパスワードは必須項目です</div>";
            }
        }
    ?>


    <div class="container mt-5">
        <div class="row">
            <div class= "col-xs-12 col-md-6 offset-md-3">
                <form action="" method="post">
                    <h2>ログイン</h2>
                    <div class="form-group">
                        <label>メールアドレス</label>
                        <input type="email" class="form-control" name="user_email" required>
                    </div>
                    <div class="form-group">
                        <label>パスワード</label>
                        <input type="password" class="form-control" name="user_password" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="register" value="ログイン">
                </form>
                <a href="register.php" class="d-inline-block btn-block mt-3">ユーザ登録がお済みでない方</a>
            </div>
        </div>
    </div>

    <?php include '../public/view/footer.php'; ?>