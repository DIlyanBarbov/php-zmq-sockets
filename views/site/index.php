<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'PHP Web Sockets';
?>
<div class="site-index">
    <div class="jumbotron">
        <?= Html::a('Open file form', Url::to(['/file/form']), [
            'class' => 'btn btn-primary',
            'id'    => 'button-form',
        ]) ?>
    </div>
</div>

<!--<script>-->
<!--    $(function () {-->
<!--        let button = $('#button-start');-->
<!--        button.on('click', function () {-->
<!--            $.ajax({-->
<!--                url: button.data('url'),-->
<!--                type: 'post',-->
<!--                dataType: 'json'-->
<!--            }).done(function (response) {-->
<!--                if (response.success) {-->
<!--                    alert('File exists');-->
<!--                } else {-->
<!--                    alert('File does not exist');-->
<!--                }-->
<!--            });-->
<!--        })-->
<!--    })-->
<!--</script>-->
