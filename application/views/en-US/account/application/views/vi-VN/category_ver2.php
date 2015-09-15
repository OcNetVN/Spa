<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>the Booking - Spa - Spa Day Booking</title>
    <!-- InstanceEndEditable -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('resources/front/favicon.ico'); ?>">
    <?php require("head.php"); ?>
    <script src="<?php echo base_url('resources/front/js/bootstrap-slider.js'); ?>" type="text/javascript"></script>
    <link href="<?php echo base_url('resources/front/css/slider.css'); ?>" rel="stylesheet" type="text/css" /> 
        
    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#price-range").slider({
            });
            
            $("#amount").val('50k - 10000k');

            $("#price-range").on("slide", function(slideEvt) {
                $("#amount").val(slideEvt.value[0] + "k - " +slideEvt.value[1]+"k");
            });
        });
    </script>
    <script src="<?php echo base_url('resources/front/js/category.js'); ?>" type="text/javascript"></script>
        
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
    
    <div id="bookmark1" name="bookmark1" class="container" style="padding-top:10px; padding-bottom:10px;">
    <!-- InstanceBeginEditable name="Main Content" -->
        <h1 class="page-title-resut"> 
           <div class="row">
                <div class="col-md-8">
                    <p style="padding-top: 6px;padding-left: 10px;">Tìm thấy <span id="tongmautin"><?php if(isset($listspa)) echo $listspa['tongmautin']; ?></span> kết quả</p>
                </div>
                    <div class="col-md-4">
                        <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Sort by:</label>
                            <div class="col-sm-8">
                            <select class="form-control" id="sesortby">                                  
                              <?php
                                   foreach($SortBy as $sb)
                                   {
                                       if($sb->CommonId=="01")
                                       {
                                           echo"<option value=\"" .$sb->CommonId."\" selected=\"selected\">".$sb->StrValue1."</option>";
                                       }else
                                       {
                                        echo"<option value=\"" .$sb->CommonId."\">".$sb->StrValue1."</option>";       
                                       }
                                    
                                   }
                               ?>
                              
                            </select>
                            </div>
                          </div>
                           </div>                            
                    </div>
                </div>
           </h1>
        <div class="wrap-2cols nav-left product-category">
            <div class="col-nav">
                <h2 class="section-title">Filter Search Results</h2>
                <div class="section-filter">
                    <h3 class="section-title-filter">Availability</h3>
                    <div class="filters">
                        <div class="form-group">
                            <div class="input-group">                          
                              <input class="form-control datepicker" style="z-index: 100;" type="text" placeholder="Any Date">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                             <div class="input-group">                          
                              <input type="text" class="form-control" id="beginhours" name="basic_example_2" placeholder="Any Time">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                             <div class="input-group">                          
                              <input type="text" class="form-control" placeholder="Location" id="txtLocationSearch" <?php if(isset($_SESSION['indexsearch']) && $_SESSION['indexsearch']['location']) echo 'value="'.$_SESSION['indexsearch']['location'].'"'; ?>>
                              <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="section-filter">
                    <h3 class="section-title-filter">Dịch vụ:</h3>
                    <div class="filters">
                        <?php 
                            if(isset($_SESSION['indexsearch']))
                            {
                                 if(isset($id_chaproducttype) && $id_chaproducttype!="")
                                 {
                                    echo '<div class="radio">';
                                      echo '<label>';
                                        echo '<input name="optionsProductType" type="radio" id="optionsRadios1" onclick="loadloaispcon();" value="0">Any';
                                      echo '</label>';
                                    echo '</div>';
                                 }
                                 else
                                 {
                                    echo '<div class="radio">';
                                      echo '<label>';
                                        echo '<input name="optionsProductType" type="radio" id="optionsRadios1" onclick="loadloaispcon();" value="0" checked="checked">Any';
                                      echo '</label>';
                                    echo '</div>';
                                 }
                                    foreach($ProductTypeCap1 as $pt)
                                     {
                                    ?>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="optionsProductType" id="optionsRadios1" onclick="loadloaispcon();" value="<?php echo $pt->CommonId; ?>" <?php if(isset($id_chaproducttype) && $id_chaproducttype!="" && ($id_chaproducttype == $pt->CommonId)) echo 'checked="checked"'; ?>>
                                        <?php
                                             echo $pt->StrValue1;
                                         ?>
                                      </label>
                                    </div>
                                    <?php         
                                         }            
                            }
                            else
                            {
                        ?>
                                <div class="radio">
                                  <label>
                                    <input name="optionsProductType" type="radio" id="optionsRadios1" onclick="loadloaispcon();" value="0" checked="checked">Any
                                  </label>
                                </div>
                                <?php
                                     foreach($ProductTypeCap1 as $pt)
                                     {
                                ?>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsProductType" id="optionsRadios1" onclick="loadloaispcon();" value="<?php echo $pt->CommonId; ?>">
                                    <?php
                                         echo $pt->StrValue1;
                                     ?>
                                  </label>
                                </div>
                                <?php         
                                     }
                                 ?>
                        <?php        
                            }
                        ?>
                        
                    </div>
                </div>
                <span id="childproducttype" <?php if(!isset($_SESSION['indexsearch']) || !isset($list_childproducttype) || (isset($list_childproducttype) && count($list_childproducttype)==0)) echo 'style="display: none;"'; ?>><!--load loai sp con theo loai cha-->
                    <div class="section-filter">
                        <div class="filters">
                        <?php 
                            if(isset($_SESSION['indexsearch']))
                            {
                                if(isset($list_childproducttype) && count($list_childproducttype)>0)
                                {
                                    foreach($list_childproducttype as $row_childproducttype)
                                    {
                                        $check='';
                                        if($id_childproducttype==$row_childproducttype->CommonId)
                                            $check='checked="checked"';
                                        echo '<div class="checkbox">';
                                            echo '<label>';
                                            echo '<input type="checkbox" name="childproducttype" class="childproducttype" id="childproducttype_'.$row_childproducttype->CommonId.'" value="'.$row_childproducttype->CommonId.'"  onclick="stepcbb();" '.$check.'/>'.$row_childproducttype->StrValue2.'';
                                            echo '</label>';
                                        echo '</div>';
                                    }
                                }
                                unset($_SESSION['indexsearch']);
                            }
                        ?>
                        </div>
                    </div>
                </span> <!--end load loai sp con theo loai cha-->
                <?php
                    if(isset($listtienichspa) && count($listtienichspa)>0)
                    {
                ?>
                <div class="section-filter"> <!--tien ich spa-->
                    <h3 class="section-title-filter">Tiện ích Spa</h3>
                    <div class="filters">
                        <?php 
                            foreach($listtienichspa as $row_tienichspa)
                            {
                                echo '<div class="checkbox">';
                                     echo '<label>';
                                echo '<input type="checkbox" name="spafacilities" id="spafacilities_'.$row_tienichspa->CommonId.'" value="'.$row_tienichspa->CommonId.'"  onclick="stepcbb();"/>'.$row_tienichspa->StrValue1.'<br />';
                                    echo '</label>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div><!--end tien ich spa -->
                <?php } ?>
                <?php
                    if(isset($listloaispa) && count($listloaispa)>0)
                    {
                ?>
                <div class="section-filter"> <!--loai spa spa-->
                    <h3 class="section-title-filter">Loại Spa</h3>
                    <div class="filters">
                        <?php 
                            foreach($listloaispa as $row_loaispa)
                            {
                                echo '<div class="checkbox">';
                                     echo '<label>';
                                echo '<input type="checkbox" name="spatype" id="spatype_'.$row_loaispa->CommonId.'" value="'.$row_loaispa->CommonId.'"  onclick="stepcbb();"/>'.$row_loaispa->StrValue1.'';
                                 echo '</label>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div><!--end loai spa-->
                <?php } ?>
                
                <div class="section-filter">
                    <h3 class="section-title-filter">Price Range</h3>
                    <div class="filters">
                        <input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" />
                        
                        <input id="price-range" type="text" value="" data-slider-min="50" data-slider-max="10000" data-slider-step="1" data-slider-value="[50,10000]"/>
                    </div>
                </div>
                
            </div>
            <div class="col-content">
                <div class="content">
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div id="showlistspa"> <!--load list spa-->
                                  <?php 
                                    if(isset($listspa))
                                    {
                                        echo $listspa['str'];
                                    }
                                  ?>
                            </div><!--end load list spa-->
                        </div>
                    <div class="row">
                  <div class="clearfix"></div>     
                  <div class="row">
                        <div class="col-md-8">
                           
                        </div>
                        <div class="col-md-4">
                            <div class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Trang:</label>
                                <div class="col-sm-8">
                                <select id="selPageNo" class="form-control">                                  
                                  
                                  <?php 
                                    if(isset($listspa))
                                    {
                                        $trang=$listspa['sotrang'];
                                        for($i=1;$i<=$trang;$i++)
                                        {
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    }
                                  ?>                                
                                </select>
                                </div>
                              </div>
                               </div>                            
                        </div>
                    </div>  
                </div>
            </div>
            
        </div>
        </div>
        </div>
        </div>
        
<?php require("booking.php"); ?> 
        
    <!-- InstanceEndEditable -->
    </div>
    
</header>

<?php
    //if(isset($_SESSION['indexuser']))
        //unset($_SESSION['indexuser']);
     require("footer.php");
 ?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "42ca428d-6cd0-4b93-b360-fa0d0bfa3696", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script> 
    
</body>
<!-- InstanceEnd --></html>
