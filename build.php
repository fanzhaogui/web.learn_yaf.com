<?php  
  
/* 
+ public 
  |- index.php //入口文件 
  |- .htaccess //重写规则     
  |+ css 
  |+ img 
  |+ js 
+ conf 
  |- application.ini //配置文件    
+ application 
  |+ controllers 
     |- Index.php //默认控制器 
  |+ views     
     |+ index   //控制器 
        |- index.phtml //默认视图 
  |+ modules //其他模块 
  |+ library //本地类库
  |+ models  //model目录
  |+ plugins //插件目录
*/
define("APP_PATH", realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
class app {

    // 创建项目目录结构
    public static function build_yaf_dir() {
        if(is_writeable(APP_PATH)) {
            $dirs  = array(
                APP_PATH . 'public',
                APP_PATH . 'public' . DIRECTORY_SEPARATOR . 'css',
                APP_PATH . 'public' . DIRECTORY_SEPARATOR . 'img',
                APP_PATH . 'public' . DIRECTORY_SEPARATOR . 'js',
                APP_PATH . 'conf',
                APP_PATH . 'application',
                APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'controllers',
                APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'views',
                APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'index',
                APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'modules',
                APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'library',
                APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'models',
                APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'plugins',
            );

            // 循环生成文件
            foreach ($dirs as $dir){
                if(!is_dir($dir))  mkdir($dir,0755,true);
            }

            // 写入入口文件public/index.php
            $content = <<<'EOT'
<?php  
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */  
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");  
$app->run();  
?>  
EOT;
            self::generateFile(APP_PATH . 'public' . DIRECTORY_SEPARATOR . 'index.php', $content);

            // 写入重写规则
            $content = <<<'EOT'
#.htaccess, 当然也可以写在httpd.conf  
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f  
RewriteRule .* index.php  
EOT;  
            self::generateFile(APP_PATH . 'public' . DIRECTORY_SEPARATOR . '.htaccess', $content);  
  
            // 写入配置文件  
            self::generateFile(APP_PATH . 'conf' . DIRECTORY_SEPARATOR . 'application.ini', "[product]\n;支持直接写PHP中的已定义常量\napplication.directory=APP_PATH \"/application/\"\n");  
  
            // 写入默认控制器  
            $content = <<<'EOT'
<?php  
class IndexController extends Yaf_Controller_Abstract {  
  
    // 默认Action  
    public function indexAction() {  
        $this->getView()->assign("content", "Hello World");  
    }  
}  
?>  
EOT;
            self::generateFile(APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'Index.php', $content);

            // 写入默认Action的视图
            $content = <<<'EOT'
<html>  
    <head>  
        <title>Hello World</title>  
    </head>  
    <body>  
        <?php echo $content;?>  
    </body>  
</html>  
EOT;
            self::generateFile(APP_PATH . 'application' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'index' . DIRECTORY_SEPARATOR . 'index.html', $content);
        }else{
            header('Content-Type:text/html; charset=utf-8');
            exit('项目目录不可写，目录无法自动生成！<BR>请使用项目生成器或者手动生成项目目录~');
        }
    }

    // 生成文件
    public static function generateFile($file, $content)
    {
        if(!is_file($file)) {
            file_put_contents($file, $content);
        }
    }

}
app::build_yaf_dir();