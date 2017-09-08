<?php echo $this->Html->script("source/jquery.fancybox.pack.js?v=2.0.6"); 
	  echo $this->Html->script("source/helpers/jquery.fancybox-buttons.js?v=1.0.2"); 
      echo $this->Html->script("source/helpers/jquery.fancybox-media.js?v=1.0.0"); 
      echo $this->Html->script("source/helpers/jquery.fancybox-thumbs.js?v=2.0.6");
      echo $this->Html->script("gallery/slideshow");
      echo $this->Html->css("gallery/slideshow");
      echo $this->Html->css('source/helpers/jquery.fancybox-buttons.css?v=1.0.2');
      echo $this->Html->css('source/jquery.fancybox.css?v=2.0.6');
      echo $this->Html->css('source/helpers/jquery.fancybox-thumbs.css?v=2.0.6');
?>
<div class="menus view">
	<div class="crumb Hmargin20 Tmargin15">
		<?php   
			if(isset($gallery)){
				
					$this->Html->addCrumb("Նկարներ",'/gallery_groups/',array('class' => 'Lpadding5 Bpadding5')) ;
				
			} 
			$this->Html->addCrumb('','') ;
            echo $this->Html->getCrumbs(' > ',' Սկիզբ', array('class' => ''));
          
          
		?>
			<span class=" Lpadding5 ft-size"><?php  echo $gallery['0']['GalleryGroup']['name'];?></span>
	</div>	

	<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $gallery['0']['GalleryGroup']['name'];?></h3>
	</div>



	<div>
		<ul class="gallery_images">
			<?php foreach ($gallery['0']['Gallery'] as $img):?>
				<li class="floatL">
					<a class="fancybox" rel="group" href="" title="<?= $img['name']?>" >
					<?php echo $this->Html->image("/img/gallery/".$img['image'],array("height"=>"150px", "title"=>$img['name']))?>
					</a>
				</li>
			<?php endforeach;?>
			
		</ul>
	</div>
</div>
