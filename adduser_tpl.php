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
                <div class="panel-heading">Add client</div>
                <div class="panel-body"> 
                    <form name="adduser" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php" onSubmit="return addUserForm();">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="firstname">Firstname</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="firstname" name="firstname" required placeholder="Enter users firstname.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="lastname">Surname</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter users surname.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Email address</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="password">Password</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter users password.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="password1">Confirm Password</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Confirm users password.">
                        </div>
                    </div>                        
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="saveUser">
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
    var password=document.forms['adduser']['password'].value;
    var password1=document.forms['adduser']['password1'].value;
    
    if (password !== password1)
    {
        alert("Passwords do not match");
        return false;
    }  
    
}
</script>
<?php
include 'templates/footers/default_footer_tpl.php';            