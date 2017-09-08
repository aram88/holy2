<?php
	class MediamakeComponent extends Component {
		public $_file;
		public $_filepath;
		public $_destination;
		public $_name;
		public $_short;
		public $_rules;
		public $_allowed;
		
	function upload ($file){
			$this->result = false;
			$this->error = false;
			// -- save parameters
			$this->_file = $file;
			 $destination = WWW_ROOT."media".DS;
			$rules = NULL;
			$name= '';
			
			// -- check that FILE array is even set
			if (isset($file) ) {
			
				// -- cool, now set some variables
				$fileName = ($name == NULL) ? $this->uniquename($destination . $file['name']) : $destination . $name;
				$fileTmp = $file['tmp_name'];
				$fileSize = $file['size'];
				$fileType = $file['type'];
				$fileError = $file['error'];
							
				// -- update name
				$this->_name = $fileName;
			
					// -- it's been uploaded with php
					if (is_uploaded_file($fileTmp)) {
				
						// -- how are we handling this file
						if ($rules == NULL) {
							// -- where to put the file?
							$output = $fileName;
							// -- just upload it
							if (move_uploaded_file($fileTmp, $output)) {
								chmod($output, 0644);
								$this->result = basename($this->_name);
							} else {
								$this->error("Could not move '$fileName' to '$destination'");
							}
						} 
					} else {
						$this->error("Possible file upload attack on '$fileName'");
					}
				
				
			} else {
				$this->error("Possible file upload attack");
			}
		
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