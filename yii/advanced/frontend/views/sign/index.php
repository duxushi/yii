<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="index.php?r=sign/add" method="post">
		<center>
			<table>
				<?php if(!empty($list)){
					// var_dump($list);
					foreach ($list as $k => $v) {
						echo "<a href='index.php?r=sign/repair&repair=$v&u_id=001'>".$v."</a><br/>";
					}
				}?>
				<tr>
					<td><input type="hidden" name="id" value="001"></td>
					<td><input type="submit" value="签到"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</table>
		</center>
	</form>
</body>
</html>