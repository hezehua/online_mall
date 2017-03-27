<?php
require_once '../include.php';
checklogined();
$name="";
if(isset($_SESSION['adminname']))$name=$_SESSION['adminname'];
elseif(isset($_COOKIE['adminname']) ) $name=$_COOKIE['adminname'];
else{
	$name="未登录";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			body{
				overflow: hidden;
			}
			*{
				padding: 0;
				margin: 0;
			}
			#welcome{
				width: 100%;
				height: 50px;
				float: left;
				padding-left:50px;
				line-height: 50px;
				background-color: #8892BF;
			}
			#title{
				font-style: italic;
			}
			.adminname{
				float: right;
				margin-right: 100px;
				font-size: 20px;
				color: #FFF;
				line-height: 50px;
				font-weight: 100;
			}
			.adminname:before{
				font-weight: 100;
				content: "hi, ";
				font-size: 16px;
				color: #CFD3E3;
			}
			#control a{
				color: #FFF;
				text-decoration: none;
			}
			.arrow{
				display: block;
				float: right;
				width: 0;
				height: 0;
				/*background-color: #FFF;*/
				/*margin-top: 10px;*/
				border-right: 40px solid #FFF;
				border-top: 10px solid transparent;
				border-bottom: 10px solid transparent;
				display: none;
			}
			ul{
				width: 80%;
				list-style:none;
				padding: 0;
				float: left;
				
				margin-left: 10%;
				/*margin-bottom: 10px;*/
				/*font-weight: bold;*/
				border-radius:20px;
			}
			#control ul li{
				width: 100%;
				float: left;
				/*margin: 4px;*/
				border-bottom: 1px dashed #AE508D;
				clear: both;
			}
			ul li span{
				font-weight: bold;
				
			}
			.li_ul{
				width: 100%;				
			}
			.li_ul li{
				width: 100%;
				cursor: pointer;
			}
			
			.li_ul li:hover a{
				background-color: #AE5074;				
			}
			.li_ul li:hover .arrow{
				display: block;
				
			}
			h1 span{
				/*display: inline-block;*/				
				margin-left: 1%;
			}
			.li_ul li a{
				display: block;
				/*width: 100%;*/
				/*margin: 10px;*/	
				float: left;
				clear: both;
				
			}
			a[class='logout']{
				margin: 0;
				padding: 0;
				display: block;
				float: right;
				margin-right: 100px;
			}
			.logout{
				color: #CCCCCC;
				font-size: 24px;
				line-height: 50px;				
			}
			.logout:hover{
				color: red;
			}
			#control{
				margin: 0;
				padding: 20px 0;
				/*border: 3px solid #CCC;*/
				float: left;
				width: 20%;
				height: 1000px;
				/*border-radius:20px;*/
				background-color: #2C2C2C;
				color: #FFF;
				font-size: 18px;
			}
			iframe{
				float: left;			
				width: 70%;
				height: 600px;
				border: none;
				
			}
			#right{
				float: right;			
				width: 10%;
				height: 700px;
				border: none;
				background-color: #2C2C2C;
			}
			#right ul{
				width: 100%;
				list-style: none;
				padding: 0;
				margin: 0;
			}
			#right ul li{
				margin-top: 10px;
				text-align: center;
				border-bottom:1px dashed #FFF;
			}
			#right ul li a{
				display: block;
				width: 100%;
				text-decoration: none;
				color: #CFD3E3;
			}
		</style>
		<script type="text/javascript">
			window.onload=showselect;
			function showselect(){
				var order=document.getElementById('order');
				order.onclick=function(){
					alert("无法使用");
					return false;
				}							
			}
		</script>
	</head>
	<body>
		<h1 id="welcome"><span id="title">OnLine Mall</span> <span class="adminname"><?php echo $name;?></span><a class='logout' href="adminaction.php?act=logout">退出</a></h1>
		<br />
		<div id="control">
			<ul id="mainul">
				<li><span>订单管理</span>
					<ul class="li_ul" id="order">
						<li><a href="addadmin.php" target="content" onclick="showselect();">添加订单</a><span class="arrow"></span></li>
						<li><a href="listadmin.php" target="content">订单列表</a><span class="arrow"></span></li>
					</ul>
				</li>	
				<li><span>商品管理</span>
					<ul class="li_ul">
						<li><a href="addgoods.php" target="content">添加商品</a><span class="arrow"></span></li>
						<li><a href="listgoods.php" target="content">商品列表</a><span class="arrow"></span></li>
					</ul>
				</li>				
				<li><span>分类管理</span>
					<ul class="li_ul">
						<li><a href="addclassify.php" target="content">添加分类</a><span class="arrow"></span></li>
						<li><a href="listclassify.php" target="content">分类列表</a><span class="arrow"></span></li>
					</ul>
				</li>
				<li><span>用户管理</span>
					<ul class="li_ul">
						<li><a href="adduser.php" target="content">添加用户</a><span class="arrow"></span></li>
						<li><a href="listuser.php" target="content">用户列表</a><span class="arrow"></span></li>
					</ul>
				</li>	
				<li><span>管理员管理</span>
					<ul class="li_ul">
						<li><a href="addadmin.php" target="content">添加管理员</a><span class="arrow"></span></li>
						<li><a href="listadmin.php" target="content">管理员列表</a><span class="arrow"></span></li>
					</ul>
				</li>	
				<li><span>商品图片管理</span>
					<ul class="li_ul">
						<li><a href="addgoodsimage.php" target="content">添加商品图片</a><span class="arrow"></span></li>
						<li><a href="listgoodsimage.php" target="content">商品图片列表</a><span class="arrow"></span></li>
					</ul>
				</li>
			</ul>
		</div>
		
		<iframe  name="content" src="listadmin.php"></iframe>
		
		<div id="right">
			<ul>
				<li>
					<a href="../index.php">预览</a>
				</li>
				
			</ul>
		</div>
	</body>
</html>