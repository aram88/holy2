<div class="events view">
<div class="crumb Hmargin20 Tmargin15">
		<?php   
				$this->Html->addCrumb($event['Day']['name'],'/days/view/'.$event['Day']['id'],array('class' => 'Lpadding5 Bpadding5')) ;
				$this->Html->addCrumb('','') ;
            	echo $this->Html->getCrumbs('>','Գլխավոր', array('class' => ''));
			
		?>
			<span class=" Lpadding5 ft-size"><?php echo $event['Event']['name'];?></span>
	</div>	
<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $event['Event']['name'];?></h3>
</div>
<?php if (isset($event['Event']) && !empty($event['Event'])):;?>
		<div class="post lh24 Hmargin25 Vmargin30 txtJ">
		    <?php echo $event['Event']['text']?> 
		     <div class="floatL W200 Tmargin10"><?php  echo $this->element('share');?></div>	
		    <div class="txtR Tmargin10 floatR"> <?php echo $event['Event']['created']?></div>
		</div>
	<?php endif;?>	
</div>
