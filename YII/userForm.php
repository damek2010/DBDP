<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
	if(Yii::$app->session->hasFlash('success')){
		echo Yii::$app->session->getFlash('success');
	}
?>


<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'email'); ?>

<?= Html::submitButton('Submit',['class'=>'btn btn-success']); ?>