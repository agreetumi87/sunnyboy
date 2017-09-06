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
    <div class="row">
        <div class="col-lg-2"></div>
        <!--Start of main col-->
        <div class="col-lg-8">
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">Edit client details</div>
                <div class="panel-body"> 
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="firstname">First Name</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="firstname" name="firstname" required value="<?php echo $data['editclient']['firstname']; ?>">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="lastname">Surname</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="lastname" name="lastname" required value="<?php echo $data['editclient']['lastname']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="idNumber">ID Number</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="idNumber" name="idNumber" required value="<?php echo $data['editclient']['id_number']; ?>">
                            </div>
                        </div>
                    <?php 
                    //TODO custom field
                    if(!empty($data['customData'])){
                        $customDataArr = array();
                        $customIDArr = array();
                        foreach($data['customData'] as $fielddata){
                            $customDataArr[] = $fielddata['field_data'];
                        }
                    }
                    echo
                    '<div class="form-group">
                        <label class="control-label col-sm-4" for="bankName">Bank Name</label>
                        <div class="col-lg-4 col-md-4 col-sm-">
                        <input type="text" class="form-control" name="bankName" id="bankName" value="' . (!empty($customDataArr) ? $customDataArr[3] : '' ) . '">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="address">Physical Address</label>
                        <div class="col-lg-8 col-md-8">
                         <textarea class="form-control tinyMCEselector" name="address" id="address">' . (!empty($customDataArr) ? $customDataArr[0] : '' ).'</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="cellphone">Cell phone Number</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="cellphone" name="cellphone" value="' . (!empty($customDataArr) ? $customDataArr[1] : '' ).'">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">E-mail address</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" value="' . (!empty($customDataArr) ? $customDataArr[2] : '' ).'">
                        </div>
                    </div>';
                    ?>                   
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="editclient">
                        <button type="submit" name="submit" value="editclient" class="btn btn-success">Submit</button>
                        <button type="submit" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Back</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>                
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
</div>
<?php
include 'templates/footers/default_footer_tpl.php';
