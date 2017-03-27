<?php
	require_once '../include.php';
	connect();
	$table=$_REQUEST['table'];
//	$column='g_sn';
	$type=$_REQUEST['type'];	
	if($table == 'mall_admin')$url='../admin/listadmin.php';
	if($table == 'mall_classify'){
		$url='../admin/listclassify.php';
		$sql="select id from mall_classify";
		$allid=fetchall($sql);
		$sql="select c_id from mall_goods";
		$allcid=fetchall($sql);
		foreach($allid as $idkey => $ids){	
			foreach ($ids as $id) {
				foreach($allcid as $cidkey => $cids){
					foreach ($cids as $cid) {
						if($cid == $id){
							$newpid=$idkey+1;
							$arr['c_id']=$newpid;
							$where="c_id={$cid}";
							update('mall_goods', $arr,$where);
						}
						unset($arr);
					}
				}
			}
		}
	}
	if($table == 'mall_goods'){
		$url='../admin/listgoods.php';	
		$sql="select id from mall_goods";
		$allid=fetchall($sql);
		$sql="select pid from user_album";
		$allpid=fetchall($sql);
		foreach($allid as $idkey => $ids){		
			foreach ($ids as $id) {
				foreach($allpid as $pidkey => $pids){
					foreach ($pids as $pid) {
						if($pid == $id){
							$newpid=$idkey+1;
							$arr['pid']=$newpid;
							$where="pid={$pid}";
							update('user_album', $arr,$where);
						}
						unset($arr);
					}
				}
			}
		}
	}
	if($table == 'user_album'){
		$url='../admin/listgoods.php';
	}
	if($table == 'shop_user'){
		$url='../admin/listuser.php';
	}
//	$change=change_character($table,$column,$type);
	auto_increment($table,$type);
	alertmes('已重新编号', $url);
//	echo $change;
?>
