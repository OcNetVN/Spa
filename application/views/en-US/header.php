<div class="col-md-8 top-bar-left">
                            <ul class="nav navbar-nav top-menu-left col-md-12">
                            <?php
                                 if(isset($_SESSION['AccUser']))
                                    {
                             ?>
                             <li id="TabUserMenu" class="dropdown DaLogin" >                          
                                      <a class="dropdown-toggle user-link" href="#" data-toggle="dropdown" id="navLogin"><div class="wrap-thumb small-avatar" style="background-image:url(<?php echo base_url('resources/front/images/avatar-female.png'); ?>)"></div> <span class="caret"></span></a>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url("indexuser"); ?>">Profile</a></li>
                                        <li role="presentation"><a class="disconnect" role="menuitem" tabindex="-1" href="javascript:void(0);" onclick="DoThoat();" >Logout</a></li>
                                        <?php
                                            $LstModule = $_SESSION['AccUser']['CacModule'];
                                             for($i=0;$i<count($LstModule);$i++)
                                             {
                                                 echo "<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"". $LstModule[$i]->url ."\">" . $LstModule[$i]->Description . "</a></li>";
                                             }
                                         ?>
                                      </ul> 

                                                         
                               </li>
                               <li class="DaLogin col-md-10" >
                                    <a href="javascript:void(0);">Hi <span id="spanUIDLogBanner" style="font-weight: bold;">
                                    <?php
                                         echo $_SESSION['AccUser']['Object']->FullName;
                                     ?>
                                    </span>  !! 
                                    Last login: <span id="spanLastLoginBanner" style="font-weight: bold;">
                                    <?php
                                         echo $_SESSION['AccUser']['User']->LastLogin;
                                     ?>
                                    </span> 
                                    </a>
                               </li> 
                             <?php           
                                    }
                                 else
                                    {
                             ?>
                                <li id="TabUserMenu" class="dropdown DaLogin" style="display: none;">                          
                                      <a class="dropdown-toggle user-link" href="#" data-toggle="dropdown" id="navLogin"><div class="wrap-thumb small-avatar" style="background-image:url(<?php echo base_url('resources/front/images/avatar-female.png'); ?>)"></div> <span class="caret"></span></a>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url("indexuser"); ?>">Profile</a></li>
                                        <li role="presentation"><a class="disconnect" role="menuitem" tabindex="-1"  href="javascript:void(0);" onclick="DoThoat();" >Logout</a></li>
                                      </ul>                    
                               </li>
                               <li class="DaLogin" style="display: none;">
                                    <a href="javascript:void(0);">Hi <span id="spanUIDLogBanner" style="font-weight: bold;"></span>  !! 
                                    Last login: <span id="spanLastLoginBanner" style="font-weight: bold;"></span> 
                                    </a>
                               </li> 
                               
                               <li id="menuLogin" class="ChuaLogin">
                                    <!--<button type="button" id="btnchualogin" data-toggle="modal" data-target="#loginModal">Đăng nhập</button> -->   
                                    <a href="javascript:void(0)"><span id="btnchualogin" data-toggle="modal" data-target="#loginModal">Sign in</span> </a>                                 
                               </li>
                               <li class="ChuaLogin">                          
                                    <a href="javascript:void(0);" onclick="register();">Sign up</a>   
                               </li>                                 
                               <li class="ChuaLogin">
                                    <a href="javascript:void(0);" onclick="registerspa();">Sign up for Spa</a>
                               </li>
                               <?php                                    
                                    }
                                ?>
                               
                            </ul>
                        </div>
                        <div class="col-md-4 top-bar-right">
                            <ul class="nav navbar-nav navbar-right top-menu-right">
                                <li>                          
                                      <a href="#" onClick="parent.location='<?php echo base_url("checkout1"); ?>'"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span id="spanCardTotalList" class="badge">
                                      <?php
                                           $arrCart = null;
                                           if(isset($_SESSION['Cart']))
                                           {
                                               $arrCart = (array) $_SESSION['Cart'];
                                           }
                                           if($arrCart != null)
                                           {
                                               echo count($arrCart);
                                           }
                                           else
                                           {
                                               echo 0;
                                           }
                                       ?>
                                      </span></a>                   
                                </li>
                                
                                  <?php
                              $arr_flag = array( 'Vietnamese' => 'vi-VN', 'English' => 'en-US' );
                              // print_r($arr_flag['Tiếng Việt']);
                              ?>
                                <li class="dropdown menu-flag">                          
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><img src="<?php echo base_url('resources/front/images/flag-'.$_SESSION['Lang'].'.png'); ?>" width="27" height="18" alt="English" /> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                      <?php foreach ($arr_flag as $key => $value) { 
                                                if($value!=$_SESSION['Lang']){
                                      ?>
                                             <li role="presentation"><a role="menuitem" tabindex="-1" ><img src="<?php echo base_url('resources/front/images/flag-'.$value.'.png'); ?>" id="change_language" width="27" height="18" alt="<?php echo $key;?>" data="<?php echo $value;?>" /></a></li>
                                      <?php } }?>

                                    </ul>                   
                                </li>
                                  <li class="dropdown menu-flag menu-currency">                          
                                      <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">VND <span class="caret"></span></a>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">USD</a></li>
                                      </ul>                    
                                  </li>
                              </ul>
                        </div>







