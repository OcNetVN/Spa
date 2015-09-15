<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Home Controller (spamanagement)
* 
* @package   FCSE - spamanagement
* @author    Creater: FCSE 
* @author    Updater: FCSE
* @copyright 2015 The FCSE
*/
class Home_controller extends CI_Controller {

	/*
	|----------------------------------------------------------------
	| Construct function 
	| Inherit construct parent (CI)
	|----------------------------------------------------------------
	*/
	public function __construct()
	{
		parent:: __construct();
        $this->load->model('spamanagement/m_common'); 
        $this->load->model('spamanagement/m_spa_info'); 
        $this->load->model('spamanagement/m_spa_hour'); 
        $this->load->model('spamanagement/m_spa_util'); 
        $this->load->model('spamanagement/m_spa_user'); 
		/*
		|----------------------------------------------------------------
		|Load common library
        |Call function check isset session superadmin
		|Call function set lang
		|----------------------------------------------------------------
		*/
		//$this->load->library("common");
        //$this->common->check_accusersuper();
		//$this->common->set_lang();
		
	}

	/**
	* Function view spa info page
	* Date: 14/04/2015
	* URL Page: spaman/spa_info
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show spa Page
	*/
	public function spa_info()
	{	
        $p_arr 	    =	array(
						'title'		=>	'Thông tin spa',
						'active'	=>	0,
                        //'p_custom_css'		=>	$this->load->view('spamanagement/css/css_index_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('spamanagement/js/js_spa_info_view', '', TRUE)
					);
     
        $spaid                  =   $_SESSION["AccSpa"]["spaid"];
        $spa                    =   $this->m_common->get_spa_by_spaid($spaid);
        $spa_location           =   $this->m_common->get_spalocation_by_spaid($spaid);
        
        $arr_spainfo            =   array(  "spa_info"          =>  $spa,
                                            "spa_location"      => $spa_location
                                            );
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load spa info View
		| Load Footer View
		|----------------------------------------------------------------
		*/
        
		$this->load->view("spamanagement/common/head_view", $p_arr);
		$this->load->view("spamanagement/common/header_view");
		$this->load->view("spamanagement/common/left_view");
		$this->load->view("spamanagement/spa_info_view",$arr_spainfo);
		$this->load->view("spamanagement/common/footer_view");
	}
    /**
	* Function view spa hour page
	* Date: 14/04/2015
	* URL Page: spaman/spa_hour
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show spa Page
	*/
	public function spa_hour()
	{	
        $p_arr 	    =	array(
						'title'		=>	'Giờ hoạt động spa',
						'active'	=>	0,
                        //'p_custom_css'		=>	$this->load->view('spamanagement/css/css_index_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('spamanagement/js/js_spa_hour_view', '', TRUE)
					);
     
        $spaid                  =   $_SESSION["AccSpa"]["spaid"];
        $spa_hour               =   $this->m_common->get_spa_hour_by_spaid($spaid);
        
        $arr_spahour            =   array(  "spa_hour"          =>  $spa_hour,
                                            );
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load spa hour View
		| Load Footer View
		|----------------------------------------------------------------
		*/
        
		$this->load->view("spamanagement/common/head_view", $p_arr);
		$this->load->view("spamanagement/common/header_view");
		$this->load->view("spamanagement/common/left_view");
		$this->load->view("spamanagement/spa_hour_view",$arr_spahour);
		$this->load->view("spamanagement/common/footer_view");
	}
    /**
	* Function view spa util page
	* Date: 14/04/2015
	* URL Page: spaman/spa_util
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show spa Page
	*/
    public function spa_policy()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

