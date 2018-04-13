<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

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
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library("session");
        $this->load->helper("userfunc");
        $this->load->helper('language');
        $this->lang->load('messages_translation', 'english');
    }

    public function index()
    {
        $data['selected'] = 'contactus';
        $data['devices'] = __checkdevice(getUserIP());
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/contactus');
        $this->load->view('frontend/footer');
    }
    public function sendmail(){
        $data = $this->input->post();
        $name = $data['name'];
        $email = $data['email'];

        //send mail function
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['protocol'] = "smtp";
        $config['smtp_host'] = SMTP_HOST;
        //$config['smtp_port'] = 25;
        $config['smtp_port'] = 465;
        $config['smtp_user'] = SMTP_USERNAME;
        $config['smtp_pass'] = SMTP_PASSWORD;
        $config['smtp_timeout'] = 10;

        $subject = "Contact to info@avrasys.hu";
        $message = "Dear Admin, <br/><br/><br/>";
        $message .= "I would like to inform my message to you like as below. <br/><br/><br/>";
        $message .= "Nombre : ".$name."<br/>";
        $message .= "Email : ".$email."<br/>";
        $message .= "Mensaje  : ".$data['message']."<br/>";

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->clear();
        $this->email->from(SMTP_USERNAME, $subject);
        $this->email->to(ADMIN_EMAIL);
        $this->email->subject("Contact to info@avrasys.hu");
        $this->email->message($message);
        $this->email->send();
        $data['msg'] = 'success';
        $data['devices'] = __checkdevice(getUserIP());
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/contactus');
        $this->load->view('frontend/footer');
    }
}
