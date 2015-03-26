<?php
return array(
//网站路径
'web_path' => '/',
//Session配置
'session_storage' => 'mysql',
'session_ttl' => 1800,
'session_savepath' => CACHE_PATH.'sessions/',
'session_n' => 0,
//Cookie配置
'cookie_domain' => '', //Cookie 作用域
'cookie_path' => '', //Cookie 作用路径
'cookie_pre' => 'CMPkO_', //Cookie 前缀，同一域名下安装多套系统时，请修改Cookie前缀
'cookie_ttl' => 0, //Cookie 生命周期，0 表示随浏览器进程
//模板相关配置
'tpl_root' => 'templates/', //模板保存物理路径
'tpl_name' => 'default', //当前模板方案目录
'tpl_css' => 'default', //当前样式目录
'tpl_referesh' => 1,
'tpl_edit'=> 0,//是否允许在线编辑模板

//附件相关配置
'upload_path' => WEB_ROOT_PATH.'uploadfile/',
'upload_url' => env('UPLOAD_URL', 'http://localhost:8000/uploadfile/'), //附件路径
'attachment_stat' => '1',//是否记录附件使用状态 0 统计 1 统计， 注意: 本功能会加重服务器负担

'js_path' => env('JS_PATH','http://localhost:8000/statics/js'), //CDN JS
'css_path' => env('CSS_PATH','http://localhost:8000/statics/css'), //CDN CSS
'img_path' => env('IMG_PATH','http://localhost:8000/statics/images'), //CDN img
'app_path' => env('APP_PATH','http://localhost:8000/'),//动态域名配置地址

'charset' => 'utf-8', //网站字符集
'timezone' => 'Etc/GMT-8', //网站时区（只对php 5.1以上版本有效），Etc/GMT-8 实际表示的是 GMT+8
'debug' => env('debug', 1), //是否显示调试信息
'admin_log' => env('admin_log', 1), //是否记录后台操作日志
'errorlog' => env('errorlog', 1), //1、保存错误日志到 cache/error_log.php | 0、在页面直接显示
'gzip' => env('gzip', 1), //是否Gzip压缩后输出
'auth_key' => '7SLahrT8anWkl7LfOBhW', //密钥
'lang' => 'zh-cn',  //网站语言包
'lock_ex' => '1',  //写入缓存时是否建立文件互斥锁定（如果使用nfs建议关闭）

'admin_founders' => '1', //网站创始人ID，多个ID逗号分隔
'execution_sql' => 0, //EXECUTION_SQL

'phpsso' => env('PHPSSO','1'),  //是否使用phpsso
'phpsso_appid' => env('PHPSSO_APPID','1'),  //应用id
'phpsso_api_url' => env('PHPSSO_API_URL','http://localhost:8000/phpsso_server'),    //接口地址
'phpsso_auth_key' => env('PHPSSO_AUTH_KEY','uYHKmvZf5nhUMYbFPFIae9SagIR12Npn'), //加密密钥
'phpsso_version' => env('PHPSSO_VERSION','1'), //phpsso版本

'html_root' => '/html',//生成静态文件路径
'safe_card'=>'1',//是否启用口令卡

'connect_enable' => env('CONNECT_ENABLE', 1),   //是否开启外部通行证

'sina_akey' => env('SINA_AKEY', ''),    //sina AKEY
'sina_skey' => env('SINA_SKEY', ''),    //sina SKEY

'snda_akey' => env('SNDA_AKEY', ''),    //盛大通行证 akey
'snda_skey' => env('SNDA_SKEY', ''),    //盛大通行证 skey

'qq_akey' => env('QQ_AKEY', ''),    //qq skey
'qq_skey' => env('QQ_SKEY', ''),    //qq skey

'qq_appkey' => env('QQ_APPKEY', ''),    //QQ号码登录 appkey
'qq_appid' => env('QQ_APPID', ''),  //QQ号码登录 appid
'qq_callback' => env('QQ_CALLBACK', ''),    //QQ号码登录 callback

'admin_url' => env('ADMIN_URL', ''),    //允许访问后台的域名
);

?>
