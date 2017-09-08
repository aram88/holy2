

<?php if ($this->Paginator->counter("%pages%") >1) {?>

<div class=" paginate Vmargin30">	
		<?php 	
				$pages = $this->Paginator->counter("%pages%"); 		// max pages
				$modulus = 5; 									// amount of pages for both side of current page
		if ($pages > 9) {		
				//echo '&nbsp;'; 
				echo $this->Paginator->prev("<<&nbsp;&nbsp;Նախորդը", array('class' => 'Rmargin10','escape' => false));
				
				//echo " ";
		 
				if ($this->Paginator->current()-$modulus+2 > 1) {
					echo $this->Paginator->first('1', array('class' => 'Rmargin10'));
				}
				if ($this->Paginator->current()-$modulus+1 > 1) {
					echo "<span> . . </span>";
				}
				
				echo $this->Paginator->numbers(array('modulus'=> $modulus, 'separator' => ' ', 'class' => 'Rmargin10')); 
				if ($this->Paginator->current()+$modulus-2 < $pages) {
					echo "<span> . . </span>";
		
				}
				
				//echo " ";
				if ($this->Paginator->current()+$modulus-3 < $pages) {
					echo $this->Paginator->last($pages, array('class' => 'Rmargin10'));
				}
				
				//echo '&nbsp;';
				//echo " "; 
				
				echo $this->Paginator->next("Հաջորդը&nbsp;&nbsp;>> ", array('class' => 'Rmargin10', 'escape'=> false)); 
				//echo '&nbsp;'; 
		} else {
			echo $this->Paginator->prev("<<&nbsp;&nbsp;Նախորդը", array('class' => 'Rmargin10','escape' => false));
			echo $this->Paginator->numbers(array('separator' => '', 'class' => 'Rmargin10'));
			echo $this->Paginator->next("Հաջորդը&nbsp;&nbsp;>>", array('class' => 'Rmargin10', 'escape'=> false));
		}		
				
		?>
	</div> <!-- end searching div -->

<?php }?>