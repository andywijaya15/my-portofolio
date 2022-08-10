<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("nama_user")) redirect(base_url());
    }

    public function index()
    {
        $this->load->view('email/email');
    }

    public function sendmail()
    {
        $this->load->library('email');
        $this->email->from('no-reply@ndik.helloworld.my.id', 'KIS - Keep It Simple by andywijaya');
        $this->email->to($this->session->userdata("email_user"));
        $this->email->subject("Layanan Kirim email melalui ndik.helloworld.my.id");
        $username = $this->session->userdata("nama_user");
        $text = $this->input->post("msg");

        $html = "<!DOCTYPE html>
        <html lang='en'>
    
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge/'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        </head>
    
        <body style='background-color:#eee;font-size:16px;'>
            <div style='max-width: 600px;min-width:200px;background-color: #fff;padding: 20px;margin: auto;'>
                <p>Dear Bapak/Ibu $username </p>
                <p>Terima Kasih telah memakai layanan email melalui website <a href='https://ndik.helloworld.my.id'>ndik.helloworld.my.id</a></p>
                <br>
                <p>Ini adalah pesan yang anda kirim dari Website : </p>
                <br>
                <p>$text</p>
                <br>
                <br>
                <p>Best Regards</p>
                <br>
                <br>
                <br>
                <b>KIS - Keep It Simple</b>
                <br>
                <i>Andy Wijaya</i>
            </div>
    
        </body>
    
        </html>";
        $data = [
            "nama_user" => $this->session->userdata("nama_user"),
            "email_user" => $this->session->userdata("email_user"),
            "msg" => $text,
        ];

        $logmail = $this->db->insert("mail_log", $data);

        $this->email->message($html);
        $sendmail = $this->email->send();
        if ($logmail && $sendmail) :
            $res["status"] = "pass";
        else :
            $res["status"] = "fail";
        endif;
        echo json_encode($res);
    }
}
