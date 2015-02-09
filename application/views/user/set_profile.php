     <h3>Set basic info</h3> 
   <?php echo validation_errors(); ?>
   <?php echo form_open('dashboard/set_profile'); ?>
   <?php
// Translate result value into html value
   if ($profile['metric'] === 'on') {
     $profile['metric'] = 'checked';
   }
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
     <label for="email">Email (Kept Private):</label>
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
     <select class="input-textarea" type="gender" sixe="20" id="gender" name="gender">
       <option value="<?php echo $profile['gender']; ?>"><?php echo $profile['gender']; ?></option>
       <!-- <option value="Private">Private</option> -->
       <option value="Male">Male</option>
       <option value="Female">Female</option>
     </select>
     <br/>
     <label for="location">Location:</label>
     <input value="<?php echo $profile['location']; ?>" class="input-textarea"
     type="location" size="20" id="location" name="location"/>
     <br/>
     <label for="metric">Enter Progress in Metric:</label>
     <input class="input-textarea"
     type="checkbox" size="20" id="metric" name="metric" <?php echo $profile['metric']; ?>/>
     <br/>
     <label for="gym_partner">Looking for a Gym Partner:</label>
     <input class="input-textarea"
     type="checkbox" size="20" id="gym_partner" name="gym_partner" <?php echo $profile['gym_partner']; ?>/>
     <br/>
     <label for="private">Only show profile to friends:</label>
     <input class="input-textarea"
     type="checkbox" size="20" id="private" name="private" <?php echo $profile['private']; ?>/>
      <!--      <br/>
     <label for="goal">Goal:</label>
     <textarea class="input-textarea"
     rows="4" cols="50" id="goal" name="goal"/><?php echo $profile['goal']; ?></textarea> -->
     <br/>
     <label for="about">About:</label>
     <textarea class="input-textarea"
     rows="4" cols="50" id="about" name="about"/><?php echo $profile['about']; ?></textarea>
     <br/>
     <input class="input-textarea"
     type="submit" value="Submit Changes"/>
   </form>