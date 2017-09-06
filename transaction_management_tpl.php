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
                <div class="panel-heading">Transaction management<!--<a href="<?php //echo BASE_URL; ?>/index.php?action=addTransactionType"><img height="20px" width="20px" src="img/green_cross.jpeg" alt="Add transaction type"/></a>--></div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Transaction type</th>
                          <th>Description</th>
                          <th>Date created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count = 1;
                        if(!empty($data['types'])){
                            foreach($data['types'] as $typeDetail){
                            echo "<tr>
                                    <td>" . $count . "</td>
                                    <td><a data-toggle=\"tooltip\" title=\"Click to view this transaction type.\" class=\"tooltipcustom\" href=\"index.php?action=viewType&id=".$typeDetail['id']."\">" . $typeDetail['name'] . "</a></td>
                                    <td>" . $typeDetail['description'] . "</td>
                                    <td>" . $typeDetail['date_created'] . "</td>";
                                if($typeDetail['is_active']){         
                                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to deactivate this transaction type.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=deactivateType&id=" . $typeDetail['id'] . "'><img src=\"img/green_tick.jpg\" alt=\"Deactivate?\"/></a></td>";
                                } else {  
                                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to activate this transaction type.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=activateType&id=" . $typeDetail['id'] . "'><img src=\"img/red_cross.jpg\" alt=\"Activate?\"/></a></td>";
                                }       
                                 echo "</tr>";
                                $count ++;
                            }
                        } else {
                            echo '<tr>
                                    <td colspan="5"><p class="lead text-center">There are currently no transaction types.</p></td>
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