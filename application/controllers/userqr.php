<?php
defined('BASEPATH') or exit('No direct script access allowed');

class userqr extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/index');
        $this->load->view('common/footer');
    }

    public function user()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/user');
        $this->load->view('common/footer');
    }

    public function claimupi()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/claimupi');
        $this->load->view('common/footer');
    }

    public function thanks()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/thanks');
        $this->load->view('common/footer');
    }

    public function qrerror()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/qrerror');
        $this->load->view('common/footer');
    }
    public function userdetail()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/userdetail');
        $this->load->view('common/footer');
    }

    public function info()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/info');
        $this->load->view('common/footer');
    }

    public function info2()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/info2');
        $this->load->view('common/footer');
    }

    public function info3()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/info3');
        $this->load->view('common/footer');
    }

    public function qrscan()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/qrscan');
        $this->load->view('common/footer');
    }

    public function upiid()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/upiid');
        $this->load->view('common/footer');
    }

    public function history()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/history');
        $this->load->view('common/footer');
    }

    public function qps()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/qps');
        $this->load->view('common/footer');
    }

    public function thankyou()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/thankyou');
        $this->load->view('common/footer');
    }

    public function selecttab()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('userqr/selecttab');
        $this->load->view('common/footer');
    }
}
