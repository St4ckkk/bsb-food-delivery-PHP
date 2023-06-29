<!-- Sign up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-white" style="background: linear-gradient(to right, #ff9a00, #ff5252);">
        <h5 class="modal-title  text-white text-uppercase d-flex justify-content-center w-100" style="font-size: 30px;">Sign Up</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_handleSignup.php" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" name="username" placeholder="Choose a unique Username" type="text" required minlength="3" maxlength="11">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone No</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon">+63</span>
              </div>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{11}" maxlength="11">
            </div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21">
          </div>
          <div class="form-group">
            <label for="cpassword">Re-enter Password</label>
            <input class="form-control" id="cpassword" name="cpassword" placeholder="Re-enter Password" type="password" required minlength="4" maxlength="21">
          </div>
          <button type="submit" class="btn btn-primary btn-block" style="background: linear-gradient(to right, #ff9a00, #ff5252); border: none;">Submit</button>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a>.</p>
      </div>
    </div>
  </div>
</div>