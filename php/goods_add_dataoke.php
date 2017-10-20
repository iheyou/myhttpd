<?php 
	require_once("hy_database.php");
	$json = file_get_contents("http://api.dataoke.com/index.php?r=Port/index&type=paoliang&appkey=6vj196du5m&v=2");
	$model = json_decode($json, ture);
	$mm = $model['result'];
	$m = count($mm);
	$obj_db = new hy_database();
	date_default_timezone_set('Asia/Shanghai');
	$data = array();

	for ($i=0; $i < count($mm); $i++) { 
		$item = $mm[$i];
		$itemArr = array(
				'goods_title' => "'".$item['Title']."'" ,
				'goods_keyword' => "'".$item['D_title']."'" ,
				'goods_price' => "'".$item['Org_Price']."'",
				'goods_coupon_price' => "'".$item['Quan_price']."'",
				'goods_coupon_address' => "'".$item['Quan_link']."'",
				'goods_address'	=> "'".$item['ali_click']."'",
				'goods_pic_path' => "'".$item['Pic']."'",
				'goods_addtime' => "'".date('y-m-d H:i:s',time())."'",
				'goods_source' => "'".$item['IsTmall']."'",
				'goods_saleValume' => "'".$item['Sales_num']."'",
				'goods_quan_surplus' => "'".$item['Quan_surplus']."'",
				'goods_quan_receive' => "'".$item['Quan_receive']."'",
				'goods_quan_condition' => "'".$item['Quan_condition']."'",
				'goods_introduce' => "'".$item['Introduce']."'"
			);
		$data[$i] = $obj_db->sqlInsert("goods_list", $itemArr);
	}
	$count = 0;
	for ($i=0; $i < count($data); $i++) { 
		$textstatus = $data[$i];
		if ($textstatus === "添加成功") {
			$count += 1;
		}
	}
	echo "添加成功：".$count."条.";
	echo "添加失败：".(count($data)-$count)."条";
 ?>