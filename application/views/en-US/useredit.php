<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>the Booking - Spa - User Profile</title>
	<!-- InstanceEndEditable -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('resources/front/favicon.ico'); ?>" />
    <?php require("head.php"); ?>
    <!--tao datetimepicker-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/datetimepicker/tcal.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/jquery-ui-1.8.16.custom.css'); ?>" />
    <script type="text/javascript" src="<?php echo base_url('public/datetimepicker/tcal.js'); ?>"></script> 
    <!--end tao datetimepicker-->
    <script type="text/javascript" src="<?php echo base_url('resources/front/js/useredit.js'); ?>"></script>
</head>

<body>

<header>
	<div class="navbar" role="navigation">
    	<div class="full-bar top-bar">
        	<div class="container">
                    <div class="row">
                        <?php
                             require("header.php");
                         ?>
                    </div>                    
                    
                  </div>
        </div>
        <div class="clearfix"></div>
         <?php
             require("headersearch.php");
         ?>
      
    </div>
    <?php
             require("menu.php");
    ?>
    <div class="clearfix"></div>
    
	<!-- InstanceBeginEditable name="Full Content" -->
    <!-- InstanceEndEditable -->    
    
    <div class="container" style="padding-top:10px; padding-bottom:10px;">
    <!-- InstanceBeginEditable name="Main Content" -->
    	<h1 class="page-title-bar">User Information</h1>
        
    	<div class="wrap-2cols nav-left userprofile">
        	<div class="col-nav">
                <div class="wrap-avatar" id="avatar_profile">
                </div>
                <h4 class="user-name">
                	<?php 
                        echo $ttuser->FullName;
                    ?>
                </h4>
                <p class="gender">Sex: 
                    <?php 
                        $UserType="";
                        if(isset($_SESSION['AccUser']))
                            $UserType = $_SESSION['AccUser']['User']->UserType; 
                            
                        if($ttuser->Gender==1 || $ttuser->Gender=="1")
                            echo "Nữ";
                        else
                            echo "Nam";
                    ?>
                </p>
                <button type="button" class="btn btn-default" style="width:100%;" onClick="parent.location='indexuser'">History booking</button>
                <hr />
                <h5>username </h5>
                <?php echo $_SESSION['AccUser']['User']->UserId; ?><br />
                <a href="javascript:void(0);" data-toggle="modal" data-target="#changepassModal">
                	Change the password
                </a>
                <hr />
                <h5>Public Profile</h5>
                Know as <strong>username</strong> on The Booking Spa<br />
               <a href="javascript:void(0);" onClick="parent.location='user-profile-public.html'">
                	Check how others see your profile
                </a>
            </div>
            <div class="col-content">
                <div class="content">
                     <div class="row">
                        <div class="col-md-6 col-sm-offset-3">
                            <h1 class="title-page" style="text-align:center;">Info Members </h1>
                            <center>About yourself</center>
                            
                            <form class="form-horizontal" role="form" style="margin-top:20px;">
                            	<div class="form-group">
                                    <label class="col-sm-4 control-label">Full name</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="inputname" placeholder="Nhập họ tên">
                                    </div>
                                  </div>
                              <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" id="inputEmail" placeholder="enter Email" disabled="disabled">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputtel" class="col-sm-4 control-label">Phone</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputtel" placeholder="Enter Phone">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputadd" class="col-sm-4 control-label">Address</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="inputadd" placeholder="Enter Address">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="se_city" class="col-sm-4 control-label">City</label>
                                <div class="col-sm-8">
                                  <select class="form-control" id="se_city">
                                      
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="se_dis" class="col-sm-4 control-label">District</label>
                                <div class="col-sm-8">
                                  <select class="form-control" id="se_dis">
                                      
                                    </select>
                                </div>
                              </div>
                              <!--<div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox"> Nhận thông tin từ The Booking Spa
                                    </label>
                                  </div>
                                </div>
                              </div>-->
                              <!--Thong tin them-->
                                <input type="hidden" id="usertype" name="usertype" value="<?php if($UserType=="" || $UserType==null) echo 1; else echo 0; ?>" />
                             
                              <div class="form-group" id="div_ex_info" <?php if($UserType!="" && $UserType!=null) echo 'style="display: none;"'; ?>>
                                <a href="javascript:void(0);" onclick="extention_info(1);">
                                	Information expand
                                </a>
                              </div>
                              <div id="ex_infomation" style="display: none;">
                                      <div class="form-group">
                                        <label for="inputcmnd" class="col-sm-4 control-label">ddentity card</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputcmnd" placeholder="Enter ID">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputngaycap" class="col-sm-4 control-label">Date Range</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control tcal" id="inputngaycap" placeholder="Enter Date Range"><span id="err_ngaycap" style="color: red; display: none;"></span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputadd" class="col-sm-4 control-label">Issued by</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputnoicap" placeholder="Enter Issued by">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputtel" class="col-sm-4 control-label">Birthday</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control tcal" id="inputngaysinh" placeholder="Enter Birthday"><span id="err_ngaysinh" style="color: red; display: none;"></span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputadd" class="col-sm-4 control-label">Place of birth</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputnoisinh" placeholder="Enter Place of birth">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputtamtru" class="col-sm-4 control-label">Staying</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputtamtru" placeholder="Enter Staying">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputthuongtru" class="col-sm-4 control-label">Resident</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputthuongtru" placeholder="Enter Resident">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputadd" class="col-sm-4 control-label">Sex</label>
                                        <div class="col-sm-8">
                                              <select class="form-control" id="se_gander">
                                                  
                                                </select>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputfax" class="col-sm-4 control-label">Fax</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputfax" placeholder="Enter Fax">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputadd" class="col-sm-4 control-label">Website</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputwebsite" placeholder="Enter website"><span id="err_website" style="color: red; display: none;"></span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputtel" class="col-sm-4 control-label">Tax code</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputmsthue" placeholder="Enter Tax code">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputadd" class="col-sm-4 control-label">Note</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="inputghichu" placeholder="Enter Note">
                                        </div>
                                      </div>
                              </div>
                              <!--end Thong tin them-->
                              <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                  <button type="button" class="btn btn-default" onClick="btnsave();">Save</button>
                                  <button type="button" class="btn btn-default" onClick="btncancel();">Cancel</button>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                  <span id="success" style="display: none; color: green; font-weight: bold;"></span>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                     
                     <div class="clearfix"></div>
                </div>
            </div>
            
        </div>

