<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Sensors;
use app\models\SmsCenter;
use app\models\Terminals;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CronController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionStatus()
    {
    	$sensors = Sensors::find()->all();
    	foreach ($sensors as $sensor) 
    		$sensor->runStatus();

        $terminals = Terminals::find()->all();
        foreach ($terminals as $terminal) 
            $terminal->runStatus();
    }
}