	public function spa_util()
	{	
        $p_arr 	    =	array(
						'title'		=>	'Tiện ích spa',
						'active'	=>	0,
                        //'p_custom_css'		=>	$this->load->view('spamanagement/css/css_index_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('spamanagement/js/js_spa_util_view', '', TRUE)
					);
     
        $spaid                  =   $_SESSION["AccSpa"]["spaid"];
        $list_util              =   $this->m_common->get_list_util();
        $spa_util               =   $this->m_common->get_spa_util_by_spaid($spaid);
        
        $list_type              =   $this->m_common->get_list_type();
        $spa_type               =   $this->m_common->get_spa_type_by_spaid($spaid);
        
        $list_producttype       =   $this->m_common->get_list_producttype();
        $spa_producttype        =   $this->m_common->get_producttype_by_spaid($spaid);
        
        $arr_spautil            =   array(  "list_util"         =>  $list_util,
                                            "spa_util"          =>  $spa_util,
                                            
                                            "list_type"         =>  $list_type,
                                            "spa_type"          =>  $spa_type,
                                            
                                            "list_producttype"         =>  $list_producttype,
                                            "spa_producttype"          =>  $spa_producttype,
                                            );
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load spa util View
		| Load Footer View
		|----------------------------------------------------------------
		*/
        
		$this->load->view("spamanagement/common/head_view", $p_arr);
		$this->load->view("spamanagement/common/header_view");
		$this->load->view("spamanagement/common/left_view");
		$this->load->view("spamanagement/spa_util_view",$arr_spautil);
		$this->load->view("spamanagement/common/footer_view");
	}
    /**
	* Function view spa user page
	* Date: 14/04/2015
	* URL Page: spaman/spa_user
	* Rewrite routing: file config/routes.php
	* @param 
	* @return Show spa Page
	*/

    public function spa_product()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

    public function spa_price()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

    public function spa_km()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

    public function spa_dt()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

    public function spa_cal()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

    public function spa_booking()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

    public function spa_notify()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

	public function spa_user()
	{	
        $p_arr 	    =	array(
						'title'		=>	'Đội nhóm spa',
						'active'	=>	3,
                        //'p_custom_css'		=>	$this->load->view('spamanagement/css/css_index_view', '', TRUE),
						'p_custom_js' 		=>	$this->load->view('spamanagement/js/js_spa_user_view', '', TRUE)
					);
     
        /*$spaid                  =   $_SESSION["AccSpa"]["spaid"];
        $list_user              =   $this->m_common->get_list_user();
        $spa_user               =   $this->m_common->get_spa_user_by_spaid($spaid);
        
        $list_type              =   $this->m_common->get_list_type();
        $spa_type               =   $this->m_common->get_spa_type_by_spaid($spaid);
        
        $list_producttype       =   $this->m_common->get_list_producttype();
        $spa_producttype        =   $this->m_common->get_producttype_by_spaid($spaid);
        
        $arr_spauser            =   array(  "list_user"         =>  $list_user,
                                            "spa_user"          =>  $spa_user,
                                            
                                            "list_type"         =>  $list_type,
                                            "spa_type"          =>  $spa_type,
                                            
                                            "list_producttype"         =>  $list_producttype,
                                            "spa_producttype"          =>  $spa_producttype,
                                            );*/
		/*
		|----------------------------------------------------------------
		| Load Head View
		| Load Header View
		| Load Left View
		| Load spa user View
		| Load Footer View
		|----------------------------------------------------------------
		*/
        
		$this->load->view("spamanagement/common/head_view", $p_arr);
		$this->load->view("spamanagement/common/header_view");
		$this->load->view("spamanagement/common/left_view");
		$this->load->view("spamanagement/spa_user_view");
		$this->load->view("spamanagement/common/footer_view");
	}
    /*
	|----------------------------------------------------------------
	| get location by spa
	|----------------------------------------------------------------
	*/

    public function spa_report()
    {   
        
        /*
        |----------------------------------------------------------------
        | Load Head View
        | Load Header View
        | Load Left View
        | Load spa hour View
        | Load Footer View
        |----------------------------------------------------------------
        */
        
        $this->load->view("spamanagement/common/head_view", $p_arr);
        $this->load->view("spamanagement/common/header_view");
        $this->load->view("spamanagement/common/left_view");
        $this->load->view("spamanagement/common/footer_view");
    }

