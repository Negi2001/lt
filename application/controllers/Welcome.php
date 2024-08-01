<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('index');
	}
	public function user()
	{
		$this->load->helper('url');
		$this->load->view('user');
	}
	public function userdetail()
	{
		$this->load->helper('url');
		$this->load->view('userdetail');
	}

	public function info()
	{
		$this->load->helper('url');
		$this->load->view('info');
	}

	public function info2()
	{
		$this->load->helper('url');
		$this->load->view('info2');
	}

	public function info3()
	{
		$this->load->helper('url');
		$this->load->view('info3');
	}

	public function qrscan()
	{
		$this->load->helper('url');
		$this->load->view('qrscan');
	}

	public function upiid()
	{
		$this->load->helper('url');
		$this->load->view('upiid');
	}

	public function history()
	{
		$this->load->helper('url');
		$this->load->view('history');
	}

	public function qps()
	{
		$this->load->helper('url');
		$this->load->view('qps');
	}

	public function thankyou()
	{
		$this->load->helper('url');
		$this->load->view('thankyou');
	}
}
