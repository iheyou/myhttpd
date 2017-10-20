<!DOCTYPE html>
<html>
<head>
	<title>数据库管理</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/dbmanager.css">
</head>
<body>
	<div>
		<form action="action.php?action=add" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			<table border="1" cellspacing="0">
				<tr>
					<th align="right">标题：</th>
					<td><input type="text" name="goods_title" size="100"></td>
				</tr>
				<tr>
					<th align="right">关键字：</th>
					<td><input type="text" name="goods_keywords" size="100"></td>
				</tr>
				<tr>
					<th align="right">价格：</th>
					<td><input type="text" name="goods_price" size="100"></td>
				</tr>
				<tr>
					<th align="right">优惠券：</th>
					<td><input type="text" name="goods_coupon_price" size="100"></td>
				</tr>
				<tr>
					<th align="right">优惠券地址：</th>
					<td><input type="text" name="goods_coupon_address" size="100"></td>
				</tr>
				<tr>
					<th align="right">商品地址：</th>
					<td><input type="text" name="goods_address" size="100"></td>
				</tr>
				<tr>
					<th align="right">图片：</th>
					<td><input type="file" name="goods_pic"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="添加">
						<input type="reset" value="清除">
					</td>
				</tr>
		</table>
		</form>
	</div>
</body>
</html>