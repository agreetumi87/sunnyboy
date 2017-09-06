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
                <div class="panel-body"> 
                    <form method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <button type="submit" class="btn btn-primary">Add New Client</button>
                    <input type="hidden" name="action" value="addclient">
                    </form>
                </div>
                </div>
                
                <div class="panel panel-default">
                <div class="panel-heading">View clients</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>ID Number</th>
                          <th>Status</th>
                          <th>Date created</th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $count = 1;
                            if(!empty($data['viewallclient'])){
                                foreach($data['viewallclient'] as $clientDetail){
                                echo "<tr>
                                        <td>" . $count . "</td>
                                        <td>" . $clientDetail['firstname'] . "</td>
                                        <td>" . $clientDetail['lastname'] . "</td>
                                        <td>" . $clientDetail['id_number'] . "</td>
                                        <td>" . ($clientDetail['is_active'] == 1 ? 'Active' : 'Inactive' ) . "</td>
                                        <td>" . $clientDetail['date_created'] . "</td>
                                        <td><a href='" . BASE_URL . "/index.php?action=addclient&id=" . $clientDetail['id'] . "'><img width='16px' height='16px' src='" . BASE_URL ."/img/add_cross.jpeg' /></a></td>
                                        <td><a href='" . BASE_URL . "/index.php?action=editclient&id=" . $clientDetail['id'] . "'><img width='16px' height='16px' src='" . BASE_URL ."/img/edit.png' /></a></td>
                                        <td><a href='" . BASE_URL . "/index.php?action=deleteclient&id=" . $clientDetail['id'] . "'><img src='" . BASE_URL. ($clientDetail['is_active'] == 1 ? '/img/activate' : '/img/green_tick' ).".png' /></a></td>
                                     </tr>";
                                    $count ++;
                                }
                            }else{
                                echo '<tr>
                                         <td colspan="7"><p class="lead text-center">There is currently no clients in the system</p></td>
                                      </tr>';
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