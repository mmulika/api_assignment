 <?php
$con = mysqli_connect("localhost", "root", "", "market_db");
if (!$con) {
    die("connection failed". mysqli_connect_error());
}

if( isset($_GET['Business_Name']) && isset($_GET['Business_PhoneNo']) && isset($_GET['Business_Number']))
{
    $bname = $_GET['Business_Name'];
    $bphone = $_GET['Business_PhoneNo'];
    $bnum = $_GET['Business_Number'];

    $sql ="SELECT * FROM `companyreg_tbl` WHERE Business_Name = '$bname' AND Business_Number='$bnum' AND Business_PhoneNo='$bphone'";

$result = $con->query($sql);

if ($result->num_rows >0) {
  echo "<div class = 'row table-responsive-sm'>
                  <center style='width:100%;'>";    
                  echo "<table border = '1' style='width:80%; overflow:hidden; margin:auto;' class='table table-dark table-hover'>
                  <thead>";
                 // echo "<th>Index Number</th>";
                  echo "<th>Business_Name</th>";
                  echo "<th>Business_Number</th>";
                  echo "<th>Business_Email</th>";
                  echo "<th>Business_PhoneNumber</th>";
                  echo "<th>Website Link</th>
                  </thead>";
                    while ($row = $result->fetch_assoc()) {
                       echo "<tr>";
                  
                        echo "<td>".$row['Business_Name']."</td>";
                        echo "<td>".$row['Business_Number']."</td>";
                        echo "<td>".$row['Business_Email']."</td>";
                        echo "<td>".$row['Business_PhoneNo']."</td>";
                        echo "<td>".$row['website_link']."</td>";
                        
                       // echo "<td><a href='".$row['website_link']."'></a></td>";
                        $Business_Name = $row['Business_Name'];
                        // $Business_Number = $row['Business_Number'];
                        // $Business_Email = $row['Business_Email'];
                        // $Business_PhoneNo= $row['Business_PhoneNo'];
                        echo "<td> <a class='btn btn-dark' href='deletecompany.php?business_name=$Business_Name'>Delete</a> </td>";
                          // echo "<td> <a class='btn btn-success' href='updateMember.php?id=$ID&user=$Username&gender=$Gender&residence=$Residence'>Edit</a> </td>";

                          echo "</tr>";
                    }
                  echo "</table>";
                  echo "</center>
                  </div>";
                   
}

else{
  echo "No Company Registered";
}


}
else
{
    echo "Not set";
}

?>