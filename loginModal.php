<?phpinclude 'verifyLogin.php' ?>
<div class="loginDiv">
  <form action="<?php$_SERVER['PHP_SELF'] ?>" method="POST">
    <button type="button" class="close loginDivClose" data-dismiss="modal" aria-hidden="true">×</button>
    <div class="form-group">
      <input type="text" placeholder="User Name" class="form-control" name="username">
    </div>
    <div class="form-group">
      <input type="password" placeholder="Password" class="form-control" name="password">
    </div>
    <input type="submit" class="btn btn-success" value="Sign in">
  </form>
</div>