var food_number = 2;

$(document).ready(function()
{
// Sidebar Height
	var height = $('.page-wrap').height();
	$('.sidebar').css({ 'height': height });

// Add Food Form
	$('#add_food_form').click( function(){
        // Large HTML appended below
		$('#food-forms-cnt').append('<label for="food_name">Food name:</label> <input class="input-textarea" type="text" id="food_name" name="food_name_'
		+ food_number + '"/> | <label for="serving_size">Number of serving sizes:</label> <input class="input-textarea" type="text" id="serving_size" name="serving_size_'
		+ food_number + '"/> <br/> <label for="save_as_food">Save this food for later use:</label> <input class="input-textarea"type="checkbox" size="20" id="save_as_food" name="save_as_food_'
		+ food_number + '"/> <p><strong>Type of Food (Pick all that apply):</strong></p> <label for="food_type_Vegetable">Vegetable:</label> <input class="input-textarea" type="radio" id="food_type_Vegetable" class="food_type"name="food_type_Vegetable_'
		+ food_number + '" /> | <label for="food_type_Fruit">Fruit:</label> <input class="input-textarea" type="radio" id="food_type_Fruit" class="food_type"name="food_type_Fruit_'
		+ food_number + '" /> | <label for="food_type_Protein">Protein:</label> <input class="input-textarea" type="radio" id="food_type_Protein" class="food_type"name="food_type_Protein_'
		+ food_number + '" /> | <label for="food_type_Dairy">Dairy:</label> <input class="input-textarea" type="radio" id="food_type_Dairy" class="food_type"name="food_type_Dairy_'
		+ food_number + '" /> | <label for="food_type_Fats">Fats:</label> <input class="input-textarea" type="radio" id="food_type_Fats" class="food_type"name="food_type_Fats_'
		+ food_number + '" /> | <label for="food_type_Grain">Grain:</label> <input class="input-textarea" type="radio" id="food_type_Grain" class="food_type"name="food_type_Grain_'
		+ food_number + '" /> | <label for="food_type_Other">Other:</label> <input class="input-textarea" type="radio" id="food_type_Other" class="food_type"name="food_type_Other_'
		+ food_number + '" /> </select> <p><strong>Below, enter the information for one serving size</strong></p> <table> <tr><td> <label for="calories">calories:</label> <input class="input-textarea" type="text" id="calories" name="calories_'
		+ food_number + '" size="5" /> <br/> <label for="calories_fat">calories from fat:</label> <input class="input-textarea" type="text" id="calories_fat" name="calories_fat_'
		+ food_number + '" size="5" /> <br/> <label for="total_fat">total fat:</label> <input class="input-textarea" type="text" id="total_fat" name="total_fat_'
		+ food_number + '" size="5" /> <br/> <label for="saturated_fat">saturated fat:</label> <input class="input-textarea" type="text" id="saturated_fat" name="saturated_fat_'
		+ food_number + '" size="5" /> <br/> <label for="trans_fat">trans fat:</label> <input class="input-textarea" type="text" id="trans_fat" name="trans_fat_'
		+ food_number + '" size="5" /> <br/> <label for="cholesterol">cholesterol:</label> <input class="input-textarea" type="text" id="cholesterol" name="cholesterol_'
		+ food_number + '" size="5" /> <br/> </td> <td> <label for="sodium">sodium:</label> <input class="input-textarea" type="text" id="sodium" name="sodium_'
		+ food_number + '" size="5" /> <br/> <label for="total_carb">total carbs:</label> <input class="input-textarea" type="text" id="total_carb" name="total_carb_'
		+ food_number + '" size="5" /> <br/> <label for="dietary_fiber">dietary fiber:</label> <input class="input-textarea" type="text" id="dietary_fiber" name="dietary_fiber_'
		+ food_number + '" size="5" /> <br/> <label for="sugars">sugars:</label> <input class="input-textarea" type="text" id="sugars" name="sugars_'
		+ food_number + '" size="5" /> <br/> <label for="protein">protein:</label> <input class="input-textarea" type="text" id="protein" name="protein_'
		+ food_number + '" size="5" /> <br/> <label for="calcium">calcium:</label> <input class="input-textarea" type="text" id="calcium" name="calcium_'
		+ food_number + '" size="5" /> <br/> </td> <td> <label for="folic_acid">folic acid:</label> <input class="input-textarea" type="text" id="folic_acid" name="folic_acid_'
		+ food_number + '" size="5" /> <br/> <label for="iron">iron:</label> <input class="input-textarea" type="text" id="iron" name="iron_'
		+ food_number + '" size="5" /> <br/> <label for="magnesium">magnesium:</label> <input class="input-textarea" type="text" id="magnesium" name="magnesium_'
		+ food_number + '" size="5" /> <br/> <label for="niacin">niacin:</label> <input class="input-textarea" type="text" id="niacin" name="niacin_'
		+ food_number + '" size="5" /> <br/> <label for="potassium">potassium:</label> <input class="input-textarea" type="text" id="potassium" name="potassium_'
		+ food_number + '" size="5" /> <br/> <label for="riboflavin">riboflavin:</label> <input class="input-textarea" type="text" id="riboflavin" name="riboflavin_'
		+ food_number + '" size="5" /> <br/> </td> <td> <label for="vit_a">vitamin A</label> <input class="input-textarea" type="text" id="vit_a" name="vit_a_'
		+ food_number + '" size="5" /> <br/> <label for="vit_b6">vitamin B6</label> <input class="input-textarea" type="text" id="vit_b6" name="vit_b6_'
		+ food_number + '" size="5" /> <br/> <label for="vit_b12">vitamin B12</label> <input class="input-textarea" type="text" id="vit_b12" name="vit_b12_'
		+ food_number + '" size="5" /> <br/> <label for="vit_c">vitamin C</label> <input class="input-textarea" type="text" id="vit_c" name="vit_c_'
		+ food_number + '" size="5" /> <br/> <label for="vit_d">vitamin D</label> <input class="input-textarea" type="text" id="vit_d" name="vit_d_'
		+ food_number + '" size="5" /> <br/> <label for="vit_e">vitamin E</label> <input class="input-textarea" type="text" id="vit_e" name="vit_e_'
		+ food_number + '" size="5" /> <br/> <label for="zinc">zinc:</label> <input class="input-textarea" type="text" id="zinc" name="zinc_'
		+ food_number + '" size="5" /> </td></tr> </table> <hr/>');
		// Increment food_number
        ++food_number;
		// Add height to sidebar
		var height = $('.page-wrap').height();
		$('.sidebar').css({ 'height': height });
	});

});