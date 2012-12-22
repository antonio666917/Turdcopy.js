<?php
	define('TURD_ROOT_DIR', __dir__ . DIRECTORY_SEPARATOR);
	define('HTML_EOL', '<br />');

	include TURD_ROOT_DIR .'../vendor/sendgrid/SendGrid_loader.php';

	date_default_timezone_set('America/Puerto_Rico'); // Set the Default Timezone...

	class CController {

		//private $lang = NULL;
		private $lang_object;
		private $file_path;
		private $copy_id;
		private $old_copy;

		public function __construct($lang = 'turdcopy-blurbs-EN') { //Make path static always or insert the path

			$this->file_path = '../../demosite/js/' . $lang . '.json';
			$this->read_lang_doc();

			//$this->debug($this->lang_object);
		}

		private function read_lang_doc(){
			if($read_file = file_get_contents($this->file_path)){
				$this->lang_object = json_decode($read_file);
			}else{
				echo false;
			}
		}

		public function get_copy_string($the_params){
			//echo $id;
			//var_dump($the_params);
			if($copy_object = $this->lang_object->{$the_params['id']})
				$this->return_json($copy_object);
		}

		public function set_copy_string($the_params){
			if($copy_object = $this->lang_object->{$the_params['id']}){
				$this->copy_id = $the_params['id'];
				$this->old_copy = $copy_object->text;
				$copy_object->text = $the_params['text'];
				$copy_object->lastMod = time();
				$this->write_new_json();
			}else{
				echo false;
			}
		}

		private function write_new_json(){
			//Let's copy the file
			if(copy($this->file_path, $this->file_path . '_' . date('d_m_Y'))){
				$json_handle = fopen($this->file_path, 'w');
				fwrite($json_handle, json_encode($this->lang_object));
				fclose($json_handle);

				$this->send_email_notification();

				$this->return_json($this->lang_object);
			}else{
				echo false;
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

		private function send_email_notification()
		{
			$sendgrid = new SendGrid($_ENV['TURD_SENDGRID_USER'], $_ENV['TURD_SENDGRID_PASSWORD']);

			$mail = new SendGrid\Mail();
			$mail->addTo('antoniwan@gmail.com')->
				addTo('khalifenizar@gmail.com')->
				addTo('javieravelazquezhernandez@gmail.com')->
				addTo('erasedot@gmail.com')->
				addTo('walde.fm@gmail.com')->
				setFromName('Codfish Distribution')->
				setFrom('khalifenizar+turd@gmail.com')->
				setSubject('Copy changes are afoot')->
				setText(
					'Hey %name%,' . PHP_EOL .
					PHP_EOL .
					'Somebody has changed the "' . $this->copy_id . '" copy from:' . PHP_EOL .
					PHP_EOL .
					'"' . $this->old_copy . '"' . PHP_EOL .
					PHP_EOL .
					'to:' . PHP_EOL .
					PHP_EOL .
					'"' . $this->lang_object->{$this->copy_id}->text . '"' . PHP_EOL .
					PHP_EOL .
					'They may be up to no good!')->
				setHtml('Hey %name%,' . HTML_EOL .
					HTML_EOL .
					'Somebody has changed the <strong>"' . $this->copy_id . '"</strong> copy from:' . HTML_EOL .
					HTML_EOL .
					'<pre>"' . $this->old_copy . '"</pre>' . HTML_EOL .
					HTML_EOL .
					'to:' . HTML_EOL .
					HTML_EOL .
					'<pre>"' . $this->lang_object->{$this->copy_id}->text . '"</pre>' . HTML_EOL .
					HTML_EOL .
					'They may be up to no good!')->
				addSubstitution('%name%', array('Antonio', 'Nizar', 'Javier', 'Julian', 'Waldemar'));

			$result = $sendgrid->smtp->send($mail);
		}
	}

	if(isset($_POST)){
		//var_dump($_POST);
		$the_function = $_POST['_the_function'];
		$the_params = $_POST['_params'];

		$CController = new CController();
		if(method_exists($CController, $the_function))
			$CController->{$the_function}($the_params);

	}
