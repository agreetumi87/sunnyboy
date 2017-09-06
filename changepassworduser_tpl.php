<?php
include 'templates/headers/default_header_tpl.php';
include 'templates/navigation/default_nav_tpl.php';
?> 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <!--Start of main col-->
        <div class="col-lg-8">
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body"> 
                    <form name="changepasswd" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="password">Old Password</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your old password.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="newpassword">New Password</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter your new password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="confirmpassword">Confirm Password</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Please confirm your password.">
                        </div>
                    </div>             
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="saveChangepassword">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <button type="submit" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Back</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <!--End of panel-default-->
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
</div>
<script>
function addUserForm()
{
    var password=document.forms['changepasswd']['newpassword'].value;
    var password1=document.forms['changepasswd']['confirmpassword'].value;
    
    if (password !== password1)
    {
        alert("Passwords do not match");
        return false;
    }  
    
}
</script>
<?php
include 'templates/footers/default_footer_tpl.php';            