<div class="helps form">
<?php echo $this->Form->create('Help');?>
	<fieldset>
		<legend><?php echo __('Edit Help'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('surname');
		echo $this->Form->input('email');
		echo $this->Form->input('home_tell');
		echo $this->Form->input('work_tell');
		echo $this->Form->input('mobile_tell');
		echo $this->Form->input('age');
		echo $this->Form->input('vichaky');
		echo $this->Form->input('why_help');
		echo $this->Form->input('help_all');
		echo $this->Form->input('help_ald_and_ill');
		echo $this->Form->input('ill_childe');
		echo $this->Form->input('new_born');
		echo $this->Form->input('have_no_home');
		echo $this->Form->input('havy_ill');
		echo $this->Form->input('litle_ill');
		echo $this->Form->input('big_family');
		echo $this->Form->input('alone_man');
		echo $this->Form->input('other_help_1');
		echo $this->Form->input('have_helth_problem');
		echo $this->Form->input('clean_home');
		echo $this->Form->input('cook');
		echo $this->Form->input('by_food');
		echo $this->Form->input('walk_with_childe');
		echo $this->Form->input('walk_with_ill');
		echo $this->Form->input('take_care');
		echo $this->Form->input('care_if_teach');
		echo $this->Form->input('help_on_retulgy');
		echo $this->Form->input('psychological');
		echo $this->Form->input('treatment');
		echo $this->Form->input('drive_to_church');
		echo $this->Form->input('visit');
		echo $this->Form->input('to_write');
		echo $this->Form->input('christian_romance');
		echo $this->Form->input('clothes_distributed');
		echo $this->Form->input('talk_by_phone');
		echo $this->Form->input('build_home');
		echo $this->Form->input('call_wanthers');
		echo $this->Form->input('legal_advice');
		echo $this->Form->input('financial_aid');
		echo $this->Form->input('church_work');
		echo $this->Form->input('profecion_advice');
		echo $this->Form->input('other_help');
		echo $this->Form->input('one_day_month_work');
		echo $this->Form->input('one_day_month_holy');
		echo $this->Form->input('two_day_month_work');
		echo $this->Form->input('two_day_month_holy');
		echo $this->Form->input('one_day_week_work');
		echo $this->Form->input('one_day_week_holy');
		echo $this->Form->input('many_day_week_work');
		echo $this->Form->input('many_day_week_holy');
		echo $this->Form->input('every_day_work');
		echo $this->Form->input('every_day_holy');
		echo $this->Form->input('help_every_afternoon');
		echo $this->Form->input('holy_born');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Help.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Help.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Helps'), array('action' => 'index'));?></li>
	</ul>
</div>
