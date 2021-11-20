<?php 
if(isset($_REQUEST['search'])){
    $search = $_GET['search'];
    echo $search;
    if(empty($search)){
        echo '<div>Chưa nhập dữ liệu vào ô tìm kiếm</div>';
    }
    else{
        $conn = new mysqli("localhost", "root", "", "pos");
        if($conn->connect_error){
	        die("Connection Failed!".$conn->connect_error);
        }
        $sql = "SELECT * FROM `product` where `name` like '%{$_GET['search']}%';";
        $product = mysqli_query($conn, $sql);

        if(mysqli_num_rows($product) > 0){
            while($row = mysqli_fetch_assoc($product)){ 
                echo "<div>". $row['name'] ."</div>";
            }
        }
    }
}
?>