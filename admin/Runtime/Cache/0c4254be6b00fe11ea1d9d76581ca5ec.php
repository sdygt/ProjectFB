<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<title>校科协脸谱|后台管理</title>

	<link rel="stylesheet" href="__PUBLIC__/css/admin.css" media="screen" type="text/css" />

</head>

<body>
	<span>欢迎您，<?php echo session('loggeduser');?></span>
	<a href="<?php echo U('Index/logout');?>">登出</a>
	<div style="text-align:center;clear:both;"></div>
	<article class="tabs">

		<input checked id="one" name="tabs" type="radio">
		<label for="one">查看资料</label>

		<input id="two" name="tabs" type="radio" value="Two">
		<label for="two">Tab Two</label>

		<input id="three" name="tabs" type="radio">
		<label for="three">Tab Three</label>

		<input id="four" name="tabs" type="radio">
		<label for="four">Tab Four</label>

		<input id="five" name="tabs" type="radio">
		<label for="five">Tab 5</label>
		<div class="panels">

			<div class="panel">
				<h2>查看资料</h2>
				<table border='1'>
					<tr>
						<th>ID</th>
						<th>姓名</th>
						<th>年</th>
						<th>部门</th>
						<th>编辑</th>
						<th>删除</th>
						<th>12</th>
					</tr>
					<?php if(is_array($view_list)): $i = 0; $__LIST__ = $view_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo["id"]); ?></td>
							<td><?php echo ($vo["name"]); ?></td>
							<td><?php echo ($vo["year"]); ?></td>
							<td><?php echo (querydept($vo["department"])); ?></td>
							<!-- <td><a href='__URL__/edit?id=<?php echo ($vo["id"]); ?>'>编辑</a></td> -->
							<td><a href="javascript:void(0);" onclick='windows.open("www.baidu.com","name1","width=100,height=200,toolbar=no,scrollbars=no,menubar=no,screenX=100,screenY=100")' class="a">aaa</a></td>
							<td><a href="__URL__/delete?id=<?php echo ($vo["id"]); ?>">删除</a></td>
							<td><a href="http://www.baidu.com">bd</a></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</table>
			</div>

			<div class="panel">
			</div>

			<div class="panel">
			</div>

			<div class="panel">
			</div>

		</div>

	</article>

</body>

</html>