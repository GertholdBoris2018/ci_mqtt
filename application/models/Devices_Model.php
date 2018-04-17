<?php
class Devices_Model extends CI_Model {

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
    function checkDeviceByIp($ip){
        $rlt = array();
        $this->db->select('*')
            ->from(DB_PREFIX.'devices')
            ->join(DB_PREFIX.'customers' , DB_PREFIX.'devices.dev_client_code = '. DB_PREFIX.'customers.customer_id', 'left')
            ->where(DB_PREFIX.'devices.dev_v4_external_ipaddress',$ip);
       
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $result = $query->result();
            foreach($result as $row){
                $item = array(
                    'dev_client_code' => $row->dev_client_code,
                    'name' => $row->name,
                    'password' => $row->password,
                    'UID' => $row->UID
                );
                array_push($rlt, $item);
            }
        }

        return $rlt;
    }

    function checkDeviceByCustomer($customerId){
        $rlt = array();
        $this->db->select('*')
            ->from(DB_PREFIX.'devices')
            ->join(DB_PREFIX.'customers' , DB_PREFIX.'devices.dev_client_code = '. DB_PREFIX.'customers.customer_id', 'left')
            ->where(DB_PREFIX.'devices.dev_client_code',$customerId);
            $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $result = $query->result();
            foreach($result as $row){
                $item = array(
                    'dev_client_code' => $row->dev_client_code,
                    'name' => $row->name,
                    'password' => $row->password,
                    'UID' => $row->UID
                );
                array_push($rlt, $item);
            }
        }

        return $rlt;
    }

    function get_total_devices(){
        return $this->db
            ->select("*")
            ->join(DB_PREFIX."customers as cu", "cu.customer_id = de.dev_client_code")
            ->get(DB_PREFIX."devices as de")->result();
    }

    function add_new_device($data){
        return $this->save(DB_PREFIX.'devices',$data);
    }

    function get_device_by_id($id){
        return $this->db
            ->select("*")
            ->where("UID",$id)
            ->get(DB_PREFIX."devices")->result();
    }

    function edit_device($data , $id){
        $this->update(DB_PREFIX.'devices', $data , $id , "UID");
        return 1;
    }

    function delete_device($id){
        $this->delete(DB_PREFIX.'devices',$id,'UID');
        return 1;
    }

    function customer_check($username, $password){
        $rlt = array();
        $this->db->select('*')
            ->from(DB_PREFIX.'customers')
            ->where('name',$username)
            ->where('password' , $password);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $result = $query->result();
            $rlt["customer_id"] = $result[0]->customer_id;
            $rlt["name"] = $result[0]->name;
            $rlt["password"] = $result[0]->password;
        }
        else{
            $rlt["customer_id"] = INVALIDUSER;
            $rlt["name"] = INVALIDUSER;
            $rlt["password"] = INVALIDUSER;
        }
        return $rlt;
    }
}
?>
