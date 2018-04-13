<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        __Islogin();
        $data['user'] = array(
            'user_name' => $this->session->userdata('user_name'),
            'user_id' => $this->session->userdata('user_id'),
            'user_email' => $this->session->userdata('user_email')
        );
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/footer');
    }

    /* Login function */
    function login(){
        if ($this->input->post('emailaddress'))
        {
            $user = $this->input->post('emailaddress');
            $password = $this->input->post('password');
            $user_info = checkuser($user, $password);

            $user_id = $user_info["user_id"];
            if ($user_id != INVALIDUSER)
            {
                $userdata = array(
                    "islogin" => true,
                    "user_name" => $user_info["username"],
                    "user_id" => $user_id,
                    "user_email" => $user_info['email']
                );
                $this->session->set_userdata($userdata);
                //update the last login
            }
        }
        if (!$this->session->userdata('islogin'))
        {
            $this->load->view('admin/header');
            $this->load->view('admin/login');
            $this->load->view('admin/footer');
        }
        else{
            redirect('admin/dashboard/');
        }
    }

    /* logout function*/
    function logout(){
        $this->session->sess_destroy();
        redirect('admin/dashboard/login');
    }
}
