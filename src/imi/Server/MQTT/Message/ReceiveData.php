<?php
namespace Imi\Server\MQTT\Message;

use Imi\App;
use BinSoul\Net\Mqtt\PacketStream;
use Imi\Server\MQTT\Exception\InvalidReceiveData;

class ReceiveData implements IReceiveData
{
    /**
     * 客户端连接的标识符
     * @var int
     */
    protected $fd;

    /**
     * Reactor线程ID
     * @var int
     */
    protected $reactorID;

    /**
     * 接收到的数据
     *
     * @var string
     */
    protected $data;

    /**
     * 接收到的数据
     *
     * @var \BinSoul\Net\Mqtt\Packet
     */
    protected $formatData;

    public function __construct(int $fd, int $reactorID, $data)
    {
        $this->fd = $fd;
        $this->reactorID = $reactorID;
        $this->data = $data;
        /** @var \BinSoul\Net\Mqtt\DefaultPacketFactory $packetFactory */
        $packetFactory = App::getBean(\BinSoul\Net\Mqtt\DefaultPacketFactory::class);
        if(!isset($data[0]))
        {
            throw new InvalidReceiveData;
        }
        $type = ord($data[0]) >> 4;
        $this->formatData = $packet = $packetFactory->build($type);
        $packet->read(new PacketStream($data));
    }

    /**
     * 获取客户端的socket id
     * @return int
     */
    public function getFd(): int
    {
        return $this->fd;
    }

    /**
     * 数据内容，可以是文本内容也可以是二进制数据，可以通过opcode的值来判断
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 获取格式化后的数据，一般是数组或对象
     * @return \BinSoul\Net\Mqtt\Packet
     */
    public function getFormatData()
    {
        return $this->formatData;
    }

    /**
     * 获取Reactor线程ID
     *
     * @return int
     */
    public function getReactorID(): int
    {
        return $this->reactorID;
    }
}