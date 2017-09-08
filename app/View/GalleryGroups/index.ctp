<?php echo $this->Html->css('gallery/style')?>
<div class="bg">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Նկարներ</h3>
</div>

<div class="Rmargin30">
		<?php if (isset($galleries)){?>
		<ul class="galleries">
			<?php foreach ($galleries as $gallery):?>
				<li>
					<div>
					<?php echo $this->Html->link($this->Html->image('gallery_group/'.$gallery['GalleryGroup']['image']),'/gallery_groups/view/'.$gallery['GalleryGroup']['id'],array('escape'=>false))?>
					</div>
					<div class="title">
						<?php echo $this->Html->link($gallery['GalleryGroup']['name'],'/gallery_groups/view/'.$gallery['GalleryGroup']['id'], array('class'=>'C1'));?>
					</div>
				</li>
			<?php endforeach;?>
		</ul>
		<?php } else { ?>
		<span>
			Դեռևս նկարներ չեն ավելացվել:
		</span>
		<?php }?>
		
		
</div>
<div class="clear "></div>
	<div class="txtC">
			<?php echo $this->element('pagination');?>
	</div>
		


