<?php
class CropComponent extends Component {
	var $errors;
	function image ($file,  $destination,$type, $size,$realpath,$prefix=NULL) {
		if (is_null($type)) $type = 'crop';
		if (is_null($size)) $size = 100;
		$output = 'jpg';
		$quality = 90;
		$this->_src = $destination.DS.$file;
		if (is_null($realpath)){
			$this->_name = $this->uniquename($destination.DS.$prefix.'_'.$file);
		} else {
			$this->_name = $this->uniquename( WWW_ROOT."img".DS.$realpath.DS.$prefix.'_'.$file);
		}
		// -- format variables
		$type = strtolower($type);
		$output = strtolower($output);
		if (is_array($size)) {
			$maxW = intval($size[0]);
			$maxH = intval($size[1]);
			if (isset($size[2]) && isset($size[3])){
				$startY = intval($size[3]);
				$startX = intval($size[2]);
			}
		} else {
			$type = 'resize';
			$maxScale = intval($size);
		}
		// -- check sizes
		if (isset($maxScale)) {
			if (!$maxScale) {
				$this->error("Max scale must be set");
			}
		} else {
			if (!$maxW || !$maxH) {
				$this->error("Size width and height must be set");
				return;
			}
			if ($type == 'resize') {
				$this->error("Provide only one number for size");
			}
		}
		
		// -- check output
		if ($output != 'jpg' && $output != 'png' && $output != 'gif') {
			$this->error("Cannot output file as " . strtoupper($output));
		}
		
		if (is_numeric($quality)) {
			$quality = intval($quality);
			if ($quality > 100 || $quality < 1) {
				$quality = 90;
			}
		} else {
			$quality = 90;
		}
		
		// -- get some information about the file
		$uploadSize = getimagesize($this->_src);
		$uploadWidth  = $uploadSize[0];
		$uploadHeight = $uploadSize[1];
		$uploadType = $uploadSize[2];
		if ($uploadType != 1 && $uploadType != 2 && $uploadType != 3) {
			$this->error ("File type must be GIF, PNG, or JPG to resize");
		}
		if ( @imagecreatefromjpeg($this->_src)){
		$srcImg = imagecreatefromjpeg($this->_src);}
		elseif( @imagecreatefrompng($this->_src)){
			$srcImg = imagecreatefrompng($this->_src);
		} else {
			$srcImg = imagecreatefromgif($this->_src);
		}
		switch ($type) {
			case 'resize':
				# Maintains the aspect ration of the image and makes sure that it fits
				# within the maxW and maxH (thus some side will be smaller)
				// -- determine new size
				if ($uploadWidth > $maxScale || $uploadHeight > $maxScale) {
					if ($uploadWidth > $uploadHeight) {
						$newX = $maxScale;
						$newY = ($uploadHeight*$newX)/$uploadWidth;
					} else if ($uploadWidth < $uploadHeight) {
						$newY = $maxScale;
						$newX = ($newY*$uploadWidth)/$uploadHeight;
					} else if ($uploadWidth == $uploadHeight) {
						$newX = $newY = $maxScale;
					}
				} else {
					$newX = $uploadWidth;
					$newY = $uploadHeight;
				}
				
				$dstImg = imagecreatetruecolor($newX, $newY);
				imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newX, $newY, $uploadWidth, $uploadHeight);
				
				break;
					
			case 'resizecrop':
				// -- resize to max, then crop to center
				$ratioX = $maxW / $uploadWidth;
				$ratioY = $maxH / $uploadHeight;
				if ($ratioX < $ratioY) { 
					$newX = round(($uploadWidth - ($maxW / $ratioY))/2);
					$newY = 0;
					$uploadWidth = round($maxW / $ratioY);
					$uploadHeight = $uploadHeight;
				} else { 
					$newX = 0;
					$newY = round(($uploadHeight - ($maxH / $ratioX))/2);
					$uploadWidth = $uploadWidth;
					$uploadHeight = round($maxH / $ratioX);
				}
				$dstImg = imagecreatetruecolor($maxW, $maxH);
				imagecopyresampled($dstImg, $srcImg, 0, 0, $startX, $startY, $maxW, $maxH, $uploadWidth, $uploadHeight);
				
				break;
			case 'crop':
				// -- a straight centered crop
				if (!isset($startY) && !isset($startY)){
					$startY = ($uploadHeight - $maxH)/2;
					$startX = ($uploadWidth - $maxW)/2;
				}
				$dstImg = imageCreateTrueColor($maxW, $maxH);
				ImageCopyResampled($dstImg, $srcImg, 0, 0, $startX, $startY, $maxW, $maxH, $maxW, $maxH);
				break;
			default: $this->error ("Resize function \"$type\" does not exist"); debug();die;
		}	
		// -- try to write
		switch ($output) {
			case 'jpg':
				$write = imagejpeg($dstImg, $this->_name, $quality);
				break;
			case 'png':
				$write = imagepng($dstImg, $this->_name . ".png", $quality);
				break;
			case 'gif':
				$write = imagegif($dstImg, $this->_name . ".gif", $quality);
				break;
		}
		// -- clean up
		imagedestroy($dstImg);
		if ($write) {
			$this->result = basename($this->_name);
		} else {
			$this->error("Could not write " . $this->_name . " to " . $destination);
			debug();die;
		}
	}
	// -- add a message to stack (for outside checking)
	function error ($message) {
		if (!is_array($this->errors)) $this->errors = array();
		array_push($this->errors, $message);
	}
	function uniquename ($file) {
			$parts = pathinfo($file);
			$dir = $parts['dirname'];
			$file = ereg_replace('[^[:alnum:]_.-]','',$parts['basename']);
			$ext = $parts['extension'];
			if ($ext) {
				$ext = '.'.$ext;
				$file = substr($file,0,-strlen($ext));
			}
			$i = 0;
			while (file_exists($dir.DS.$file.$i.$ext)) $i++;
			return $dir.DS.$file.$i.$ext;
		}
	function upload_error ($errorobj) {
			$error = false;
			switch ($errorobj) {
			   case UPLOAD_ERR_OK: break;
			   case UPLOAD_ERR_INI_SIZE: $error = "The uploaded file exceeds the upload_max_filesize directive (".ini_get("upload_max_filesize").") in php.ini."; break;
			   case UPLOAD_ERR_FORM_SIZE: $error = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form."; break;
			   case UPLOAD_ERR_PARTIAL: $error = "The uploaded file was only partially uploaded."; break;
			   case UPLOAD_ERR_NO_FILE: $error = "No file was uploaded."; break;
			   case UPLOAD_ERR_NO_TMP_DIR: $error = "Missing a temporary folder."; break;
			   case UPLOAD_ERR_CANT_WRITE: $error = "Failed to write file to disk"; break;
			   default: $error = "Unknown File Error";
			}
			return ($error);
		}
}	
?>