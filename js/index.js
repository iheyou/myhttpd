$(function(){
	$('.menu-one-a').click(function(){
		if ($(this).parents('li').children('ul').css('display')=='none') {
			$(this).siblings('ul').slideDown(100).children('li');
			// $(this).css({
			// 	color: 'white',
			// });
			$(this).parents('li').siblings('li').children('ul').slideUp(100).children('li');
			// $(this).parents('li').removeClass('menu-one').addClass('selection');
			// $(this).parents('li').siblings('li').addClass('menu-one').children('a').css('color', '#007FFF');;
		} else {
			$(this).siblings('ul').slideUp(100);
		}
	});       

	var buttons = $('.menu-two');
	buttons.on('click', function(event) {
		buttons.removeClass('menu-two-selet').addClass('menu-two');
		$(this).removeClass('menu-two').addClass('menu-two-selet');
	});
	
	$('#button1').click(function(){
		getGoodsAll();
	});
	$('#button2').click(function(){
		addGoods();
	});
});

function getGoodsAll(page) {
	page = page?page:1;
	// $.ajax({
	// 	url: '../php/action.php?action=query&page=1',
	// 	type: 'get',
	// 	dataType: 'json',
	// })
	// .done(function() {
	// 	// console.log("success");
	// 	alert("success");
	// })
	// .fail(function() {
	// 	// console.log("error");
	// 	alert("error");
	// })
	// .always(function() {
	// 	// console.log("complete");
	// 	alert("complete");
	// });

	$.getJSON('../php/action.php?action=query&page='+page, function(json, textStatus) {
		alert(textStatus);
		var htm = '<table><tr>' + 
				'<th>商品id</th>'+
				'<th>商品标题</th>'+
				'<th>关键词</th>'+
	            '<th>价格</th>'+
	            '<th>优惠券价格</th>'+
	            '<th>优惠券地址</th>'+
	            '<th>商品地址</th>'+
				'<th>商品图片</th>'+
				'<th>添加时间</th>'+
				'<th>编辑</th>'+
				'</tr>';
		$.each(json.data, function(index, val) {
			htm += '<tr>';
			$.each(val, function(index, val){
				if (index=='goods_pic_path') {
					htm += '<td><image class="image" src="'+val+'">' + '</image></td>';
				} else {
					htm += "<td>" + val + "</td>";
				}
			});
		});
		htm += '</tr></table><br>';
		pages = json.pages;
		var back_page = parseInt(pages.current_page)-1;
		var next_page = parseInt(pages.current_page)+1;
		var max_page = parseInt(pages.maxPages);
		pageHtml = '<div id="page">当前页' +pages.current_page+'/'+pages.maxPages +
			'<a href="javascript:getGoodsAll(1)">首页</a> ' +
			'<a href="javascript:getGoodsAll(' +back_page+')">上一页</a> '+
			'<a href="javascript:getGoodsAll(' +next_page+')">下一页</a> '+
			'<a href="javascript:getGoodsAll('+max_page+')">末页</a> '+'</div>';
		$('#content').html(htm);
		$('#pages').html(pageHtml);
		$(window).scrollTop(0,0);
	});
}

function addGoods() {
	$.get('../php/goods_add_dataoke.php', function(data) {
		alert(data);
	});
}