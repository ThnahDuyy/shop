    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php
    if (!isset($_SESSION['admin'])or $_SESSION['admin']==0)
    {
      echo "<script>alert('You are not adminstrator or still have not logged in yet!!')</script>";
      echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    }
    else
    {
    ?>
    <script>
    function deleteConfirm(){
        if(confirm("Do you sure to delete?")){
            return true;
        }
        else{
            return false;
        }
    }
    </script>
        <form name="frm" method="post" action="">
        <h1 >Product Management</h1>
        <a href="?page=add_product">Add</a>
        
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th ><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Price (unit: $)</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Category </strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
            include_once("connection.php");
            if(isset($_GET["function"])=="del"){
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    $sq="select Pro_image from product where Product_ID='$id'";
                    $res=mysqli_query($conn,$sq);
                    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
                    $filePic=$row['Pro_image'];
                    unlink("Picture/".$filePic);
                    mysqli_query($conn,"delete from product where Product_ID='$id'");
                }
            }
            ?>
            
            <?php
			$No=1;
            $result=mysqli_query($conn,"Select Product_ID, Product_Name, Price, Pro_qty,Pro_image,Cat_Name from product a, category b
            where a.Cat_ID=b.Cat_ID Order by ProDate DESC");
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){	
			?>
			<tr>
              <td ><?php echo $No; ?></td>
              <td ><?php echo $row["Product_ID"];  ?></td>
              <td><?php echo $row["Product_Name"];  ?></td>
              <td><?php echo $row["Price"];   ?></td>
              <td ><?php echo $row["Pro_qty"]; ?></td>
              <td><?php echo $row["Cat_Name"]; ?></td>
             <td align='center' class='cotNutChucNang'>
                 <img src='Picture\<?php echo $row['Pro_image'] ?>' border='0' width="50" height="50"  /></td>
             <td align='center' class='cotNutChucNang'><a href="?page=update_product&&id=<?php echo $row["Product_ID"];?>"><img src='Picture/edit.png' border='0'/></a></td>
             <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["Product_ID"];?>"onclick="return deleteConfirm()"><img src='Picture/delete.png' border='0' /></a></td>
            </tr>
            <?php
               $No++;
            }
			?>
          
			</tbody>
        
        </table>  

 </form>
 <?php
 }
 ?>
 
