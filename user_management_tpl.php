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
        <div class="col-lg-12">
            <div class="panel panel-default btnpanel">
            <div class="panel-body">
                <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=adduser">
                <div class="form-group">
                    <button type="submit" id="addClient" class="btn btn-success">Add User</button>
                </div>
                </form>
            </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">User management</div>
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
                          <?php
                          $count = 1;
                          
                            foreach($data['users'] as $userDetail){
                            echo "<tr>
                                    <td>" . $count . "</td>
                                    <td>" . $userDetail['firstname'] . "</td>
                                    <td>" . $userDetail['lastname'] . "</td>
                                    <td>" . $userDetail['email'] . "</td>
                                    <td>" . $userDetail['date_created'] . "</td>";
                                if($userDetail['is_active']){         
                                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to deactivate this user.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=deactivateUser&id=" . $userDetail['id'] . "'><span class='glyphicon glyphicon-ok-sign'></span></a></td>";
                                } else {  
                                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to activate this client.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=activateUser&id=" . $userDetail['id'] . "'><span class='glyphicon glyphicon-exclamation-sign'></span></a></td>";
                                }       
                                 echo "</tr>";
                                $count ++;
                            }
                            ?>
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