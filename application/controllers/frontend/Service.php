<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
        $this->load->model("admin/Category_Model", "cM", true);
        $this->load->model("admin/Portfolio_Model", "pM", true);
    }

    public function index()
    {
        $data['selected'] = 'ourwork';
        $data['categories'] = $this->cM->get_total_cates();
        $data['portfolios'] = $this->pM->get_total_portfolios();
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/service',$data);
        $this->load->view('frontend/footer');
    }
    public function portfolio($id){
        $data['selected'] = 'ourwork';
        $data['portfolio'] = $this->pM->get_portfolio_by_id($id);
        $data['subimages'] = $this->pM->get_portfolio_sub_by_id($id);
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/portfolio',$data);
        $this->load->view('frontend/footer');
    }
}
