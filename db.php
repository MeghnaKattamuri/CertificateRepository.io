<!DOCTYPE html> <html>
     <head>
         		<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
 <?php
$con=mysqli_connect('localhost','root','','certificaterep');
							$sql="SELECT * FROM certificates";
							$result = mysqli_query($con,$sql) or mysqli_error($con);
							echo"<div class='table table-responsive'>";
							echo"<table class='text-center' >";
							echo "<th>  Username </th><th>  Email </th>";
							while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
							echo"<tr style='cursor:pointer'>";
							echo "<td>" . $row['username'] . "</td>";
							echo "<td>" . $row['email'] . "</td>";
				echo"</tr>";
				
				}
				echo "</table></div>";
              ?>
              </body></html>