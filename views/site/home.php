<?php
use yii\helpers\html;
/* @var $this yii\web\View */

$this->title = 'Yii2 Blog Platform';
?>
<div class="site-index">
<?php if(yii::$app->session->hasFlash('message')):?>
  <div class="alert alert-dismissible alert-success">
     <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
     <?php echo yii::$app->session->getFlash('message');?>
  </div>
<?php endif;?>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet"> 


    <div class="jumbotron text-center bg-transparent">
        <h1 style="color:  #cb4335; font-weight: 500  " class="display-4">Create your Blog and Share to the World!</h1>
        <h5 style="color:  #3498db;font-family: 'Oxygen', sans-serif; font-size: 30px">Flickcall Internship Task</h5>
    </div>
    <div class="row">
        <span style="margin-bottom: 25px"><?= Html::a('Create',['/site/create'],['class' => 'btn btn-primary'])?></span>

    </div>

    <div class="body-content">

        <div class="row">


            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Blog Title</th>
                  <th scope="col">Blog Description</th>
                  <th scope="col">Blog Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($blogs) > 0): ?>
                    <?php foreach($blogs as $blog): ?>
                <tr class="table-active">
                  <th scope="row"><?php echo $blog->id; ?></th>
                  <td><?php echo $blog->title; ?></td>
                  <td><?php echo $blog->description; ?></td>
                  <td><?php echo $blog->category; ?></td>
                  <td>
                      <span><?= Html::a('View',['view','id'=>$blog->id],['class'=>'btn btn-success']) ?></span>
                      <span><?= Html::a('Update',['update','id'=>$blog->id],['class'=>'btn btn-default']) ?></span>
                      <span><?= Html::a('Delete',['delete','id'=>$blog->id],['class'=>'btn btn-danger']) ?></span>
                  </td>
                </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td>No Records Found! </td>
                    </tr>
                <?php endif; ?>
                
              </tbody>
            </table>


         
        </div>

    </div>
</div>
