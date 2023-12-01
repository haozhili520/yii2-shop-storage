<?php

use Tmzkj\Storage\Helpers\UrlConverter;

define('YII_DEBUG', true);

require_once '../vendor/autoload.php';
require_once '../vendor/yiisoft/yii2/Yii.php';

$storageConfig = [
    'class' => 'Tmzkj\Storage\Components\StorageComponent',
    'basePath' => 'temp/'
];

$app = new \yii\web\Application(
    [
        'id' => 'basic',
        'language' => 'zh-CN',
        'timeZone' => 'Asia/Shanghai',
        'basePath' => __DIR__,
        'components' => [
            'storage' => $storageConfig
        ]
    ]
);

/** @var \Tmzkj\Storage\Components\StorageComponent */
$storage = \Yii::$app->storage;

/** @var \Tmzkj\Storage\Drivers\BaseDriver */
$storage->setDriver([
    'class' => 'Tmzkj\Storage\Drivers\Local',
    // 'urlCallback' => new UrlConverter('https://replaced-domain.com?replaced-param=foo'),
]);

/** @var \Tmzkj\Storage\UploadedFile */
$file = $storage->getUploadedFile('file');

$res = $file->saveAsUniqueHash();

var_dump($res);