<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(to right, #ff9a00, #ff5252);">
        <h5 class="modal-title text-white text-uppercase d-flex justify-content-center w-100" style="font-size: 30px;">Login</h5>
        <button type=" button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_handleLogin.php" method="post">
          <div class="form-group">
            <label for="loginusername">Username</label>
            <input class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
          </div>
          <div class="form-group">
            <label for="loginpassword">Password</label>
            <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" style="background: linear-gradient(to right, #ff9a00, #ff5252); border: none;">Submit</button>
        </form>
        <p class="mt-3 text-center">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign up now</a>.</p>
      </div>
    </div>
  </div>
</div>