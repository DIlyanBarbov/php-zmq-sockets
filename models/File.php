<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string|null $md5
 * @property string|null $sha512
 * @property string|null $date
 * @property float|null $file_version
 * @property string|null $file_ext
 * @property string|null $file_name
 */

class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe',],
            [['file_version'], 'number'],
            [['md5', 'sha512'], 'string', 'max' => 64],
            [['file_ext'], 'string', 'max' => 30],
            [['file_name'], 'string', 'max' => 50],
            [['md5'], 'unique'],
            [['sha512'], 'unique'],
            [['date', 'file_version', 'md5', 'sha512', 'file_ext', 'file_name'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'md5' => 'Md5',
            'sha512' => 'Sha512',
            'date' => 'Date',
            'file_version' => 'File Version',
            'file_ext' => 'File Ext',
            'file_name' => 'File Name',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }
}
