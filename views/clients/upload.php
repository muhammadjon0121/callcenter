<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CsvClientsImport */
/* @var $form ActiveForm */
?>
<div class="clients-upload">

    <?php $form = ActiveForm::begin(); ?>
    <?=$form->field($model, 'csv')->fileInput();?>
        <div class="form-group">
            <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- clients-upload -->
