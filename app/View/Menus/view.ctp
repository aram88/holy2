<div class="menus view">
	<div class="crumb Hmargin20 Tmargin15">
		<?php  
		if(isset($menu)){} 
			if(isset($parents)){
				foreach ($parents as $parent){
					$this->Html->addCrumb($parent['name'],'/menus/view/'.$parent['id'],array('class' => 'Lpadding5 Bpadding5')) ;
				}
			} 
			$this->Html->addCrumb('','') ;
            echo $this->Html->getCrumbs(' > ',' Գլխավոր', array('class' => ''));
          
          
		?>
			<span class=" Lpadding5 ft-size"><?php echo $menu['Menu']['name'];?></span>
	</div>	


	<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $menu['Menu']['name'];?></h3>
	</div>
	<?php if (empty($menu['Menu']['menu_id'])  ):?>
	
	<div class="post_list margin25 lh20 fs12">
				<?php if (!empty($menu['Menu']['img']) ):?>
					<div class="floatL">
						<?php echo $this->Html->image('menu/'.$menu['Menu']['img'],array('class'=>"floatL Rmargin20 Tmargin5","escape"=>false));?>
					</div>
					<?php endif;?>	
				<?php if (!empty($menu['Menu']['text']) ):?>
					<div class="post_short_text txtJ lh24">
						<?php echo $menu['Menu']['text']?> 	
					</div>
				<?php endif;?>	
				
			</div>	
	<?php endif;?>		
	<?php if (!empty($menus['0']['Menu'])): ?>
		<?php foreach ($menus as $menu1) : if ($menu1['Menu']['main_show'] == 1) :?>
			<div class="post_list Hmargin25 <?php if (empty($menu1['Menu']['img']) ) {echo "Tmargin5";} else {echo "Tmargin25";}?> lh20 fs12">
				<div class="floatL  Bpadding10 W100p">
				
					<span class="txtL <?php if (empty($menu1['Menu']['img']) ) {echo "fs16";}?>"> <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?>	<?php echo $this->Html->link($menu1['Menu']['name'],"/menus/view/".$menu1['Menu']['id'],array("class"=>" C1 fs14 fwb txtL")); ?></span>
				</div>
				<?php if (!empty($menu1['Menu']['img']) ):?>
					<div class="floatL">
						<?php echo $this->Html->link($this->Html->image('menu/st'.$menu1['Menu']['img']),"/menus/view/".$menu1['Menu']['id'], array("class"=>"floatL post_img_mm Rmargin20 Tmargin5","escape"=>false,'title'=>$menu1['Menu']['img_name'],'alt'=>$menu1['Menu']['img_name']))?>
					</div>
					<div class="post_short_text txtJ">
						<?php echo $menu1['Menu']['text']?>&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("... Ընթերցել նյութերը  >>","/menus/view/".$menu1['Menu']['id'],array("class"=>"C1 fwb ")); ?> 	
					</div>
				<?php endif;?>
			</div>
			<?php endif;?>	
		<?php endforeach;?>
		<div class="txtC">
			<?php echo $this->element('pagination');?>
		</div>
	<?php endif;?>
	<?php if (isset($menus['0']['Post']) && !empty($menus['0']['Post'])):;?>
		<?php foreach($menus as $post):?>
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
							<span class="txtR floatR"><?php echo $post['Post']['created'];?></span>	
						</div>
						<?php if (!isset($post['Post']['type'])){ ?>
								<?php if (!empty($post['Post']['img']) ):?>
									<div class="floatL">
										<?php echo $this->Html->link($this->Html->image('post/st'.$post['Post']['img']),"/posts/view/".$post['Post']['id'], array("class"=>"floatL post_img_mm Rmargin20 Tmargin5","escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']))?>
									</div>
								<?php endif;?>
						<?php }else {?>
								<div class="floatL">
										<?php echo $this->Html->link($this->Html->image('post/st'.$post['Post']['img']),"/media/".$post['Post']['path'], array("class"=>"floatL post_img_mm Rmargin20 Tmargin5","target"=>"_blank", "escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']))?>
									</div>
								
						<?php }?>		
						<div class="post_short_text txtJ">
							<?php echo strip_tags($post['Post']['text'],'<iframe>')?>&nbsp;&nbsp;&nbsp;<?php if ($post['Post']['type']==1) {echo $this->Html->link("...  Լսել Նյութը >>","/posts/view/".$post['Post']['id'],array("class"=>"C1 fwb ")); }else {echo $this->Html->link("... Ընթերցել գրառումը  >>","/posts/view/".$post['Post']['id'],array("class"=>"C1 fwb "));} ?> 	
						</div>
					</div>
			<?php }elseif ($post['Post']['read_all']==1){?>
						<div class="post lh24 Hmargin25 Vmargin30 txtJ">
							<?php if(!empty($post['Post']['img'])):?>
								<?php echo $this->Html->image('post/'.$post['Post']['img'],array('class'=>"floatL Rmargin20 Tmargin5","escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']));?>
							<?php  endif;?>	
						    <?php echo $post['Post']['text'];?> 	
						    <div class="floatL W200 Tmargin10"><?php  echo $this->element('share');?></div>
						    <div class="txtR Tmargin10 floatR">	 <?php echo $post['Post']['created'];?></div>
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
	<?php endif;?>	
		
	<?php if (empty($menus['0']['Menu'])&& empty($menus['0']['Post']) &&(empty($menu['Menu']['text']))):?>
	<span class="Lmargin25">Դեռևս նյութեր չկան ավելացված </span>
	<?php endif;?>
	
	<?php  if ($menu['Menu']['id']==134) {?>
		<div class="bg">
			<h3 class='text_header  Hmargin20 padding5 txtC'>Հետադարձ կապ</h3>
		</div>
		<div class="post_list margin25 txtC lh20 fs12">
			<div>
				Ձեզ հետաքրքրող հարցերով և  խնդիրներով կարող եք գրել մեզ: 
			</div>
			<div>
				Երևանի Սուրբ Երրորդություն Եկեղեցի 
			</div>
			<div>
					Հասցե ` Երևան, ՀԱԹ, Րաֆֆու փողոց
			</div>
			<div>
					Հեռ. +374 10 72 78 34
			</div>
			<div>
					Բջջ. +374 99 90 95 15
			</div>
			<div>
					Էլ. փոստ daycenter.am@gmail.com
			</div>
		</div>
		<style type="text/css"">
				#MenuMailtext {width: 299px; border: none;}
		</style>
	<?php  echo $this->Form->create('Menu',array('url'=>array('controller'=>'menus','action'=>'sendmail')));
		echo $this->Form->input('subject',array('label'=>'Թեման') );
		echo $this->Form->input('mail',array('label'=>'Էլեկտրոնային հասցեն'));
		echo $this->Form->input('mailtext',array('label'=>'Բովանդակությունը','type'=>'textarea'));
		echo $this->Form->submit(__('Ուղարկել'),array('class'=>'button Lmargin150','label'=>'  ')); 
		echo $this->Form->end();?>
		<div class="clear"></div>
	<div class="Tmargin25 Lmargin25">
		<?php echo $this->element('share')?>
	</div>
	<?php }
	?>
	
	
</div>
