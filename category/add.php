<?php   include '../shared/head.php';     
        include '../shared/nav.php' ; 
        include '../general/env.php' ; 
        include '../general/function.php' ;    

 if(isset($_POST['send'])){

    $name = $_POST['name'];
    $insert = "INSERT INTO `categories` values (NULL , '$name' )";
    $ss= mysqli_query($conn, $insert);
    header('location: /shop/category/list.php');
    testMessage($ss,"insert into categoies ");
 }
 //update categorey
 //update function    
 $id ='';
 $name = '';
 
 $update= '' ;

 if (isset($_GET['edit'])) {
   $update= true ;
     
 
     $id = $_GET['edit'];

     $seel ="SELECT * from `categories` where id= $id ";

     $SES = mysqli_query($conn, $seel);
        
     $row =mysqli_fetch_assoc($SES);
     $id = $row['id'];
     $name = $row['name'];
    

     if (isset($_POST['update'])) {
      
         $name =$_POST['name'];
     

         $upe = "UPDATE `categories` SET  name = '$name'   where id = $id ";

         $SS  = mysqli_query($conn, $upe);

         header('location: /shop/category/list.php');


         if ($s1) {
             echo `<div class =" alert mx-auto w-50 alert-info"> insert has been done Sucsesfully</div>`;
         } else {
             echo `<div class ="alert mx-auto w-50 dengar-info"> insert is fauls , try agine </div>`;
         };
     };    
 };








 ?>
<?php if($update): ?>
<h1 class="text-center text-warning display-1 pt-5">Update categorey <?php echo  $name ?> </h1>
<?php else : ?>
<h1 class="text-center text-info display-1 pt-5">Add Category  </h1>
<?php endif;?>
<div class="container text-center col-md-7"> 
        <div class="card">
                 <div class="card-body">
                        <form  method="POST">

                            <div class="form-group">
                        <label>Categorey Name</label>
                        <input name="name" type="text"  value="<?php echo  $name ?>"      class="form-control">
                            </div>  
                            <?php if($update): ?>
                                <button name="update" class="btn btn-warning btn-block w-50 mx-auto"> update Data</button>
                              <?php else : ?>

                      <button name="send" class="btn btn-info btn-block w-50 mx-auto"> Send Data</button>
                      <?php endif;?>
                        </form>

                </div>

        </div>





</div>

  








<?php include '../shared/footer.php'; ?>



