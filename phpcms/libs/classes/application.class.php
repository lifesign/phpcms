<?php
/**
 *  application.class.php PHPCMS应用程序创建类
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-6-7
 */
class application {
	
	/**
	 * 构造函数
	 */
	public function __construct() {
		$param = pc_base::load_sys_class('param');
		define('ROUTE_M', $param->route_m());
		define('ROUTE_C', $param->route_c());
		define('ROUTE_A', $param->route_a());
		$this->init();
	}
	
	/**
	 * 调用控制器对应的方法
	 */
	private function init() {
		$controller = $this->load_controller();

		try {
			//检测方法是否存在
			if (!method_exists($controller, ROUTE_A)) {
				throw new BadMethodCallException('Action does not exist.');
			}

            $method = new \ReflectionMethod($controller, ROUTE_A);

            if($method->isPublic() && !$method->isStatic()) {
                $class  =   new \ReflectionClass($controller);
                // 前置操作
                if($class->hasMethod('_before_'.ROUTE_A)) {
                    $before = $class->getMethod('_before_'.ROUTE_A);
                    if($before->isPublic()) {
                        $before->invoke($controller);
                    }
                }

				//执行当前操作
                $method->invoke($controller);

                // 后置操作
                if($class->hasMethod('_after_'.ROUTE_A)) {
                    $after =   $class->getMethod('_after_'.ROUTE_A);
                    if($after->isPublic()) {
                        $after->invoke($controller);
                    }
                }

            } else {
                // 操作方法不是Public 抛出异常
                throw new \ReflectionException();
            }

		} catch (BadMethodCallException $e) {

			exit($e->getMessage());

		} catch (ReflectionException $e) {

			exit('You are visiting the action is to protect the private action');

		}
	}
	
	/**
	 * 加载控制器
	 * @param string $filename
	 * @param string $m
	 * @return obj
	 */
	private function load_controller($filename = '', $m = '') {
		if (empty($filename)) $filename = ROUTE_C;
		if (empty($m)) $m = ROUTE_M;
		$filepath = PC_PATH.'modules'.DIRECTORY_SEPARATOR.$m.DIRECTORY_SEPARATOR.$filename.'.php';
		if (file_exists($filepath)) {
			$classname = $filename;
			include $filepath;
			if ($mypath = pc_base::my_path($filepath)) {
				$classname = 'MY_'.$filename;
				include $mypath;
			}
			if(class_exists($classname)){
				return new $classname;
			}else{
				exit('Controller does not exist.');
 			}
		} else {
			exit('Controller does not exist.');
		}
	}
}