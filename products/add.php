<?php   include '../shared/head.php';     
        include '../shared/nav.php' ; 
        include '../general/env.php' ; 
        include '../general/function.php' ; 
 
        if(isset($_POST['send'])){

            $name = $_POST['productName'];
            $price = $_POST['productPrice'];
             $id = $_POST['categoreyId'];

            $insert = " INSERT INTO product values ( NULL , '$name' , $price  , $id )";
            $ss = mysqli_query($conn , $insert);
            testMessage($ss, " insert into products ");
             
              header('location: /shop/products/list.php');
         }

         $selectCategory ="SELECT * from categories  ";

         $categorySEL = mysqli_query($conn, $selectCategory);


//update function //update categorey
 //update function    

 $name = '';
 $price = '';
 $cat= '';


 $update= '' ;

 if (isset($_GET['edit'])) {
   $update= true ;
     
 
     $id = $_GET['edit'];

     $seel ="SELECT * from `product` where id= $id ";

     $SES = mysqli_query($conn, $seel);
        
     $row =mysqli_fetch_assoc($SES); 

     
     $name = $row['name'];
     $price = $row['price'];
     $cat= $row['categoryId'];
     


     if (isset($_POST['update'])) {
      
         $name =$_POST['productName'];
         $price =$_POST['productPrice'];
         $cat    =  $_POST['categoreyId'];
         $upe = "UPDATE `product` SET  name = '$name' , price = $price , categoryId = $cat  where id = $id ";

         $SS  = mysqli_query($conn, $upe);

         header('location: /shop/products/list.php');


         if ($s1) {
             echo `<div class =" alert mx-auto w-50 alert-info"> insert has been done Sucsesfully</div>`;
         } else {
             echo `<div class ="alert mx-auto w-50 dengar-info"> insert is fauls , try agine </div>`;
         };
     };    
 };





 ?>
<?php if($update): ?>

<h1 class="text-center text-warning display-1 pt-5">Update product </h1>
<?php else: ?>
<h1 class="text-center text-info display-1 pt-5">add new  product </h1>
<?php endif; ?>

<div class="container text-center col-md-7"> 
        <div class="card">
                 <div class="card-body">
                        <form  method="POST" >

                            <div cl ass="form-group">
                        <label>product Name</label>
                        <input value="<?php echo $name ?>" type="text" name="productName" class="form-control">

       
                            </div>
                        
                            <div class="form-group">
                        <label>Product Price</label>
                        <input value="<?php echo $price ?>"    type="text" name="productPrice"  class="form-control">
                            </div>

                            <div class="form-group">
                        <label> product Category :  <?php echo $cat ?>       </label>
                       
                        <select name="categoreyId"  class="form-control">
                            <?php foreach ($categorySEL as $data) {  ?>
                            <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?></option>
                            <?php }?>
                        </select>
                            </div> 
                            <?php if($update): ?>
                 <button name="update" class="btn btn-warning btn-block w-50 mx-auto"> update Data</button>
                 <?php else: ?>
                 <button name="send" class="btn btn-info btn-block w-50 mx-auto"> Send Data</button>
                 <?php endif; ?>
                        </form>

                </div>

        </div>





</div>

  








<?php include '../shared/footer.php'; ?>



