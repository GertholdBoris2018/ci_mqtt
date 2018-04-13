<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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
        $data['selected'] = 'about';
        $data['devices'] = __checkdevice(getUserIP());
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/about');
        $this->load->view('frontend/footer');
    }
    
    public function training(){
        $data['selected'] = 'training';
        $data['devices'] = __checkdevice(getUserIP());
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/training');
        $this->load->view('frontend/footer');
    }

    public function help(){
        $data['selected'] = 'help';
        $data['devices'] = __checkdevice(getUserIP());
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/help');
        $this->load->view('frontend/footer');
    }
}