<!-- Modal -->
<div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
      	<div class="row">        	
            <div class="col-md-12">
            
            	<form class="form" role="form">                	                  
                  <div class="form-group">
                    Old Password
                    <label class="sr-only" for="exampleInputPassword2">Old Password</label>
                    <input type="password" class="form-control" id="OldPassword" placeholder="Enter Old password"><span id="err_mkcu" style="color: red; display: none;"></span>
                  </div>
                  <div class="form-group">
                    New password
                    <label class="sr-only" for="exampleInputPassword2">New password</label>
                    <input type="password" class="form-control" id="NewPassword" placeholder="Enter New password"><span id="err_mkmoi" style="color: red; display: none;"></span>
                  </div>
                  <div class="form-group">
                    Confirm Password
                    <label class="sr-only" for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" id="ReNewPassword" placeholder="Confirm Password"><span id="err_remkmoi" style="color: red; display: none;"></span>
                  </div>
                </form>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="btndoipass();">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
        <br />
        <span id="resultchangepass" style="display: none; color: green; font-weight: bold;"></span>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->        
        
	<!-- InstanceEndEditable -->
    </div>
    
</header>
<?php
     require("footer.php");
 ?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "42ca428d-6cd0-4b93-b360-fa0d0bfa3696", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script> 
    
</body>
<!-- InstanceEnd --></html>
