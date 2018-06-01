--  官方文档
 
    http://www.laruence.com/manual/yaf.config.html



-- php.ini 添加配置 配合 application.ini 使用


	[yaf]
	extension=php_yaf.dll
	yaf.environ=development


-- 类的加载规则


-- 如何获取和配置$_ENV  

    https://blog.csdn.net/zhezhebie/article/details/72765262


    1. getenv('PATHEXT')
    2. $_ENV