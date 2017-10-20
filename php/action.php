<?php  
	require_once 'hy_database.php';
	date_default_timezone_set('Asia/Shanghai');
	$db_obj = new hy_database();
	// echo $_GET['action'];
	switch ($_GET['action']) {
		case 'add':
			$goods_title = $_POST["goods_title"];
			$goods_keyword = $_POST["goods_keyword"];
			$goods_price = $_POST["goods_price"];
			$goods_coupon_price = $_POST["goods_coupon_price"];
			$goods_coupon_address = $_POST["goods_coupon_address"];
			$goods_address = $_POST["goods_address"];


			move_uploaded_file($_FILES["goods_pic"]["tmp_name"], "upload/" . $_FILES["goods_pic"]["name"]);

			$database = new hy_database();
			$itemArr = array(
				'goods_title' => "'".$goods_title."'" ,
				'goods_keyword' => "'".$goods_keyword."'" ,
				'goods_price' => "'".$goods_price."'",
				'goods_coupon_price' => "'".$goods_coupon_price."'",
				'goods_coupon_address' => "'".$goods_coupon_address."'",
				'goods_address'	=> "'".$goods_address."'",
				'goods_pic_path' => "'"."upload/".$_FILES["goods_pic"]["name"]."'",
				'goods_addtime' => "'".date('y-m-d H:i:s',time())."'"
			);
			$model = $database->sqlInsert("goods_list", $itemArr);
			echo "添加成功"."";
			break;
		case 'query':
			$current_page = $_GET['page'];
    		$model = $db_obj->sqlSelect_all("goods_list",$current_page);
    		if($model){
        		echo json_encode($model);
    		} else {
        		echo '查询失败';
    		}
			break;
		case 'query_one':
			
			break;
		case 'update':
			$goods_id = $_POST['goods_id'];
			$goods_title = $_POST['goods_title'];
			$goods_price = $_POST["goods_price"];
			$goods_coupon_price = $_POST["goods_coupon_price"];
			$goods_coupon_address = $_POST["goods_coupon_address"];
			$goods_keywords = $_POST['goods_keywords'];
			$goods_address = $_POST['goods_address'];
			$goods_pic_path = $_POST['goods_pic_path'];
			
			if ($goods_pic_path == 'upload/C:WindowsTempphpBB1F.tmp') {
				$goods_pic_path = 'upload/'.$_FILES["goods_pic"]["name"];
			}
			if ($goods_pic_path !== 'upload/'.$_FILES["goods_pic"]["name"]) {
				$goods_pic_path = 'upload/'.$_FILES["goods_pic"]["name"];
			}
			
			move_uploaded_file($_FILES["goods_pic"]["tmp_name"], "upload/" . $_FILES["goods_pic"]["name"]);


			$update_values = array(
				'goods_title' => "'".$goods_title."'" ,
				'goods_keywords' => "'".$goods_keywords."'" ,
				'goods_price' => "'".$goods_price."'",
				'goods_coupon_price' => "'".$goods_coupon_price."'",
				'goods_coupon_address' => "'".$goods_coupon_address."'",
				'goods_address'	=> "'".$goods_address."'",
				'goods_pic_path' => "'".$goods_pic_path."'",
				'goods_addtime' => "'".date('y-m-d H:i:s',time())."'"
			);
			$model = $db_obj->sqlUpdate("goods_list", $goods_id, $update_values);
			header("Location:goods_edit.php");
			break;
		case 'delete':
			$goods_id = $_GET['id'];
			$db_obj->sqlDelete("goods_list", $goods_id);
			header("Location:goods_edit.php");
			break;
		default:
			# code...
			break;
	}

?>