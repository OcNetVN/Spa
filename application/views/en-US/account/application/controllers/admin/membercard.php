<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membercard extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_membercard');
        $this->db2 = $this->load->database('thebooking', TRUE);
        $this->load->model('m_index');
        //$this->load->model('admin/m_products');
        //$this->load->model('m_object');
    }
    function  CheckQuyen($id)
    {
        // 1: allow New
        // 2: allow Edit
        // 3: allow Delete
        // 4: allow View
        // 5: allow Print
        // 6: Status
        
        $page = "admin/membercard";
        
        $arr = (array) $_SESSION['AccUser'];
        $list =  (array)$arr['ListMenu'];
        $val= false;
        for($i=0;$i<count($list);$i++)
        {
            if($list[$i]->url == $page)
            {
                switch($id)
                {
                    case 1:
                    {
                        // allow new
                        if($list[$i]->AllowNew == 1)
                        {
                            $val=true;
                        }
                        break;
                    }
                    case 2:
                    {
                        // allow edit
                        if($list[$i]->AllowEdit == 1)
                        {
                            $val=true;
                        }
                        break;
                    }
                    case 3:
                    {
                        // allow Delete
                        if($list[$i]->AllowDelete == 1)
                        {
                            $val=true;
                        }
                        break;
                    }
                    case 4:
                    {
                        // allow View
                        if($list[$i]->AllowView == 1)
                        {
                            $val=true;
                        }
                        break;
                    }
                    case 5:
                    {
                        // allow print
                        if($list[$i]->AllowPrint == 1)
                        {
                            $val=true;
                        }
                        break;
                    }
                    case 6:
                    {
                        // Status
                        if($list[$i]->Status == 1)
                        {
                            $val=true;
                        }
                        break;
                    }
                }
                break;
            }
        }
        return $val;
    }
    public function index()
    {
        $lang = $_SESSION['Lang'];
        if($this->CheckQuyen(6))
        {
            $this->load->view($lang.'/admin/discount/v_membercard');
        }
        else
        {
           $this->load->view($lang.'/admin/v_accessdenied');
        }
    }
    public function layloaithe()
    {
        $ckq = $this->CheckQuyen(4);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->layloaithe();
        }
        echo json_encode($req);
    }
    public function layloaithethem()
    {
        $ckq = $this->CheckQuyen(1);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->layloaithethem();
        }
        echo json_encode($req);
    }
    public function searchmembercard()
    {
        $ckq = $this->CheckQuyen(4);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->searchmembercard();
        }
        echo json_encode($req);
    }
    public function clickbtnsearch()
    {
        $ckq = $this->CheckQuyen(4);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->clickbtnsearch();
        }
        echo json_encode($req);
    }
    public function clickbtnthem()
    {
        $ckq = $this->CheckQuyen(1);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->clickbtnthem();
        }
        echo json_encode($req);
    }
    public function sua()
    {
        $ckq = $this->CheckQuyen(2);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->sua();
        }
        echo json_encode($req);
    }
    public function clickbtnsua()
    {
        $ckq = $this->CheckQuyen(2);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->clickbtnsua();
        }
        echo json_encode($req);
    }
    public function xoa()
    {
        $ckq = $this->CheckQuyen(3);
        $req = -1;
        if($ckq == true)
        {
            $req = $this->m_membercard->xoa();
        }
        echo json_encode($req);
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */