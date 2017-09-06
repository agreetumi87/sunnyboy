<?php

include 'templates/headers/default_header_tpl.php';

include 'templates/navigation/default_nav_tpl.php';

?>

<div class="container-fluid">
    <?php    include 'templates/headers/notification_tpl.php'; ?>
    <div class="row">
        <div class="col-lg-2"></div>
        <!--Start of main col-->
        <div class="col-lg-8">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">Transaction</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>Email</th>
                          <th>Date created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          
                          
                          
                    </tbody>
                    </table>
                    </div>                    
                </div>
                </div>
                <!--End of panel-default-->
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
</div>

<?php

include 'templates/footers/default_footer_tpl.php';                          