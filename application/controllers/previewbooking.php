<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Previewbooking extends CI_Controller
{
       function __construct()
       {
            parent::__construct();
            $this->load->model('m_checkout');
            $this->load->model('m_index');
            $this->load->model('m_mail');
            $this->load->helper('language_helper');
       }
       
       public function index()
       {
            $lang = change_language();
           
            $id=$this->uri->segment(3);
            if(isset($id) && $id!="")
                $str = $this->m_checkout->previewbooking($id);
            //print_r($str);die;
            if(isset($str) && $str!="")
                $data['str']=$str;
            $data['MenuString'] = $this->m_index->getMenuStr();
            $data['CommentString'] = $this->m_index->getCommentStr();
            //$lang = $_SESSION['Lang'];
            $this->load->view($lang.'/previewbooking',$data);
       }
}
?>