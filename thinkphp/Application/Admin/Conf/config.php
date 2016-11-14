<?php
return array(
	//'配置项'=>'配置值'
    'LOAD_EXT_CONFIG'=>'db',//加载扩展配置文件，可读取自定义的配置文件
    'TMPL_TEMPLATE_SUFFIX'  =>  '.html',     // 默认模板文件后缀
    'DEFAULT_THEME'         =>  '',	// 默认模板主题名称  默认index
    'DEFAULT_V_LAYER'       =>  'View', // 默认的视图层名称
    
    /* 数据库设置 */
    'DB_TYPE'               =>  'Mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'test_shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '111111',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tb_',    // 数据库表前缀
    'DB_PARAMS'             =>  array(), // 数据库连接参数    
    'DB_DEBUG'  	    =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
);