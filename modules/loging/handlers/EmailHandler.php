<?php

namespace common\modules\loging\handlers;

use common\modules\loging\handlers\interfaces\LogHandlerInterface;

class EmailHandler implements LogHandlerInterface
{
    public function createLog(string $message): void
    {
        echo '"' . $message . '"' . ' was sent via email <br>';
    }
}