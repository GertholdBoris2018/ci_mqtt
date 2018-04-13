<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolios extends CI_Controller {

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
        $this->load->model("admin/Portfolio_Model", "pM", true);
        $this->load->model("admin/Category_Model", "cM", true);
        $this->lang->load('messages_translation', 'english');
    }

    public function index()
    {
        __Islogin();
        $data['portfolios'] = $this->pM->get_total_portfolios();
        $this->load->view('admin/header');
        $this->load->view('admin/portfolios',$data);
        $this->load->view('admin/footer');
    }
    public function edit($id){
        __Islogin();
        $data['categories'] = $this->cM->get_total_cates();
        $data['portfolio'] = $this->pM->get_portfolio_by_id($id);
        $data['subimages'] = $this->pM->get_portfolio_sub_by_id($id);
        $this->load->view('admin/header');
        $this->load->view('admin/handleportfolio',$data);
        $this->load->view('admin/footer');
    }
    public function add(){
        __Islogin();
        $data['categories'] = $this->cM->get_total_cates();
        $this->load->view('admin/header');
        $this->load->view('admin/handleportfolio',$data);
        $this->load->view('admin/footer');
    }
    public function delete($id){
        $this->pM->delete_portfolio($id);
        redirect(base_url().'admin/portfolios/');
    }

    public function add_port(){
        $post = $this->input->post();
        $targetDir = "assets/upload/";
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];

        $mainFileName = $fileName[0];
        if($mainFileName != ''){
            $f_temp = explode(".", $mainFileName);
            $ext = pathinfo($mainFileName, PATHINFO_EXTENSION);
            $mainFileName = $f_temp[0]."_".time().".".$ext;
            $targetFile = $targetDir.$mainFileName;

            if($this->pM->check_category_port($post['title'],$post['catechks']) == 0){
                if(move_uploaded_file($_FILES['file']['tmp_name'][0],$targetFile)){
                    if($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg'){

                    }
                    else{

                        $datas = array(
                            "title" => $post['title'],
                            "content" => $post['content'],
                            "author" => $this->session->userdata("user_id"),
                            "created_on" => date('Y-m-d h:i:s', time()),
                            "is_featured" => $post['isfeatured']=='on'? 'Y':'N',
                            "item_image" => $mainFileName,
                            "item_url" => $post['item_url'],
                            "category_id" => $post['catechks']
                        );
                        $new_id = $this->pM->add_new_portfolio($datas);
                    }
                }
            }
        }
        else{
            $datas = array(
                "title" => $post['title'],
                "content" => $post['content'],
                "author" => $this->session->userdata("user_id"),
                "created_on" => date('Y-m-d h:i:s', time()),
                "is_featured" => $post['isfeatured']=='on'? 'Y':'N',
                "item_url" => $post['item_url'],
                "category_id" => $post['catechks']
            );
            $new_id = $this->pM->add_new_portfolio($datas);
        }

        if($_FILES['file']['name'][1] != ''){
            for($i = 1 ; $i < count($_FILES['file']['name']);$i++){
                $fileName = $_FILES['file']['name'][$i];
                $f_temp = explode(".", $fileName);
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                $fileName = $f_temp[0]."_".time().".".$ext;
                $targetFile = $targetDir.$fileName;
                if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$targetFile)){
                    if($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg'){

                    }
                    else{
                        $datas = array(
                            "portfolio_id" => $new_id,
                            "item_url" => $fileName
                        );
                        $new_image_id = $this->pM->add_new_portfolio_images($datas);
                    }
                }
            }
        }
        redirect(base_url().'admin/portfolios/');
    }
    public function edit_port($id){
        $post = $this->input->post();
        $targetDir = "assets/upload/";
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $f_temp = explode(".", $fileName);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName = $f_temp[0]."_".time().".".$ext;
        $targetFile = $targetDir.$fileName;

            if($file['name'] != ""){
                if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
                    if($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg'){

                    }
                    else{

                        $datas = array(
                            "title" => $post['title'],
                            "content" => $post['content'],
                            "author" => $this->session->userdata("user_id"),
                            "created_on" => date('Y-m-d h:i:s', time()),
                            "is_featured" => $post['isfeatured']=='on'? 'Y':'N',
                            "item_image" => $fileName,
                            "item_url" => $post['item_url'],
                            "category_id" => $post['catechks']
                        );
                        $this->pM->edit_portfolio($datas,$id);
                    }
                }
            }
            else{
                $datas = array(
                    "title" => $post['title'],
                    "content" => $post['content'],
                    "author" => $this->session->userdata("user_id"),
                    "created_on" => date('Y-m-d h:i:s', time()),
                    "is_featured" => $post['isfeatured']=='on'? 'Y':'N',
                    "item_url" => $post['item_url'],
                    "category_id" => $post['catechks']
                );
                $this->pM->edit_portfolio($datas,$id);
            }

        redirect(base_url().'admin/portfolios/');
    }
}
