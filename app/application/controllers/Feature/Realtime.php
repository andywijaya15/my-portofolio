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
        $data['title'] = "Realtime Apps";
        $this->load->view('realtime/realtime', $data);
    }

    public function logclick()
    {
        $data = [
            "nama_user" => $this->input->post("user")
        ];
        if ($this->db->insert("click_log", $data)) {
            $res["status"] = "success";
        } else {
            $res["status"] = "error";
        }
        echo json_encode($res);
    }
}
