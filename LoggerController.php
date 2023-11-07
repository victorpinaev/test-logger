<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class LoggerController extends Controller
{
    /**
     * Sends a log message to the default logger.
     *
     * @return void
     */
    public function actionLog()
    {
        Yii::$app->logger->send('dgfgigfug ugfiguisgu ifugifg fd');
    }

    /**
     * Sends a log message to the default logger.
     *
     * @return void
     */
    public function actionLogTo(string $type)
    {
        Yii::$app->logger->sendByLogger('jhg yj ujykiu ujkt kitikluik', $type);
    }

    /**
     * Sends a log message to the default logger.
     *
     * @return void
     */
    public function actionLogToAll()
    {
        Yii::$app->logger->sendByAll('dgfgigfug ugfiguisgu ifugifg fd');
    }
}
