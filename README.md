## 简介

*  拿ThinkPHP写的（丑的要死的）校科协脸谱（暂称）后台管理平台,前端界面用了一点bootstrap稍微装饰了下
话说谁来把前端整漂亮一点……

## 测试说明

*  需要在./ProjectFB/admin/Conf/config.php中填入数据库的配置信息

*  然后向数据库导入./prjfb.sql

*  测试用的账号密码都是test

*  因为作者的强迫症，用了php的password_verify函数，所以需要PHP 5.5+

*  上线之前记得清下数据库然后把调试开关关掉……