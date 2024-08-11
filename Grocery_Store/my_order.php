<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
    ?>
    <script>
    window.location.href='login.php';
    </script>
    <?php
}
?>
<style>
 .btn {
    border: none;
    border-radius: 5px;
    padding: 8px 16px;
    font-size: 14px;
    cursor: pointer;
  }
 .gen-i {
    background-color: #1b84f5;
    color: #fff;
  }
 .gen-i:hover {
    background-color: #0627ba;
  }
 .dow-i {
    background-color: #09b014;
    color: #fff;
  }
 .dow-i:hover {
    background-color: #0c6e12;
  }
  @media only screen and (max-width: 768px) {
   .btn {
      font-size: 12px;
      padding: 8px 14px;
    }
  }
  @media only screen and (max-width: 480px) {
   .btn {
      font-size: 10px;
      padding: 4px 8px;
    }
  }
</style>
<div style="padding-top: 100px; background-color: #f7f7f7; margin-bottom: 30px;">
    <div style="width: 100%; margin: 0 auto; background: white;">
        <div style="display: flex;">
            <div style="width: 100%;">
                <div style="margin: 0 auto;">
                    <form action="#">
                        <div style="overflow-x:auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead style="font-size: 1.4rem; ">
                                <tr>
                                    <th style="color: white; background: green; border: 1px solid #eee; padding: 8px;">Order ID</th>
                                    <th style="color: white; background: green; border: 1px solid #eee; padding: 8px;"><span style="white-space: nowrap;">Order Date</span></th>
                                    <th style="color: white; background: green; border: 1px solid #eee; padding: 8px;"><span style="white-space: nowrap;">Address</span></th>
                                    <th style="color: white; background: green; border: 1px solid #eee; padding: 8px;"><span style="white-space: nowrap;">Payment Type</span></th>
                                    <th style="color: white; background: green; border: 1px solid #eee; padding: 8px;"><span style="white-space: nowrap;">Payment Status</span></th>
                                    <th style="color: white; background: green; border: 1px solid #eee; padding: 8px;"><span style="white-space: nowrap;">Order Status</span></th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center; font-size: 1.4rem; ">
                                <?php
                                $uid=$_SESSION['USER_ID'];
                                $res=mysqli_query($con,"select `orders`.*,order_status.name as order_status_str from `orders`,order_status where `orders`.user_id='$uid' and order_status.id=`orders`.order_status");
                                if(mysqli_num_rows($res) > 0) {
                                    while($row=mysqli_fetch_assoc($res)){
                            ?>
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 8px;">
                                    <a href="my_order_details.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a>
                                    <br/>
                                    <a class="gen-i btn btn-primary btn-sm" href="generatePDF.php?id=<?php echo $row['id']?>">View Invoice</a>
                                    <a class="dow-i btn btn-success btn-sm" href="generatePDF.php?id=<?php echo $row['id'];?>&action=download"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['added_on']?></td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">
                                        <?php echo $row['address']?><br/>
                                        <?php echo $row['city']?><br/>
                                        <?php echo $row['pincode']?>
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['payment_type']?></td>
                                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['payment_status']?></td>
                                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['order_status_str']?></td>
                                </tr>
                                <?php }?>
                                <?php } else {?>
                                <tr>
                                    <td colspan="6" style="border: 1px solid #ddd; padding: 8px; text-align: center;">No orders yet.</td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('footer.php')?>