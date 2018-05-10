<?php
class Users_Model extends CI_Model {

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
    function user_check($id,$pass){
        $rlt = array();
        $this->db->select('*')
            ->from(DB_PREFIX.'user_master')
            ->where('username',$id)
            ->or_where('email',$id)
            ->where('password' , md5($pass));

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $result = $query->result();
            $rlt["user_id"] = $result[0]->id;
            $rlt["username"] = $result[0]->username;
            $rlt["email"] = $result[0]->email;
        }
        else{
            $rlt["user_id"] = INVALIDUSER;
            $rlt["username"] = INVALIDUSER;
            $rlt["email"] = INVALIDUSER;
        }
        return $rlt;
    }

    function get_total_customers(){
            return $this->db
                ->select("*")
                ->get(DB_PREFIX."customers")->result();
    }

    function get_customer_by_id($id){
        return $this->db
            ->select("*")
            ->where("UID",$id)
            ->get(DB_PREFIX."customers")->result();
    }

    function add_new_customer($data){
        return $this->save(DB_PREFIX.'customers',$data);
    }

    function edit_customer($data, $id){
        $this->update(DB_PREFIX.'customers', $data , $id , "UID");
        return 1;
    }

    function delete_customer($id){
        $this->delete(DB_PREFIX.'customers',$id,'UID');
        return 1;
    }
}
?>
