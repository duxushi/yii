<form action="index.php?r=leave/updata_do" method="post">
	<center>
		<table>
			<tr>
				<td>标题:</td>
				<td><input type="text" name="name" value="<?=$list['l_name']?>"></td>
			</tr>
			<tr>
				<td>留言内容:</td>
				<td><textarea name="text"><?=$list['l_countent']?></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?=$_GET['id']?>"></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</center>
</form>
