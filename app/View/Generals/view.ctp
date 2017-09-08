<?php if (isset($day)){ ?>
<div class="days view">
<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $day['Day']['name'];?></h3>
</div>


	<?php	foreach ($day['Event'] as $event): ?>
		<div class="post_list Hmargin25 Tmargin25 lh20 fs12">
			<div class="floatL  Bpadding10 W100p">
				<span class='txtL'>	
					 <?php echo $this->Html->link($event['name'],'/events/view/'.$event['id'],array('class'=>'fs14 C1 fwb txtL')) ?>
				</span>
			</div>		 
			<div class="post_short_text txtJ">
								<?php echo strip_tags($event['text'])?>&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("... Ընթերցել գրառումը  >>",'/events/view/'.$event['id'],array("class"=>"C1 fwb ")); ?> 	
			</div>
		</div>
	<?php endforeach; ?>
	<?php	foreach ($day['Reading'] as $reading): ?>
		<div class="post_list Hmargin25 Tmargin25 lh20 fs12">
			<div class="floatL  Bpadding10 W100p">
				<span class='txtL'>	
					 <?php echo $this->Html->link($reading['name'],'/readings/view/'.$reading['id'],array('class'=>'fs14 C1 fwb txtL')) ?>
				</span>
			</div>		 
			<div class="post_short_text txtJ">
								<?php echo strip_tags($reading['text'])?>&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("... Ընթերցել գրառումը  >>",'/readings/view/'.$reading['id'],array("class"=>"C1 fwb ")); ?> 	
			</div>
		</div>
	<?php endforeach; ?>	
	


</div>
<?php }else {?>
<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $generals['0']['General']['created'];?></h3>
	</div>
<?php }?>
		<?php foreach($generals as $post):?>
			<?php if ($post['Post']['read']==1) {?>
					<div class="post_list Hmargin25 Tmargin25 lh20 fs12">
						<div class="floatL  Bpadding10 W100p">
							<span class='txtL'>	
							<?php if (!isset($post['Post']['type'])){ ?>
							<?php echo $this->Html->link($post['Post']['name'],"/posts/view/".$post['Post']['id'],array("class"=>"fs14 C1 fwb txtL")); ?>
							<?php } elseif ($post['Post']['type']==0) {
									echo $this->Html->link($post['Post']['name'],"/media/".$post['Post']['path'],array("class"=>"fs14 C1 fwb txtL","target"=>"_blank")); 
								} elseif ($post['Post']['type']==1) {
									 echo $this->Html->link($post['Post']['name'],"/posts/view/".$post['Post']['id'],array("class"=>"fs14 C1 fwb txtL"));  
									 echo $this->Html->link($this->Html->image('home/mp3.png'),"/posts/view/".$post['Post']['id'],array('escape'=>false,'class'=>"floatL Rmargin10"));
								}
							?>
							</span>
						</div>
						<?php if (!isset($post['Post']['type'])){ ?>
								<?php if (!empty($post['Post']['img']) ):?>
									<div class="floatL">
										<?php echo $this->Html->link($this->Html->image('post/st'.$post['Post']['img']),"/posts/view/".$post['Post']['id'], array("class"=>"floatL post_img_mm Rmargin20 Tmargin5","escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']))?>
									</div>
								<?php endif;?>	
						<?php }else {?>
								<?php if (!empty($post['Post']['img']) ):?>
								<div class="floatL">
										<?php echo $this->Html->link($this->Html->image('post/st'.$post['Post']['img']),"/media/".$post['Post']['path'], array("class"=>"floatL post_img_mm Rmargin20 Tmargin5","target"=>"_blank", "escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']))?>
									</div>
								<?php endif;?>	
								
						<?php }?>		
						<div class="post_short_text txtJ">
							<?php if  ($post['Post']['type'] ===0){} else { echo strip_tags($post['Post']['text'],'<iframe>');}?>&nbsp;&nbsp;&nbsp;<?php if ($post['Post']['type'] ==''){echo $this->Html->link("... Ընթերցել գրառումը  >>","/posts/view/".$post['Post']['id'],array("class"=>"C1 fwb "));} ?> 	
						</div>
					</div>
			<?php } else {?>
				<div class="post_list Hmargin25 Tmargin15  fs12">
						<div class="floatL  W100p">
							<span class='txtL'>
							<?php if (!isset($post['Post']['type'])){ ?>
							<?php echo $this->Html->link($post['Post']['name'],"/posts/view/".$post['Post']['id'],array("class"=>"fs14 C1 fwb txtL"));  ?>
							
							<?php } elseif ($post['Post']['type']==0) {
									echo $this->Html->link($post['Post']['name'],"/media/".$post['Post']['path'],array("class"=>"fs14 C1 fwb txtL","target"=>"_blank")); 
								} elseif( $post['Post']['type']==1) {
									 echo $this->Html->link($post['Post']['name'],"/posts/view/".$post['Post']['id'],array("class"=>"fs14 C1 fwb txtL"));
									 echo $this->Html->link($this->Html->image('home/mp3.png'),"/posts/view/".$post['Post']['id'],array('escape'=>false,'class'=>"floatL Rmargin10"));
								}
							?>
							</span>
						</div>
					</div>
					
			<?php }?>
		<?php endforeach;?>
		
		
		<div class="txtC">
			<?php echo $this->element('pagination');?>
		</div>
	

