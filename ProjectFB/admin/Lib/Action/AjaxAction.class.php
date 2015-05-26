<?php
class AjaxAction extends Action
{
    public function index()
    {
        $this->redirect('Index/index');
    }

    public function ajax()
    {
        if (isset($_GET['member'])) {
            $id = $_GET['member'];
            $this->ajaxReturn($this->member($id));
        } elseif (isset($_GET['year'])) {
            $year = $_GET['year'];
            $dept_id = $_GET['department'];
            $this->ajaxReturn($this->year($year, $dept_id));
        } elseif (isset($_GET['department'])) {
            $dept_id = $_GET['department'];
            $this->ajaxReturn($this->dept($dept_id));
        } else {
            echo "Wrong parameter!";
        }
    }

    private function member($id) //根据成员id获取详细信息

    {
        $member = M('member')->where('id=' . $id)->getField('id,name,imgurl,introduce'); //TP返回的结果是数组套数组
        $member = $member[$id]; //所以用id把数组解开一层
        array_shift($member); //然后把辅助用的id移出去
        return $member; //返回数组
    }

    private function year($year, $dept_id) //获取指定年&&指定部门的所有人的列表

    {
        // $dept_id = M('department')->where("name='" . $dept . "'")->getField('id'); //获得部门名称对应ID
        if ($year === 'latest') {
            $year = M('member')->where('department=' . $dept_id)->max('year');
            $year = (int) $year;
        }
        $cond['year'] = $year;
        $cond['department'] = (int) $dept_id;
        $members = M('member')->where($cond)->getField('id,imgurl');
        $result = array();
        $i = 0;
        foreach ($members as $key => $value) {
            $result[$i]['id'] = $key;
            $result[$i]['imgurl'] = $value;
            $i++;
        }
        return $result;
    }

    private function dept($dept_id) //获取指定部门的所有的有数据的年份

    {
        // $dept_id = M('department')->where("name='" . $dept . "'")->getField('id'); //获得部门名称对应ID
        $dept_id = (int) $dept_id;
        $years = M('member')->Distinct(true)->order('year desc')->where("department=" . $dept_id)->getField('year', true);
        foreach ($years as &$value) {
            $value = (int) $value;
        }
        return $years;
    }
}
