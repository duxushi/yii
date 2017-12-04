<?php 
use yii\helpers\Url;
 ?>
<form action="">
	<center>
		<table>
			<tr>
				<td>用户名</td>
				<td>密码</td>
				<td>操作</td>
				<td><a href="<?=Url::toRoute(['demo/user_add']);?>">添加</a></td>
			</tr>
			<?php foreach ($list as $k => $v): ?>
				<tr>
					<td><?=$v['name']; ?></td>
					<td><?=$v['pas']; ?></td>
					<td><a href="index.php?r=demo/user_update&id=<?=$v['id']?>">修改</a>
						<a href="<?=Url::toRoute(['demo/user_del', 'id' => $v['id']]);?>">删除</a>
					</td>
				</tr>
			<?php endforeach ?>
			
		</table>
	</center>
</form>