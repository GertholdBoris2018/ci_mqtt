<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->helper('language');
        $this->load->helper("userfunc");
        $this->lang->load('messages_translation', 'english');
        $this->load->model("admin/Portfolio_Model", "pM", true);
        $this->load->model("admin/Category_Model", "cM", true);
        $this->load->model("Devices_Model", "dM", true);
    }

    public function index()
    {
        $data['selected'] = 'login';
        $data['devices'] = __checkdevice(getUserIP());
        if(count($data['devices']) == 0){
            $this->load->view('frontend/header',$data);
            $this->load->view('frontend/login',$data);
            $this->load->view('frontend/footer');
        }
        else{
            $this->load->view('frontend/header',$data);
            $this->load->view('frontend/welcome',$data);
            $this->load->view('frontend/footer');
        }
        
    }

    public function doLogin(){
        if ($this->input->post('username'))
        {
            $user = $this->input->post('username');
            $password = $this->input->post('password');
            $customer_info = checkcustomer($user, $password);
            //var_dump($customer_info);
            $customer_id = $customer_info["customer_id"];
            if ($customer_id != INVALIDUSER)
            {
                $customerdata = array(
                    "isCustomerlogin" => true,
                    "customer_name" => $customer_info["name"],
                    "dev_client_code" => $customer_info["dev_client_code"],
                    "customer_pass" => $customer_info['password']
                );
                $this->session->set_userdata($customerdata);
                //update the last login
            }
        }
        if (!$this->session->userdata('isCustomerlogin'))
        {
            $data['selected'] = 'login';
            $data['devices'] = __checkdevice(getUserIP());
            $this->load->view('frontend/header');
            $this->load->view('frontend/login');
            $this->load->view('frontend/footer');
        }
        else{
            redirect('frontend/welcome/');
        }
    }
    
    public function doLogout(){
        $this->session->sess_destroy();
        redirect('frontend/welcome/');
    }
}
