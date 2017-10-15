<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'frontend')->textInput(); ?>

<?= $form->field($model, 'backend')->textInput(); ?>

<?= $form->field($model, 'api')->textarea(); ?>

<div class="form-group">
	<?= Html::submitButton(t('action', 'SAVE'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
