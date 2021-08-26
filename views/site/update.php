<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Yii2 Blog Platform';
?>
<div class="site-index">


    <h1 style="color:  #3498db;font-family: 'Oxygen', sans-serif; font-size: 30px">Update Blog</h1>

    <div class="body-content">
      <?php 
          $form = ActiveForm::begin()?>

      <div class="row">
        <div class="form-group ">
          <div class="col-lg-20">
            <?= $form->field($blogs, 'title');?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group ">
          <div class="col-lg-20">
            <?= $form->field($blogs, 'description')->textarea(['rows' => '6']);?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group ">
          <div class="col-lg-20">
            <?php $items = ['Science'=>'Science','Sports'=>'Sports','Technology'=>'Technology'] ?>
            <?= $form->field($blogs, 'category')->dropDownList($items,['prompt' => 'Select']);?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group ">
          <div class="col-lg-6">
            <div class="col-lg-4">
              <?= Html::submitButton('Update Blog',['class'=>'btn btn-primary']);?>
            </div>
            <br>
            <div class="col-lg-4">
              <a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
      </div>

      <?php ActiveForm::end() ?>
    </div>
</div>
