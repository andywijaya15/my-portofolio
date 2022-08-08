<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Realtime extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("nama_user")) redirect(base_url());
    }

    public function index()
    {
        $this->load->view('realtime/realtime');
    }
}
