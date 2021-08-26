<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Yii2 Blog Platform';
?>
<div class="site-index">


    <h1 style="color:  #3498db;font-family: 'Oxygen', sans-serif; font-size: 30px" >View Blog</h1>

    <div class="body-content">
    

      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <?php echo $blogs->title; ?>
         
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
           <?php echo $blogs->description; ?>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
         
            <?php echo $blogs->category; ?>
            
        </li>
      </ul>
      <div style="margin-top: 20px" class="col-lg-6">
        <a href=<?php echo yii::$app->homeUrl;?> class="btn btn-primary">Back</a>
      </div>
    </div>
</div>
