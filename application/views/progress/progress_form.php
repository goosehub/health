     <h3>Create a new progress point</h3> 
   <?php echo validation_errors(); ?>
   <?php echo form_open_multipart('progress/set_progress'); ?>
   <?php
   // var_dump($progress->
 ?>

     <br/>
     <label for="name">Name this Progress Point:</label>
     <input value="<?php echo $date; ?>" class="input-textarea"
     type="text" size="20" id="name" name="name"/>
     <br/>
     <label for="comment">Comment:</label>
     <textarea class="input-textarea"
     rows="4" cols="50" id="comment" name="comment"/></textarea>
     <br/>
     <label for="weight">Weight:</label>
     <input value="<?php echo $progress->weight; ?>" class="input-textarea"
     type="text" size="20" id="weight" name="weight"/>
     <br/>
     <label for="height">Height:</label>
     <input value="<?php echo $progress->height; ?>" class="input-textarea"
     type="text" size="20" id="height" name="height"/>
     <br/>
     <label for="arm">Arm:</label>
     <input value="<?php echo $progress->arm; ?>" class="input-textarea"
     type="text" size="20" id="arm" name="arm"/>
     <br/>
     <label for="thigh">Thigh:</label>
     <input value="<?php echo $progress->thigh; ?>" class="input-textarea"
     type="text" size="20" id="thigh" name="thigh"/>
     <br/>
     <label for="waist">Wasit:</label>
     <input value="<?php echo $progress->waist; ?>" class="input-textarea"
     type="text" size="20" id="waist" name="waist"/>
     <br/>
     <label for="chest">Chest:</label>
     <input value="<?php echo $progress->chest; ?>" class="input-textarea"
     type="text" size="20" id="chest" name="chest"/>
     <br/>
     <label for="calves">Calves:</label>
     <input value="<?php echo $progress->calves; ?>" class="input-textarea"
     type="text" size="20" id="calves" name="calves"/>
     <br/>
     <label for="forearms">Forearms:</label>
     <input value="<?php echo $progress->forearms; ?>" class="input-textarea"
     type="text" size="20" id="forearms" name="forearms"/>
     <br/>
     <label for="neck">Neck:</label>
     <input value="<?php echo $progress->neck; ?>" class="input-textarea"
     type="text" size="20" id="neck" name="neck"/>
     <br/>
     <label for="hips">Hips:</label>
     <input value="<?php echo $progress->hips; ?>" class="input-textarea"
     type="text" size="20" id="hips" name="hips"/>
     <br/>
     <label for="bodyfat">Bodyfat:</label>
     <input value="<?php echo $progress->bodyfat; ?>" class="input-textarea"
     type="text" size="20" id="bodyfat" name="bodyfat"/>
     <br/>
     <label for="squats">Squats:</label>
     <input value="<?php echo $progress->squats; ?>" class="input-textarea"
     type="text" size="20" id="squats" name="squats"/>
     <br/>
     <label for="bench">Bench:</label>
     <input value="<?php echo $progress->bench; ?>" class="input-textarea"
     type="text" size="20" id="bench" name="bench"/>
     <br/>
     <label for="deadlift">Deadlift:</label>
     <input value="<?php echo $progress->deadlift; ?>" class="input-textarea"
     type="text" size="20" id="deadlift" name="deadlift"/>
     <br/>
     <label for="picture-01">Upload Picture:</label>
     <input disabled class="input-textarea"
     type="file" size="20" id="picture-01" name="picture-01"/>
     <br/>
     <label for="picture-01_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture-01_caption" name="picture-01_caption"/>
     <br/>
     <label for="picture-02">Upload Picture:</label>
     <input disabled class="input-textarea"
     type="file" size="20" id="picture-02" name="picture-02"/>
     <br/>
     <label for="picture-02_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture-02_caption" name="picture-02_caption"/>
     <br/>
     <label for="picture-03">Upload Picture:</label>
     <input disabled class="input-textarea"
     type="file" size="20" id="picture-03" name="picture-03"/>
     <br/>
     <label for="picture-03_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture-03_caption" name="picture-03_caption"/>
     <br/>
     <label for="picture-04">Upload Picture:</label>
     <input disabled class="input-textarea"
     type="file" size="20" id="picture-04" name="picture-04"/>
     <br/>
     <label for="picture-04_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture-04_caption" name="picture-04_caption"/>
     <br/>
     <label for="picture-05">Upload Picture:</label>
     <input disabled class="input-textarea"
     type="file" size="20" id="picture-05" name="picture-05"/>
     <br/>
     <label for="picture-05_caption">Caption:</label>
     <input class="input-textarea"
     type="text" size="20" id="picture-05_caption" name="picture-05_caption"/>
     <br/>
     <input class="input-textarea"
     type="submit" value="Submit Changes"/>
   </form>