     <h3>Set basic info</h3> 
   <?php echo validation_errors(); ?>
   <?php echo form_open('dashboard/set_profile'); ?>
   <?php
// Translate result value into html value
   if ($profile['gym_partner'] === 'on') {
     $profile['gym_partner'] = 'checked';
   }
   if ($profile['private'] === 'on') {
     $profile['private'] = 'checked';
   }
   ?>


     <br/>
     <label for="username">New Username:</label>
     <input value="<?php echo $profile['username']; ?>" class="input-textarea"
     type="text" size="20" id="username" name="username"/>
     <br/>
<!--      <label for="existing_password">Existing Password:</label>
     <input class="input-textarea"
     type="password" size="20" id="existing_password" name="existing_password"/>
     <br/>
     <label for="new_password">New Password:</label>
     <input class="input-textarea"
     type="password" size="20" id="new_password" name="new_password"/>
     <br/>
     <label for="confirm_password">Confirm Password:</label>
     <input class="input-textarea"
     type="password" size="20" id="confirm_password" name="confirm_password"/>
     <br/> -->
     <label for="email">Email:</label>
     <input value="<?php echo $profile['email']; ?>" class="input-textarea"
     type="email" size="20" id="email" name="email"/>
     <br/>
     <label for="first_name">First Name:</label>
     <input value="<?php echo $profile['first_name']; ?>" class="input-textarea"
     type="text" size="20" id="first_name" name="first_name"/>
     <br/>
     <label for="last_name">Last Name:</label>
     <input value="<?php echo $profile['last_name']; ?>" class="input-textarea"
     type="text" size="20" id="last_name" name="last_name"/>
     <br/>
     <label for="birthdate">Birthdate:</label>
     <input value="<?php echo $profile['birthdate']; ?>" class="input-textarea"
     type="date" size="20" id="birthdate" name="birthdate"/>
     <br/>
     <label for="gender">Gender:</label>
     <input value="<?php echo $profile['gender']; ?>" class="input-textarea"
     type="gender" size="20" id="gender" name="gender"/>
     <br/>
     <label for="location">Location:</label>
     <input value="<?php echo $profile['location']; ?>" class="input-textarea"
     type="location" size="20" id="location" name="location"/>
     <br/>
     <label for="profile_picture">Profile Picture:</label>
     <input disabled class="input-textarea"
     type="file" size="20" id="profile_picture" name="profile_picture"/>
     <br/>
     <label for="gym_partner">Looking for a Gym Partner:</label>
     <input class="input-textarea"
     type="checkbox" size="20" id="gym_partner" name="gym_partner" <?php echo $profile['gym_partner']; ?>/>
     <br/>
     <label for="private">Private:</label>
     <input class="input-textarea"
     type="checkbox" size="20" id="private" name="private" <?php echo $profile['private']; ?>/>
     <br/>
     <label for="goal">Goal:</label>
     <textarea class="input-textarea"
     rows="4" cols="50" id="goal" name="goal"/><?php echo $profile['goal']; ?></textarea>
     <br/>
     <label for="about">About:</label>
     <textarea class="input-textarea"
     rows="4" cols="50" id="about" name="about"/><?php echo $profile['about']; ?></textarea>
     <br/>
     <input class="input-textarea"
     type="submit" value="Submit Changes"/>
   </form>