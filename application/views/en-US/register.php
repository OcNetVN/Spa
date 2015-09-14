<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>the Booking - Sign Up</title>
    <!-- InstanceEndEditable -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="<?php echo base_url('resources/front/favicon.ico'); ?>">
    <?php require("head.php"); ?>
    <script src="<?php echo base_url('resources/front/js/register.js'); ?>"></script>
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
    <?php if(isset($email)){
        echo $email;
    }?>
    <div class="container" style="padding-top:10px; padding-bottom:10px;">
    <!-- InstanceBeginEditable name="Main Content" -->
        <div class="row">
            <div class="col-md-6 col-sm-offset-3">
                <h1 class="title-page" style="text-align:center;">Sign Up</h1>            
                <div class="divregister">
                    <div class="fields">
                    <form class="form-horizontal" role="form" style="margin-top:20px;">
                        <div class="form-group ">
                            <button id="gConnect" type="button" 
                            data-scope="https://www.googleapis.com/auth/plus.profile.emails.read"
                            data-requestvisibleactions="http://schemas.google.com/AddActivity"
                            data-clientId="1041804302086-ieuqed3pcqre8e6i1am76flg0nuoq6h1.apps.googleusercontent.com"
                            data-callback="onSignInCallback"
                            data-theme="dark"
                            data-cookiepolicy="single_host_origin"
                            class="col-sm-offset-2 btn btn-default btn-google g-signin" href="javascript:void(0)" style="width:350px;">Google Account</button>
                          </div>
                        <div class="form-group DaLogin">
                            <button type="button" class="col-sm-offset-2 btn btn-default btn-facebook" href="javascript:void(0)" onclick="singupfacebook();" style="width:350px;">Facebook Account</button>
                            <div id="fb-root"></div>
                        </div>
                      <hr />
                      <div class="form-group">
                        <div class="col-sm-6">
                          <label for="inputEmail3" class="control-label">Email
                                <span style="color: red;">(*)</span><br/>
                                 <span style="font-size:11px">To receive notifications from spa</span>
                          </label>
                          <input type="email" class="form-control" id="inputEmail" placeholder="Enter Email">
                          <span id="email_err" style="display: none; color: red; font-weight: bold; margin-left: 5px;"></span>
                        </div>
                        <div class="col-sm-6">
                             <label for="inputPassword3" class="control-label">Password<span style="color: red;">(*)</span></label>
                             <input type="password" class="form-control" id="inputPassword" placeholder="Enter password">
                        </div>
                      </div>
                       <div class="form-group">
                            <div class="col-sm-6">
                              <label for="inputname1" class="control-label">Full name<span style="color: red;">(*)</span></label>
                              <input type="text" class="form-control" id="inputname" placeholder="">
                            </div>
                            
                            <div class="col-sm-6">
                            <label for="re_inputPassword3" class="control-label">Confirm password<span style="color: red;">(*)</span></label>
                            <input type="password" class="form-control" id="re_inputPassword" placeholder="Enter repass"><span id="pass_err" style="display: none; color: red; font-weight: bold; margin-left: 5px;"></span>
                            </div>
                      </div>
                     
                     
                      <div class="form-group">
                        <div class="col-sm-6">
                        <label for="sex" class="control-label">Sex</label><br />
                        <input type="radio"  name="sex" value="1" checked="checked" /> 
                          female
                          <input type="radio" name="sex" value="0" /> 
                          male
                        </div>
                        <div class="col-sm-6">
                        <label for="inputname2" class="control-label">Permanent address</label>
                          <input type="text" class="form-control" id="inputPerAdd" placeholder="">
                        </div>
                        
                      </div>
                      <div class="form-group">
                        <div class="col-sm-6">
                        <label for="inputname2" class=" control-label">City</label>
                          <select class="form-control" id="inputProvinceId">
                                <?php
                                    echo $ProvinceString;
                                ?>
                          </select>
                        </div>
                        <div class="col-sm-6">
                        <label for="inputname2" class=" control-label">Residential address</label>
                          <input type="text" class="form-control" id="inputTemAdd" placeholder="">
                        </div>
                        
                      </div>
                      <div class="form-group">
                        
                        <div class="col-sm-6">
                        <label for="inputname2" class=" control-label">Phone<span style="color: red;">(*)</span><br/>
                        <span style="font-size:11px">To receive notifications from spa</span>
                        </label>
                          <input type="text" class="form-control" id="inputTel" placeholder="">
                        </div>
                        
                        <div class="col-sm-6">
                        <label for="inputname2" class=" control-label">Birthday</label>
                          <input type="text" class="form-control datepicker" id="inputDoB" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        
                        <div class="col-sm-6">
                        <label for="inputname2" class=" control-label">Id card</label>
                          <input type="text" class="form-control" id="inputcmnd" placeholder="">
                        </div>
                        
                        <div class="col-sm-6">
                          <label for="inputname2" class=" control-label">Date of issue</label>
                          <input type="text" class="form-control datepicker" id="inputPIDI" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        
                        <div class="col-sm-6">
                          <label for="inputname2" class=" control-label">Issuer ID</label>
                          <input type="text" class="form-control" id="inputPIDIssue" placeholder="">
                        </div>
                        
                        <div class="col-sm-6">
                          <label for="inputname2" class=" control-label">Fax</label>
                          <input type="text" class="form-control" id="inputFax" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        
                        <div class="col-sm-6">
                          <label for="inputname2" class="control-label">Website</label>
                          <input type="text" class="form-control" id="inputWebsite" placeholder="">
                        </div>
                        <div class="col-sm-6">
                          <label for="inputname2" class=" control-label">Picture</label>
                          <input type="file"  id="inputImage" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10">
                          <label for="inputname2" class="control-label">Notes</label>
                          <textarea  id="inputNote" style="width: 400px; height: 110px;"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-10 control-label" id="thongbaochung" style="display: none; color: green; font-weight: bold;">Đã đăng ký thành công, vui lòng vào mail để kiểm tra. Hãy kiểm tra trong mục Hộp thư đến hoặc trong mục Spam. </label>
                      </div>

                      <!--<div class="form-group">
                        <div class=" col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Nhận thông tin từ The Booking Spa
                            </label>
                          </div>
                        </div>
                      </div>-->
                      
                      <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                          <button type="button" class="btn btn-default" onclick="actionregister();">Register</button>
                        </div>
                      </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- InstanceEndEditable -->
    </div>
    
</header>

<!-- include footer -->
<?php
     require("footer.php");
?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "42ca428d-6cd0-4b93-b360-fa0d0bfa3696", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script> 

    
</body>
<!-- InstanceEnd -->
</html>
