<?php 


function testMessage($condation , $message){
 

   if($condation){

    echo "<div class='alert alert-Success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> $message
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";

   }else{


    echo "<div class='alert alert-warning  alert-dismissible fade show' role='alert'>
    <strong>Filed !</strong> $message
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";

   }



}



?>