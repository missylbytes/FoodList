<footer style="display: block; margin-top: 100px;">
  <p>©AppVengers Inc. d/b/a MealMouse 2015</p>
</footer>




<!-- Placed at the end of the document so the pages load faster -->

<!-- Bootstrap core JavaScript-->
<script src="js/bootstrap.min.js"></script>

<!-- Google API server jQuery-->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->


<!-- jQuery API server jQuery-->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



<!-- My JS Funcs-->
<script type="text/javascript">





  $(".loginLink").click(function () {
    $(".loginDiv").slideDown('slow');
  });

  $(".loginDivClose").click(function () {
    $(".loginDiv").slideUp('slow');
  });

  $(".howitworks").click(function () {
    $("#howItWorksModal").modal('show');
  });

  $(".reserveMealBtn").click(function () {
    $("#reserveMealModal").modal('show');
  });



    </script>


<a href="index.php">MealMouse Home | </a>
<?php if( isset($_SESSION["username"])) 
      {
        echo '<a href="myMeals.php"> My Meals | </a>';
        echo '<a href="myAccount.php"> My Account | </a>';
        echo '<a href="logout.php"> Logout |</a>';
        echo  " Welcome ". $_SESSION['username'];
      } else
      {
        echo '<a href="sellerSignUp.php"> Sign up | </a>';
        echo '<a class="loginLink" href="#"> Login </a>';
      } ?>
</body>			  
</html>

