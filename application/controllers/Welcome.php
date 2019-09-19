<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function process(){
		$this->load->view('vendor/autoload.php');
		
		  $options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		  );
		  $pusher = new Pusher\Pusher(
			'943f3528bdcb04af4fbc',
			'b246331201ccba0af6c7',
			'864371',
			$options
		  );
		
		  $data['message'] = $_POST['message'];
		  $pusher->trigger('ci_pusher', 'my-event', $data);
	}
}
