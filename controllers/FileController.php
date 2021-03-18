<?php

namespace app\controllers;

use app\models\File;
use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\web\Controller;
use ZMQ;
use ZMQContext;
use ZMQSocket;

class FileController extends Controller
{
    public function actionForm()
    {
        $model   = new File();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $fileData = $request->post('File');
            $socket   = new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ, 'pusher');
            $socket->connect("tcp://127.0.0.1:5555");
            $socket->send(json_encode($fileData) . '-check');
            if ($message = $socket->recv()) {
                if ($message === 'true') {
                    $socket->disconnect("tcp://127.0.0.1:5555");
                    return $this->asJson(['success' => true]);
                }
            }
            $socket->disconnect("tcp://127.0.0.1:5555");
            return $this->asJson(['success' => false]);
        }
        return $this->render('_form', ['model' => $model]);
    }

    public function generateRandomDate()
    {
        $year  = mt_rand(1000, date("Y"));
        $month = mt_rand(1, 12);
        $day   = mt_rand(1, 28);
        return $year . '-' . $month . '-' . $day;
    }

    public function generateRandomString($length = 10)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}


//        $fileData = [
//            'File' => [
//                'date'         => $this->generateRandomDate(),
//                'file_version' => mt_rand(1, 1000000),
//                'md5'          => hash('md5', $this->generateRandomString()),
//                'sha512'       => hash('sha512', $this->generateRandomString()),
//                'file_ext'     => $this->generateRandomString(3),
//                'file_name'    => $this->generateRandomString(8),
//            ],
//        ];
