<style>
li.li2 a {
	text-decoration: none !important;
}
</style>
<div class="menue Vmargin5">
	<ul class="some">
		<li class="Lmargin10 topmenu">  <?php echo $this->Html->link(__("Գլխավոր "),"/");?> </li><li class="rbr"></li><li class="lbr"></li>
		<?php  if (isset($tops)):?> 
		<?php  foreach ($tops as $menu):?>
			<li class="topmenu">
            <?php echo $this->Html->link($menu['Menu']['name'],"/menus/view/".$menu['Menu']['id'])?>
			<ul class="topmenus">
				<?php $i=0; foreach ($menu['Children'] as $children):?>
					<li class='li2' <?php if ($i==0) {?> style="border-top:none;" <?php }$i=10?>> <?php echo $this->Html->link($children['name'],"/menus/view/".$children['id'], array('style'));?> </li>
					
				<?php  endforeach;?>
			</ul>
		</li><li class="rbr"></li><li class="lbr"></li>
		<?php endforeach;?>
		<?php endif;?>
		<li class="topmenu"><?php echo $this->Html->link(__("Նկարներ"),"/gallery_groups")?></li>
		<li class="rbr"></li><li class="lbr"></li>
		<li class="topmenu"><?php echo $this->Html->link(__("Հարց Քահանային"),"/questions/add")?></li><li class="rbr"></li><li class="lbr"></li>
		<li class="topmenu"><?php echo $this->Html->link(__("Հրավեր ծառայության"),"/helpes/add")?></li><li class="rbr"></li><li class="lbr"></li>
		<!--  <li class="topmenu"><?php echo $this->Html->link(__("Կայքի Քարտեզ"),"/static_pages/sitemap")?></li><li class="rbr"></li><li class="lbr"></li>-->
		<li class="topmenu"><?php echo $this->Html->link(__("Հետադարձ Կապ"),"/messages/add")?></li>
	</ul>
</div>
