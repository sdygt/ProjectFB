<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>校科协脸谱|后台管理|添加记录</title>
	<link rel="stylesheet" href="__PUBLIC__/css/public.css" media="screen" type="text/css" />
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.11.2.min.js" ></script>
	<script type="text/javascript" src="__PUBLIC__/js/verify.js" ></script>
</head>

<body>
	<span>欢迎您，<?php echo session('loggeduser');?></span>
	<a href="<?php echo U('Index/logout');?>">登出</a>
	<div style="text-align:center;clear:both;"></div>
	<article class="tabs">

		<input id="one" class="tpl" name="tabs" type="radio">
		<label for="one" onclick="window.open('<?php echo U('Index/view');?>','_self')">查看资料</label>

		<input checked id="two" class="tpl" name="tabs" type="radio" value="Two">
		<label for="two">新建记录</label>

<!-- 		<input id="three" class="tpl" name="tabs" type="radio">
		<label for="three">Tab Three</label>

		<input id="four" class="tpl" name="tabs" type="radio">
		<label for="four">Tab Four</label> -->

		<div class="panels">

			<div class="panel" id="p1" style="display:none"></div>

			<div class="panel" id="p2" >
				<form method="POST"  action="<?php echo U('Index/handleAdd');?>" onsubmit="return verify()" enctype="multipart/form-data">
					<fieldset>
						<legend>新建记录</legend>
						<p>
							<span>姓名</span>
							<input type="text" name="name" id="name" required="required"/>
							<span class="tips" id="tname"></span>
						</p>

						<p>
							<span>年份</span>
							<input type="number" name="year" id="year" required="required" min="1990" max="2020"/>
							<span class="tips" id="tyear"></span>
						</p>

						<p>
							<span>部门</span>
							<select name="department" required="required">
								<?php if(is_array($dept)): $i = 0; $__LIST__ = $dept;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</p>

						<p>
							<span>介绍</span>
							<textarea type="text" name="introduce" id="introduce"  placeholder="输入一些介绍" required="required"/></textarea>
							<span class="tips" id="tintroduce"></span>
						</p>

						<p>
							<span>照片</span>
							<input type="file" name="img" id="img" required="required">
							<span class="tips" id="timg"></span>
						</p>
						<input type="submit" value="提交" />
					</fieldset>
				</form>
			</div>

<!-- 			<div class="panel" id="p3" style="display:none"></div>

			<div class="panel" id="p4" style="display:none"></div> -->

		</div>

	</article>

</body>

</html>