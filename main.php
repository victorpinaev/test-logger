<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'logger' => [
            'class' => \common\modules\loging\components\LoggerComponent::class,
            'handlers' => [
                'email' => [
                    'class' => \common\modules\loging\handlers\EmailHandler::class,
                    'defaultEmail' => 'xxxxx@xx.zz',
                ],
                'db' => [
                    'class' => \common\modules\loging\handlers\DbHandler::class,
                ],
                'file' => [
                    'class' => \common\modules\loging\handlers\FileHandler::class,
                ],
            ],
            'loggerType' => 'email'
        ],
    ],
];
