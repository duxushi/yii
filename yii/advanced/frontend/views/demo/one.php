<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<form action="">
	<center>
		<table>
			<tr>
				<td>名称</td>
				<td>密码</td>
				
				<td>&nbsp;<a href="<?=Url::toRoute('demo/user_add')?>">添加</a> </td>
			</tr>
			<?php foreach ($list as $k => $v): ?>
				<tr>
					<td><?=$v['name']?></td>
					<td><?=$v['pas']?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</center>
</form>