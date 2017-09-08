<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('generic');
		echo $this->Html->css('ui');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('lib/jquery-1.7.2.min');
		echo $this->Html->script('lib/jquery-ui-1.8.20.custom.min');
		echo $this->Html->css('jquery/ui-lightness/jquery-ui-1.8.20.custom');
		echo $this->Html->script('lib/generic');
	?>
	
</head>
<body>
	<?=$this->element('include');?>
	<div class="fiximages">
	</div>
	<div class="header">
		<?= $this->element('header'); ?>
	</div> 
	<div class="headmenue">
		<?= $this->element('headmenu'); ?>
	</div>
	<div class="clear"></div>
	<div class = "content bg1 txtC" style="min-height: 500px;">
		<?=$content_for_layout; ?>
	</div>
	
	<div class="clear"></div>
	
	<div class="clear Tmargin20"></div>
	<div class = "blease">
	</div>
	
</body>
</html>
