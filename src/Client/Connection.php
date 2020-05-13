<?php
namespace Imi\MQTT\Client;

use BinSoul\Net\Mqtt\Message;
use BinSoul\Net\Mqtt\DefaultConnection;

/**
 * MQTT 连接信息
 */
class Connection extends DefaultConnection
{
    /**
     * 主机地址
     *
     * @var string
     */
    private $host;

    /**
     * 端口号
     *
     * @var int
     */
    private $port;

    /**
     * 超时时间，单位：秒
     *
     * @var float|null
     */
    private $timeout;

    /**
     * Ping 时间间隔，为 NULL 则不自动 Ping
     *
     * @var float|null
     */
    private $pingTimespan;

    /**
     * Constructs an instance of this class.
     */
    public function __construct(
        string $host,
        int $port,
        ?float $timeout = null,
        ?float $pingTimespan = null,
        string $username = '',
        string $password = '',
        Message $will = null,
        string $clientID = '',
        int $keepAlive = 60,
        int $protocol = 4,
        bool $clean = true
    ) {
        parent::__construct($username, $password, $will, $clientID, $keepAlive, $protocol, $clean);
        $this->host = $host;
        $this->port = $port;
        $this->timeout = $timeout;
        $this->pingTimespan = $pingTimespan;
    }

    /**
     * Get 主机地址
     *
     * @return string
     */ 
    public function getHost()
    {
        return $this->host;
    }

    /**
     * With 主机地址
     *
     * @param string $host  主机地址
     *
     * @return self
     */ 
    public function withHost(string $host)
    {
        $result = clone $this;
        $result->host = $host;

        return $result;
    }

    /**
     * Get 端口号
     *
     * @return int
     */ 
    public function getPort()
    {
        return $this->port;
    }

    /**
     * With 端口号
     *
     * @param int $port  端口号
     *
     * @return self
     */ 
    public function withPort(int $port)
    {
        $result = clone $this;
        $result->port = $port;

        return $result;
    }

    /**
     * Get 超时时间，单位：秒
     *
     * @return float|null
     */ 
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * With 超时时间，单位：秒
     *
     * @param float $timeout  超时时间，单位：秒
     *
     * @return self
     */ 
    public function withTimeout(?float $timeout)
    {
        $result = clone $this;
        $result->timeout = $timeout;

        return $result;
    }

    /**
     * Get ping 时间间隔，为 NULL 则不自动 Ping
     *
     * @return float|null
     */ 
    public function getPingTimespan()
    {
        return $this->pingTimespan;
    }

    /**
     * With ping 时间间隔，为 NULL 则不自动 Ping
     *
     * @param float|null $pingTimespan  Ping 时间间隔，为 NULL 则不自动 Ping
     *
     * @return self
     */ 
    public function withPingTimespan($pingTimespan)
    {
        $result = clone $this;
        $result->pingTimespan = $pingTimespan;

        return $result;
    }

}
