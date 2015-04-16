<?php
// 本类由系统自动生成，仅供测试用途
//mysql> select `name` from fb_department where id=(select `department` from fb_member where id=5);
class IndexAction extends Action 
{
	public function index()
	{
		$this->show();
	}

	public function view()
	{
		//view操作方法逻辑的实现
		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}

		$view_user = M('member');
		$view_list = $view_user->select();
		$this->assign('view_list',$view_list);
		$this->display();//输出页面模板
	}

	public function handleLogin()
	{
		if (!IS_POST) {
			$this->error('非法操作！',U('Index/index'));
		}

		$data = M('account');
		$password = $data->where('name="'.I('POST.name').'"')->getField('password');
		
		if ((password_verify(I('POST.password'),$password)))
		{
			session('loggeduser',I('POST.name'));
			$this->redirect('Index/view');
		}
		else
		{
			$this->error('用户名或密码错误！', U('Index/index'));
		}

	}

	public function logout()
	{
		session('loggeduser',null);
		$this->redirect('Index/index');
	}

	public function edit()
	{
		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}
		$members = M('member'); 
		$member = $members->where('id='.$_GET['id'])->find();
		
		$id = $members->id;$this->assign('id',$id);
		$name = $members->name;$this->assign('name',$name);
		$year = $members->year;$this->assign('year',$year);
		$imgurl = $members->imgurl;$this->assign('imgurl',$imgurl);
		$department = $members->department;$this->assign('department',$department);
		
		$introduce = $members->introduce;
		$introduce = str_replace(array("<br>","<br/>","<br />"),"\n",$introduce);//继续折腾换行
		$this->assign('introduce',$introduce);

		$depts = M('department');
		$dept = $depts->select();
		$this->assign('dept',$dept);
		$this->show();

	}

	public function delete()//ajax handler
	{
		if (!IS_AJAX) {
			$this->error('非法操作！',U('Index/index'));
		}

		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}

		$id = (int)$_POST['id'];
		$members = M("member"); 
		if ($members->where('id='.$id)->delete())//删记录
		{
			$this->ajaxReturn(array('status' => 0));
		}
		else
		{
			$this->ajaxReturn(array('status' => 1));
		}

		
	}

	public function add()
	{
		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}
		$depts = M('department');
		$dept = $depts->select();
		$this->assign('dept',$dept);
		$this->show();
	}

	public function handleAdd()
	{
		if (!IS_POST) {
			$this->error('非法操作！',U('Index/index'));
		}

		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}

		$_POST['department'] = (int)$_POST['department'];//部门id转换为数值
		$_POST['introduce'] = str_replace(array("\r\n", "\r", "\n"),'<br/>',$_POST['introduce']);//应付换行
		//$_POST['introduce'] = str_replace("\r",'',$_POST['introduce']);//不知道Linux会怎么样
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './upload/';// 设置附件上传目录
		if(!$upload->upload())// 上传错误提示错误信息，这个if条件就是用来上传的
		{
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		 // 保存表单数据 包括附件数据
		$member = M('member'); // 实例化member对象
		$_POST['imgurl'] = $info[0]['savename'];
		$member->add($_POST); // 写入用户数据到数据库
		$this->success('数据保存成功！');
	}

	public function handleEdit()
	{
		if (!IS_POST) {
			$this->error('非法操作！',U('Index/index'));
		}

		if (!isset($_SESSION['loggeduser'])) 
		{
			$this->error('请先登录！',U('Index/index'));
		}

		$_POST['department'] = (int)$_POST['department'];//部门id转换为数值
		$_POST['introduce'] = str_replace(array("\r\n", "\r", "\n"),'<br/>',$_POST['introduce']);//应付换行
		$member = M('member'); // 实例化member对象
		if ($_FILES['img']['name'] == null) //没图
		{
			$member->name = $_POST['name'];
			$member->year = $_POST['year'];
			$member->department = $_POST['department'];
			$member->introduce = $_POST['introduce'];
			$member->where('id='.$_POST['id'])->save(); // 写入用户数据到数据库
		} 
		else  //有图
		{
			$imgpath = './upload/'.$member->where('id='.$_POST['id'])->getField('imgurl');
			unlink($imgpath);
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './upload/';// 设置附件上传目录
			if(!$upload->upload())// 上传错误提示错误信息，这个if条件就是用来上传的
			{
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo();
			}
			 // 保存表单数据 包括附件数据
			
			$_POST['imgurl'] = $info[0]['savename'];
			$member->where('id='.$_POST['id'])->save($_POST); // 写入用户数据到数据库
		}

		$this->success('数据保存成功！','__PUBLIC__/clsWin.html?id='.rand());
	}

}
