<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
        $this->load->model("admin/Category_Model", "cM", true);
        $this->lang->load('messages_translation', 'english');
    }

    public function index()
    {
        __Islogin();
        $data['categories'] = $this->cM->get_total_cates();
        $this->load->view('admin/header');
        $this->load->view('admin/category',$data);
        $this->load->view('admin/footer');
    }
    public function edit(){
        $id = $this->input->post("id");
        $title = $this->input->post("title");
        echo json_encode(array("result" =>$this->cM->edit_category($id,$title)));
    }
    public function add(){
        $title = $this->input->post("title");
        if($this->cM->check_category_byname($title) == 0){
            $data = array(
                "title" => $this->input->post("title"),
                "author" => $this->session->userdata("user_id"),
                "created_on" => date('Y-m-d h:i:s', time())
            );
            echo json_encode(array("result" =>1,"data"=>$this->cM->get_category_by_id($this->cM->add_category($data))));
        }
        else{
            echo json_encode(array("result"=>2));
        }
    }
    public function delete(){
        $id = $this->input->post("id");
        echo json_encode(array("result"=>$this->cM->delete_category_byid($id)));
    }
}
