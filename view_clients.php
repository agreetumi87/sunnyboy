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
                <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=addclient">
                <div class="form-group">
                    <button type="submit" id="addClient" class="btn btn-success">Add Client</button>
                </div>
                </form>
            </div>
            </div>
            <div class="panel panel-default btnpanel">
            <div class="panel-body">
                <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=getClientAccountBalancesPDF">
                <div class="form-group">
                    <button type="submit" id="getpdf" class="btn btn-success">Download Client Account Balances</button>
                </div>
                </form>
            </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel panel-default">
                <div class="panel-heading">
                    Clients
                </div>
                <div class="panel-body"> 
                    <div class="table-responsive"> 
                    <?php echo $data['pagelinks']; ?>
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th style="width: 200px;">ID Number</th>
                            <th style="width: 200px;">Account Number</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        
                        <?php if(!empty($data['viewallclient'])){
                            foreach($data['viewallclient'] as $client){ ?>
                        <tr>
                            <td><a href="index.php?action=viewclientprofile&id=<?php echo $client['id']; ?>"><?php echo $client['firstname']; ?></a></td>
                            <td><a href="index.php?action=viewclientprofile&id=<?php echo $client['id']; ?>"><?php echo $client['lastname']; ?></a></td>
                            <td><?php echo $client['id_number']; ?></td>
                            <td><?php echo $client['account_number']; ?></td>
                            <td><?php echo($client['is_active'] == 1 ? 'Active' : 'Inactive' )?></td>
                        <td><?php echo date("D, d M y H:i:s O", strtotime($client['date_created']))?></td>
                        <td><a href="index.php?action=viewclientprofile&id=<?php echo $client['id']; ?>">view profile</a></td>
                        <td><a href="index.php?action=addclient&id=<?php echo $client['id']; ?>"><span class='glyphicon glyphicon-plus-sign'></span></a></td>
                        <td>
                            <?php
                            if($client['is_active']){         
                                echo "<td><a data-toggle=\"tooltip\" title=\"Click to deactivate this client.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=deactivateclientdashboard&id=" . $client['id'] . "'><span class='glyphicon glyphicon-ok-sign'></span></a></td>";
                            } else {  
                                echo "<td><a  data-toggle=\"tooltip\" title=\"Click to activate this client.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=activateclientdashboard&id=" . $client['id'] . "'><span class='glyphicon glyphicon-exclamation-sign'></span></a></td>";
                            }
                            ?>
                        </td>
                        </tr>
                        <?php }
                        }else{
                            echo '<tr>
                                     <td colspan="7"><p class="lead text-center">There is currently no clients in the system</p></td>
                                  </tr>';
                        } ?>
                    </table>
                        <?php echo $data['pagelinks']; ?>
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
</div>
<?php
include 'templates/footers/default_footer_tpl.php';