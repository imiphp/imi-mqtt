<?php

namespace Imi\Server\MQTT;

/**
 * MQTT 服务器类.
 */
class Server extends \Imi\Server\TcpServer\Server
{
    /**
     * 构造方法.
     *
     * @param string $name
     * @param array  $config
     * @param bool   $isSubServer 是否为子服务器
     */
    public function __construct($name, $config, $isSubServer = false)
    {
        parent::__construct($name, $config, $isSubServer);
        if (!isset($this->config['dataParser']))
        {
            $this->config['dataParser'] = \Imi\Server\MQTT\DataParser\MQTTDataParser::class;
        }
    }

    /**
     * 创建 swoole 服务器对象
     *
     * @return void
     */
    protected function createServer()
    {
        parent::createServer();
        $this->config['configs']['open_mqtt_protocol'] = true;
    }

    /**
     * 从主服务器监听端口，作为子服务器.
     *
     * @return void
     */
    protected function createSubServer()
    {
        parent::createSubServer();
        $this->config['configs']['open_mqtt_protocol'] = true;
    }
}
