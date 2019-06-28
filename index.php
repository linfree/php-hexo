<?php

/**
 * MicroPHP
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package        MicroPHP
 * @author        狂奔的蜗牛
 * @email        672308444@163.com
 * @copyright           Copyright (c) 2013 - 2013, 狂奔的蜗牛, Inc.
 * @link        http://git.oschina.net/snail/microphp
 * @since        Version 2.2.1
 * @createdtime         2013-11-27 19:13:17
 */

/**
 * 导入配置文件
 */
include_once "config.php";

define('IN_WONIU_APP', TRUE);
define('WDS', DIRECTORY_SEPARATOR);

/**
 * --------------------系统配置-------------------------
 */
/**
 * 是否自动建立项目文件夹
 * 当开始一个新项目的时候，可以在配置里面设置为TRUE ，系统就会自动建立文件夹。
 * 在建立完文件夹后建议设置为FALSE，这样系统就不用每次都检测文件夹是否存在,提高性能。
 */
$system['folder_auto_init'] = FALSE;
/**
 * 程序文件夹路径名称，也就是所有的程序文件比如控制器文件夹，
 * 模型文件夹，视图文件夹等所在的文件夹名称。
 */
$system['application_folder'] = realpath('.') . '/' . 'application';
/**
 * 存放控制器文件的文件夹路径名称
 */
$system['controller_folder'] = $system['application_folder'] . '/controllers';
/**
 * 存放模型文件的文件夹路径名称
 */
$system['model_folder'] = $system['application_folder'] . '/models';
/**
 * 存放视图文件的文件夹路径名称
 */
$system['view_folder'] = $system['application_folder'] . '/views';
/**
 * 存放类库文件的文件夹路径名称,存放在该文件夹的类库中的类会自动加载
 */
$system['library_folder'] = $system['application_folder'] . '/library';
/**
 * 存放函数文件的文件夹路径名称
 */
$system['helper_folder'] = $system['application_folder'] . '/helper';
/**
 * 404错误文件的路径,该文件会在系统找不到相关内容时显示,
 * 文件里面可以使用$msg变量获取出错提示内容
 */
$system['error_page_404'] = 'application/error/error_404.php';
/**
 * 系统错误文件的路径,该文件会在发生Fatal错误和Exeption时显示,
 * 文件里面可以使用$msg变量获取出错提示内容
 */
$system['error_page_50x'] = 'application/error/error_50x.php';
/**
 * 数据库错误文件的路径,该文件会在发生数据库错误时显示,
 * 文件里面可以使用$msg变量获取出错提示内容
 */
$system['error_page_db'] = 'application/error/error_db.php';
/**
 * 默认控制器文件名称,不包含后缀,支持子文件夹,比如home.welcome,
 * 就是控制器文件夹下面的home文件夹里面welcome.php(假定后缀是.php)
 */
$system['default_controller'] = 'welcome';
/**
 * 默认控制器方法名称,不要带前缀
 */
$system['default_controller_method'] = 'index';
/**
 * 控制器方法名称前缀
 */
$system['controller_method_prefix'] = 'do';
/**
 * 控制器文件名称后缀,比如.php或者.controller.php
 */
$system['controller_file_subfix'] = '.php';
/**
 * 模型文件名称后缀,比如.model.php
 */
$system['model_file_subfix'] = '.model.php';
/**
 * 视图文件名称后缀,比如.view.php'
 */
$system['view_file_subfix'] = '.view.php';
/**
 * 类库文件名称后缀,比如.class.php'
 */
$system['library_file_subfix'] = '.class.php';
/**
 * 函数文件名称后缀,比如.php'
 */
$system['helper_file_subfix'] = '.php';
/**
 * 自动加载的helper文件,比如:array($item);
 * $item是helper文件名,不包含后缀,比如: html 等.
 */
$system['helper_file_autoload'] = array();
/**
 * 自动加载的library文件,比如array($item);
 * $item是library文件名或者"配置数组",不包含后缀,
 * 比如: ImageTool 或者配置数组array('ImageTool'=>'image')
 * 配置数组的作用是为长的类库名用别名代替.
 */
$system['library_file_autoload'] = array();
/**
 * 自动加载的model,比如array($item);
 * $item是model文件名或者"配置数组",不包含后缀,
 * 比如: UserModel 或者配置数组 array('UserModel'=>'user')
 * 配置数组的作用是为长的model名用别名代替.
 */
$system['models_file_autoload'] = array();
/**
 * 控制器方法名称是否首字母大写,默认true
 */
$system['controller_method_ucfirst'] = TRUE;
/**
 * 是否自动连接数据库,默认FALSE
 */
$system['autoload_db'] = FALSE;
/**
 * 是否开启调试模式
 * true：显示错误信息,
 * false：所有错误将不显示
 */
