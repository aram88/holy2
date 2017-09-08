<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo __("Կայքի Քարտեզ ")?></h3>
</div>
<div class="post_list Hmargin25 Tmargin25 lh20 fs12">
	<div class="floatL  Bpadding10 W100p">
		<span class="txtL fs16">
		 <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?>
		 <?php echo $this->Html->link("Հարց Քահանային","/questions/add",array("class"=>" C1 fs14 fwb txtL")); ?></span>
	</div>
</div>
<div class="post_list Hmargin25  lh20 fs12">
	<div class="floatL  Bpadding10 W100p">
		<span class="txtL fs16">
		 <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?>
		 <?php echo $this->Html->link("Հետադարձ Կապ","/staticpages/view/1",array("class"=>" C1 fs14 fwb txtL")); ?></span>
	</div>
</div>
<div class="post_list Hmargin25  lh20 fs12">
	<div class="floatL  Bpadding10 W100p">
		<span class="txtL fs16">
		 <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?>
		 <?php echo $this->Html->link("Նկարներ","/gallerygroups",array("class"=>" C1 fs14 fwb txtL")); ?></span>
	</div>
</div>
<?php foreach ($map_menus as $id=>$name) :?>
<div class="post_list Hmargin25 <?php if (empty($menu['Menu']['img']) ) {echo "Tmargin5";} else {echo "Tmargin25";}?> lh20 fs12">
	<div class="floatL  Bpadding10 W100p">
		<span class="txtL fs16">
		 <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?>
		 <?php echo $this->Html->link($name,"/menus/view/".$id,array("class"=>" C1 fs14 fwb txtL")); ?></span>
	</div>
</div>	
<?php endforeach; ?>