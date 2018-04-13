<?php
class Portfolio_Model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    function save($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    // update person by id
    function update($table, $data,$id,$field){
        $this->db->where($field, $id);
        $this->db->update($table, $data);
    }

    // delete person by id
    function delete($table,$id,$field,$id2='',$field2=''){
        $this->db->where($field, $id);
        if($field2!=''){
            $this->db->where($field2, $id2);
        }
        $this->db->delete($table);
    }

    // get all categories
    function get_total_portfolios(){
        return $this->db
            ->select("ap.id AS port_id, ap.title, ap.created_on, au.email, au.username,ap.content,ap.category_id,ap.is_featured,ap.item_url,ap.item_image")
            ->join(DB_PREFIX."user_master as au", "ap.author = au.id")
            ->get(DB_PREFIX."portfolio as ap")->result();
    }

    function add_new_portfolio($datas){
        return $this->save(DB_PREFIX.'portfolio',$datas);
    }
    function add_new_portfolio_images($datas){
        return $this->save(DB_PREFIX.'portfolio_images',$datas);
    }
    function edit_portfolio($datas,$id){
        $this->update(DB_PREFIX.'portfolio',$datas,$id,'id');
    }
    function get_portfolio_by_id($id){
        return $this->db
            ->select("ap.id AS port_id, ap.title, ap.created_on, au.email, au.username,ap.content,ap.category_id,ap.is_featured,ap.item_url,ap.item_image")
            ->join(DB_PREFIX."user_master as au", "ap.author = au.id")
            ->where("ap.id",$id)
            ->get(DB_PREFIX."portfolio as ap")->result();
    }
    function get_portfolio_sub_by_id($id){
        return $this->db
            ->select("*")
            ->where("portfolio_id",$id)
            ->get(DB_PREFIX."portfolio_images")->result();
    }
    function get_featured_portfolio(){
        return $this->db
            ->select("ap.id AS port_id, ap.title, ap.created_on, au.email, au.username,ap.content,ap.category_id,ap.is_featured,ap.item_url,ap.item_image")
            ->join(DB_PREFIX."user_master as au", "ap.author = au.id")
            ->where("ap.is_featured",'Y')
            ->order_by('rand()')
            ->limit(3)
            ->get(DB_PREFIX."portfolio as ap")->result();
    }
    function edit_category($id,$title){
        $this->update(DB_PREFIX.'category',array("title"=>$title),$id,"id");
        return 1;
    }
    function add_category($data){
        return $this->save(DB_PREFIX.'category',$data);
    }
    function check_category_port($title,$id){
        return count($this->db->select("*")->where("title",$title)->where("category_id",$id)->get(DB_PREFIX.'portfolio')->result());
    }
    function delete_portfolio($id){
        $this->delete(DB_PREFIX.'portfolio',$id,'id');
        return 1;
    }
}
?>
