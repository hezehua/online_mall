<?php	
	require_once 'include.php';
	connect();
	$allgoods=getallgoods();
	$allclassify=getallclassify();
	if(!($allgoods && is_array($allgoods))){
		alertmes('抱歉，网站维护中', 'http://acm.xatu.edu.cn');
	}
//	if(isset($_SESSION['username']))echo $_SESSION['username'];	
?>

<!DOCTYPE html>
<html>

	<head> 
		<meta charset="utf-8" />
		<title>仿慕课商城首页</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript" language="javascript">
 			//加入收藏
		 	function AddFavorite() {
	            var url = window.location;
	            var title = document.title;
	            var ua = navigator.userAgent.toLowerCase();
	            if (ua.indexOf("360se") > -1) {
	                alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
	            }
	            else if (ua.indexOf("msie 8") > -1) {
	                window.external.AddToFavoritesBar(url, title); //IE8
	            }
	            else if (document.all) {
	                try {
	                    window.external.addFavorite(url, title);
	                } catch (e) {
	                    alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	                }
	            }
	            else if (window.sidebar) {
	                window.sidebar.addPanel(title, url, "");
	            }
	            else {
	                alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	            }
	        }
 
		    //设为首页		 
		    function SetHome(url){ 
		        if (document.all) { 
		            document.body.style.behavior='url(#default#homepage)';
		               document.body.setHomePage(url);
		        }else{ 
		            alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!"); 
		        }
		 
		    }
 
		</script>
	</head>

	<body>
		<!--头部-->
		<header class="headerBar">
			<div class="topBar">
				<div class="comWidth">
					<div class="leftArea">
						<a href="" onclick="AddFavorite()" class="collection">收藏OnLine Mall</a>
						<a href="" onclick="SetHome(window.location)">设为首页</a>
					</div>
					<div class="rightArea">
						欢迎来到OnLine Mall
						<?php 
							if(isset($_COOKIE['username']))echo "<a href='userinfo.php'>".$_COOKIE['username']."</a>";
							elseif(isset($_SESSION['username']))echo "<button type=\"button\"><a href='userinfo.php'>".$_SESSION['username']."</a>";
							else echo "<a href='login.php'>[登录]</a><a href='register.php'>[注册]</a>";
						?>
						</button>
					</div>
				</div>
			</div>
			<div class="logoBar">
				<div class="comWidth">
					<div class="logo fl">
						<a href=""><img src="img/index/logo.fw.png" alt="OnLine Mall商城" /></a>
					</div>
					<div class="search_box fl">
						<form action="" method="post">
							<input type="text" name="searchText" id="searchText" value="" class="search_text fl" />
							<input type="button" name="searchBtn" id="searchBtn" value="搜 索" class="search_btn fr" />
						</form>
					</div>
					<div class="shopCar fr">
						<span class="shopText fl">购物车</span>
						<span class="shopNum fr">0</span>
					</div>
				</div>
			</div>
			<div class="headNav">
				<div class="comWidth">
					<div class="shopClass fl">
						<h3>全部商品分类<i></i></h3>
						<div class="shopClass_show">
							<dl class="shopClass_item">
								<dt>
									<h3><a href="" class="b">手机 </a><a href="" class="b">数码 </a><a href="" class="b alink">合约机</a></h3>
								</dt>
								<div class="item-list clearfix">
									<div class="close">x</div>
									<div class="subitem">
										<dl class="fore1">
											<dt><a href="#">智能手机</a></dt>
											<dd><em><a href="#">品牌 </a></em><em><a href="#">像素 </a></em><em><a href="#">摄像 </a></em><em><a href="#">影音/视频 </a></em><em><a href="#">通话 </a></em><em><a href="#">待机 </a></em><em><a href="#">俱乐部</a></em></dd>
										</dl>
										<dl class="fore2">
											<dt><a href="#">数字音乐</a></dt>
											<dd><em><a href="#">通俗流行</a></em><em><a href="#">古典音乐</a></em><em><a href="#">摇滚说唱</a></em><em><a href="#">爵士蓝调</a></em><em><a href="#">乡村民谣</a></em><em><a href="#">有声读物</a></em></dd>
										</dl>
										<dl class="fore3">
											<dt><a href="#">音像</a></dt>
											<dd><em><a href="#">音乐</a></em><em><a href="#">影视</a></em><em><a href="#">教育音像</a></em><em><a href="#">游戏</a></em></dd>
										</dl>
										<dl class="fore4">
											<dt>文艺</dt>
											<dd><em><a href="#">小说</a></em><em><a href="#">文学</a></em><em><a href="#">青春文学</a></em><em><a href="#">传记</a></em><em><a href="#">艺术</a></em></dd>
										</dl>
										<dl class="fore5">
											<dt>人文社科</dt>
											<dd><em><a href="#">历史</a></em><em><a href="#">心理学</a></em><em><a href="#">政治/军事</a></em><em><a href="#">国学/古籍</a></em><em><a href="#">哲学/宗教</a></em><em><a href="#">社会科学</a></em></dd>
										</dl>
									</div>
								</div>
								<dd class="">
									<a href="">荣耀6 </a><a href="">单反相机 </a><a href="">智能设备</a>
								</dd>
							</dl>
							<dl class="shopClass_item">
								<dt>
									<h3><a href="" class="b">手机 </a><a href="" class="b">数码 </a><a href="" class="b alink">合约机</a></h3>
								</dt>
								<div class="item-list clearfix">
									<div class="close">x</div>
									<div class="subitem">
										<dl class="fore1">
											<dt><a href="#">电子书0</a></dt>
											<dd><em><a href="#">免费</a></em><em><a href="#">小说</a></em><em><a href="#">励志与成功</a></em><em><a href="#">婚恋/两性</a></em><em><a href="#">文学</a></em><em><a href="#">经管</a></em><em><a href="#">畅读VIP</a></em></dd>
										</dl>
										<dl class="fore2">
											<dt><a href="#">数字音乐</a></dt>
											<dd><em><a href="#">通俗流行</a></em><em><a href="#">古典音乐</a></em><em><a href="#">摇滚说唱</a></em><em><a href="#">爵士蓝调</a></em><em><a href="#">乡村民谣</a></em><em><a href="#">有声读物</a></em></dd>
										</dl>
										<dl class="fore3">
											<dt><a href="#">音像</a></dt>
											<dd><em><a href="#">音乐</a></em><em><a href="#">影视</a></em><em><a href="#">教育音像</a></em><em><a href="#">游戏</a></em></dd>
										</dl>
										<dl class="fore4">
											<dt>文艺</dt>
											<dd><em><a href="#">小说</a></em><em><a href="#">文学</a></em><em><a href="#">青春文学</a></em><em><a href="#">传记</a></em><em><a href="#">艺术</a></em></dd>
										</dl>
										<dl class="fore5">
											<dt>人文社科</dt>
											<dd><em><a href="#">历史</a></em><em><a href="#">心理学</a></em><em><a href="#">政治/军事</a></em><em><a href="#">国学/古籍</a></em><em><a href="#">哲学/宗教</a></em><em><a href="#">社会科学</a></em></dd>
										</dl>
										<dl class="fore6">
											<dt>经管励志</dt>
											<dd><em><a href="#">经济</a></em><em><a href="#">金融与投资</a></em><em><a href="#">管理</a></em><em><a href="#">励志与成功</a></em></dd>
										</dl>
										<dl class="fore7">
											<dt>生活</dt>
											<dd><em><a href="#">家庭与育儿</a></em><em><a href="#">旅游/地图</a></em><em><a href="#">烹饪/美食</a></em><em><a href="#">时尚/美妆</a></em><em><a href="#">家居</a></em><em><a href="#">婚恋与两性</a></em><em><a href="#">娱乐/休闲</a></em><em><a href="#">健身与保健</a></em><em><a href="#">动漫/幽默</a></em><em><a href="#">体育/运动</a></em></dd>
										</dl>
									</div>
								</div>
								<dd class="">
									<a href="">荣耀6 </a><a href="">单反相机 </a><a href="">智能设备</a>
								</dd>
							</dl>
							<dl class="shopClass_item">
								<dt>
									<h3><a href="" class="b">手机 </a><a href="" class="b">数码 </a><a href="" class="b alink">合约机</a></h3>
								</dt>
								<div class="item-list clearfix">
									<div class="close">x</div>
									<div class="subitem">
										<dl class="fore1">
											<dt><a href="#">电子书0</a></dt>
											<dd><em><a href="#">免费</a></em><em><a href="#">小说</a></em><em><a href="#">励志与成功</a></em><em><a href="#">婚恋/两性</a></em><em><a href="#">文学</a></em><em><a href="#">经管</a></em><em><a href="#">畅读VIP</a></em></dd>
										</dl>
										<dl class="fore2">
											<dt><a href="#">数字音乐</a></dt>
											<dd><em><a href="#">通俗流行</a></em><em><a href="#">古典音乐</a></em><em><a href="#">摇滚说唱</a></em><em><a href="#">爵士蓝调</a></em><em><a href="#">乡村民谣</a></em><em><a href="#">有声读物</a></em></dd>
										</dl>
										<dl class="fore3">
											<dt><a href="#">音像</a></dt>
											<dd><em><a href="#">音乐</a></em><em><a href="#">影视</a></em><em><a href="#">教育音像</a></em><em><a href="#">游戏</a></em></dd>
										</dl>
										<dl class="fore4">
											<dt>文艺</dt>
											<dd><em><a href="#">小说</a></em><em><a href="#">文学</a></em><em><a href="#">青春文学</a></em><em><a href="#">传记</a></em><em><a href="#">艺术</a></em></dd>
										</dl>
										<dl class="fore5">
											<dt>人文社科</dt>
											<dd><em><a href="#">历史</a></em><em><a href="#">心理学</a></em><em><a href="#">政治/军事</a></em><em><a href="#">国学/古籍</a></em><em><a href="#">哲学/宗教</a></em><em><a href="#">社会科学</a></em></dd>
										</dl>
										<dl class="fore6">
											<dt>经管励志</dt>
											<dd><em><a href="#">经济</a></em><em><a href="#">金融与投资</a></em><em><a href="#">管理</a></em><em><a href="#">励志与成功</a></em></dd>
										</dl>
										<dl class="fore7">
											<dt>生活</dt>
											<dd><em><a href="#">家庭与育儿</a></em><em><a href="#">旅游/地图</a></em><em><a href="#">烹饪/美食</a></em><em><a href="#">时尚/美妆</a></em><em><a href="#">家居</a></em><em><a href="#">婚恋与两性</a></em><em><a href="#">娱乐/休闲</a></em><em><a href="#">健身与保健</a></em><em><a href="#">动漫/幽默</a></em><em><a href="#">体育/运动</a></em></dd>
										</dl>
									</div>
								</div>
								<dd class="">
									<a href="">荣耀6 </a><a href="">单反相机 </a><a href="">智能设备</a>
								</dd>
							</dl>
							<dl class="shopClass_item">
								<dt>
									<h3><a href="" class="b">手机 </a><a href="" class="b">数码 </a><a href="" class="b alink">合约机</a></h3>
								</dt>
								<div class="item-list clearfix">
									<div class="close">x</div>
									<div class="subitem">
										<dl class="fore1">
											<dt><a href="#">电子书0</a></dt>
											<dd><em><a href="#">免费</a></em><em><a href="#">小说</a></em><em><a href="#">励志与成功</a></em><em><a href="#">婚恋/两性</a></em><em><a href="#">文学</a></em><em><a href="#">经管</a></em><em><a href="#">畅读VIP</a></em></dd>
										</dl>
										<dl class="fore2">
											<dt><a href="#">数字音乐</a></dt>
											<dd><em><a href="#">通俗流行</a></em><em><a href="#">古典音乐</a></em><em><a href="#">摇滚说唱</a></em><em><a href="#">爵士蓝调</a></em><em><a href="#">乡村民谣</a></em><em><a href="#">有声读物</a></em></dd>
										</dl>
										<dl class="fore3">
											<dt><a href="#">音像</a></dt>
											<dd><em><a href="#">音乐</a></em><em><a href="#">影视</a></em><em><a href="#">教育音像</a></em><em><a href="#">游戏</a></em></dd>
										</dl>
										<dl class="fore4">
											<dt>文艺</dt>
											<dd><em><a href="#">小说</a></em><em><a href="#">文学</a></em><em><a href="#">青春文学</a></em><em><a href="#">传记</a></em><em><a href="#">艺术</a></em></dd>
										</dl>
										<dl class="fore5">
											<dt>人文社科</dt>
											<dd><em><a href="#">历史</a></em><em><a href="#">心理学</a></em><em><a href="#">政治/军事</a></em><em><a href="#">国学/古籍</a></em><em><a href="#">哲学/宗教</a></em><em><a href="#">社会科学</a></em></dd>
										</dl>
										<dl class="fore6">
											<dt>经管励志</dt>
											<dd><em><a href="#">经济</a></em><em><a href="#">金融与投资</a></em><em><a href="#">管理</a></em><em><a href="#">励志与成功</a></em></dd>
										</dl>
										<dl class="fore7">
											<dt>生活</dt>
											<dd><em><a href="#">家庭与育儿</a></em><em><a href="#">旅游/地图</a></em><em><a href="#">烹饪/美食</a></em><em><a href="#">时尚/美妆</a></em><em><a href="#">家居</a></em><em><a href="#">婚恋与两性</a></em><em><a href="#">娱乐/休闲</a></em><em><a href="#">健身与保健</a></em><em><a href="#">动漫/幽默</a></em><em><a href="#">体育/运动</a></em></dd>
										</dl>
									</div>
								</div>
								<dd class="">
									<a href="">荣耀6 </a><a href="">单反相机 </a><a href="">智能设备</a>
								</dd>
							</dl>
							<dl class="shopClass_item">
								<dt>
									<h3><a href="" class="b">图书 </a><a href="" class="b">音像 </a><a href="" class="b alink">数字商品</a></h3>
								</dt>
								<div class="item-list clearfix">
									<div class="close">x</div>
									<div class="subitem">
										<dl class="fore1">
											<dt><a href="#">电子书0</a></dt>
											<dd><em><a href="#">免费</a></em><em><a href="#">小说</a></em><em><a href="#">励志与成功</a></em><em><a href="#">婚恋/两性</a></em><em><a href="#">文学</a></em><em><a href="#">经管</a></em><em><a href="#">畅读VIP</a></em></dd>
										</dl>
										<dl class="fore2">
											<dt><a href="#">数字音乐</a></dt>
											<dd><em><a href="#">通俗流行</a></em><em><a href="#">古典音乐</a></em><em><a href="#">摇滚说唱</a></em><em><a href="#">爵士蓝调</a></em><em><a href="#">乡村民谣</a></em><em><a href="#">有声读物</a></em></dd>
										</dl>
										<dl class="fore3">
											<dt><a href="#">音像</a></dt>
											<dd><em><a href="#">音乐</a></em><em><a href="#">影视</a></em><em><a href="#">教育音像</a></em><em><a href="#">游戏</a></em></dd>
										</dl>
										<dl class="fore4">
											<dt>文艺</dt>
											<dd><em><a href="#">小说</a></em><em><a href="#">文学</a></em><em><a href="#">青春文学</a></em><em><a href="#">传记</a></em><em><a href="#">艺术</a></em></dd>
										</dl>
										<dl class="fore5">
											<dt>人文社科</dt>
											<dd><em><a href="#">历史</a></em><em><a href="#">心理学</a></em><em><a href="#">政治/军事</a></em><em><a href="#">国学/古籍</a></em><em><a href="#">哲学/宗教</a></em><em><a href="#">社会科学</a></em></dd>
										</dl>
										<dl class="fore6">
											<dt>经管励志</dt>
											<dd><em><a href="#">经济</a></em><em><a href="#">金融与投资</a></em><em><a href="#">管理</a></em><em><a href="#">励志与成功</a></em></dd>
										</dl>
										<dl class="fore7">
											<dt>生活</dt>
											<dd><em><a href="#">家庭与育儿</a></em><em><a href="#">旅游/地图</a></em><em><a href="#">烹饪/美食</a></em><em><a href="#">时尚/美妆</a></em><em><a href="#">家居</a></em><em><a href="#">婚恋与两性</a></em><em><a href="#">娱乐/休闲</a></em><em><a href="#">健身与保健</a></em><em><a href="#">动漫/幽默</a></em><em><a href="#">体育/运动</a></em></dd>
										</dl>
									</div>
								</div>
								<dd class="">
									<a href="">荣耀6 </a><a href="">单反相机 </a><a href="">智能设备</a>
								</dd>
							</dl>
						</div>

						<script type="text/javascript" src="js/jquery.min.js"></script>
						<script type="text/javascript">
							$('.shopClass_show > .shopClass_item').hover(function(){
								var eq = $('.shopClass_show > .shopClass_item').index(this),				//获取当前滑过是第几个元素
									h = $('.shopClass_show').offset().top,						//获取当前下拉菜单距离窗口多少像素
									s = $(window).scrollTop(),									//获取游览器滚动了多少高度
									i = $(this).offset().top,									//当前元素滑过距离窗口多少像素
									item = $(this).children('.item-list').height(),				//下拉菜单子类内容容器的高度
									sort = $('.shopClass_show').height();						//父类分类列表容器的高度
								
								if ( item < sort ){												//如果子类的高度小于父类的高度
									if ( eq == 0 ){
										$(this).children('.item-list').css('top', (i-h));
									} else {
										$(this).children('.item-list').css('top', (i-h)+1);
									}
								} else {
									if ( s > h ) {												//判断子类的显示位置，如果滚动的高度大于所有分类列表容器的高度
										if ( i-s > 0 ){											//则 继续判断当前滑过容器的位置 是否有一半超出窗口一半在窗口内显示的Bug,
											$(this).children('.item-list').css('top', (s-h)+2 );
										} else {
											$(this).children('.item-list').css('top', (s-h)-(-(i-s))+2 );
										}
									} else {
										$(this).children('.item-list').css('top', 3 );
									}
								}	
					
								$(this).addClass('hover');
								$(this).children('.item-list').css('display','block');
							},function(){
								$(this).removeClass('hover');
								$(this).children('.item-list').css('display','none');
							});
					
							$('.item > .item-list > .close').click(function(){
								$(this).parent().parent().removeClass('hover');
								$(this).parent().hide();
							});
						</script>
					</div>
					<ul class="ulNav fl">
						<li>
							<a href="filtrate.html" class="">数码城</a>
						</li>
						
						<li><a href="">团购</a></li>
						<li><a href="">发现</a></li>
						<li><a href="">二手特卖</a></li>
						<li><a href="">名品汇</a></li>
					</ul>
				</div>

			</div>
		</header>
		<!--正文-->
		<div class="banner comWidth clearfix">
			<div class="banner_bar banner_big">
				<ul class="imgBox">
					<li>
						<a href=""><img src="img/banner/banner_01.png" alt="banner" /></a>
					</li>
					<li>
						<a href=""><img src="img/banner/banner_02.fw.png" alt="banner" /></a>
					</li>
				</ul>
				<div class="imgNum">
					<a href="" class="active"></a>
					<a href=""></a>
					<a href=""></a>
					<a href=""></a>
				</div>
			</div>
		</div>
	<?php foreach($allclassify as $classify){?>	
		<div class="shopTit comWidth">
			<span class="icon"></span>
			<h3><?php echo $classify['c_name'];?></h3>
			<a href="" class="more">更多&gt;&gt;</a>
		</div>
		<div class="shopList comWidth clearfix">
			<div class="leftArea">
				<div class="banner_bar banner_small">
					<ul class="imgBox">
						<li>
							<a href=""><img src="img/index/leftpic_01.fw.png" alt="banner" /></a>
						</li>
						<li>
							<a href=""><img src="img/index/leftpic_02.fw.png" alt="banner" /></a>
						</li>
					</ul>
					<div class="imgNum">
						<a href="" class="active"></a>
						<a href=""></a>
						<a href=""></a>
					</div>
				</div>
			</div>
			<div class="rightArea">
				<div class="shoplist_top">
					<?php 
						$somegoods=getgoodsbycid($classify['id']);
//						print_r($somegoods);
						if(($somegoods && is_array($somegoods))){							
							foreach($somegoods as $goods){
								$goodsimgs=getimgbyid($goods['id']);
								foreach($goodsimgs as $goodsimg){
									$path=$goodsimg['album_path'];
									$str=explode('/', $path);
									$path=$str[1]."/".$str[2];
//									print_r($str);
									if(in_array('upload', $str)){
					?>
					<div class="shoplist_item clearfix">
						<div class="shopimg">
							<a href="productintroduce.php?id=<?php echo $goods['id']?>" target="_blank"><img  src="<?php echo $path;?>" /></a>
						</div>
						<h3><?php echo $goods['g_name'];?></h3>
						<p>￥<?php echo $goods['i_price'];?></p>
					</div>
					<?php
									}
								} 
							}
						}	
					?>									
				</div>
				<div class="shoplist_sm">
					<?php 
						$smallgoods=getsmallgoodsbycid($classify['id']);
//						print_r($smallgoods);
						if(($smallgoods && is_array($smallgoods))){							
							foreach($smallgoods as $goods){
								$smallgoodsimgs=getimgbyid($goods['id']);
								foreach($smallgoodsimgs as $goodsimg){
									$path=$goodsimg['album_path'];
									$str=explode('/', $path);
									$path=$str[1]."/".$str[2];
									if(in_array('upload', $str)){
					?>
					<div class="shopitem_sm">
						<div class="shopitem_img">
							<a href="productintroduce.php?id=<?php echo $goods['id']?>" target="_blank"><img  src="<?php echo $path;?>"</a>
						</div>
						<div class="shopitem_text">
						<p><?php echo $goods['g_name'];?></p>
						<h3>￥<?php echo $goods['i_price'];?></h3>
						</div>
					</div>
					<?php
									}
								} 
							}
						}	
					?>
				</div>
			</div>
		</div>
		
		
	<?php }?>	
		<div class="hr_25"></div>
		<!--尾部-->
		<div class="marginarea"></div>
		<footer>
			<p><a href="">慕课简介</a><i>|</i><a href="">慕课公告</a><i>|</i><a href="">招纳贤士</a><i>|</i><a href="">联系我们</a><i>|</i><a href="">客服热线：400-675-1234</a></p>
			<p>Copyright &copy; 2006 - 2014 慕课版权所有&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
			<p class="footimg">
				<a href=""><img src="img/index/footer_01.fw.png" alt="" /></a>
				<a href=""><img src="img/index/footer_01.fw.png" alt="" /></a>
				<a href=""><img src="img/index/footer_01.fw.png" alt="" /></a>
				<a href=""><img src="img/index/footer_01.fw.png" alt="" /></a>
			</p>
		</footer>
	</body>

</html>