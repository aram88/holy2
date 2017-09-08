<?php
	class RandomComponent extends Component {
		var $str;
		public function randomString($length = 8){
		$chars = "qwertyuiopasdfghjklzxcvbnm023456789";
		srand((double)microtime()*1000000);
		$this->str = "";
		$i = 0;
			while ($i <= $length){
				$num = rand() % 33;
				$tmp = substr($chars, $num,1);
				$this->str .= $tmp;
				$i++; 
			}
		return $this->str;	
		} 
	}
?>