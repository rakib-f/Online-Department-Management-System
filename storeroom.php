<?php include("header.php");?>
<?php include('db_con.php');?>

<div class="container-fluid">
    <div class="row" id="wrapper">
        <?php require_once'menubar.php';?>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <center><h1>Insert Store Entry</h1></center>
                    <hr>

                    <div class="col-sm-10 col-sm-offset-2">
                        <?php
                        if(isset($_POST['submit'])){
                            $product_name = $_POST['product_name'];
                            $product_supplier = $_POST['product_supplier'];
                            $product_quantity = $_POST['product_quantity'];
                            $purchase_date = $_POST['purchase_date'];
                            $warranty_expiration_date = $_POST['warranty_expiration_date'];
                            $status_info =$_POST['status_info'];
                            

                            if($product_name!=NULL && $product_supplier!=NULL && $product_quantity!=NULL && $purchase_date!=NULL && $warranty_expiration_date!=NULL && $status_info!=NULL ){

                                $sql = "INSERT INTO `store` (product_name ,product_supplier,product_quantity,purchase_date,warranty_expiration_date,status_info) VALUES ('$product_name','$product_supplier','$product_quantity','$purchase_date','$warranty_expiration_date','$status_info')";
                                $result = mysqli_query($conn,$sql);
                                if(!$result){
                                    echo "<div class='alert alert-success'>";
                                    echo "<strong>Error!</strong> in submisssion. Please try again.";
                                    echo "</div>";
                                }else{
                                    echo "<div class='alert alert-success'>";
                                    echo "<strong>Success!</strong> Insert Successfully";
                                    echo "</div>";
                                }
                            }
                        }
                        ?>



                        <form action="storeroom.php" method="post" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label for="product_name" class="col-sm-2 control-label">Product Name:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_supplier" class="col-sm-2 control-label">Product Supplier Name:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="product_supplier" placeholder="Enter the name of the product">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_quantity" class="col-sm-2 control-label">Quantity:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="product_quantity" placeholder="Enter quantity">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="purchase_date" class="col-sm-2 control-label">Purchase Date:</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="purchase_date" placeholder="Enter purchase date(Ex: 2021-11-11)">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="warranty_expiration_date" class="col-sm-2 control-label">Warranty Expiration Date:</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="warranty_expiration_date" placeholder="Enter warranty expiration date(Ex: 2022-11-11)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="status_info">
                                        <option value="Good">Good</option>
                                        <option value="Bad">Bad</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <input type="submit" name="submit" value="Submit" class="btn btn-primary" style="padding: 10px; width: 100px; left:20px;">
                            <br>
                            <br>
                            <br>
                        </form>
                    </div>

                    <?php
                    $sql1 = "SELECT * FROM store";
                    $result1 = mysqli_query($conn,$sql1);
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Product Name</th>";
                    echo "<th>Supplier Name</th>";
                    echo "<th>Quantity</th>";
                    echo "<th>Purchase Date</th>";
                    echo "<th>Warranty Expiration Date</th>";
                    echo "<th>Status</th>";
        
                    echo "<th>Actions</th>";
                    echo "</tr>";
                    echo "</thead>";
                    while($row1=mysqli_fetch_array($result1)){
                        echo "<tbody>";
                        echo "<tr class='success'>";
                        echo "<td>".$row1['product_id']."</td>";
                        echo "<td>".$row1['product_name']."</td>";
                        echo "<td>".$row1['product_supplier']."</td>";
                        echo "<td>".$row1['product_quantity']."</td>";
                        echo "<td>".$row1['purchase_date']."</td>";
                        echo "<td>".$row1['warranty_expiration_date']."</td>";
                        echo "<td>".$row1['status_info']."</td>";
                       
                        echo '<td><a href="update_storeroom.php?id=' . $row1['product_id'] . '"><b class="btn btn-warning">Update</b></a>' ;
                        echo '<a href="delete_storeroom.php?id=' . $row1['product_id'] . '" onclick=\'return confirm("Are you sure you want to delete this record?")\'><b class="btn btn-danger">Delete</b></a></td>' ;
                        echo "</tr>";
                        echo "</tbody>";
                    }
                    echo "</table>";
                    ?>


                    <script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

                        
                </div>
            </div>
        </div>
    </div>
</div>