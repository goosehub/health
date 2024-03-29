<div class="mt-med">
	
	<div class="content-full">
		
		<div class="content">
		
		<h1>Add a Meal</h1>
		
		<p>Creating a food will allow you to easily add it as a meal at any time.</p>
		
		</div>
		
		<span class="divider"></span>
		
		<div class="content">

			<?php echo validation_errors(); ?>
			<?php echo form_open_multipart('meals/create_meal'); ?>
			
			<div class="input-row">
			
				<div class="question">
	
					<label for="meal_name">Meal Name:</label>
					
				</div><!--question-->
				
				<div class="answer">
					
					<input class="input-textarea" type="text" id="name" name="meal_name"/>
					
				</div><!--answer-->
				
			</div><!--input-row-->
			
		<br/>
		<label for="save_as_recipe">Save this meal as a recipe:</label>
		<input class="input-textarea"
		type="checkbox" size="20" id="save_as_recipe" name="save_as_recipe"/>
		<br/>
		<label for="category">Category:</label>
		<select class="input-textarea" type="text" id="category" name="category"/>
			<option>Other</option>
			<option>Breakfast</option>
			<option>Lunch</option>
			<option>Dinner</option>
			<option>Snack</option>
			<option>Desert</option>
		</select>
		<br/>
		<label for="date">Date:</label>
		<input class="input-textarea"
		type="date" size="20" name="date" value="<?php echo $today; ?>"/>
		<label for="time">Time:</label>
		<input class="input-textarea"
		type="time" size="20" name="time" value="<?php echo $current_time; ?>"/>
		<br/>
		<label for="comment">Comment:</label>
		<br/>
		<textarea class="input-textarea" type="text" id="comment" name="comment" rows="5" cols="50"/></textarea>
	
		<hr/>
	
		<button type="button" id="add_food_form">Add a New Food</button>
		<br/>
		|
		<label for="food_search">Search for a food: </label>
		<input class="input-textarea" type="text" id="food_search" name="food_search" 
		placeholder="Feature not yet added" onkeyup="autocomplet()" />
		<button id="food_search_add" type="button" >Add</button>
		<ul id="food_search_list"></ul>

		|

		<label for="recipe_search">Search for a recipe: </label>
		<input class="input-textarea"
		type="text" id="recipe_search" name="recipe_search" placeholder="Feature not yet added" disabled/>
		<button id="recipe_search_add" type="button" disabled>Add</button>
	
		<hr/>
	
	<!-- NOTE -->
	<!-- Changes below will need to be reflected in the script.js file where the form is generated -->
	
		<div id="food-forms-cnt">
	
			<label for="food_name">Food name:</label>
			<input class="input-textarea" type="text" id="food_name" name="food_name[]"/>
			|
			<label for="serving_size">Number of serving sizes:</label>
			<input class="input-textarea" type="text" id="serving_size" name="serving_size[]"/>
			<br/>
			<label for="save_as_food">Save this food for later use:</label>
			<input class="input-textarea"
			type="checkbox" size="20" id="save_as_food" name="save_as_food[]"/>
			<p><strong>Type of Food (Pick all that apply):</strong></p>
				<label for="food_type_vegetable">Vegetable:</label>
				<input class="input-textarea" type="radio" id="food_type_vegetable" class="food_type"
				name="food_type_vegetable[]" />
				|
				<label for="food_type_fruit">Fruit:</label>
				<input class="input-textarea" type="radio" id="food_type_fruit" class="food_type"
				name="food_type_fruit[]" />
				|
				<label for="food_type_protein">Protein:</label>
				<input class="input-textarea" type="radio" id="food_type_protein" class="food_type"
				name="food_type_protein[]" />
				|
				<label for="food_type_dairy">Dairy:</label>
				<input class="input-textarea" type="radio" id="food_type_dairy" class="food_type"
				name="food_type_dairy[]" />
				|
				<label for="food_type_fats">Fats:</label>
				<input class="input-textarea" type="radio" id="food_type_fats" class="food_type"
				name="food_type_fats[]" />
				|
				<label for="food_type_grain">Grain:</label>
				<input class="input-textarea" type="radio" id="food_type_grain" class="food_type"
				name="food_type_grain[]" />
				|
				<label for="food_type_other">Other:</label>
				<input class="input-textarea" type="radio" id="food_type_other" class="food_type"
				name="food_type_other[]" />
			</select>
			<p><strong>Below, enter the information for one serving size</strong></p>
			<table>
				<tr><td>
					<label for="calories">calories:</label>
					<input class="input-textarea" type="text" id="calories" name="calories[]" size="5" />
					<br/>
					<label for="calories_fat">calories from fat:</label>
					<input class="input-textarea" type="text" id="calories_fat" name="calories_fat[]" size="5" />
					<br/>
					<label for="total_fat">total fat:</label>
					<input class="input-textarea" type="text" id="total_fat" name="total_fat[]" size="5" />
					<br/>
					<label for="saturated_fat">saturated fat:</label>
					<input class="input-textarea" type="text" id="saturated_fat" name="saturated_fat[]" size="5" />
					<br/>
					<label for="trans_fat">trans fat:</label>
					<input class="input-textarea" type="text" id="trans_fat" name="trans_fat[]" size="5" />
					<br/>
					<label for="cholesterol">cholesterol:</label>
					<input class="input-textarea" type="text" id="cholesterol" name="cholesterol[]" size="5" />
					<br/>
				</td>
				<td>
					<label for="sodium">sodium:</label>
					<input class="input-textarea" type="text" id="sodium" name="sodium[]" size="5" />
					<br/>
					<label for="total_carb">total carbs:</label>
					<input class="input-textarea" type="text" id="total_carb" name="total_carb[]" size="5" />
					<br/>
					<label for="dietary_fiber">dietary fiber:</label>
					<input class="input-textarea" type="text" id="dietary_fiber" name="dietary_fiber[]" size="5" />
					<br/>
					<label for="sugars">sugars:</label>
					<input class="input-textarea" type="text" id="sugars" name="sugars[]" size="5" />
					<br/>
					<label for="protein">protein:</label>
					<input class="input-textarea" type="text" id="protein" name="protein[]" size="5" />
					<br/>
					<label for="calcium">calcium:</label>
					<input class="input-textarea" type="text" id="calcium" name="calcium[]" size="5" />
					<br/>
				</td>
				<td>
					<label for="folic_acid">folic acid:</label>
					<input class="input-textarea" type="text" id="folic_acid" name="folic_acid[]" size="5" />
					<br/>
					<label for="iron">iron:</label>
					<input class="input-textarea" type="text" id="iron" name="iron[]" size="5" />
					<br/>
					<label for="magnesium">magnesium:</label>
					<input class="input-textarea" type="text" id="magnesium" name="magnesium[]" size="5" />
					<br/>
					<label for="niacin">niacin:</label>
					<input class="input-textarea" type="text" id="niacin" name="niacin[]" size="5" />
					<br/>
					<label for="potassium">potassium:</label>
					<input class="input-textarea" type="text" id="potassium" name="potassium[]" size="5" />
					<br/>
					<label for="riboflavin">riboflavin:</label>
					<input class="input-textarea" type="text" id="riboflavin" name="riboflavin[]" size="5" />
					<br/>
				</td>
				<td>
					<label for="vit_a">vitamin A</label>
					<input class="input-textarea" type="text" id="vit_a" name="vit_a[]" size="5" />
					<br/>
					<label for="vit_b6">vitamin B6</label>
					<input class="input-textarea" type="text" id="vit_b6" name="vit_b6[]" size="5" />
					<br/>
					<label for="vit_b12">vitamin B12</label>
					<input class="input-textarea" type="text" id="vit_b12" name="vit_b12[]" size="5" />
					<br/>
					<label for="vit_c">vitamin C</label>
					<input class="input-textarea" type="text" id="vit_c" name="vit_c[]" size="5" />
					<br/>
					<label for="vit_d">vitamin D</label>
					<input class="input-textarea" type="text" id="vit_d" name="vit_d[]" size="5" />
					<br/>
					<label for="vit_e">vitamin E</label>
					<input class="input-textarea" type="text" id="vit_e" name="vit_e[]" size="5" />
					<br/>
					<label for="zinc">zinc:</label>
					<input class="input-textarea" type="text" id="zinc" name="zinc[]" size="5" />
				</td></tr>
			</table>
	
			<hr/>
	
			</div>
	
		 <input class="input-textarea"
		 type="submit" value="Enter Meal"/>
	</form>
	
	</div>

	</div><!--content-full-->
	
</div><!--mt-med-->