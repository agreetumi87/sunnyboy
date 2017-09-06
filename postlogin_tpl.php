<?php

include 'templates/headers/default_header_tpl.php';

include 'templates/navigation/default_nav_tpl.php';
//var_dump($_SESSION['exchange_rate']);
//var_dump($_SESSION['sql']);
?>

<div class="container-fluid">
    <?php    include 'templates/headers/notification_tpl.php'; ?>  
    <div class="row">
        <div class="col-lg-2">
            
        </div>
        <!--Start of main col-->
        <div class="col-lg-12">
            
                <div class="row">    
                 
                
                <?php if($_SESSION['is_superadmin']){ ?>    
                
                <?php } ?>    
            </div>
            
   
        </div>
        <!--End of main col-->
        <div class="col-lg-2">
        </div>
    </div>

    
    <?php  include 'templates/transactions/exchange_rate_block_tpl.php'; ?>
    
    <?php  include 'templates/client/search_clients_tpl.php'; ?>
    
</div>

<?php

include 'templates/footers/search_footer_tpl.php';                            