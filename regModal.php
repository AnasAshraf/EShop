<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
              
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" method="post" id="signinform">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="usernameid">Username:</label>
              <div class="controls">
                <input required="" id="usernameid" name="usernameid" type="text" class="form-control" placeholder="Please enter your Username" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group remember">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                  Remember me
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" class="btn btn-success" type="submit">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal" method="post" id="signupform">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
          <div class="control-group">
              <label class="control-label" for="firstnameid_s">Firstname:</label>
              <div class="controls">
                <input required="" id="firstnameid_s" name="firstnameid_s" type="text" class="form-control" placeholder="Enter your Firstname" class="input-medium" required="">
              </div>
            </div>

             <div class="control-group">
              <label class="control-label" for="lastnameid_s">Lastname:</label>
              <div class="controls">
                <input required="" id="lastnameid_s" name="lastnameid_s" type="text" class="form-control" placeholder="Enter your Lastname" class="input-medium" required="">
              </div>
            </div>

             <div class="control-group">
              <label class="control-label" for="emailid_s">Email:</label>
              <div class="controls">
                <input required="" id="emailid_s" name="emailid_s" type="text" class="form-control" placeholder="Enter your Email" class="input-medium" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="usernameid_s">Username:</label>
              <div class="controls">
                <input required="" id="usernameid_s" name="usernameid_s" type="text" class="form-control" placeholder="Enter your Username" class="input-medium" required="">
              </div>
            </div>  
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordid_s">Password:</label>
              <div class="controls">
                <input id="passwordid_s" name="passwordid_s" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em>1-8 Characters</em>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            <br>
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-success" type="submit">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>
