<?php
function connect(){//连接数据库
		$link=@mysql_connect(DB_HOST,DB_USER,DB_PWD)or die('数据库连接失败...'.mysql_errno().':'.mysql_error());
		mysql_set_charset(DB_CHARSET);
		mysql_select_db(DB_NAME)or die('指定数据库连接失败...');
		return $link;
}
function insert($table,$array){//完成记录的插入操作
	$keys=join(',', array_keys($array));
	$values="'".join("','", array_values($array))."'";
	$sql="insert into {$table} ($keys) values ({$values})";
//	echo $sql;exit;
	@mysql_query($sql);	
	return @mysql_insert_id();//返回上一步 INSERT 操作产生的 ID
}
function update($table,$array,$where=null){//更新数据库
	$str='';
	foreach ($array as $key => $value) {
		if($str == null){
			$sep="";
		}else{
			$sep=",";
		}
		$str=$str.$sep.$key."='".$value."'";
	}
	$sql="update {$table} set {$str} ".($where == null?null:"where ".$where);
//	echo $sql;echo "<br />";
	@mysql_query($sql);
	return @mysql_affected_rows();// 函数返回前一次 MySQL 操作所影响的记录行数	
}
function delete($table,$where=null){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table}{$where}";
	@mysql_query($sql);
	return @mysql_affected_rows();
}
function fetchone($sql,$array_type=MYSQL_ASSOC){
	$result=@mysql_query($sql);
//	$row=mysql_fetch_assoc($result);//从结果集中取得一行作为关联数组
	$row=@mysql_fetch_array($result,$array_type);//从结果集中取得一行作为关联数组	
	return $row;
}
function fetchall($sql,$array_type=MYSQL_ASSOC){
	$result=@mysql_query($sql);
	$rows=array();
	while(@$row=mysql_fetch_array($result,$array_type)){
		$rows[]=$row;
	}
	if(isset($rows))return $rows;
}
function getresultnum($sql){
	$result=@mysql_query($sql);
	return @mysql_num_rows($result);//返回结果集中行的数目
} 
function getinsertid(){
	return @mysql_insert_id();
}
function auto_increment($table,$type){
	$sql1="alter table {$table} drop id";
	$sql2="alter table {$table} add id {$type} not null first";
	$sql3="alter table {$table} modify id {$type} auto_increment primary key";
	@mysql_query($sql1);
	@mysql_query($sql2);
	@mysql_query($sql3);
}
//function edit_column($table,$type){
//	
//}
function change_character($table,$column,$type){
	$sql="alter table `{$table}` change `{$column}` `{$column}` {$type} character set utf8 collate utf8_bin not null";
	echo $sql;
	@mysql_query($sql);	
	return @mysql_affected_rows();
}
//connect();
//$arr = array('username' => "hhhzeua",'password' =>md5("11111") );
//insert($table,$arr);
////update("1212",$arr,'id=1');
//delete("1212","id=1");
//	change_character('mall_admin','username','varchar(50)');
?>