$system['debug'] = TRUE;

/**
 * 是否接管错误信息显示
 * true：所有错误信息将由系统格式化输出
 * false：所有错误信息将原样输出
 */
$system['error_manage'] = TRUE;

/**
 * 是否开启错误日志记录
 * true：开启，如果开启了，系统将接管错误信息输出，忽略system['error_manage']和$system['db']['default']['db_debug']，
 *       同时务必设置自己的错误日志记录处理方法
 * false：关闭
 * 提示：
 * 数据库错误信息是否显示是由：$system['debug']和db_debug（$system['db']['default']['db_debug']）控制的。
 * 只用都为TRUE时才会显示。
 */
$system['log_error'] = TRUE;
/* * --------------------------------错误日志记录处理配置-----------------------
 * 错误日志记录处理方法，可以是一个“函数名称”或是“类的静态方法”用数组方式array('class_name'=>'method_name')。
 * 提示：
 * 1.如果是类，把类按着类库的命名方式命名，然后放到类库目录即可;
 * 2.如果是函数，把函数放到一个helper文件里面，然后在$system['helper_file_autoload']自动加载的helper文件里面填写上这个helper文件即可。
 * 3.留空则不处理。
 * 4.系统会传递给error、exception处理方法5个参数：（$errno, $errstr, $errfile, $errline,$strace）
 * 参数说明：
 * $errno：错误级别，就是PHP里面的E_NOTICE之类的静态变量，错误级别和具体含义对应关系如下，键是代码，值是代码含义。
 *         array('0'=>'EXCEPTION',//异常信息
 *               '1' => 'ERROR',//致命的运行时错误。这类错误一般是不可恢复的情况，例如内存分配导致的问题。后果是导致脚本终止不再继续运行。
 *               '2' => 'WARNING', //运行时警告 (非致命错误)。仅给出提示信息，但是脚本不会终止运行。
 *               '4' => 'PARSE', //编译时语法解析错误。解析错误仅仅由分析器产生。
 *               '8' => 'NOTICE', //运行时通知。表示脚本遇到可能会表现为错误的情况，但是在可以正常运行的脚本里面也可能会有类似的通知。
 *               '16' => 'CORE_ERROR', //在PHP初始化启动过程中发生的致命错误。该错误类似 E_ERROR，但是是由PHP引擎核心产生的。
 *               '32' => 'CORE_WARNING',//PHP初始化启动过程中发生的警告 (非致命错误) 。类似 E_WARNING，但是是由PHP引擎核心产生的。
 *               '64' => 'COMPILE_ERROR', //致命编译时错误。类似E_ERROR, 但是是由Zend脚本引擎产生的。
 *               '128' => 'COMPILE_WARNING', //编译时警告 (非致命错误)。类似 E_WARNING，但是是由Zend脚本引擎产生的。
 *               '256' => 'USER_ERROR', //用户产生的错误信息。类似 E_ERROR, 但是是由用户自己在代码中使用PHP函数 trigger_error()来产生的。
 *               '512' => 'USER_WARNING', //用户产生的警告信息。类似 E_WARNING, 但是是由用户自己在代码中使用PHP函数 trigger_error()来产生的。
 *               '1024' => 'USER_NOTICE',//用户产生的通知信息。类似 E_NOTICE, 但是是由用户自己在代码中使用PHP函数 trigger_error()来产生的。
 *               '2048' => 'STRICT', //启用 PHP 对代码的修改建议，以确保代码具有最佳的互操作性和向前兼容性。
 *               '4096' => 'RECOVERABLE_ERROR'//可被捕捉的致命错误。 它表示发生了一个可能非常危险的错误，但是还没有导致PHP引擎处于不稳定的状态。 如果该错误没有被用户自定义句柄捕获 (参见 set_error_handler())，将成为一个 E_ERROR　从而脚本会终止运行。
 *               '8192' => 'DEPRECATED', //（php5.3）运行时通知。启用后将会对在未来版本中可能无法正常工作的代码给出警告。
 *               '16384' => 'USER_DEPRECATED', //（php5.3）用户产少的警告信息。 类似 E_DEPRECATED, 但是是由用户自己在代码中使用PHP函数 trigger_error()来产生的。
 *         );
 *         可以通过判断错误级别，然后有针对性的处理。一般我们需要处理的就是致命错误（0，1，4）和一般错误（2，8，2048，8192）.
 * $errstr：具体的错误信息
 * $errfile：出错的文件完整路径
 * $errline：出错的行号
 * $strace： 调用堆栈信息
 * 系统会传递给db_error处理方法2个参数：（$errmsg,$strace）
 * 参数说明：
 * $errmsg：具体的数据库错误信息
 * $strace：调用堆栈信息
 * 错误控制类参考：
 * http://git.oschina.net/snail/microphp/blob/development/tests/app/library/ErrorHandle.class.php
 */
