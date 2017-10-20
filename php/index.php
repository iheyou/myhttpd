<!DOCTYPE html>
<html>
<head>
	<title>后台管理系统</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<div id="pagewrap">
		<header id="header-main">
			<h1>后台管理系统</h1>
		</header>
		<aside id="left">
			<div id="user">
				
			</div>
			<div id="accordion">
				<ul>
					<li class="menu-one">
						<a class="menu-one-a" href="#">账户管理</a>
						<ul>
							<li class="menu-two"><a class="#" href="#">会员管理</a></li>
							<li class="menu-two"><a class="#" href="#">添加用</a></li>
						</ul>
					</li>
					<li class="menu-one">
						<a class="menu-one-a" href="#">分类管理</a>
						<ul>
							<li class="menu-two"><a id="button5" href="#">所有分类</a></li>
							<li class="menu-two"><a id="button4" href="#">添加分类</a></li>
						</ul>
					</li>
					<li class="menu-one">
						<a class="menu-one-a" href="#">商品管理</a>
						<ul>
							<li class="menu-two"><a id="button1" href="#">浏览商品</a></li>
							<li class="menu-two"><a id="button2" href="#">添加商品</a></li>
							<li class="menu-two"><a id="button3" href="#">批量添加</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</aside>
		<div id="content">
			<span id="loading">正在加载中。。。</span>
			<div><a href="#">主页</a></div>
		</div>
		<div id="pages">
			
		</div>
	</div>
</body>
</html>