<?php if (isset($self)) { ?>
  <h1>You are already Logged In</h1>
<?php } else { ?>
  <h1>Login</h1>
  <?php echo validation_errors(); ?>
  <?php echo form_open('login/verifylogin'); ?>
   <label for="username">Username:</label>
   <input type="text" name="username"/>
   <br/>
   <label for="password">Password:</label>
   <input type="password" name="password"/>
   <br/>
   <input type="submit" value="Login"/>
  </form>
<?php }