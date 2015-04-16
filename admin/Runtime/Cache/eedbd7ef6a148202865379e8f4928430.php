<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>校科协脸谱|后台管理</title>
	<link rel="stylesheet" href="__PUBLIC__/css/public.css" media="screen" type="text/css" />
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.2.min.js" ></script>
</head>

<body>
	<span>欢迎您，<?php echo session('loggeduser');?></span>
	<a href="<?php echo U('Index/logout');?>">登出</a>
	<div style="text-align:center;clear:both;"></div>
	<article class="tabs">

		<input checked id="one" class="tpl" name="tabs" type="radio">
		<label for="one">查看资料</label>

		<input id="two" class="tpl" name="tabs" type="radio" value="Two">
		<label for="two"  onclick="window.open('<?php echo U('Index/add');?>','_self')">新建记录</label>

<!-- 		<input id="three" class="tpl" name="tabs" type="radio">
		<label for="three">Tab Three</label>

		<input id="four" class="tpl" name="tabs" type="radio">
		<label for="four">Tab Four</label> -->

		<div class="panels">

			<div class="panel" id="p1">
				<fieldset>
					<legend>查看资料</legend>
					<table border='1'>
						<tr>
							<th>姓名</th>
							<th>年</th>
							<th>部门</th>
							<th>简介</th>
							<th>编辑</th>
							<th>删除</th>
						</tr>
						<?php if(is_array($view_list)): $i = 0; $__LIST__ = $view_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="trid-<?php echo ($vo["id"]); ?>">
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["year"]); ?></td>
								<td><?php echo (querydept($vo["department"])); ?></td>
								<td><?php echo ($vo["introduce"]); ?></td>
								<td><a href="javascript:void(0)" onclick="window.open('__URL__/edit?id=<?php echo ($vo["id"]); ?>', 'newwindow', 'height=500, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no')">编辑</a></td>
								<td><a href="javascript:void(0)" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						
					</table>
				</fieldset>
			</div>

			<div class="panel" id="p2" style="display:none">
			</div>

<!-- 			<div class="panel" id="p3" style="display:none">
			</div>

			<div class="panel" id="p4" style="display:none">
			</div> -->

		</div>

	</article>
<script type="text/javascript">
function del (id)
{
	question = confirm("你确认要删除此条记录吗？");
	if (question){
		$.post("<?php echo U('Index/delete');?>",{"id":id},
			function (back) {
				if (back.status == 0) 
				{
					alert("删除成功！")
					$("#trid-"+id).remove();//在html中移除对应项
				} 
				else
				{
					alert("删除失败！")
					location.reload();
				};
			}	)
		
	}
}
</script>
</body>

</html>