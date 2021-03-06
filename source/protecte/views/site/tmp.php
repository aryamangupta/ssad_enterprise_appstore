<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name;
?>
    <div class="container">


	<div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
<?php $image = (Yii::app()->baseUrl.'/images/app1.jpg') ; ?>
                                    <img class="slide-image" src="<?= $image ?>" alt="" style="width:100%;height:40%">
                                </div>
                                <div class="item">
<?php $image = (Yii::app()->baseUrl.'/images/app2.jpg') ; ?>
                                    <img class="slide-image" src="<?= $image ?>" alt=""style="width:100%;height:40%" >
                                </div>

<?php $image = (Yii::app()->baseUrl.'/images/banner1.jpg') ; ?>
                                <div class="item">
                                    <img class="slide-image" src="<?= $image ?>" alt="" style="width:100%;height:40%">
                                </div>
                            </div>
                                               </div>
                    </div>

                </div>

	
	</div>

<div class="container">
			<div class="row">
        
			
            
                <div class="col-md-9" >
	
	<?php $temp = Applications::model()->findAll(); ?>
		<?php $y=0; ?>
                <?php foreach ($temp as $x): ?>
			<?php if($y == 5){?>
			<?php	break; }?>
			<?php if( $x->status == 1){?>
			<?php $y=$y+1;?>	
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
				<?php $image = (Yii::app()->baseUrl.'/images/'.$x->logo) ; ?>
				
                            <img src= "<?= $image; ?>"  alt="" style="width:50%;height:40%">
                            <div class="caption">
                                <!--<h4 class="pull-right">$64.99</h4>-->
                                <h4><a href= <?=Yii::app()->basePath.'/views/applications&id='.$x->id?>><?= $x->name;?></a>
                                </h4>
																<div style="width: 30; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
                                <p><?= $x->description;?>.</p>
																</div>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php $count=0; ?><?php $rev = Comments::model()->findAll();//findByAttributes(array('application_id'=>$x->id , 'status'=>1 )); ?>
                <?php foreach ($rev as $z): ?>
			<?php if( $z->application_id == $x->id && $z->status == 1){?>
			<?php $count+=1;}?>
		<?php endforeach; ?><?= $count?>	 reviews</p>
                 reviews</p>
                                <p>
				
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
		<?php } ?>
	 <?php endforeach; ?>
                     

                    
            </div>
<div class="col-md-3">
                <p class="lead">Categories</p>
    
                <div class="list-group navbar">
                <ul style="list-style:none">
                <?php $temp = Categories::model()->findAll(); ?>
                <?php foreach ($temp as $x): ?>
                <li>	<a href="<?= '#'.$x->title;?>"href="#" class="list-group-item"><?= $x->title;?></a></li>
                 <?php endforeach; ?>
                </ul> 
                </div>
            </div>
        </div>

    </div>



<div class="container">

<?php $temp = Categories::model()->findAll(); ?>
<?php foreach ($temp as $category): ?>
<?php	$options = array('id' => $category->id);?>

<h2><a href=" <?php echo $this->createUrl('applications/ViewCategoryApps',$options); ?>" class="column"><?= $category->title;?></a></h2>
              
       
                <div class="row">
	<?php $app = Applications::model()->findAll();//findByAttributes(array('category_id'=>$category->id , 'status'=>1 )); ?>
		<?php $y=0; ?>
                <?php foreach ($app as $x): ?>
			<?php if($y == 5){?>
			<?php	break; }?>
			<?php if( $x->status == 1 && $x->category_id == $category->id){?>
			<?php $y=$y+1;?>	
                    <div class="col-sm-2 col-lg-2 col-md-2">
                        <div class="thumbnail">
				<?php $image = (Yii::app()->baseUrl.'/images/'.$x->logo) ; ?>
				
                            <img src= "<?= $image; ?>"  alt="" style="width:40%;height:20%">
                            <div class="caption">
                                <h4><a href="#"><?= $x->name;?></a>
                                </h4>
                               
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php $rev = Comments::model()->findAll();//findByAttributes(array('application_id'=>$x->id , 'status'=>1 )); ?>
		<?php $y=0; ?>
                <?php foreach ($rev as $z): ?>
			<?php if( $z->application_id == $x->id && $z->status == 1){?>
			<?php $y=$y+1;}?>
		<?php endforeach; ?><?= $y?>	 reviews</p>
                                <p>
				
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
		<?php } ?>
	 <?php endforeach; ?>
                     

                    
            </div>

        

   

<?php endforeach; ?>
       
</div>
    <!-- /.container -->

  
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  <div class="container">

      

       
</div>







