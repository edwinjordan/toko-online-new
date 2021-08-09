<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->helper('url');
		$this->load->model('dropdown');
	}

	function render($data)
	{
		$this->load->view('partials/main', $data);
		$this->load->model('cilinaya_model');
		$tema = $this->cilinaya_model->get_table('tema');
		$data = array(
			'tema' => $tema
		);
		$this->load->view('dashboard', $data);
	}

	public function index()
	{
		$data['main'] = 'hayu';
		$this->render($data);
	}
}
