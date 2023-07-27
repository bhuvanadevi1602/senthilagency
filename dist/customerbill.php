<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Bill</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
<?php
$id=$_GET['id'];
$sqlb="select * from booking_from where id=$id";
$exeb=mysqli_query($conn,$sqlb);
$valb=mysqli_fetch_assoc($exeb);

?>
table{
    width:50% !important;
         margin-top:10px;
         position:relative;
         left:250px;
   
}
    table, th, td{
        border:1px solid #000 !important;
        padding:3px !important;
    }
</style>
<body onload="window.print()">

<div class="container">
 <table class="table table-bordered center" >
    <thead>
      </thead>
    <tbody>
      <tr>
        <td class="text-center" style="color:#082567"><h3>DECCAN1<br/>
FRANCHISE</h3>
</td>
        <td colspan="2" class="text-center"><h2 style="margin-top:28px">DELIVERY</h2></td>
       </tr>
      <tr class="text-center">
        <td colspan="3" style="margin-top:5px !important"><img src="https://th.bing.com/th/id/R.8a84c934dd93df0794df55947c1c451d?rik=ZUdWsMrnJI%2f6gw&riu=http%3a%2f%2finfo.l-tron.com%2fwp-content%2fuploads%2f2011%2f08%2fLTC_128.jpg&ehk=1LvETzaiBGD%2fdQPw9Ar7z2UbUO7MAa16MT1cehDKX3Y%3d&risl=&pid=ImgRaw&r=0" style="width:70%;height:100px"/>
      <div class="row col-md-12 text-center">
          <p><b><?=$valb['booking_number']?></b></p>
     </div>
     <div class="row col-md-12">
           <div class="col-md-6 text-left"><?=$valb['to_pincode']?></div>
           <div class="col-md-6 text-right"><b>PUN/SDW</b></div>
       </div>
        </td>
      </tr>
      <tr>
       <td>
           <address>
            <p>   <b>Shipping Address:</b><br/>
            <b style="font-size:24px"><?=$valb['to_name']?></b><br/>
<?=$valb['to_address']?><br/>
<b>PIN:<?=$valb['to_pincode']?></b>
</p>
           </address>
       </td>
       <td colspan="2" class="text-center"><p style="margin-top:30px !important"><b style="font-size:18px;">
           Pre-paid<br/>
Surface</b></p></td>
      </tr>
      <tr>
          <td><p>Seller: <?=$valb['from_name']?><br/>
Address: <?=$valb['from_address']?></p></td>
<td colspan="2"><p>Dt.: <?= $valb['delivery_date'] ?>
</p></td>
      </tr>
      <tr>
          <td>Product </td>
          <td>Price</td>
          <td>Total</td>
      </tr>
        <tr>
          <td><?=$valb['product_name']?></td>
          <td>₹<?=$valb['amount']?></td>
          <td>₹<?=$valb['amount']?></td>
      </tr>
        <tr>
          <td>Total</td>
          <td>₹<?=$valb['amount']?></td>
          <td>₹<?=$valb['amount']?></td>
      </tr>
      <tr class="text-center">
             <td colspan="3" style="margin-top:5px !important"><img src="https://th.bing.com/th/id/R.8a84c934dd93df0794df55947c1c451d?rik=ZUdWsMrnJI%2f6gw&riu=http%3a%2f%2finfo.l-tron.com%2fwp-content%2fuploads%2f2011%2f08%2fLTC_128.jpg&ehk=1LvETzaiBGD%2fdQPw9Ar7z2UbUO7MAa16MT1cehDKX3Y%3d&risl=&pid=ImgRaw&r=0" style="width:70%;height:100px"/>
     <div class="row col-md-12 text-center">
          <p><b><?=$valb['from_name']?><?=$valb['id']?></b></p>
     </div>
     </td>
      </tr>
       <tr class="text-center">
        <td colspan="3">
            <p>
                Return Address: 17/a 200feet Ring road , Ponniammanmedu, opp vijaya park,,, -
Chennai - Tamil Nadu - 600110
            </p>  </td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
