<?php
//require_once 'mysql.php';
//connect();
////	
//	$sql="select * from mall_admin";
//	$rows=getresultnum($sql);	
//	//echo $rows;
//	$pagesize=1;
//	$page=0;
//	$pagenum=ceil($rows/$pagesize);
//	if(isset($_REQUEST['page']))$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
//	if($page<1 || $page == null ||!is_numeric($page)){
//		$page=1;
//	}
//	if($page>$pagenum)$page=$pagenum;
//	$offset=($page-1)*$pagesize;
//	$sql="select * from mall_admin limit {$offset},{$pagesize}";
//	$rows=fetchall($sql);
//	//print_r($rows);
//	foreach($rows as $row){
//		echo "编号为：{$row['id']}<br/>";
//		echo "管理员：{$row['username']}<hr/>";
//	}
////	echo $pagenum;
function showpage($page,$pagenum,$sep="&nbsp"){
//	$sep="&nbsp";
	$url=$_SERVER["PHP_SELF"];
	$index=($page == 1)? "首页":"<a href='{$url}?page=1'>首页</a>";
	$last=($page == $pagenum)?"尾页":"<a href='{$url}?page=".$pagenum."'>尾页</a>";
	$prev=($page == 1)?"上一页":"<a href='{$url}?page=".($page-1)."'>上一页</a>";
	$next=($page == $pagenum)?"下一页":"<a href='{$url}?page=".($page+1)."'>下一页</a>";
	$str="当前总共{$pagenum}页/第{$page}页";
	$p="";
	for($i=1;$i<=$pagenum;$i++){
		if($page == $i){
			if(isset($p))$p=$p."[{$i}]";
			else $p="[{$i}]";			
		}else{					
			if(isset($p))$p=$p."<a href='{$url}?page={$i}'>[{$i}]</a>";
			else $p="<a href='{$url}?page={$i}'>[{$i}]</a>";
		}
	}	
	return $str.$sep.$index.$sep.$prev.$sep.$p.$sep.$next.$sep.$last;
}
//echo $pagenum;
//echo showpage($page, $pagenum);
?>