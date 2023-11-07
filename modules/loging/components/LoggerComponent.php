<?php

namespace common\modules\loging\components;

use common\modules\loging\handlers\interfaces\LogHandlerInterface;
use Yii;
use yii\base\Component;
use common\modules\loging\interfaces\LoggerInterface;
use yii\base\Exception;
use yii\base\InvalidConfigException;

class LoggerComponent extends Component implements LoggerInterface
{
    public string $loggerType = '';
    public array $handlers = [];
    private array $handlerInstances = [];

    public function init(): void
    {
        parent::init();

        $this->initHandlers();
    }

    public function send(string $message): void
    {
        $logger = $this->getCurrentHandleInstance();
        $logger->createLog($message);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $logger = $this->getCurrentHandleInstance($loggerType);
        $logger->createLog($message);
    }

    public function sendByAll($message): void
    {
        foreach ($this->handlerInstances as $handler) {
            $handler->createLog($message);
        }
    }

    public function getType(): string
    {
        return $this->loggerType;
    }

    public function setType(string $type): void
    {
        $this->loggerType = $type;
    }

    private function initHandlers(): void
    {
        foreach ($this->handlers  as $loggerType => $config) {
            try {
                $this->handlerInstances[$loggerType] = Yii::createObject($config);
            } catch (InvalidConfigException $e) {
                Yii::error($e);
            }
        }
    }

    private function getCurrentHandleInstance(string $loggerType = null): LogHandlerInterface
    {
        if (is_null($loggerType)) {
            $loggerType = $this->loggerType;
        }

        if (!array_key_exists($loggerType, $this->handlerInstances)) {
            throw new Exception('Logger type undefined ');
        }

        return $this->handlerInstances[$loggerType];


    }
}