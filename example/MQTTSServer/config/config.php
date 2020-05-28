<?php

use Imi\Log\LogLevel;
return [
    'configs'    =>    [
    ],
    // bean扫描目录
    'beanScan'    =>    [
        'ImiApp\MQTTServer\Controller',
    ],
    'beans'    =>    [
        'ConnectContextStore'   =>  [
            'handlerClass'  =>  'ConnectContextRedis',
        ],
        'ConnectContextRedis'    =>    [
            'redisPool' =>   'redis',
            'lockId'    =>   'redisConnectContextLock',
        ],
    ],
];