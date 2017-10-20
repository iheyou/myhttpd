<!DOCTYPE html>
<html>
<head>
	<title>数据库管理</title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/dbmanager.css">
	<script type="text/javascript">
		function dodel(gid) {
			if (confirm("确定删除？")) {
				window.location="action.php?action=delete&id=" + gid;
			}
		}
	</script>
</head>
<body>
	<div id="edit" >
			<h2 style="color: blue;">所有商品</h2>
			<br>
			<table  border="1" cellspacing="0" style="font-size: 16px;">
				<tr>
					<th width="100px">商品标题</th>
					<th width="50px">关键词</th>
                    <th>价格</th>
                    <th>优惠券</th>
					<th>商品图片</th>
					<th>添加时间</th>
					<th width="50px" align="center">编辑</th>
				</tr>
				<?php
    				require_once 'hy_database.php';
                    $page = $_GET['page'];
    				$database = new hy_database();

    				$model = $database->sqlSelect_all("goods_list",$page);
    				if($model){
    					$list_arr = $model['data'];
    	
    					foreach ($list_arr as $key => $value) {
    						echo "<tr>";
    						$gid;
    						while (list($key,$val)=each($value)) {
        						if ($key == "goods_id") {
        							$gid = $val;
        						} elseif ($key == "goods_pic_path") {
        							echo '<td width="200">';
        							echo '<img style="width:150px;"  src="'.$val.'"></img>';
        							echo '</td>';
        						} elseif ($key == "goods_address" || $key == "goods_coupon_address") {

                                } else {
        						    echo "<td>".$val."</td>";	
        						}
        					}
        					echo "<td>";
        					echo "<a href='javascript:dodel(".$gid.")'>删除</a>";
        					echo "<br>";
        					echo "<a href='goods_update.php?id=".$gid."'>修改</a>";
        					echo "</td>";
        					echo "</tr><br/>";
                            echo "";
    					}
    				} else {
        				echo '查询失败';
    				}
				?>
			</table>
            <?php 
                $pageArr = $model['pages'];
                $forward = $pageArr['current_page'] - 1;
                $back = $pageArr['current_page'] + 1;
                echo "<br/><br/>";
                echo "当前".$pageArr['current_page']."/".$pageArr['maxPages']."页 ";
                echo "<a href='goods_edit.php?page=1'>首页</a> ";
                echo "<a href='goods_edit.php?page=".$forward."'>上一页</a> ";
                echo "<a href='goods_edit.php?page=".$back."'>下一页</a> ";
                echo "<a href='goods_edit.php?page=".$pageArr['maxPages']."'>末页</a> ";
             ?>
	</div>
</body>
</html>