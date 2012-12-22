<?php

	class CController {

		//private $lang = NULL;
		private $lang_object;
		private $file_path;

		public function __construct($lang = 'es') { //Make path static always or insert the path

			$this->file_path = '../../lang/' . $lang . '.json';
			$this->read_lang_doc();
		}

		private function read_lang_doc(){
			if($read_file = file_get_contents($this->file_path)){
				$this->lang_object = json_decode($read_file);
			}else{
				echo "FOOL! There's no file for that language!";
			}
		}

		public function get_copy_string($id = 'glossary'){
			//echo $id;
			if($this->lang_object->{$id})
				$this->return_json($this->lang_object->{$id});
		}

		public function set_copy_string($id = 'glossary', $new_value = 'POOP'){
			if($this->lang_object->{$id}){
				$this->lang_object->{$id} = $new_value;
				$this->write_new_json();
			}else{
				echo "No string of that name to edit";
			}
		}

		private function write_new_json(){
			//Let's copy the file
			if(copy($this->file_path, $this->file_path . '_' . date('d_m_Y'))){
				$json_handle = fopen($this->file_path, 'w');
				fwrite($json_handle, json_encode($this->lang_object));
				fclose($json_handle);
			}else{
				echo "FOOL! The file could not be backed up!";
			}
		}

		private function debug($data, $debugging = TRUE){
			if($debugging){
				echo "<pre>";
				print_r($data);
				echo "</pre>";
			}
		}

		private function return_json($data)
		{
			// ! JSON response
			header('Cache-Control: no-cache, must-revalidate');
			header('Content-type: application/json');
			echo json_encode($data);
		}
	}

	$CController = new CController();
	
	//$CController->set_copy_string();

