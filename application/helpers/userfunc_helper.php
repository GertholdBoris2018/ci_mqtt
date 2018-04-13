<?php
/**
 * Created by PhpStorm.
 * User: Aimon.M
 * Date: 4/3/2015
 * Time: 11:33 AM
 */

if ( ! function_exists('__Islogin'))
{
    function __Islogin()
    {
        error_reporting(0);
        $CI =& get_instance();
        $CI->load->library("session");
        if(!$CI->session->userdata('islogin') )
        {
            redirect('admin/dashboard/login/');
        }
    }
}
if( ! function_exists('checkuser')){
    function checkuser($id,$pass){
        error_reporting(0);
        $CI =& get_instance();
        $CI->load->model("admin/Users_Model", "uM", true);
        $user_info = $CI->uM->user_check($id,$pass);
        return $user_info;
    }
}

if(!function_exists('__checkdevice'))
{
    function __checkdevice($ip){
        error_reporting(0);
        $CI =& get_instance();
        $CI->load->library("session");
        $CI->load->model("Devices_Model", "dM", true);
        $device = $CI->dM->checkDevice($ip);
        return $device;
    }
}

if(!function_exists('getUserIP'))
{
    function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }
}


