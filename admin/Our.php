<?php
include "certain.php";
if ($certain == 'admin'||$certain == 'server') {
include "conn.php";
$type = $_POST['type'];
switch ($type) {
	case '1' :
		$query1 = mysql_query("SELECT * FROM b_our");
		while ($row1 = mysql_fetch_array($query1)) {
			if ($row1['display'] == "1") {
				echo "<li class='selected'>编号：" . $row1['id'] . "-<br/>" . $row1['text'] . "</li>";
			} else {
				echo "<li>编号：" . $row1['id'] . "-<br/>" . $row1['text'] . "</li>";
			}

		}
		break;
	case '2' :
		$id=$_POST['id'];
		mysql_query("UPDATE b_our SET display='0'");
		mysql_query("UPDATE b_our SET display='1' WHERE id='$id'");
		echo "修改成功";
		break;
	case '3' :
		$id3=$_POST['id'];
		mysql_query("DELETE FROM b_our WHERE id='$id3'");
		echo "删除成功";
		break;
	case '4':
		$text=$_POST['text'];
		mysql_query("INSERT INTO b_our VALUES('','$text','0')");
		echo "添加成功";
		break;
	default :
		break;
}
} else {
	echo "cookie保存到期请重新登录";
}
mysql_close();
?>