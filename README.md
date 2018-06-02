--  中文社区

    https://www.oschina.net/question/tag/php-yaf
    
--  官方文档
 
    http://www.laruence.com/manual/yaf.config.html



-- php.ini 添加配置 配合 application.ini 使用

    # php.ini
	[yaf]
	extension=php_yaf.dll
	yaf.environ=development
    
    # application.ini
    [development]
    application.directory=APP_PATH "/application/"
    

-- 类的加载规则

    1. 本地类
    
    2. 全局类
    

-- 如何获取和配置$_ENV  

    

[参考博客](https://blog.csdn.net/zhezhebie/article/details/72765262)

    1. getenv('PATHEXT')
    2. $_ENV
    


[yaf 集成各种类 开源框架](https://github.com/sillydong/CZD_Yaf_Extension)