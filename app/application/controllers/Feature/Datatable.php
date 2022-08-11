<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("nama_user")) redirect(base_url());
    }

    public function index()
    {
        $this->load->view('datatable/datatable');
    }

    public function addmurid()
    {
        $data = $this->input->post();
        $data['created_by'] = $this->session->userdata("nama_user");
        $id = substr($data["nama"], 0, 1);
        $max = sprintf("%04s", (int)$this->db->select("SUBSTRING(id, 3) AS maxid")->from("d_murid")->where("SUBSTRING(id,1,1)", $id)->get()->row("maxid") + 1);
        $data["id"] = "$id-$max";
        if ($this->db->insert("d_murid", $data)) {
            $res["status"] = "pass";
        } else {
            $res["status"] = "fail";
        }
        echo json_encode($res);
    }

    public function readmurid()
    {
        $this->load->model('S_Murid', 'sm');
        $list = $this->sm->get_datatables();
        $data = array();
        foreach ($list as $ls) {
            $row = array();
            $row[] = $ls->id;
            $row[] = $ls->nama;
            $row[] = $ls->telp;
            $editUrl = "/Updatemurid/{$ls->id}";
            $delUrl = "/Removemurid/{$ls->id}";
            $btnEdit = "<button class='btn btn-warning' data-id='{$ls->id}' data-url='{$editUrl}' data-nama='{$ls->nama}' data-telp='{$ls->telp}' onclick='editMurid(event)'>Edit</button>";
            $btnDelete = "<a href='{$delUrl}' class='btn bg-danger' onclick='deleteMurid(event)'>HAPUS</a>";
            $row[] =  "<div class='text-center'>{$btnEdit} {$btnDelete}</div>";
            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sm->count_all(),
            "recordsFiltered" => $this->sm->count_filtered(),
            "data" => $data,
        ];
        echo json_encode($output);
    }

    public function updatemurid($id)
    {
        $data = $this->input->post();
        $data['updated_by'] = $this->session->userdata("nama_user");
        $this->db->where("id", $id);
        if ($this->db->update("d_murid", $data)) {
            $res["status"] = "pass";
        } else {
            $res["status"] = "fail";
        }
        echo json_encode($res);
    }

    public function removemurid($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("d_murid")) {
            $res["status"] = "pass";
        } else {
            $res["status"] = "fail";
        }
        echo json_encode($res);
    }
}
