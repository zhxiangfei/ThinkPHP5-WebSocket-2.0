<?php
namespace app\index\controller;
use think\Controller;
// use app\index\controller\SocketServer;

/**
 * 聊天室
 */
class Chat extends Controller
{

	public function index()
	{
		
		return $this->fetch();
	}

}