$system['log_error_handle'] = array(
    'error' => '', //array('ErrorHandle' => 'error_handle'),
    'exception' => '', //array('ErrorHandle' => 'exception_handle'),
    'db_error' => '', //array('ErrorHandle' => 'db_error_handle')
);


/**
 * 默认时区,PRC是中国
 */
$system['default_timezone'] = 'PRC';

/**
 * ---------------------------自定义URL路由规则------------------------
 * 比如：
 *   (1).http://localhost/index.php?welcome.index
 *   (2).http://localhost/index.php/welcome.index
 * 路由字符串是welcome.index(不包含最前面的?或者/)，路由规则都是针对“路由字符串”的。
 * 现在定义路由规则：
 *   $system['route']=array(
 *        "/^welcome\\/?(.*)$/u"=>'welcome.ajax/$1'
 *   );
 * 路由规则说明：
 *  1.路由规则是一个关联数组
 *  2.数组的key是匹配“路由字符串”的正则表达式，其实就是preg_match的第一个参数。
 *  3.数组的value是替换后的路由字符串
 *  4.系统使用的url路由就是最后替换后的路由字符串
 */
$system['route'] = array(
    "/^welcome\\/?(.*)$/u" => 'welcome.ajax/$1',
);
/**
 * ---------------------缓存配置-----------------------
 */
/**
 * 自定义缓存类文件的路径是$system['cache_drivers']的一个元素，
 * 可以有多个自定义缓存类。
 * 缓存类文件名称命名规范是：
 * 比如文件名是mycahe.php,那么文件mycahe.php
 * 里面的缓存类就是：class phpfastcache_mycahe{......}
 * mycahe.php的编写规范请参考：
 * http://git.oschina.net/snail/microphp/blob/development/modules/cache-drivers/drivers/example.php
 */
$system['cache_drivers'] = array();
/**
 * 缓存配置项
 */
$system['cache_config'] = array(
    /*
     * 默认存储方式
     * 可用的方式有：auto,apc,sqlite,files,memcached,redis,wincache,xcache,memcache
     * auto自动模式寻找的顺序是 : apc,sqlite,files,memcached,redis,wincache,xcache,memcache
     */
    "storage" => "auto",
    /*
     * 默认缓存文件存储的路径
     * 使用绝对全路径，比如： /home/username/cache
     * 留空，系统自己选择
     */
    "path" => "", // 缓存文件存储默认路径
    "securityKey" => "", // 缓存安全key，建议留空，系统会自动处理 PATH/securityKey

    /*
     * 第二驱动
     * 比如：当你现在在代码中使用的是memcached, apc等等，然后你的代码转移到了一个新的服务器而且不支持memcached 或 apc
     * 这时候怎么办呢？设置第二驱动即可，当你设置的驱动不支持的时候，系统就使用第二驱动。
     * $key是你设置的驱动，当设置的“storage”=$key不可用时，就使用$key对应的$value驱动
     */
    "fallback" => array(
        "memcache" => "files",
        "memcached" => "files",
        "redis" => "files",
        "wincache" => "files",
        "xcache" => "files",
        "apc" => "files",
        "sqlite" => "files",
    ),
    /*
     * .htaccess 保护
     * true会自动在缓存文件夹里面建立.htaccess文件防止web非法访问
     */
    "htaccess" => false,
    /*
     * Memcache服务器地址;
     */
    "server" => array(
        array("192.168.199.25", 11211, 1),
        //  array("new.host.ip",11211,1),
    ),
    /*
     * Redis服务器地址;
     */
    "redis" => array(
        'type' => 'tcp', //sock,tcp;连接类型，tcp：使用host port连接，sock：本地sock文件连接
        'prefix' => @$_SERVER['HTTP_HOST'], //key的前缀，便于管理查看，在set和get的时候会自动加上和去除前缀，无前缀请保持null
        'sock' => '', //sock的完整路径
        'host' => '192.168.199.25',
        'port' => 6379,
        'password' => NULL, //密码，如果没有,保持null
        'timeout' => 0, //0意味着没有超时限制，单位秒
        'retry' => 100, //连接失败后的重试时间间隔，单位毫秒
        'db' => 0, // 数据库序号，默认0, 参考 http://redis.io/commands/select
    ),
);
/**
 * -----------------------SESSION管理配置---------------------------
 */
