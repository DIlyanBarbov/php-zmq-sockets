<?php

namespace app\handlers;

use app\models\File;
use Yii;

class FileHandler
{
    public $file;
    private $fileData;

    public function __construct($fileData)
    {
        $this->fileData = $fileData;
    }

    public function handleFileData()
    {
        $this->file = new File();

        if (str_ends_with($this->fileData, '-check')) {
            str_replace('-check', '', $this->fileData);
            $this->file->load(json_decode($this->fileData, true));
            return File::find()->where([
                'and',
                ['md5' => $this->file->md5],
                ['sha512' => $this->file->sha512],
                ['date' => $this->file->date],
                ['file_version' => $this->file->file_version],
                ['file_ext' => $this->file->file_ext],
                ['file_name' => $this->file->file_name],
            ])->exists();
        }
        str_replace('-upload', '', $this->fileData);
        $this->file->load(json_decode($this->fileData, true));
        if($this->file->save()){
            return true;
        }
        Yii::info(\yii\helpers\VarDumper::dumpAsString($this->file->getErrors()));
        return false;
    }

}