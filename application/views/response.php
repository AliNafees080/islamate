<?php

if(isset($response)){
   echo $response;
   
   }
else{
    echo json_encode(array('error'=> 'error in response'));
}

?>
