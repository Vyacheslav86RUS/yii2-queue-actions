<?php

namespace vyacheslav\qactions;

use yii\base\Action;
use yii\console\ExitCode;
use yii\helpers\Console;

class QueueAction extends Action
{
    /**
     * ```
     *  'queue-actions'=> [
     *      'class'=>QueueAction::class //(текущий)
     *      'actions'=>[
     *          'import/xml',
     *          'export/xls'
     *      ]
     *  ]
     * ```
     */
    public $queueActions;

    /* @var string Команда для запуска экшенов */
    public $phpVersion = 'php73';

    /**
     * Выполнение очереди
     */
    public function run()
    {
        Console::output('Запускаем процесс выполнения очереди...');

        foreach ($this->queueActions as $keys => $action) {
            Console::output("\r\nПроцесс: $action");
            $comand = $this->phpVersion . ' ' . \Yii::getAlias('@app') . '/yii ' . $action;
            exec($comand, $execOutput, $execReturn);

            Console::output("Команда $comand завершилась с результатом - $execReturn (0 - ОК, остальное не ОК)");
            Console::output('Логи выполнения:');
            Console::output(implode("\r\n", $execOutput));

            $execOutput = null;
        }

        Console::output("Процесс выполнения очереди выполнен!\r\n");

        return ExitCode::OK;
    }
}
