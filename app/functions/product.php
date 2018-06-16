<?php
function save_product($product_name, $product_review, $mysqli) {
	$product_name = $mysqli->real_escape_string($product_name);
	$product_review = $mysqli->real_escape_string($product_review);
	$query =    "INSERT INTO
					products(
						product_name,
						product_review
					)
				VALUES(
					'$product_name',
					'$product_review'
				)";
	$result = $mysqli->query($query);
	echo "<div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			商品レビューの投稿が完了しました</div>";
}

function select_products($mysqli){
	$query = 	"SELECT
					product_id,
					product_name,
					product_review
				 FROM
					products
				";

	$result = $mysqli->query($query);

	if( !$result ) {
		// エラーが発生した場合
		exit;
	} else {
		// カテゴリーが存在しない場合
		if( mysqli_num_rows($result) == 0 ){
			exit;
		}else {
			// エラーがない場合
			// 連想配列にデータを格納する
			$product_data = array();
			while ($row = $result->fetch_assoc()) {
				$product_data[] = $row;
			}

			return $product_data;
		}
	}
}

function select_product($product_id, $mysqli){
	$product_id = $mysqli->real_escape_string($product_id);
	$query = 	"SELECT
					product_id,
					product_name,
					product_review
				 FROM
					products
				WHERE
					product_id = $product_id
				";

	$result = $mysqli->query($query);

	if( !$result ) {
		// エラーが発生した場合
		exit;
	} else {
		// カテゴリーが存在しない場合
		if( mysqli_num_rows($result) == 0 ){
			exit;
		}else {
			// エラーがない場合
			// 連想配列にデータを格納する
			//$product_data = array();
			$product_data = $result;
			//while ($row = $result->fetch_assoc()) {
			//	$product_data[] = $row;
			//}

			return $product_data;
		}
	}
}