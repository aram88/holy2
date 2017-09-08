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
<!--[if lt IE 7 ]> <html class="ie6 ie"> <![endif]-->
<!--[if IE 7 ]> <html class="ie7 ie"> <![endif]-->
<!--[if IE 8 ]> <html class="ie8 ie"> <![endif]-->
<!--[if IE 9 ]> <html class="ie9 ie"> <![endif]-->
<meta http-equiv="Cache-Control" content="no-store" />


<head>


	<?php 
	echo $this->fetch('meta');
	echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $title_for_layout; ?>
	</title>
	<?=$this->element('include');?>
	<?php
		
		echo $this->Html->meta('og:image', $this->fetch( 'fb-image' ) );
		echo $this->Html->meta('icon');
		echo $this->Html->css('generic');
		echo $this->Html->css('ui');
		
		
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('lib/jquery-1.7.2.min');
		echo $this->Html->script('lib/jquery-ui-1.8.20.custom.min');
		echo $this->Html->css('jquery/ui-lightness/jquery-ui-1.8.20.custom');
		 echo $this->Html->script('timepiker/jquery-ui-timepicker-addon');
		echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru');
		echo $this->Html->script('lib/generic');
	?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34696108-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<?=$this->element('icons');?>
	
	<div class="fiximages">
	</div>
	<div class="header">
		<?= $this->element('header'); ?>
	</div> 
	<div class="headmenue">
		<?= $this->element('headmenu'); ?>
	</div>
	<div class="clear"></div>
	<div class = "content bg">
		<div class = "leftpanel ">
			<?=$this->element('left_panel'); ?>
		</div>
		
		<div class = "midle bg1 Bpadding30">
			<?=$this->element('flash');?>
			<!-- Add also slider 
			<div class="slider-wrapper theme-default">
				<?=$this->element('slider'); ?>
			</div>
			-->
			<?=$content_for_layout; ?>
			 
		</div>
		
		<div class ="rightpanel " >
			<?=$this->element('right_panel'); ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class = "blease">
	</div>
	<div class="clear"></div>
	<div class="web txtC">
		<div class="Lmargin15 floatL Rmargin10">
			Website by A. Grigoryan
		</div> 
		 <div class="floatR Rmargin20"> 
		 <a href="mailto:aramgrig@hotmail.com"> aramgrig@hotmail.com</a>
		 </div>
		 <div class="floatR Rmargin10"> 
		  Mail 
		 </div>
		<div class="floatR Rmargin10"> 
			 +374 93532025
		</div>
		<div class="floatR Rmargin10"> 
			Tel. 
		</div>
		
	</div>
	
	
</body>
</html>
