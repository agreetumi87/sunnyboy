<?php
include 'templates/headers/default_header_tpl.php';
include 'templates/navigation/default_nav_tpl.php';

?> 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
        <?php include 'templates/headers/notification_tpl.php'; ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
    
        <?php
        include 'templates/navigation/side-menu.php';
        ?> 
        <!--Start of main col-->
        <div class="col-lg-10">
            <div class="panel-group">
                <div class="panel panel-default btnpanel">
                <div class="panel-body">
                    <h4 class="clientinfo"><?php echo $data['viewclientprofile']['firstname'] ." ". $data['viewclientprofile']['lastname']; ?> - <?php echo $data['viewclientprofile']['id_number']; ?></h4>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Personal Information
                <a data-toggle="tooltip" title="Click to edit personal information." class="tooltipcustom pull-right" href="<?php echo BASE_URL; ?>/index.php?action=editclient&id=<?php echo $data['viewclientprofile']['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                </div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <tbody>
                        <tr>
                            <td style="text-align: right; padding-right: 100px;"><strong >Full name</strong></td>
                            <td><?php echo $data['viewclientprofile']['firstname'] ." ". $data['viewclientprofile']['lastname']; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right; padding-right: 100px;"><strong>ID number</strong></td>
                            <td><?php echo $data['viewclientprofile']['id_number']; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right; padding-right: 100px;"><strong>Account number</strong></td>
                            <td><?php echo $data['viewclientprofile']['account_number']; ?></td>
                        </tr>                        
                        <?php
                        if(!empty($data['viewclientcustomprofile'] )){
                            foreach($data['viewclientcustomprofile'] as $profileDetails){   
                                if($profileDetails['form_element_type'] == 'textarea'){
                                    echo "<tr><td style=\"text-align: right; padding-right: 100px;\"><strong>". $profileDetails['field_label'] . "</strong></td>
                                       <td style=\"text-align: left;\"><pre>". $profileDetails['field_data'] . "</pre></td></tr>"; 
                                }else{
                                    echo "<tr><td style=\"text-align: right; padding-right: 100px;\"><strong>". $profileDetails['field_label'] . "</strong></td>
                                       <td style=\"text-align: left;\">". $profileDetails['field_data'] . "</td></tr>"; 
                                }
                            }
                        }
                        ?>
                        <?php
                            if(!empty($data['viewreferralsprofile'])){
                               foreach($data['viewreferralsprofile'] as $referralsDetails){
                               echo "<tr>
                                        <td>First name</td>
                                        <td>". $referralsDetails['firstname'] . "</td>
                                    </tr>
                                    <tr>
                                        <td>Last name</td>
                                        <td>". $referralsDetails['lastname'] . "</td>
                                    </tr>
                                        <td>ID Number</td>
                                        <td>". $referralsDetails['id_number'] . "</td>
                                    </tr>
                                    <tr>
                                        <td>Date created</td>
                                        <td>". date("D, d M y H:i:s O", strtotime($referralsDetails['date_created'])) . "</td>
                                    </tr>";
                                }  
                            }
                            ?>
                            <td style="text-align: right; padding-right: 100px;"><strong>Date created</strong></td><td><?php echo date("D, d M y H:i:s O", strtotime($data['viewclientprofile']['date_created'])); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                </div>
                </div>
 
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>

</div>
<?php
include 'templates/footers/default_footer_tpl.php';
