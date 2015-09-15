<?php //@session_start(); 
//echo $_SESSION["user_name"];
?>
<!--tao datetimepicker-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/datetimepicker/tcal.css'); ?>" />
<script src="<?php echo base_url('resources/front/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/datetimepicker/tcal.js'); ?>"></script> 
<!--end tao datetimepicker-->
<?php echo form_open_multipart('user/insert') ?>
                            
                            <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                
                                <p>
                                    <label>User Id</label>
                                    <?php
                                        $data=array(
                                            'name' => 'UserId',
                                            'id' => 'UserId',
                                            'value' => set_value('UserId',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('UserId');
                                        echo '</span>';
                                    ?>
                                        
                                </p>
                                <p>
                                    <label>Password</label>
                                    <?php
                                        $data=array(
                                            'name' => 'Pwd',
                                            'id' => 'Pwd',
                                            'value' => set_value('Pwd',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_password($data);
                                        echo '<span>';
                                        echo form_error('Pwd');
                                        echo '</span>';
                                    ?>
                                        
                                </p>
                                <p>
                                    <label>Status</label>
                                    <?php 
                                    $options = array(
                                      '0'  => 'Unclock',
                                      '1'    => 'Clock',
                                    );
                                    echo form_dropdown('Status', $options, 'Unclock');
                                    ?>
                                </p>
                                <p>
                                    <label>Role</label>
                                    <?php
                                        echo form_dropdown('RoleId',$ds_RoleId,set_value('RoleName',1));
                                    ?>
                                </p>
                                <p>
                                    <label>ScoreBalance</label>
                                    <?php
                                        $data=array(
                                            'name' => 'ScoreBalance',
                                            'id' => 'ScoreBalance',
                                            'value' => set_value('ScoreBalance',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('ScoreBalance');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Object name</label>
                                    <?php
                                        $data=array(
                                            'name' => 'FullName',
                                            'id' => 'FullName',
                                            'value' => set_value('FullName',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('FullName');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Object Group</label>
                                    <?php
                                        echo form_dropdown('ObjectGroup',$ds_ObjectGroup,set_value('CommonId',1));
                                    ?>
                                </p>
                                <p>
                                    <label>Object Type</label>
                                    <?php
                                        echo form_dropdown('ObjectType',$ds_ObjectType,set_value('CommonId',1));
                                    ?>
                                </p>
                                
                                <p>
                                    <label>Identity Card</label>
                                    <?php
                                        $data=array(
                                            'name' => 'PID',
                                            'id' => 'PID',
                                            'value' => set_value('PID',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('PID');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Identity Card State</label>
                                    <?php
                                        $data=array(
                                            'name' => 'PIDState',
                                            'id' => 'PIDState',
                                            'value' => set_value('PIDState',''),
                                            'class' => 'text-input small-input tcal'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('PIDState');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>PIDIssue</label>
                                    <?php
                                        $data=array(
                                            'name' => 'PIDIssue',
                                            'id' => 'PIDIssue',
                                            'value' => set_value('PIDIssue',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('PIDIssue');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>DoB</label>
                                    <?php
                                        $data=array(
                                            'name' => 'DoB',
                                            'id' => 'DoB',
                                            'value' => set_value('DoB',''),
                                            'class' => 'text-input small-input tcal'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('DoB');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>PoB</label>
                                    <?php
                                        $data=array(
                                            'name' => 'PoB',
                                            'id' => 'PoB',
                                            'value' => set_value('PoB',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('PoB');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>PerAdd</label>
                                    <?php
                                        $data=array(
                                            'name' => 'PerAdd',
                                            'id' => 'PerAdd',
                                            'value' => set_value('PerAdd',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('PerAdd');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>TemAdd</label>
                                    <?php
                                        $data=array(
                                            'name' => 'TemAdd',
                                            'id' => 'TemAdd',
                                            'value' => set_value('TemAdd',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('TemAdd');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Gender</label>
                                    <?php 
                                    $options = array(
                                      '0'  => 'Male',
                                      '1'    => 'Female',
                                    );
                                    echo form_dropdown('Gender', $options, 'Male');
                                    ?>
                                </p>
                                <p>
                                <?php
                                    echo form_upload('Image');
                                ?>
                                </p>
                                <p>
                                    <label>ProvinceId</label>
                                    <?php
                                        $data=array(
                                            'name' => 'ProvinceId',
                                            'id' => 'ProvinceId',
                                            'value' => set_value('ProvinceId',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('ProvinceId');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Tel</label>
                                    <?php
                                        $data=array(
                                            'name' => 'Tel',
                                            'id' => 'Tel',
                                            'value' => set_value('Tel',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('Tel');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Fax</label>
                                    <?php
                                        $data=array(
                                            'name' => 'Fax',
                                            'id' => 'Fax',
                                            'value' => set_value('Fax',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('Fax');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <?php
                                        $data=array(
                                            'name' => 'Email',
                                            'id' => 'Email',
                                            'value' => set_value('Email',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('Email');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Website</label>
                                     <?php
                                        $data=array(
                                            'name' => 'Website',
                                            'id' => 'Website',
                                            'value' => set_value('Website',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('Website');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>TaxCode</label>
                                    <?php
                                        $data=array(
                                            'name' => 'TaxCode',
                                            'id' => 'TaxCode',
                                            'value' => set_value('TaxCode',''),
                                            'class' => 'text-input small-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('TaxCode');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                    <label>Note</label>
                                    <?php
                                        $data=array(
                                            'name' => 'Note',
                                            'id' => 'Note',
                                            'value' => set_value('Note',''),
                                            'class' => 'text-input medium-input'
                                            //'style' => 'text-align:center'
                                        );
                                        echo form_input($data);
                                        echo '<span>';
                                        echo form_error('Note');
                                        echo '</span>';
                                    ?>
                                </p>
                                <p>
                                <?php
                                    if(isset($loi))
                                        echo '<span style="color:red">'.$loi.'</span>';
                                ?>
                                </p>
                                <p>
                                <?php
                                    $data=array(
                                        'name' => 'submit',
                                        'value' => 'Submit',
                                        'class' => 'button'
                                    );
                                    echo form_submit($data);
                                ?>
                                </p>
                                
                            </fieldset>
                            
                            <div class="clear"></div><!-- End .clear -->
                            
                        <?php
                         echo form_close();
                        ?>