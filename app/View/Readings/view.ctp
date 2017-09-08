<div class="readings view">
<div class="crumb Hmargin20 Tmargin15">
		<?php   
				$this->Html->addCrumb($reading['Day']['name'],'/days/view/'.$reading['Day']['id'],array('class' => 'Lpadding5 Bpadding5')) ;
				$this->Html->addCrumb('','') ;
            	echo $this->Html->getCrumbs('>','Գլխավոր', array('class' => ''));
			
		?>
			<span class=" Lpadding5 ft-size"><?php echo $reading['Reading']['name'];?></span>
	</div>	
<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $reading['Reading']['name'];?></h3>
</div>

<?php if (isset($reading['Reading']) && !empty($reading['Reading'])):;?>
		<div class="post lh24 Hmargin25 Vmargin30 txtJ">
		    <?php echo $reading['Reading']['text']?> 
			<div class="clear"></div>
		    <div class="floatL W200 Tmargin10"><?php  echo $this->element('share');?></div>	
		    <div class="txtR Tmargin10 floatR"> <?php echo $reading['Reading']['created']?></div>
		</div>
	<?php endif;?>	
</div>
