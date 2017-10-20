$(function(){
    $('#login-jump').hover(function() {
		$(this).stop().animate({
			opacity: '1'
		}, 600);
	},	function () {
		$(this).stop().animate({
			opacity: '0.6'
		}, 1000);
	}).on('click', function () {
		$("body").append("<div id='mask'></div>");
		$("#mask").addClass("mask").fadeIn("slow");
		$("#login").fadeIn("slow");
		//关闭登录窗口
		$("#mask").click(function() {
			$("#login").fadeOut("fast");
			$("#mask").css({
				display: 'none'
			});
		});
	});
	$(".toTop").click(function(event) {
		$(window).scrollTop(0,0);
	});
});
$(document).ready(function() {
	var hash = location.hash;
	alert(hash);
	window.addEventListener
});

function hashChanged(hashObj){
	var newhash = hashObj.newURL.split('#')[1];
	var oldhash = hashObj.oldURL.split('#')[1];
	document.getElementById(oldhash).style.display = 'none';
	document.getElementById(newhash).style.display = 'block';
}
window.onhashchange = hashChanged;
window.onhashchange = function(){
	var hash = window.location.hash;
	changePage(hash);
}
function changePage(hash) {
	switch(hash){
		case '#':url='php/action.php';
		break;
		case '#www':url='www.html';
		break;
	}
	loadData(curr,url);
}

function loadData(curr,url) {
	var current_page = curr ? curr : 1;
	var table_name = "goods_list";
	var maxPages = 0;
	$.get(url, {
			"table_name": table_name,
			"page": current_page,
			"action": query
		},
		function(data,status) {
			objJson = jQuery.parseJSON(data);
			var html = '<ul>';
			alert('objJson');
	  		$.each(objJson.data, function(id, content) {
	  			// alert(content.goods_source);
				html +=	'<li><div class="item">' +  
					'<div><a href= "' + content.goods_address +
					'" target="_blank">' +
					'<img src="' + content.goods_pic_path + '" alt="图片暂时没有">' +
					'</a></div>';
				if (content.goods_source == 1) {
					html += '<img class="goods-sourceTmall"></img>'
				} else {
					html += '<img class="goods-sourceTaobao">'
				}
				html += '<a class="title-a" href="' + content.goods_address + 
					'" target="_blank">' + content.goods_title + '</a>' +
					'<div class="price"><span>原价</span><p>￥'+ content.goods_price +
					'</p></div>' +
					'<div class="couponPrice"><span>优惠券</span><p>￥'+ content.goods_coupon_price +
					'</p></div>' + 
					'<p class="quanNum">优惠券剩余&nbsp<span>'+ content.goods_quan_surplus + '</span>/' + (parseInt(content.goods_quan_surplus)+parseInt(content.goods_quan_receive)) +'</p>'
					'</div></li>';
	  		});
	  		html += '</ul>';
			$("#content-div").html(html);

			pages = objJson.pages;
			var back_page = parseInt(pages.current_page)-1;
			var next_page = parseInt(pages.current_page)+1;
			var max_page = parseInt(pages.maxPages);
			pageHtml = '<p>当前页' +pages.current_page+'/'+pages.maxPages +
				'<a href="javascript:loadData(1)">首页</a> ' +
				'<a href="javascript:loadData(' +back_page+')">上一页</a> '+
				'<a href="javascript:loadData(' +next_page+')">下一页</a> '+
				'<a href="javascript:loadData('+max_page+')">末页</a> '+'</p>';
			$('#pages-div').html(pageHtml);
			$(window).scrollTop(0,0);
	});
}

function getJson() {
	$.post("./php/api.php",function(data, status){
		objJson = jQuery.parseJSON(data);
		var html = '<ul>';
  		$.each(objJson.result, function(id, content){
  			html += '<li>' +  
				'<a href= "' + content.goods_address +'" target="_blank">' +
				'<img src="' + content.Pic + '" alt="">' +
				'</a>' +
				'<a class="title-a" href="' + content.ali_click + '" target="_blank">' + content.Title + '</a>' +
				'<div><p>原价￥'+ content.Org_Price +'<span>券后价￥'+ content.Price +'</span></p></div>' +
			 	'</li>'; 
  		});
  		html += '</ul>';
		$("#content-div").html(html);
	});
}