<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top" style="background-color:#e35f21">
    <div class="container">
      <div class="row">
        <div class="col-md-6" >
          <h6 style="color:black">About Us</h6>
          <ul>
          <li><a href="page.php?type=aboutus" style="color:black">About Us</a></li>
            <li><a href="page.php?type=faqs" style="color:black">FAQs</a></li>
            <li><a href="page.php?type=privacy" style="color:black">Privacy</a></li>
          <li><a href="page.php?type=terms" style="color:black">Terms of use</a></li>
               <li><a href="admin/" style="color:black">Admin Login</a></li>
          </ul>
        </div>
  
        <div class="col-md-3 col-sm-6" >
          <h6 style="color:black">Subscribe Newsletter</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address" style="background-color:black;" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block" style="background-color:black">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text" style="color:black">*We send great deals and latest auto news to our subscribed users every week.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom" style="background-color:black">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Connect with Us:</p>
            <ul>
              <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2023 Wandering Wheels. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </div>
</footer>