<?php   include '../shared/head.php';     
        include '../shared/nav.php' ; 
        include '../general/env.php';
        include '../general/function.php';
 
$select = "SELECT product.id , product.name prod , product.price , categories.name cat FROM `product` JOIN categories ON product.categoryid = categories.id; ";
$SS =mysqli_query($conn,$select);
 
//delete function 
if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = "DELETE FROM `product` where id = $id ";
        $dss = mysqli_query($conn, $delete); 
      
        header('location: /shop/products/list.php');
    }









 ?>

<div class="home">

<h1 class="text-center text-info display-1 pt-5">list products</h1>
<div class="container text-center col-md-7"> 
        <div class="card">
                 <div class="card-body"> 

                <table class="table table-dark">
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>categorey</th>
                        </tr>
                  <?php foreach($SS as $data  ){?>
 <tr> 
     <td> <?php echo $data['id']  ?></td>
     <td> <?php echo $data['prod']  ?></td> 
     <td> <?php echo $data['price']  ?></td>
     <td> <?php echo $data['cat']  ?></td> 
     <td><a    onclick="return confirm('Are You Sure  you want delete <?php echo  $data['prod'] ?>?')" href="/shop/products/list.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a></td>
          <td><a    href="/shop/products/add.php?edit=<?php echo $data['id']?>" class="btn btn-info"> Edit  </a></td>                 
 </tr>

          <?php }?>
        </table>






                 </div>
                </div>
        </div>



</div>











<?php include '../shared/footer.php'; ?>



