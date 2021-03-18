<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\File */
/* @var $form ActiveForm */

?>
<div class="form">

    <?php $form = ActiveForm::begin([
        'id' => 'file-form',
    ]); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::class, [
        'readonly'      => true,
        'pluginOptions' => [
            'format' => 'mm/dd/yyyy',
        ],
    ]) ?>
    <?= $form->field($model, 'file_version')->input('number') ?>
    <?= $form->field($model, 'md5') ?>
    <?= $form->field($model, 'sha512') ?>
    <?= $form->field($model, 'file_ext')->textInput(['maxlength' => 30]) ?>
    <?= $form->field($model, 'file_name')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton('Check', ['class' => 'btn btn-primary', 'id' => 'check-file-button']) ?>
    </div>
    <!--    <div class="form-group">-->
    <!--        --><? //= Html::submitButton('Upload', ['class' => 'btn btn-primary disabled hidden', 'id' => 'upload-file-button']) ?>
    <!--    </div>-->
    <?php ActiveForm::end(); ?>
</div>
<script>
    $(document).ready(function () {
        $('#check-file-button').on('click', function () {
            let form = $('#file-form');
            form.on('beforeSubmit', function () {
                let data = form.serialize();
                $.ajax({
                    url: form.attr('action'),
                    method: 'post',
                    data: data,
                    dataType: 'json',
                }).done(function (response) {
                    if (response.success) {
                        alert('File exists.');
                    } else {
                        // $('#check-file-button').addClass('disabled');
                        // $('#upload-file-button').removeClass('disabled hidden');
                        alert('File does not exist.');
                    }
                });
                return false;
            });
        });
        // $('#upload-file-button').on('click', function () {
        //     let form = $('#file-form');
        //     form.on('beforeSubmit', function (e) {
        //         let data = form.serialize();
        //         $.ajax({
        //             url: '/file/upload',
        //             method: 'post',
        //             data: data,
        //             dataType: 'json',
        //         }).done(function (response) {
        //             if (response.success) {
        //                 $('#check-file-button').removeClass('disabled');
        //                 $('#upload-file-button').addClass('disabled hidden');
        //                 alert('Successfully uploaded file.');
        //             } else {
        //                 alert('Failed to upload file. Either it exists already or a validation error has occurred.');
        //             }
        //         });
        //         return false;
        //     });
        // });
    });
</script>