$system['session_handle'] = array(
    'handle' => '', //支持的管理类型：mongodb,mysql,memcache,redis。留空则不管理，使用默认
    'common' => array(
        'autostart' => true, //是否自动session_start()
        'cookie_path' => '/',
        'cookie_domain' => '.' . @$_SERVER['HTTP_HOST'],
        'session_name' => 'PHPSESSID',
        'lifetime' => 3600, // session lifetime in seconds
    ),
    'mongodb' => array(
        'host' => '192.168.199.25',
        'port' => 27017,
        'user' => 'root',
        'password' => 'local',
        'database' => 'local', // name of MongoDB database
        'collection' => 'session', // name of MongoDB collection
        // persistent related vars
        'persistent' => false, // persistent connection to DB?
        'persistentId' => 'MongoSession', // name of persistent connection
        // whether we're supporting replicaSet
        'replicaSet' => false,
    ),
    /**
     * mysql表结构
     *   CREATE TABLE `session_handler_table` (
     * `id` varchar(255) NOT NULL,
     * `data` mediumtext NOT NULL,
     * `timestamp` int(255) NOT NULL,
     * PRIMARY KEY (`id`),
     * UNIQUE KEY `id` (`id`,`timestamp`),
     * KEY `timestamp` (`timestamp`)
     * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     */
    'mysql' => array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'password' => 'admin',
        'database' => 'test',
        'table' => 'session_handler_table',
    ),
    /**
     * memcache采用的是session.save_handler管理机制
     * 需要php安装memcache拓展支持
     */
    'memcache' => "tcp://192.168.199.25:11211",
    /**
     * redis采用的是session.save_handler管理机制
     * 需要php安装redis拓展支持,你可以在https://github.com/nicolasff/phpredis 找到该拓展。
     */
    'redis' => "tcp://192.168.199.25:6379",
);
/**
 * ------------------------数据库配置----------------------------
 */
/**
 * 默认使用的数据库组名称，名称就是下面的$system['db'][$key]里面的$key，
 * 可以自定义多个数据库组，然后根据不同的环境选择不同的组作为默认数据库连接信息
 */
$system['db']['active_group'] = 'default';

/**
 * dbdriver：可用的有mysql,mysqli,pdo,sqlite3,配置见下面
 */
/**
 * mysql数据库配置示例
 */
$system['db']['default']['dbdriver'] = "mysql";
$system['db']['default']['hostname'] = '10.0.0.251';
$system['db']['default']['port'] = '3306';
$system['db']['default']['username'] = 'root';
$system['db']['default']['password'] = 'snailadmin';
$system['db']['default']['database'] = 'test';
$system['db']['default']['dbprefix'] = '';
$system['db']['default']['pconnect'] = TRUE;
$system['db']['default']['db_debug'] = TRUE;
$system['db']['default']['char_set'] = 'utf8';
$system['db']['default']['dbcollat'] = 'utf8_general_ci';
$system['db']['default']['swap_pre'] = '';
$system['db']['default']['autoinit'] = TRUE;
$system['db']['default']['stricton'] = FALSE;


/*
 * PDO database config demo
 * 1.pdo sqlite3
 * */
/**
 * sqlite3数据库配置示例
 */
$system['db']['sqlite3']['dbdriver'] = "sqlite3";
$system['db']['sqlite3']['database'] = 'sqlite:d:/wwwroot/sdb.db';
$system['db']['sqlite3']['dbprefix'] = '';
$system['db']['sqlite3']['db_debug'] = TRUE;
$system['db']['sqlite3']['char_set'] = 'utf8';
$system['db']['sqlite3']['dbcollat'] = 'utf8_general_ci';
$system['db']['sqlite3']['swap_pre'] = '';
$system['db']['sqlite3']['autoinit'] = TRUE;
$system['db']['sqlite3']['stricton'] = FALSE;
/**
 * PDO mysql数据库配置示例，hostname 其实就是pdo的dsn部分，
 * 如果连接其它数据库按着pdo的dsn写法连接即可
 */
$system['db']['pdo_mysql']['dbdriver'] = "pdo";
$system['db']['pdo_mysql']['hostname'] = 'mysql:host=localhost;port=3306';
$system['db']['pdo_mysql']['username'] = 'root';
$system['db']['pdo_mysql']['password'] = 'admin';
$system['db']['pdo_mysql']['database'] = 'test';
$system['db']['pdo_mysql']['dbprefix'] = '';
$system['db']['pdo_mysql']['db_debug'] = TRUE;
$system['db']['pdo_mysql']['char_set'] = 'utf8';
$system['db']['pdo_mysql']['dbcollat'] = 'utf8_general_ci';
$system['db']['pdo_mysql']['swap_pre'] = '';
$system['db']['pdo_mysql']['autoinit'] = TRUE;
$system['db']['pdo_mysql']['stricton'] = FALSE;
/**
 * -------------------------数据库配置结束--------------------------
 */


/* End of file index.php */
include('MicroPHP.min.php');
MpRouter::setConfig($system);
require dirname(__FILE__) . '/vendor/autoload.php';
MpRouter::loadClass();