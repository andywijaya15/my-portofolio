<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata("nama_user")) {
            redirect("Dashboard");
        } else {
            $this->load->view('auth/login');
        }
    }

    public function login()
    {
        if ($this->input->post("email") && $this->input->post("namauser")) {
            $data = [
                'nama_user' => $this->input->post("namauser"),
                'email_user' => $this->input->post("email")
            ];
            $insertolog = $this->db->insert('user_log', $data);
            if ($insertolog) {
                $this->session->set_userdata($data);
                redirect("Dashboard");
            }
        } else {
            $this->session->set_flashdata('alert', "<div class='alert alert-danger' role='alert'>Tidak ada user {$this->input->post('email')} didatabase...</div>");
            redirect("Auth");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function updatesessiondata()
    {
        if ($this->session->userdata("nama_user")) {
            $this->session->set_userdata($this->input->post("type"), $this->input->post("value"));
            if ($this->session->userdata($this->input->post("type")) == $this->input->post("value")) {
                $data = ["status" => "pass"];
            } else {
                $data = ["status" => "fail"];
            }
        } else {
            $data = ["status" => "sessionend"];
        }
        echo json_encode($data);
    }

    public function notfound()
    {
        if ($this->session->userdata("nama_user")) {
            $data["title"] = "Not Found";
            $this->load->view('notfound', $data);
        } else {
            redirect(base_url());
        }
    }
}
