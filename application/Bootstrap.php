<?php
class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    public function _initCore()
	{
		ini_set('yaf.library', LIB_PATH);
		\Yaf\Loader::import(CORE_PATH.'/Helper.php');
        \Yaf\Loader::import(CORE_PATH.'/Basic.php');
		\Yaf\Loader::import(CORE_PATH.'/Model.php');
		\Yaf\Loader::import(CORE_PATH.'/BasicPc.php');
		\Yaf\Loader::import(CORE_PATH.'/BasicAdmin.php');
		\Yaf\Loader::import(FUNC_PATH.'/F_Basic.php');
		\Yaf\Loader::import(FUNC_PATH.'/F_Network.php');
		\Yaf\Loader::import(FUNC_PATH.'/F_String.php');
		\Yaf\Loader::import(FUNC_PATH.'/F_Validate.php');
    }
	
	public function _initLoader()
	{
		\Yaf\Loader::import(APP_PATH . '/vendor/autoload.php');
	}
    public function _initRoute() {
        $router = Yaf\Dispatcher::getInstance()->getRouter();
        //授权商品
        $products_detail = new Yaf\Route\Regex(
            '#product/([0-9]+).html#',
            array('module' => 'product', 'controller' => 'detail', 'action' => 'index'),
            array(1 => 'pid')
        );
        $router->addRoute('products_detail', $products_detail);			
		
	}
	
    public function _initPlugin(\Yaf\Dispatcher $dispatcher)
	{
        $router = new RouterPlugin();
        $dispatcher->registerPlugin($router);
    }
}