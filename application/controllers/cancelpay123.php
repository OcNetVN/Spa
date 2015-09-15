<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Cancelpay123 extends CI_Controller
{
       function __construct()
       {
            parent::__construct();
            $this->load->model('m_checkout');
            $this->load->model('admin/m_user');
            $this->load->model('m_index');
            $this->load->helper('language_helper'); 
       }
       
       public function index(){
            $lang = change_language();
           
           if( (isset($_SESSION['AccUser']) || isset($_SESSION['object']))  && isset($_SESSION['Cart']) && isset($_SESSION['mTransactionID']))
           {
                $data['MenuString'] = $this->m_index->getMenuStr();
                $data['CommentString'] = $this->m_index->getCommentStr();
                //nghia viet them theo ss cart moi
                $this->m_checkout->cancelpay123();
                $this->load->view($lang.'/cancelpay123',$data);
                //xoa het du lieu da add vao db
                
           }
           else
           {
                //redirect("index");
                $data['MenuString'] = $this->m_index->getMenuStr();
                $data['CommentString'] = $this->m_index->getCommentStr();               
                $this->load->view($lang.'/cancelpay123',$data);
           }
       }       
       
     
}
?>