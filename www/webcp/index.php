<?php
/**
 *  index.php PHPCMS 后台入口
 *
 * @author    www.rekoo.com
 */

//引入路径定义
require '../../common.php';

include PHPCMS_PATH.'/phpcms/base.php';

$session_storage = 'session_' . pc_base::load_config('system', 'session_storage');
pc_base::load_sys_class($session_storage);
session_start();
$_SESSION['right_enter'] = 1;
unset($session_storage);

header('location:../index.php?m=admin');
