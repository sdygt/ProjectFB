<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>校科协脸谱|后台管理|编辑记录</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/edit.css" />
	<script type="text/javascript" src="__PUBLIC__/js/verify.js" ></script>
</head>
<body>
	<form method="POST"  action="<?php echo U('Index/handleEdit');?>" onsubmit="return verify()" enctype="multipart/form-data">
		<fieldset>
			<legend>编辑记录</legend>
			<img src="__ROOT__/upload/<?php echo ($imgurl); ?>" align="right" height="100" alt="木有照片">
			<input type="hidden" name="id" value="<?php echo ($id); ?>">
			<p>
				<span>姓名</span>
				<input type="text" name="name" id="name"  required="required" value="<?php echo ($name); ?>"/>
			</p>

			<p>
				<span>年份</span>
				<input type="number" name="year" id="year" required="required" min="1990" max="2020" value="<?php echo ($year); ?>"/>
			</p>

			<p>
				<span>部门</span>
				<select name="department" required="required">
					<?php if(is_array($dept)): $i = 0; $__LIST__ = $dept;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["id"]); ?> <?php if(($vo["id"]) == $department): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</p>

			<p>
				<span>介绍<br/></span>
				<textarea type="text" name="introduce" id="introduce" required="required" rows="8" cols="40"><?php echo ($introduce); ?></textarea>
			</p>

			<p>
				<span>更改照片</span><span class="commit">(现在有用了！)</span>
				<input type="file" name="img" id="img">
			</p>
			<input type="submit" value="提交" />
		</fieldset>
	</form>
</body>
</html>