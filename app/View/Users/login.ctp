<?php
echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => false,
    'username',
    'password'
));
echo $this->Form->submit(__('Մուտք'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	
?>