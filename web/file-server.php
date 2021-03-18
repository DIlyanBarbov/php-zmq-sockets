<?php

use app\handlers\FileHandler;
use app\models\File;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../models/File.php';

$server = new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REP);
$server->bind("tcp://127.0.0.1:5555");

while ($fileData = $server->recv()) {
    echo "Received message{$fileData}\n";
    echo "Starting application...\n";
    $config = require __DIR__ . '/../config/console.php';
    (new yii\console\Application($config))->run();
    echo "Handling data...\n";
    $file = new File();
    if (str_contains($fileData, '-check')) {
        $fileData = str_replace('-check', '', $fileData);
        $fileData = json_decode($fileData, true);
        $success  = File::find()->where([
            'and',
            ['md5' => $fileData['md5']],
            ['sha512' => $fileData['sha512']],
            ['file_version' => $fileData['file_version']],
            ['file_ext' => $fileData['file_ext']],
            ['file_name' => $fileData['file_name']],
        ])->exists();
    } elseif (str_contains($fileData, '-upload')) {
        $fileData = str_replace('-upload', '', $fileData);
        $file->load(json_decode($fileData, true));
        if ($file->save()) {
            $success = true;
        }
        echo $file->getErrors();
        $success = false;
    }
    echo "Sending response data...\n";
    $server->send($success ? 'true' : 'false');
}