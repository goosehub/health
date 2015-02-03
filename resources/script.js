var food_number = 2;

$(document).ready(function()
{

// Add Food Form
	$('#add_food_form').click( function(){
        // Large HTML appended below
		$('#food-forms-cnt').append('<label for="food_name">Food name:</label> <input class="input-textarea" type="text" id="food_name" name="food_name['
		+ food_number + ']"/> | <label for="serving_size">Number of serving sizes:</label> <input class="input-textarea" type="text" id="serving_size" name="serving_size['
		+ food_number + ']"/> <br/> <label for="save_as_food">Save this food for later use:</label> <input class="input-textarea"type="checkbox" size="20" id="save_as_food" name="save_as_food['
		+ food_number + ']"/> <p><strong>Type of Food (Pick all that apply):</strong></p> <label for="food_type_Vegetable">Vegetable:</label> <input class="input-textarea" type="radio" id="food_type_Vegetable" class="food_type"name="food_type_Vegetable['
		+ food_number + ']" /> | <label for="food_type_Fruit">Fruit:</label> <input class="input-textarea" type="radio" id="food_type_Fruit" class="food_type"name="food_type_Fruit['
		+ food_number + ']" /> | <label for="food_type_Protein">Protein:</label> <input class="input-textarea" type="radio" id="food_type_Protein" class="food_type"name="food_type_Protein['
		+ food_number + ']" /> | <label for="food_type_Dairy">Dairy:</label> <input class="input-textarea" type="radio" id="food_type_Dairy" class="food_type"name="food_type_Dairy['
		+ food_number + ']" /> | <label for="food_type_Fats">Fats:</label> <input class="input-textarea" type="radio" id="food_type_Fats" class="food_type"name="food_type_Fats['
		+ food_number + ']" /> | <label for="food_type_Grain">Grain:</label> <input class="input-textarea" type="radio" id="food_type_Grain" class="food_type"name="food_type_Grain['
		+ food_number + ']" /> | <label for="food_type_Other">Other:</label> <input class="input-textarea" type="radio" id="food_type_Other" class="food_type"name="food_type_Other['
		+ food_number + ']" /> </select> <p><strong>Below, enter the information for one serving size</strong></p> <table> <tr><td> <label for="calories">calories:</label> <input class="input-textarea" type="text" id="calories" name="calories['
		+ food_number + ']" size="5" /> <br/> <label for="calories_fat">calories from fat:</label> <input class="input-textarea" type="text" id="calories_fat" name="calories_fat['
		+ food_number + ']" size="5" /> <br/> <label for="total_fat">total fat:</label> <input class="input-textarea" type="text" id="total_fat" name="total_fat['
		+ food_number + ']" size="5" /> <br/> <label for="saturated_fat">saturated fat:</label> <input class="input-textarea" type="text" id="saturated_fat" name="saturated_fat['
		+ food_number + ']" size="5" /> <br/> <label for="trans_fat">trans fat:</label> <input class="input-textarea" type="text" id="trans_fat" name="trans_fat['
		+ food_number + ']" size="5" /> <br/> <label for="cholesterol">cholesterol:</label> <input class="input-textarea" type="text" id="cholesterol" name="cholesterol['
		+ food_number + ']" size="5" /> <br/> </td> <td> <label for="sodium">sodium:</label> <input class="input-textarea" type="text" id="sodium" name="sodium['
		+ food_number + ']" size="5" /> <br/> <label for="total_carb">total carbs:</label> <input class="input-textarea" type="text" id="total_carb" name="total_carb['
		+ food_number + ']" size="5" /> <br/> <label for="dietary_fiber">dietary fiber:</label> <input class="input-textarea" type="text" id="dietary_fiber" name="dietary_fiber['
		+ food_number + ']" size="5" /> <br/> <label for="sugars">sugars:</label> <input class="input-textarea" type="text" id="sugars" name="sugars['
		+ food_number + ']" size="5" /> <br/> <label for="protein">protein:</label> <input class="input-textarea" type="text" id="protein" name="protein['
		+ food_number + ']" size="5" /> <br/> <label for="calcium">calcium:</label> <input class="input-textarea" type="text" id="calcium" name="calcium['
		+ food_number + ']" size="5" /> <br/> </td> <td> <label for="folic_acid">folic acid:</label> <input class="input-textarea" type="text" id="folic_acid" name="folic_acid['
		+ food_number + ']" size="5" /> <br/> <label for="iron">iron:</label> <input class="input-textarea" type="text" id="iron" name="iron['
		+ food_number + ']" size="5" /> <br/> <label for="magnesium">magnesium:</label> <input class="input-textarea" type="text" id="magnesium" name="magnesium['
		+ food_number + ']" size="5" /> <br/> <label for="niacin">niacin:</label> <input class="input-textarea" type="text" id="niacin" name="niacin['
		+ food_number + ']" size="5" /> <br/> <label for="potassium">potassium:</label> <input class="input-textarea" type="text" id="potassium" name="potassium['
		+ food_number + ']" size="5" /> <br/> <label for="riboflavin">riboflavin:</label> <input class="input-textarea" type="text" id="riboflavin" name="riboflavin['
		+ food_number + ']" size="5" /> <br/> </td> <td> <label for="vit_a">vitamin A</label> <input class="input-textarea" type="text" id="vit_a" name="vit_a['
		+ food_number + ']" size="5" /> <br/> <label for="vit_b6">vitamin B6</label> <input class="input-textarea" type="text" id="vit_b6" name="vit_b6['
		+ food_number + ']" size="5" /> <br/> <label for="vit_b12">vitamin B12</label> <input class="input-textarea" type="text" id="vit_b12" name="vit_b12['
		+ food_number + ']" size="5" /> <br/> <label for="vit_c">vitamin C</label> <input class="input-textarea" type="text" id="vit_c" name="vit_c['
		+ food_number + ']" size="5" /> <br/> <label for="vit_d">vitamin D</label> <input class="input-textarea" type="text" id="vit_d" name="vit_d['
		+ food_number + ']" size="5" /> <br/> <label for="vit_e">vitamin E</label> <input class="input-textarea" type="text" id="vit_e" name="vit_e['
		+ food_number + ']" size="5" /> <br/> <label for="zinc">zinc:</label> <input class="input-textarea" type="text" id="zinc" name="zinc['
		+ food_number + ']" size="5" /> </td></tr> </table> <hr/>');
		// Increment food_number
        ++food_number;
	});

});