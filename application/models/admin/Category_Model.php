<?php
class Category_Model extends CI_Model {

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
    function get_total_cates(){
        return $this->db
            ->select("ac.id AS cate_id, ac.title, ac.created_on, au.email, au.username")
            ->join("avs_user_master as au", "ac.author = au.id")
            ->get("avs_category as ac")->result();
    }
    function get_category_by_id($id){
        return $this->db
            ->select("ac.id AS cate_id, ac.title, ac.created_on, au.email, au.username")
            ->join("avs_user_master as au", "ac.author = au.id")
            ->where("ac.id",$id)
            ->get("avs_category as ac")->result();
    }
    function edit_category($id,$title){
        $this->update(DB_PREFIX.'category',array("title"=>$title),$id,"id");
        return 1;
    }
    function add_category($data){
        return $this->save(DB_PREFIX.'category',$data);
    }
    function check_category_byname($title){
        return count($this->db->select("*")->where("title",$title)->get(DB_PREFIX.'category')->result());
    }
    function delete_category_byid($id){
        $this->delete(DB_PREFIX.'category',$id,'id');
        return 1;
    }
}
?>
