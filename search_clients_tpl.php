    <div class="row">
        <div class="col-lg-2"></div>
        <!--Start of main col-->
        <div class="col-lg-12">
            <div class="panel-group">
                <div class="panel panel-default searchclients">
                <div class="panel-heading">Search clients</div>
                <div class="panel-body"> 
                    <form class="form-horizontal" id="search-form" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <div class="input-group input-group-lg profile-search">
                        <span class="input-group-addon"><i class="icon-search-4"></i></span>
                        <input name="page" type="hidden" value="1" id="searchFormPageNumber" />
                        <input type="hidden" name="action" value="searchForClient">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="id_search">Search</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" name="search" autocomplete="off" id="id_search" required placeholder="Enter clients name, ID number or account number.">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                    </form>
                    <section class="search-results-wrapper">
                        <div id="search_results">
                            
                        </div>
                    </section>                 
                </div>
                <div class="table-responsive"> 
                    
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

                          <?php 
                            $count = 1;
                            
                            if(!empty($data['viewallclient'])){
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
                                <?php } ?>
                            <?php }else{
                                echo '<tr>
                                         <td colspan="10"><p class="lead text-center">There is currently no clients in the system</p></td>
                                      </tr>';
                            }
                            ?>
                    </table>
                        
                    </div>
                </div>
                <!--End of panel-default-->
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
              
