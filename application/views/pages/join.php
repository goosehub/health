<h1>Join</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('join/verifyjoin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <label for="confirm_password">Confirm Password:</label>
     <input class="input-textarea"
     type="password" size="20" id="confirm_password" name="confirm_password"/>
     <br/>
     <input type="submit" value="Join"/>
   </form>