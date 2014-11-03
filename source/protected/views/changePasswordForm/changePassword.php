<br>
<?php 
//   echo CHtml::errorSummary($model); 
?>
<div class = "form">
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'changePasswordForm-form',
    	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
            ),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>True,
)); ?>
<?php //$this->endWidget(); ?>


	<div class="row">
                <?php  $user = Users::model()->findByPk(Yii::app()->user->id);?>
		<?php if($user->role_id != 1 ) echo $form->labelEx($model,'currentPassword'); ?>
		<?php if($user->role_id != 1 ) echo $form->passwordField($model,'currentPassword'); ?>
		<?php echo $form->error($model,'currentPassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newPassword'); ?>
		<?php echo $form->passwordField($model,'newPassword'); ?>
		<?php echo $form->error($model,'newPassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newPassword_repeat'); ?>
		<?php echo $form->passwordField($model,'newPassword_repeat'); ?>
		<?php echo $form->error($model,'newPassword_repeat'); ?>
	</div>

        <div class="row submit">
                <?php echo CHtml::submitButton('Change password',array('confirm'=>'Are you sure?')); ?>
        </div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->




