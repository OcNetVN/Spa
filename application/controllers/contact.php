<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{
       function __construct()
       {
            parent::__construct();
            $this->load->model('m_category'); 
            $this->load->model('m_index');  
            $this->load->model('m_mail');         
           $this->load->helper('language_helper'); 
       }
       public function index(){
            $lang = change_language();
            
            $res['listpro_limit4'] = $this->m_index->listpro_limit4();
            $res['loaispcon'] = $this->m_index->layloaiconsp();
            $res['MenuString'] = $this->m_index->getMenuStr();
            $res['CommentString'] = $this->m_index->getCommentStr();
            $res['SortBy'] = $this->m_category->GetSortBy(); 
            $res['HTMLInfo'] = $this->m_mail->GetHTML("contact.html",$lang);
            $res['ProductTypeCap1'] = $this->m_category->GetProductTypeCap1();
            $this->load->view($lang.'/contact',$res);
       }
}
?>
