<!DOCTYPE html>
<html>
<head>
	<title>数据库管理</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/dbmanager.css">
</head>
<body>
	<center> 
	<h2 style="color: blue;">数据库管理</h2>
	<?php 
		include './menu.php';
		require_once 'hy_database.php';
		$db_obj = new hy_database();
		$model = $db_obj->sqlSelect("goods_list", $_GET['id']);
	?>

	<div >
		<form action="action.php?action=update" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			<input type="hidden" name="goods_id" value="<?php echo $_GET['id']; ?>">
			<input type="hidden" name="goods_pic_path" value="<?php echo $model['goods_pic_path']; ?>">
			<table border="1" align="center">
				<h2>编辑商品</h2>
				<tr>
					<th align="right">标题：</th>
					<td><input width="100px" type="text" name="goods_title" value="<?php echo $model['goods_title']; ?>" size="100"></td>
				</tr>
				<tr>
					<th align="right">关键字：</th>
					<td><input type="text" name="goods_keywords" value="<?php echo $model['goods_keywords']; ?>" size="100"></td>
				</tr>
				<tr>
					<th align="right">价格：</th>
					<td><input type="text" name="goods_price" value="<?php echo $model['goods_price']; ?>" size="100"></td>
				</tr>
				<tr>
					<th align="right">优惠券：</th>
					<td><input type="text" name="goods_coupon_price" value="<?php echo $model['goods_coupon_price']; ?>" size="100"></td>
				</tr>
				<tr>
					<th align="right">优惠券链接：</th>
					<td><input type="text" name="goods_coupon_address" value="<?php echo $model['goods_coupon_address']; ?>" size="100"></td>
				</tr>
				<tr>
					<th align="right">地址：</th>
					<td><input type="text" name="goods_address" value="<?php echo $model['goods_address']; ?>" size="100"></td>
				</tr>
				<tr>
					<th align="right">图片：</th>
					<td>
						<img width="200" src="http://free1zqcn89l.a14.80data.com/php/<?php echo $model['goods_pic_path']; ?>">
						<input type="file" name="goods_pic">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="更新">
						<input type="reset" value="清除">
					</td>
				</tr>
		</table>
		</form>
	</div>
	</center>
</body>
</html>
