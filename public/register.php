
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
                !empty( $_POST['user_name']) &&
                !empty( $_POST['user_email']) &&
                !empty( $_POST['user_password']) &&
                !empty( $_POST['user_pass_check'])
            ) {

                // ２回入力したEmailがマッチしているかを確認する
                if ( $_POST['user_password'] === $_POST['user_pass_check']) {

                    //  エラーがない場合
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_password = $_POST['user_password'];

                    // 会員登録する
                    save_user($user_name, $user_email, $user_password, $mysqli);
                } else {
                    echo "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    パスワードが一致しません</div>";
                }

            } else {
                echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                エラーがあります</div>";
            }
        }
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class= "col-xs-12 col-md-6 offset-md-3">
                <form action="" method="post">
                    <h2>新規登録</h2>
                    <div class="form-group">
                        <label>名前</label>
                        <input type="text" class="form-control" name="user_name" placeholder="例)山田太郎" required>
                    </div>
                    <div class="form-group">
                        <label>メールアドレス</label>
                        <input type="email" class="form-control" name="user_email" placeholder="sample@sample.co.jp" required>
                    </div>
                    <div class="form-group">
                        <label>パスワード</label>
                        <input type="password" class="form-control" name="user_password" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="user_pass_check">パスワード(確認)</label>
                        <input type="password" class="form-control" id="user_pass_check" name="user_pass_check" placeholder="" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="register" value="新規登録">
                </form>
            </div>
        </div>
    </div>

    <?php include '../public/view/footer.php'; ?>