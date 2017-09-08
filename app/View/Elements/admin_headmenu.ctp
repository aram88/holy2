<div class="menue Vmargin5" style="width:1090px">
	<ul class="some">
		<li>  <?php echo $this->Html->link(__("Գլխավոր "),"/",array('class'=>'CW'));?> </li>
		<li> <?php echo $this->Html->link(__('Ավելացնել  նյութ'),array('controller' => 'posts','action'=>'add'),array('class'=>'CW'));?>
		<li><?php echo $this->Html->link(__('Ավելացնել  մենյու'),array('controller' => 'menus','action'=>'add'),array('class'=>'CW'));?>
		<li><?php echo $this->Html->link(__('Ավելացնել  իրադարձություն'),array('controller' => 'events','action'=>'add'),array('class'=>'CW'));?>
		<li> <?php echo $this->Html->link(__('Ավելացնել  օր'),array('controller' => 'days','action'=>'add'),array('class'=>'CW'));?>
		<li><?php echo $this->Html->link(__('Ավելացնել  ընթերցվածք'),array('controller' => 'readings','action'=>'add'),array('class'=>'CW'));?>
		<li><?php echo $this->Html->link(__('Admin'),array('controller' => 'generals','action'=>'index'),array('class'=>'CW'));?>
		<li><?php echo $this->Html->link(__("Log out"),"/users/logout",array('class'=>'CW'))?></li>
		
	</ul>
</div>