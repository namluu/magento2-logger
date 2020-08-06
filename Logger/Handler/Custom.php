<?php
namespace Namluu\CustomLogger\Logger\Handler;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class Custom extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/namluu_custom.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}
