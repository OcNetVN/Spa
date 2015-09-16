<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- InstanceBeginEditable name="doctitle" -->

	<title>The Booking - Spa</title>

	<!-- InstanceEndEditable -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" href="<?php echo base_url('resources/front/favicon.ico'); ?>" />

    <?php require("head.php"); ?>

    <script type="text/javascript" src="<?php echo base_url('resources/front/js/checkout.js'); ?>"></script>

    

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

    <div id="loadcontent1">

        <ul class="nav nav-tabs" role="tablist">    

         

          <li class="active"><a href="#pay-now" role="tab" data-toggle="tab">Sign in</a></li>

          <li><a href="#pay-venue" role="tab" data-toggle="tab">Enter fast information</a></li>

        </ul>

        <div class="tab-content">

                <div class="tab-pane active" id="pay-now">

            	   <p>Thank you for choosing thebooking.vn service. You need to login or create an account to continue to reserve!</p>

            	   <p>You already have an account at thebooking.vn!  Please<a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal" style="font-weight:bold;">Sign in</a></p>

            	   <p>If you have not already created an account, Please <a href="#pay-venue" role="tab" data-toggle="tab" style="font-weight:bold;">Enter fast information</a> to booking.</p>

				  

                </div>

                <div class="tab-pane" id="pay-venue"> <!--đăng kí nhanh-->

                    <div class="col-md-6 col-sm-offset-3">

                        <h1 class="title-page" style="text-align:center;">Booking</h1>

                    	<form class="form-horizontal" role="form" style="margin-top:20px;">

                              <div class="form-group">

                                <label for="inputEmail" class="col-sm-2 control-label">Email  <span style="color: red;">(*)</span></label>

                                <div class="col-sm-10">

                                  <input type="email" class="form-control" id="inputEmail" placeholder="Enter Email"><span id="err_email" style="display: none; color: red;"></span>

                                </div>

                              </div>

                              <div class="form-group">

                                <label for="fullname" class="col-sm-2 control-label">Full name <span style="color: red;">(*)</span></label>

                                <div class="col-sm-10">

                                  <input type="text" class="form-control" id="fullname" placeholder="Enter full name"><span id="err_hoten" style="display: none; color: red;"></span>

                                </div>

                              </div>

                              <div class="form-group">

                                <label for="inputstt" class="col-sm-2 control-label">Phone <span style="color: red;">(*)</span></label>

                                <div class="col-sm-10">

                                  <input type="text" class="form-control" id="inputsdt" placeholder="Enter phone"><span id="err_dt" style="display: none; color: red;"></span>

                                </div>

                              </div>

                              <div class="form-group">

                                <label for="inputdc" class="col-sm-2 control-label">Address</label>

                                <div class="col-sm-10">

                                  <input type="text" class="form-control" id="inputdc" placeholder="Enter address">

                                </div>

                              </div>

                              <div class="form-group">

                                <label for="se_city" class="col-sm-2 control-label">TTown / City <span style="color: red;" style="display: none;">(*)</span></label>

                                <div class="col-sm-10">

                                  <select class="form-control" id="se_city"> 

                                      <option value="0">Select</option>

                                      

                                    </select> <span style="color: red;" id="err_city" style="display: none;"></span>

                                </div>

                              </div>

                              <div class="form-group">

                                <label for="se_dis" class="col-sm-2 control-label">District <span style="color: red;">(*)</span></label>

                                <div class="col-sm-10">

                                  <select class="form-control" id="se_dis">

                                      <option value="0">Select</option>

                                      

                                    </select>

                                </div>

                              </div>

                              <div class="form-group">

                                <div class="col-sm-offset-2 col-sm-10">

                                  <button type="button" class="btn btn-default" onclick="btnsubmit();">Register</button>

                                </div>

                              </div>

                            </form>

                     </div>

                    

                </div> <!--end đăng kí nhanh-->

       	</div>

       </div> 

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

