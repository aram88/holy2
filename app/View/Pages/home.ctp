<?php if (isset($stick_post['0']['Post']) && !empty($stick_post['0']['Post'])):;?>
		<?php foreach($stick_post as $post):?>
			<div class="post_list Hmargin25 Tmargin25 lh20 fs12">
				<div class="floatL  Bpadding10 W100p">
					<span class='txtL  fwb'> <?php echo $this->Html->link($post['Post']['name'],"/posts/view/".$post['Post']['id'],array("class"=>"fs14 C1 txtL")); ?></span>
					<span class="txtR floatR"><?php echo $post['Post']['created'];?></span>	
				</div>
				<?php if (!empty($post['Post']['img']) ):?>
					<div class="floatL">
						<?php echo $this->Html->link($this->Html->image('post/st'.$post['Post']['img']),"/posts/view/".$post['Post']['id'], array("class"=>"floatL post_img_mm Rmargin20 Tmargin5","escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']))?>
					</div>
				<?php endif;?>
				<div class="post_short_text txtJ">
					<?php if ($post['Post']['read_all'] == 0 ){ echo strip_tags($post['Post']['text']);} else {echo $post['Post']['text'];}?>
				
					<?php if ($post['Post']['read_all'] == 0 ){
							if ($post['Post']['read'] != 0 ){
								if ($post['Post']['type']==1){
									?>&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("... Լսել նյութը>>","/posts/view/".$post['Post']['id'],array("class"=>"C1 fwb"));
								}else {
									?>&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("... Ընթերցել գրառումը >>","/posts/view/".$post['Post']['id'],array("class"=>"C1 fwb"));
								}
								
							}?>
					<?php }?> 	
				</div>
			</div>
		<?php endforeach;?>
	<?php endif;?>
<?php if (isset($main_post['0']['Post']) && !empty($main_post['0']['Post'])):;?>
		<?php foreach($main_post as $post):?>
			<div class="post_list Hmargin25 Tmargin25 lh20 fs12">
				<div class="floatL  Bpadding10 W100p">
					<span class='txtL fwb'> <?php if (!isset($post['Post']['type'])){ ?>
							<?php echo $this->Html->link($post['Post']['name'],"/posts/view/".$post['Post']['id'],array("class"=>"fs14 C1 fwb txtL"));  ?>
							
							<?php } elseif ($post['Post']['type']==0) {
									echo $this->Html->link($post['Post']['name'],"/media/".$post['Post']['path'],array("class"=>"fs14 C1 fwb txtL","target"=>"_blank")); 
								} elseif( $post['Post']['type']==1) {
									 echo $this->Html->link($post['Post']['name'],"/posts/view/".$post['Post']['id'],array("class"=>"fs14 C1 fwb txtL"));
									 echo $this->Html->link($this->Html->image('home/mp3.png'),"/posts/view/".$post['Post']['id'],array('escape'=>false,'class'=>"floatL Rmargin10"));
								}
							?></span>
					<span class="txtR floatR"><?php echo $post['Post']['created'];?></span>	
				</div>
				<?php if (!empty($post['Post']['img']) ):?>
					<div class="floatL">
						<?php echo $this->Html->link($this->Html->image('post/st'.$post['Post']['img']),"/posts/view/".$post['Post']['id'], array("class"=>"floatL post_img_mm Rmargin20 Tmargin5","escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']))?>
					</div>
				<?php endif;?>
				<div class="post_short_text txtJ">
					<?php if ($post['Post']['read_all'] == 0 ){ echo strip_tags($post['Post']['text']);} else {echo $post['Post']['text'];}?>
					<?php if ($post['Post']['read_all']==0 ){
							if ($post['Post']['read']!=0 ){
								if ($post['Post']['type']==1){
									?>&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("... Լսել նյութը>>","/posts/view/".$post['Post']['id'],array("class"=>"C1 fwb"));
								}else {
									?>&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("... Ընթերցել գրառումը >>","/posts/view/".$post['Post']['id'],array("class"=>"C1 fwb"));
								}
								
							}?>
					<?php }?> 	 	
				</div>
			</div>
		<?php endforeach;?>
	<?php endif;?>	
	<div class="txtC">
		<?php echo $this->element('pagination');?>
	</div>	