<meta charset="UTF-8">	
<form action="index.php?r=demo/user_update_do" method="post">
	<center>
		<table>
			<tr>
				<td>账号</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="text" name="pass"></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
				<td><input type="hidden" name="u_id" value="<?=$u_id?>"></td>
			</tr>
		</table>
	</center>
</form>

