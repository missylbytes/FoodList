<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container navbar-container">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="index.php" style="color: #9d177c; font-size: 25px; font-weight: 600;">MealMouse</a>

    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <a class="howitworks" href="myMeals.php">My Meals</a> |
             
          <a href="MyAccount.php">My Account</a> |
             
          <a class="loginLink" href="logout.php">Logout</a> | 
              Welcome, <?php echo $_SESSION["username"]; ?>
        </div>
        <!--/.navbar-collapse -->
      </form>
    </div>
</nav>
