<?php

namespace common\modules\loging\handlers\interfaces;

interface LogHandlerInterface
{
    public function createLog(string $message): void;
}