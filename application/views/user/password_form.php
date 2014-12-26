     <h3>Change your password</h3> 
   <?php echo validation_errors(); ?>
   <?php echo form_open('dashboard/set_password'); ?>

     <label for="existing_password">Existing Password:</label>
     <input class="input-textarea"
     type="password" size="20" id="existing_password" name="existing_password"/>
     <br/>
     <label for="password">New Password:</label>
     <input class="input-textarea"
     type="password" size="20" id="password" name="password"/>
     <br/>
     <label for="confirm_password">Confirm Password:</label>
     <input class="input-textarea"
     type="password" size="20" id="confirm_password" name="confirm_password"/>
     <br/>
     <input class="input-textarea"
     type="submit" value="Submit Changes"/>
   </form>