<!-- Modal login ngay 15/01/2015-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button id="btnCloseloginModal" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
      </div>
    <!-- noi dung login ngay 15/01/2015 -->
      <div class="modal-body" id="divlogin">
          <div class="row">            
            <div class="col-md-12">     
                <form class="form" role="form">
                  <div id="gConnect" class="form-group">
                    <button type="button" class="btn btn-default btn-google g-signin" style="width:100%;"
                        data-scope="https://www.googleapis.com/auth/plus.profile.emails.read"
                        data-requestvisibleactions="http://schemas.google.com/AddActivity"
                        data-clientId="1041804302086-ieuqed3pcqre8e6i1am76flg0nuoq6h1.apps.googleusercontent.com"
                        data-callback="onSignInCallback"
                        data-theme="dark"
                        data-cookiepolicy="none"
                    >Google Account</button>
                  </div>
                      <div class="form-group DaLogin">
                    <button type="button" class="btn btn-default btn-facebook" style="width:100%;" href="javascript:void(0)" onclick="singupfacebook();">Facebook Account</button>
                  </div>
                  <hr />
                  
                  <div class="form-group">
                    E-mail
                    <div class="input-group">
                      <div class="input-group-addon">@</div>
                      <input id="txtUserIDEmail" class="form-control" type="email" placeholder="Enter email">
                    </div>
                  </div>
                  <div class="form-group">
                    Password
                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                    <input id="txtPass" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="checkremember" name="checkremember" value="1"> remember
                    </label>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-success" onClick="DoLogin();">Sign in</button> 
                      
                  </div>
                    <div class="form-group">
                    <a href="javascript:void(0)" onClick="ForgetPass();">Forgot your password?</a>
                  </div>
                  <div >
                    <span id="spanTBLogin" class="informationNote" style="display: none; color: red;" > Error!!!</span>
                  </div>
                </form>                
            </div>
        </div>
      </div>
    <!-- end noi dung login ngay 15/01/2015-->
    
    <!-- them moi man hinh quen pass ngay 15/01/2015-->
        <div class="modal-body" id="divForgetPass" style="display: none;">
          <div class="row">            
            <div class="col-md-12">     
                <form class="form" role="form">
                <h4>Forgot your password?</h4>
                  <div class="form-group">
                    E-mail confirmation
                    <div class="input-group">
                      <div class="input-group-addon">@</div>
                      <input id="txtFogetEmail" class="form-control" type="email" placeholder="Enter email">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-success" onClick="SendForgetPass();">Send</button>
                    <button type="button" class="btn btn-success pull-right" onClick="BackDoLogin();">Back</button>
                  </div>
                  
                  <div >
                    <span id="spanFogetPass" class="informationNote" style="color: red;"> </span>
                  </div>
                </form>                
            </div>
        </div>
      </div>
    <!-- end ket thuc man hinh quen pass ngay  -->
      
</div>
 </div>
</div>
<!-- End Modal -->                       
<script type="text/javascript">
$(document).ready(function(){
    $("#change_language").click(function(){
        // alert("The paragraph was clicked.");
        var data_lang = document.getElementById('change_language').getAttribute("data");
        // console.log(data);
        $.ajax({
            type: "POST",
            url: getUrspal() + "index/Change_Language",
            dataType: "text",
            data: {
                language: data_lang
            },
            cache: false,
            success: function (data) {
              var str= window.location.href.toString() ;
              parent.location=str;    
            }
        });
        

    });
});
function DoThoat()
{

    //helper.disconnect();  
    parent.location=getUrspal() + "admin/user/logout";    

}

</script>