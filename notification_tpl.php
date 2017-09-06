<?php
if(isset($data['notification']) && !empty($data['notification'])){
    if($data['notification']['type'] == 'danger'){
        echo '<div class="alert alert-danger" role="alert">'.$data['notification']['message'].'</div>';
    } else if($data['notification']['type'] == 'info'){
         echo '<div class="alert alert-info" role="alert">'.$data['notification']['message'].'</div>';
    } else if($data['notification']['type'] == 'warning'){
         echo '<div class="alert alert-warning" role="alert">'.$data['notification']['message'].'</div>';
    } else {
         echo '<div class="alert alert-success" role="alert">'.$data['notification']['message'].'</div>';
    }
}