    public function getlocation_by_spa()
    {
        $req = $this->m_spa_info->getlocation_by_spa();
        echo json_encode($req);
    }
    public function load_location_child_by_location_parent()
    {
        $req = $this->m_common->load_location_child_by_location_parent();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function save edit spa
    |----------------------------------------------------------------
    */
    public function btnsave_spainfo()
    {
        $req = $this->m_spa_info->btnsave_spainfo();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function save spa hour
    |----------------------------------------------------------------
    */
    public function btnsave_spa_hour()
    {
        $req = $this->m_spa_hour->btnsave_spa_hour();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function save spa util
    |----------------------------------------------------------------
    */
    public function btnsave_spa_util()
    {
        $req = $this->m_spa_util->btnsave_spa_util();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function save spa user
    |----------------------------------------------------------------
    */
    public function getlistuser()
    {
        $req = $this->m_spa_user->getlistuser();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function change status spa user
    |----------------------------------------------------------------
    */
    public function changestatus_spauser()
    {
        $req = $this->m_spa_user->changestatus_spauser();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function change status spa user
    |----------------------------------------------------------------
    */
    public function btnedit()
    {
        $req = $this->m_spa_user->btnedit();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function change role spa user
    |----------------------------------------------------------------
    */
    public function changerole_spauser()
    {
        $req = $this->m_spa_user->changerole_spauser();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function button delete spa user
    |----------------------------------------------------------------
    */
    public function btndelete_spauser()
    {
        $req = $this->m_spa_user->btndelete_spauser();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function get number user to show ultab
    |----------------------------------------------------------------
    */
    public function get_number_user_show_ultab()
    {
        $req = $this->m_spa_user->get_number_user_show_ultab();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function search user by username, email spa user 
    |----------------------------------------------------------------
    */
    public function searchuser_spauser()
    {
        $req = $this->m_spa_user->searchuser_spauser();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    |function add spa user modal
    |----------------------------------------------------------------
    */
    public function addspausermodal_spauser()
    {
        $req = $this->m_spa_user->addspausermodal_spauser();
        echo json_encode($req);
    }
    
    /*
    |----------------------------------------------------------------
    |function upload image spa
    |----------------------------------------------------------------
    */
    public function uploadimage_spainfo($spaid)
    {
        $db             = DATABASE_1;
        $user_create    = "spa";
        $part_url       = 'resources/img/spa/';
        $TM_Con         = $spaid;
                
        $mimes          = array(
                            'image/jpeg', 'image/png', 'image/gif'
                                );
        if (!file_exists($part_url.$TM_Con)) 
        {
                mkdir($part_url.$TM_Con, 0777, true);
        }
        
        sleep(1);
        if (isset($_FILES['myfile'])) {
            $fileName       = time()."_".$_FILES['myfile']['name'];
            $fileType       = $_FILES['myfile']['type'];
            $fileError      = $_FILES['myfile']['error'];
            $fileStatus     = array(
                                'status' => 0,
                                'message' => ''    
                                );
            if ($fileError== 1) 
            { //L?i vu?t dung lu?ng
                $fileStatus['message']          = "Size quá lớn";
            } 
            elseif (!in_array($fileType, $mimes)) 
            { //Ki?m tra d?nh d?ng file
                $fileStatus['message']          = "Không đúng định dạng";
            } 
            else 
            { //Không có l?i nào
                move_uploaded_file($_FILES['myfile']['tmp_name'], $part_url.$TM_Con.'/'.$fileName);                
                // insert vao bang links
                $strURL                         = $part_url.$TM_Con.'/'.$fileName;
                $this->m_spa_info->insert_tbl_links($spaid, $strURL, "SPA", 1, $user_create);
                                
                $url                            = $part_url.$TM_Con.'/'.$fileName;
                $fileStatus['status']           = 1;
                $fileStatus['message']          = $fileName." "."upload thành công";
                $fileStatus['url'] = $url;
            }    
        echo json_encode($fileStatus);
        exit();        
        }
    }
    /*
    |----------------------------------------------------------------
    | function preview image uploaded
    |----------------------------------------------------------------
    */
    public function previewimage_spainfo() 
    {
        $req = $this->m_spa_info->previewimage_spainfo();
        echo json_encode($req);
    }
    /*
    |----------------------------------------------------------------
    | function delete image
    |----------------------------------------------------------------
    */
    public function deleteimage()
    {
        $req = $this->m_common->deleteimage();
        echo json_encode($req);
    }
    
    /*
    | funciton test 
    */
    public function create_ss_accspa()
    {
        $spaid              =   "0120150122000001";
        $user               =   array(
                                        "userid"        =>  "adminspa",
                                        "role"          =>  "adminspa",
                                        "name"          =>  "pakuru"
                                        );
        $arr                =   array(
                                        "spaid"     =>  $spaid,
                                        "user"      =>  $user,
                                        );
        $_SESSION["AccSpa"] =   $arr;
        return;
    }
    public function unsset_ss_accspa()
    {
        unset($_SESSION["AccSpa"]);
        return;
    }
    /*
    | end funciton test 
    */
    
    //Linh 05/03/2015
    public function setlang()
    {
        $lang = $this->input->get('lang');

        if($lang != FILE_EN && $lang != FILE_CN)
        {
            $lang = FILE_EN;
        }

        //Set to cookie
        $cookie_time    =   3600*24*30;             
        $this->input->set_cookie('lang', $lang, $cookie_time); 
        redirect($_SERVER['HTTP_REFERER']); 
    }
}