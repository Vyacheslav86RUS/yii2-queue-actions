# Расширение для поочередного запуска action

## Установка

Добавьте в repositories файла composer.json

    {
        "type": "git",
        "url": "git@github.com:Vyacheslav86RUS/yii2-queue-actions.git"
    }

Выполните

`composer require --prefer-dist Vyacheslav86RUS/yii2-queue-actions "*"`

## Использование в консольном приложении

        'queue-actions'=> [
             'class'=>QueueAction::class
             'queueActions'=>[
                'import/xml',
                'export/xls',
                ...
             ],
             'phpVersion' => 'php73' //не обязательный параметр (default php73)
        ] 
