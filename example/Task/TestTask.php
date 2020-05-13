<?php
namespace ImiApp\Task;

use Imi\Task\TaskParam;
use Imi\Task\Annotation\Task;
use Imi\Task\Interfaces\ITaskHandler;

/**
 * @Task("Test1")
 */
class TestTask implements ITaskHandler
{
    /**
     * 任务处理方法
     * @param TaskParam $param
     * @param \Swoole\Server $server
     * @param integer $taskID
     * @param integer $WorkerID
     * @return void
     */
    public function handle(TaskParam $param, \Swoole\Server $server, int $taskID, int $WorkerID)
    {
        $data = $param->getData();
        return date('Y-m-d H:i:s', $data['time']);
    }
 
    /**
     * 任务结束时触发
     * @param \swoole_server $server
     * @param int $taskId
     * @param mixed $data
     * @return void
     */
    public function finish(\Swoole\Server $server, int $taskID, $data)
    {
    }

}