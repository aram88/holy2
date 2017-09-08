<div class="posts view">

	<div class="crumb Hmargin20 Tmargin10">
		<?php   
			if(isset($parents['0']['name']) ){
				foreach ($parents as $parent){
					$this->Html->addCrumb($parent['name'],'/menus/view/'.$parent['id'],array('class' => 'Lpadding5 Bpadding5')) ;
				}
				$this->Html->addCrumb('','') ;
            	echo $this->Html->getCrumbs('>',' Գլխավոր', array('class' => ''));
			} else {
				$this->Html->addCrumb('>','') ;
            	echo $this->Html->getCrumbs('',' Գլխավոր', array('class' => ''));
			}
		?>
			<span class=" Lpadding5 ft-size"><?php echo $post['Post']['name'];?></span>
	</div>	

	<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $post['Post']['name'];?></h3>
	</div>
	<?php if (isset($post['Post']) && !empty($post['Post'])):;?>
		<div class="post lh24 Hmargin25 Vmargin30 txtJ">
			<?php if(!empty($post['Post']['img'])):?>
				<?php echo $this->Html->image('post/'.$post['Post']['img'],array('class'=>"floatL Rmargin20 Tmargin5","escape"=>false,'title'=>$post['Post']['img_name'],'alt'=>$post['Post']['img_name']));?>
				<?php $this->assign( 'fbImage', 'http://www.holytrinity.am/img/post/'.$post['Post']['img'] );?>
			<?php  endif;?>	
		    <?php echo $post['Post']['text'];?> 
		    <?php if ($post['Post']['type']==1){?>
		    <div class="clear"></div>
		    <div class="Vmargin20">
		    	
		    	<object type="application/x-shockwave-flash" data="<?php echo $this->webroot?>dewplayer/dewplayer-playlist.swf" width="240" height="200" id="dewplayer" name="dewplayer">
			<param name="wmode" value="transparent" />
			<param name="movie" value="<?php echo $this->webroot?>dewplayer/dewplayer-playlist.swf" />
			<param name="flashvars" value="autostart=1&amp;autoreplay=1&amp;showtime=1&amp;xml=<?php echo $this->webroot?>dewplayer/playlist.xml&amp;mp3=<?php echo FULL_BASE_URL?>/media/<?php echo $post['Post']['path']?>" />
			</object>
			   <div class="clear"></div>	
		    	<?php //echo $this->Html->link("Բեռնել","/media/".$post['Post']['path'],array("class"=>"floatL fs14 C1 fwb txtL","target"=>"_blank"));?>
		    </div>
		    <div class="clear"></div>	
		    <?php }?>
		    <div class="floatL W200 Tmargin10"><?php  echo $this->element('share');?></div>
		    <div class="floatR  Tmargin10 Lmargin10">Դիտվել է  <?php  echo $post['Post']['ping'];?></div>
		    <div class="txtR Tmargin10 floatR">	 <?php echo $post['Post']['created'];?></div>

		</div>
	<?php endif;?>
	
</div>
