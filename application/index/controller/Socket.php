<?php 
namespace app\index\controller;
// namespace app\index\controller;
use app\index\controller\Server;


/**
 * 
 */
class Socket 
{
	public function index()
	{
		echo "start...\n\r";
		$sk = new Server();
		echo "continue...\n\r";
		$sk->index();
		echo "success...\n\r";
	}
}


