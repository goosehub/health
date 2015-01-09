     <h1>New progress point for <?php echo $date; ?></h1> 
   <?php echo validation_errors(); ?>
   <?php echo form_open_multipart('progress/set_progress'); ?>
   <?php
   if ($profile['metric'] === '0') {
     $cm = 'inches';
     $kg = 'lbs';
   } else {
     $cm = 'cm';
     $kg = 'kg';
   }
 ?>
     <!-- If user already has a progress point for today -->
     <?php if ($progress->date === $date) { ?>
          <h4>You already have a progress point for today, but feel free to update it below</h4>
     <?php } ?>
     <label for="name">Progress Point Name: </label>
     <input class="input-textarea"
     type="text" size="20" id="name" name="name"/>
     <br/>
     <label for="weight">Weight measurement in <?php echo $kg; ?>:</label>
     <input value="<?php echo $measurement['weight']; ?>" class="input-textarea"
     type="text" size="20" id="weight" name="weight"/>
     <br/>
     <label for="height">Height measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['height']; ?>" class="input-textarea"
     type="text" size="20" id="height" name="height"/>
     <br/>
     <label for="arm">Arm measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['arm']; ?>" class="input-textarea"
     type="text" size="20" id="arm" name="arm"/>
     <br/>
     <label for="thigh">Thigh measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['thigh']; ?>" class="input-textarea"
     type="text" size="20" id="thigh" name="thigh"/>
     <br/>
     <label for="waist">Waist measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['waist']; ?>" class="input-textarea"
     type="text" size="20" id="waist" name="waist"/>
     <br/>
     <label for="chest">Chest measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['chest']; ?>" class="input-textarea"
     type="text" size="20" id="chest" name="chest"/>
     <br/>
     <label for="calves">Calves measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['calves']; ?>" class="input-textarea"
     type="text" size="20" id="calves" name="calves"/>
     <br/>
     <label for="forearms">Forearms measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['forearms']; ?>" class="input-textarea"
     type="text" size="20" id="forearms" name="forearms"/>
     <br/>
     <label for="neck">Neck measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['neck']; ?>" class="input-textarea"
     type="text" size="20" id="neck" name="neck"/>
     <br/>
     <label for="hips">Hips measurement in <?php echo $cm; ?>:</label>
     <input value="<?php echo $measurement['hips']; ?>" class="input-textarea"
     type="text" size="20" id="hips" name="hips"/>
     <br/>
     <label for="bodyfat">Bodyfat measurement in percent:</label>
     <input value="<?php echo $measurement['bodyfat']; ?>" class="input-textarea"
     type="text" size="20" id="bodyfat" name="bodyfat"/>
     <br/>
     <label for="squats">Squats in <?php echo $kg; ?>:</label>
     <input value="<?php echo $measurement['squats']; ?>" class="input-textarea"
     type="text" size="20" id="squats" name="squats"/>
     <br/>
     <label for="bench">Bench in <?php echo $kg; ?>:</label>
     <input value="<?php echo $measurement['bench']; ?>" class="input-textarea"
     type="text" size="20" id="bench" name="bench"/>
     <br/>
     <label for="deadlift">Deadlift in <?php echo $kg; ?>:</label>
     <input value="<?php echo $measurement['deadlift']; ?>" class="input-textarea"
     type="text" size="20" id="deadlift" name="deadlift"/>
     <br/>
     <hr/>
     <h3>Include a comment</h3>
     <label for="comment">Comment:</label>
     <textarea class="input-textarea"
     rows="4" cols="50" id="comment" name="comment"/></textarea>
     <br/>
     <hr/>
     <h3>Upload Images</h3>
     <label for="picture_01">Upload Picture:</label>
     <input class="input-textarea"
     type="file" size="20" id="picture_01" name="files[]"/>
     <br/>
     <label for="picture_01_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture_01_caption" name="picture_01_caption"/>
     <br/>
     <label for="picture_02">Upload Picture:</label>
     <input class="input-textarea"
     type="file" size="20" id="picture_02" name="files[]"/>
     <br/>
     <label for="picture_02_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture_02_caption" name="picture_02_caption"/>
     <br/>
     <label for="picture_03">Upload Picture:</label>
     <input class="input-textarea"
     type="file" size="20" id="picture_03" name="files[]"/>
     <br/>
     <label for="picture_03_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture_03_caption" name="picture_03_caption"/>
     <br/>
     <label for="picture_04">Upload Picture:</label>
     <input class="input-textarea"
     type="file" size="20" id="picture_04" name="files[]"/>
     <br/>
     <label for="picture_04_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture_04_caption" name="picture_04_caption"/>
     <br/>
     <label for="picture_05">Upload Picture:</label>
     <input class="input-textarea"
     type="file" size="20" id="picture_05" name="files[]"/>
     <br/>
     <label for="picture_05_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture_05_caption" name="picture_05_caption"/>
     <br/>
     <label for="picture_06">Upload Picture:</label>
     <input class="input-textarea"
     type="file" size="20" id="picture_06" name="files[]"/>
     <br/>
     <label for="picture_05_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture_06_caption" name="picture_06_caption"/>
     <br/>
     
     <input class="input-textarea"
     type="submit" value="Submit Changes"/>
   </form>