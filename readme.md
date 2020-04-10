### ThinkPHP5 + websocket 实现聊天室 

#### 一、配置 ####
开启socket组建，否则会报 Fatal error: Call to undefined function socket_create() 错误
1、打开php.ini配置文件，搜索 extension=php_sockets.dll，把前面的‘；’分号删掉。修改之后重启服务。
注意：如果php版本多，一定要注意使用的哪个版本就要取修改哪个版本的php.ini文件，wamp开启socket需要apache和php下面的php.ini一起修改，而phpstudy只需要修改一个php.ini.
2、检查socket组建是否开启
运行phpinfo.php查看，如果Sockets Support => enabled，就说明开启成功了。

![](https://img2020.cnblogs.com/blog/1149706/202004/1149706-20200409150714700-1782169371.png)

3、设置cmd可以运行php文件
在“我的计算机->属性->高级系统设置->高级->环境变量”,在用户变量的PATH添加一条，指向php的路径(注意版本要一致)，在环境变量里的Path也需要添加一条，跟上面一样

![](https://img2020.cnblogs.com/blog/1149706/202004/1149706-20200409150727855-1654363998.png)

 4、测试socket和php是否配置成功
在项目下新建一个名叫start.php的文件

     if(extension_loaded('sockets')){
       echo "1";
     }else{
       echo "0";
     }

在cmd里输入 php d:\phpstudy\www\start.php，如果输出1，则说明配置正确，如果输出0，则配置错误，需要仔细重新配置

#### 二、实现流程 
前端实现比较简单，难点在后台，其逻辑如下：php主要就是接收加密key并返回其中完成套接字的创建和握手操作

![](https://img2020.cnblogs.com/blog/1149706/202004/1149706-20200409150901564-1946832566.png)

服务端的流程：

1、挂起一个socket套接字进程，等待连接

2、有socket连接之后，遍历套接字数组

3、没有握手的，进行握手操作，已经握手的，则把接收的数据解析并写入缓冲区进行输出

#### 三、代码
见git：ThinkPHP5-WebSocket-2.0,此版本融合了TP框架和MySql数据库交互 [https://github.com/zhxiangfei/ThinkPHP5-WebSocket-2.0.git](https://github.com/zhxiangfei/ThinkPHP5-WebSocket-2.0.git)  博客地址：T[hinkPHP5+WebSocket+MySQL实现聊天室](https://www.cnblogs.com/zxf100/p/12671258.html)

1.0版本：php+websocket [https://github.com/zhxiangfei/php-websocket-.git](https://github.com/zhxiangfei/php-websocket-.git)  博客地址：[php+websocket 实现聊天室](https://www.cnblogs.com/zxf100/p/12667111.html)

www  WEB部署目录（或者子目录）

    ├─application   			应用目录
    │  ├─index					模块目录
    │  │  ├─controller  		控制器目
    │  │  │  ├─Chat.php			聊天室对应的页面
    │  │  │  ├─Server.php		Socket服务核心代码
    │  │  │  ├─Socket.php		实例化socket服务代码
    │  │  ├─view				视图目录
    │  │  │  ├─chat			
    │  │  │  │  ├─index.html	聊天室页面
    │  │  ├─start.bat			运行socket服务，即运行Socket.php文件


#### 五、运行php 
建立start.bat文件，运行php，也可以在cmd里输入命令运行php
    
    @echo off
    
    php E:\phpstudy_pro\WWW\test\public\index.php index/Socket/index
    
    pause
运行结果如下

![](https://img2020.cnblogs.com/blog/1149706/202004/1149706-20200409151111090-673267019.png)

![](https://img2020.cnblogs.com/blog/1149706/202004/1149706-20200409151119216-1927841952.png)

注意：start.bat要一直运行，如果关了，就表示socket也关了，就不能通信了，所有需要start.bat一直运行

可以参考我的博客