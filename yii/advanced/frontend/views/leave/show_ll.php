
<?php 
	use yii\helpers\Url;
    use yii\widgets\LinkPager;
?>
<form action="index.php?r=leave/updata_do" method="post">
	<center>
		<table>
			<tr>
				<td>标题:</td>
				<td>内容:</td>
				<td>时间:</td>
				<td>作者:</td>
						
				<td>操作:<a href="index.php?r=leave/show">添加</a></td>
			</tr>
			<?php foreach ($models as $k => $v): ?>
				<tr>
					<td><?=$v['l_name'] ?></td>
					<td><?=$v['l_countent'] ?></td>
					<td><?=date('Y-m-d H:i:s',$v['l_time']); ?></td>
					<td>
						<?php foreach ($users as $key => $value) {
							if ($v['u_id'] == $value['id']) {
								echo $value['name'];
							}
						} ?>
					</td>
					<td>
						<a href="index.php?r=leave/updata&id=<?=$v['l_id'];?>">修改</a>
						<a href="index.php?r=leave/del&id=<?=$v['l_id'];?>">删除</a>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
			<?= LinkPager::widget([
	     'pagination' => $pages,
	     'nextPageLabel' => '下一页',
	     'prevPageLabel' => '上一页',
	     'firstPageLabel' => '首页',
	     'lastPageLabel' => '尾页',
	 ]); ?>


	</center>
</form>

