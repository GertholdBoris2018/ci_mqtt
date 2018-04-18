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
            "dev_v4_external_ipaddress" => $post['ipaddress'],
            "dev_client_code" => $post['assignedCustomer'],
            "dev_mac" => $post['dev_mac'],
            "dev_deleted" => $post['dev_deleted'],
            "dev_connected" => $post['dev_connected'],
            "dev_reseller_code" => $post['dev_reseller_code'],
            "dev_active" => $post['dev_active'],
            "dev_chargable" => $post['dev_chargable'],
            "dev_location_contact" => $post['dev_location_contact'],
            "dev_contract_type" => $post['dev_contract_type'],
            "dev_contract_start_date" => date('Y-m-d',strtotime($post['dev_contract_start_date'])),
            "dev_contract_end_date" => date('Y-m-d',strtotime($post['dev_contract_end_date'])),
            "dev_v4_internal_ipaddress" => $post['dev_v4_internal_ipaddress'],
            "dev_v6_internal_ipaddress" => $post['dev_v6_internal_ipaddress'],
            "dev_v6_external_ipaddress" => $post['dev_v6_external_ipaddress'],
            "dev_v4_def_router_ipaddress" => $post['dev_v4_def_router_ipaddress'],
            "dev_v6_def_router_ipaddress" => $post['dev_v6_def_router_ipaddress'],
            "dev_external_ip_heartbeat" => $post['dev_external_ip_heartbeat'],
            "dev_network_carrier" => $post['dev_network_carrier'],
            "dev_owner" => $post['dev_owner'],
            "dev_manufacture_date" => date('Y-m-d',strtotime($post['dev_manufacture_date'])),
            "dev_warrantee_date" => date('Y-m-d',strtotime($post['dev_warrantee_date'])),
            "dev_type" => $post['dev_type'],
            "dev_shipping_date" => date('Y-m-d',strtotime($post['dev_shipping_date'])),
            "dev_model" => $post['dev_model'],
            "dev_model_rev" => $post['dev_model_rev'],
            "dev_current_firmware" => $post['dev_current_firmware'],
            "dev_bar_code" => $post['dev_bar_code'],
            "dev_code" => $post['dev_code']
        );
        $new_id = $this->dM->add_new_device($data);
        //redirect(base_url().'admin/management/devices');
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
            "dev_v4_external_ipaddress" => $post['ipaddress'],
            "dev_client_code" => $post['assignedCustomer'],
            "dev_mac" => $post['dev_mac'],
            "dev_deleted" => $post['dev_deleted'],
            "dev_connected" => $post['dev_connected'],
            "dev_reseller_code" => $post['dev_reseller_code'],
            "dev_active" => $post['dev_active'],
            "dev_chargable" => $post['dev_chargable'],
            "dev_location_contact" => $post['dev_location_contact'],
            "dev_contract_type" => $post['dev_contract_type'],
            "dev_contract_start_date" => date('Y-m-d',strtotime($post['dev_contract_start_date'])),
            "dev_contract_end_date" => date('Y-m-d',strtotime($post['dev_contract_end_date'])),
            "dev_v4_internal_ipaddress" => $post['dev_v4_internal_ipaddress'],
            "dev_v6_internal_ipaddress" => $post['dev_v6_internal_ipaddress'],
            "dev_v6_external_ipaddress" => $post['dev_v6_external_ipaddress'],
            "dev_v4_def_router_ipaddress" => $post['dev_v4_def_router_ipaddress'],
            "dev_v6_def_router_ipaddress" => $post['dev_v6_def_router_ipaddress'],
            "dev_external_ip_heartbeat" => $post['dev_external_ip_heartbeat'],
            "dev_network_carrier" => $post['dev_network_carrier'],
            "dev_owner" => $post['dev_owner'],
            "dev_manufacture_date" => date('Y-m-d',strtotime($post['dev_manufacture_date'])),
            "dev_warrantee_date" => date('Y-m-d',strtotime($post['dev_warrantee_date'])),
            "dev_type" => $post['dev_type'],
            "dev_shipping_date" => date('Y-m-d',strtotime($post['dev_shipping_date'])),
            "dev_model" => $post['dev_model'],
            "dev_model_rev" => $post['dev_model_rev'],
            "dev_current_firmware" => $post['dev_current_firmware'],
            "dev_bar_code" => $post['dev_bar_code'],
            "dev_code" => $post['dev_code']
        );
        $this->dM->edit_device($data,$id);
        //echo date('Y-m-d',strtotime($post['dev_contract_start_date']));
        redirect(base_url().'admin/management/devices');
    }

    public function devicedelete($id){
        $this->dM->delete_device($id);
        redirect(base_url().'admin/management/devices');
    }
}
