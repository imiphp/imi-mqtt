<?php
namespace Imi\Server\MQTT;

/**
 * MQTT 服务器类
 */
class Server extends \Imi\Server\TcpServer\Server
{
    /**
     * 创建 swoole 服务器对象
     * @return void
     */
    protected function createServer()
    {
        parent::createServer();
        $this->swooleServer->set([
            'open_mqtt_protocol'    =>  true,
        ]);
    }

    /**
     * 从主服务器监听端口，作为子服务器
     * @return void
     */
    protected function createSubServer()
    {
        parent::createSubServer();
        $this->swoolePort->set([
            'open_mqtt_protocol'    =>  true,
        ]);
    }
}
