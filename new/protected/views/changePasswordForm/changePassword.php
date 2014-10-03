<?php echo CHtml::errorSummary($model); ?>
<div class = "form">
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'changePasswordForm-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
)); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'currentPassword'); ?>
        <?php echo CHtml::activePasswordField($model,'currentPassword') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPassword'); ?>
        <?php echo CHtml::activePasswordField($model,'newPassword') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPasswordRepeat'); ?>
        <?php echo CHtml::activePasswordField($model,'newPasswordRepeat') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Change password'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
