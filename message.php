<?php 
    if(isset($message)){
        foreach($message as $message){
        echo '
        <div class="errorEmail">
            <span>'.$message. ' <i class="fas fa-times" onclick="this.parentElement.remove();"></i></span>
            
        </div>
        ';
        }
    }
?>