<!DOCTYPE html>
<html>
    <head>
        <title>Qrcode</title>
    </head>
    <body>
        <h2>QRcode Genarater</h2>
        <div class="container">
            <form action="fet.php" method="POST">
                <input type="text" name="id" placeholder="Product name">
                <input type="submit" name="search" value="Search by pname">

            </form>
            <table>
                <tr>
                    <th>Pname</th>
                    <th>Cname</th>
                    <th>pinfo</th>
                    <th>cinfo</th>
                    <th>location</th>
                    <th>manuf</th>
                    <th>expiry</th>
                </tr> <br>
                <?php
                $conn = mysqli_connect("localhost","root","");
                $db= mysqli_select_db($conn,'mini');
                if(isset($_POST['search']))
                {
                  $id=$_POST['id'];
                  $query = "SELECT * FROM product WHERE id='$id";
                  $query_run = mysqli_query($conn,$query);
                  while($row = mysqli_fetch_array($query_run))
                  {
                    ?>
                    <tr>
                      <td> <?php echo $row['pname']; ?> </td>
                      <td> <?php echo $row['cname']; ?> </td>
                      <td> <?php echo $row['pinfo']; ?> </td>
                      <td> <?php echo $row['cinfo']; ?> </td>
                      <td> <?php echo $row['locat']; ?> </td>
                      <td> <?php echo $row['manufacturing']; ?> </td>
                      <td> <?php echo $row['expiry']; ?> </td>
                    </tr>
                    <?php
                  }
                } 
                ?>
            </table>
        </div>
    </body>
</html>