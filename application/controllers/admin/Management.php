<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

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
        $this->load->Model('admin/Users_Model','uM', true);
        $this->load->Model('Devices_Model','dM', true);
    }

    public function index()
    {
        __Islogin();
    }
    
    public function users(){
        __Islogin();
        $data['customers'] = $this->uM->get_total_customers();
        $this->load->view('admin/header');
        $this->load->view('admin/users',$data);
        $this->load->view('admin/footer');
    }

    public function useredit($customer_id){
        __Islogin();
        $data['customer'] = $this->uM->get_customer_by_id($customer_id);
        $this->load->view('admin/header');
        $this->load->view('admin/handlecustomers' , $data);
        $this->load->view('admin/footer');
    }

    public function useradd(){
        __Islogin();
        $this->load->view('admin/header');
        $this->load->view('admin/handlecustomers');
        $this->load->view('admin/footer');
    }
    
    public function devices(){
        __Islogin();
        $data['devices'] = $this->dM->get_total_devices();
        $this->load->view('admin/header');
        $this->load->view('admin/devices', $data);
        $this->load->view('admin/footer');
    }

    public function add_customer(){
        $post = $this->input->post();
        $data = array(
            "name" => $post['name'],
            "password" => $post['password']
        );
        $new_id = $this->uM->add_new_customer($data);
        
        redirect(base_url().'admin/management/users');
    }

    public function edit_customer($id){
        $post = $this->input->post();
        $data = array(
            "name" => $post['name'],
            "password" => $post['password']
        );
        $this->uM->edit_customer($data,$id);
        redirect(base_url().'admin/management/users');
    }

    public function userdelete($id){
        $this->uM->delete_customer($id);
        redirect(base_url().'admin/management/users');
    }

    public function deviceadd(){
        __Islogin();
        $data['customers'] = $this->uM->get_total_customers();
        $this->load->view('admin/header');
        $this->load->view('admin/handledevices' , $data);
        $this->load->view('admin/footer');
    }

    public function add_device(){
        $post = $this->input->post();
        $data = array(
            "ipaddress" => $post['ipaddress'],
            "customer_id" => $post['assignedCustomer']
        );
        $new_id = $this->dM->add_new_device($data);
        redirect(base_url().'admin/management/devices');
    }

    public function deviceedit($id){
        __Islogin();
        $data['device'] = $this->dM->get_device_by_id($id);
        $data['customers'] = $this->uM->get_total_customers();
        $this->load->view('admin/header');
        $this->load->view('admin/handledevices' , $data);
        $this->load->view('admin/footer');
    }

    public function edit_device($id){
        $post = $this->input->post();
        $data = array(
            "ipaddress" => $post['ipaddress'],
            "customer_id" => $post['assignedCustomer']
        );
        $this->dM->edit_device($data,$id);
        redirect(base_url().'admin/management/devices');
    }

    public function devicedelete($id){
        $this->dM->delete_device($id);
        redirect(base_url().'admin/management/devices');
    }
}
