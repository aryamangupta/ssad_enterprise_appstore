

<h1>Applications</h1>

<?php $temp = Applications::model()->findAll(); ?>
<?php foreach ($temp as $x): ?>
	
    <li><?= $x->name;?></li>
    <br>
   <?php endforeach; ?>
