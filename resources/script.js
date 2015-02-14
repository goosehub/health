var food_number = 1;

$(document).ready(function()
{

// Add Food Form
	$('#add_food_form').click( function(){
        // Large HTML appended below
		$('#food-forms-cnt').append('<label for="food_name">Food name:</label> <input class="input-textarea" type="text" id="food_name" name="food_name['
		+ ']"/> | <label for="serving_size">Number of serving sizes:</label> <input class="input-textarea" type="text" id="serving_size" name="serving_size['
		+ ']"/> <br/> <label for="save_as_food">Save this food for later use:</label> <input class="input-textarea"type="checkbox" size="20" id="save_as_food" name="save_as_food['
		+ food_number + ']"/> <p><strong>Type of Food (Pick all that apply):</strong></p> <label for="food_type_vegetable">Vegetable:</label> <input class="input-textarea" type="radio" id="food_type_vegetable" class="food_type"name="food_type_vegetable['
		+ food_number + ']" /> | <label for="food_type_fruit">Fruit:</label> <input class="input-textarea" type="radio" id="food_type_fruit" class="food_type"name="food_type_fruit['
		+ food_number + ']" /> | <label for="food_type_protein">Protein:</label> <input class="input-textarea" type="radio" id="food_type_protein" class="food_type"name="food_type_protein['
		+ food_number + ']" /> | <label for="food_type_dairy">Dairy:</label> <input class="input-textarea" type="radio" id="food_type_dairy" class="food_type"name="food_type_dairy['
		+ food_number + ']" /> | <label for="food_type_fats">Fats:</label> <input class="input-textarea" type="radio" id="food_type_fats" class="food_type"name="food_type_fats['
		+ food_number + ']" /> | <label for="food_type_grain">Grain:</label> <input class="input-textarea" type="radio" id="food_type_grain" class="food_type"name="food_type_grain['
		+ food_number + ']" /> | <label for="food_type_other">Other:</label> <input class="input-textarea" type="radio" id="food_type_other" class="food_type"name="food_type_other['
		+ food_number + ']" /> </select> <p><strong>Below, enter the information for one serving size</strong></p> <table> <tr><td> <label for="calories">calories:</label> <input class="input-textarea" type="text" id="calories" name="calories['
		+ ']" size="5" /> <br/> <label for="calories_fat">calories from fat:</label> <input class="input-textarea" type="text" id="calories_fat" name="calories_fat['
		+ ']" size="5" /> <br/> <label for="total_fat">total fat:</label> <input class="input-textarea" type="text" id="total_fat" name="total_fat['
		+ ']" size="5" /> <br/> <label for="saturated_fat">saturated fat:</label> <input class="input-textarea" type="text" id="saturated_fat" name="saturated_fat['
		+ ']" size="5" /> <br/> <label for="trans_fat">trans fat:</label> <input class="input-textarea" type="text" id="trans_fat" name="trans_fat['
		+ ']" size="5" /> <br/> <label for="cholesterol">cholesterol:</label> <input class="input-textarea" type="text" id="cholesterol" name="cholesterol['
		+ ']" size="5" /> <br/> </td> <td> <label for="sodium">sodium:</label> <input class="input-textarea" type="text" id="sodium" name="sodium['
		+ ']" size="5" /> <br/> <label for="total_carb">total carbs:</label> <input class="input-textarea" type="text" id="total_carb" name="total_carb['
		+ ']" size="5" /> <br/> <label for="dietary_fiber">dietary fiber:</label> <input class="input-textarea" type="text" id="dietary_fiber" name="dietary_fiber['
		+ ']" size="5" /> <br/> <label for="sugars">sugars:</label> <input class="input-textarea" type="text" id="sugars" name="sugars['
		+ ']" size="5" /> <br/> <label for="protein">protein:</label> <input class="input-textarea" type="text" id="protein" name="protein['
		+ ']" size="5" /> <br/> <label for="calcium">calcium:</label> <input class="input-textarea" type="text" id="calcium" name="calcium['
		+ ']" size="5" /> <br/> </td> <td> <label for="folic_acid">folic acid:</label> <input class="input-textarea" type="text" id="folic_acid" name="folic_acid['
		+ ']" size="5" /> <br/> <label for="iron">iron:</label> <input class="input-textarea" type="text" id="iron" name="iron['
		+ ']" size="5" /> <br/> <label for="magnesium">magnesium:</label> <input class="input-textarea" type="text" id="magnesium" name="magnesium['
		+ ']" size="5" /> <br/> <label for="niacin">niacin:</label> <input class="input-textarea" type="text" id="niacin" name="niacin['
		+ ']" size="5" /> <br/> <label for="potassium">potassium:</label> <input class="input-textarea" type="text" id="potassium" name="potassium['
		+ ']" size="5" /> <br/> <label for="riboflavin">riboflavin:</label> <input class="input-textarea" type="text" id="riboflavin" name="riboflavin['
		+ ']" size="5" /> <br/> </td> <td> <label for="vit_a">vitamin A</label> <input class="input-textarea" type="text" id="vit_a" name="vit_a['
		+ ']" size="5" /> <br/> <label for="vit_b6">vitamin B6</label> <input class="input-textarea" type="text" id="vit_b6" name="vit_b6['
		+ ']" size="5" /> <br/> <label for="vit_b12">vitamin B12</label> <input class="input-textarea" type="text" id="vit_b12" name="vit_b12['
		+ ']" size="5" /> <br/> <label for="vit_c">vitamin C</label> <input class="input-textarea" type="text" id="vit_c" name="vit_c['
		+ ']" size="5" /> <br/> <label for="vit_d">vitamin D</label> <input class="input-textarea" type="text" id="vit_d" name="vit_d['
		+ ']" size="5" /> <br/> <label for="vit_e">vitamin E</label> <input class="input-textarea" type="text" id="vit_e" name="vit_e['
		+ ']" size="5" /> <br/> <label for="zinc">zinc:</label> <input class="input-textarea" type="text" id="zinc" name="zinc['
		+ ']" size="5" /> </td></tr> </table> <hr/>');
		// Increment food_number
        ++food_number;
	});


// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var food_input = $('#food_search').val();
	if (food_input.length > 0) {
	    $.ajax(
	    {
	        url: '../../resources/ajax/auto_complete.php',
	        type: 'POST',
	        data: {food_input:food_input},
	        cache: false,
	        success: function(data)
	        {
				$('#food_search_list').show();
				$('#food_search_list').html(data);
	        }
	    });
	} else {
		$('#food_search_list').hide();
	}
}

$('#food_search').keyup( function(){
	autocomplet();
});

// set_item : this function will be executed when we select an item
function set_item(item) {
	$('#food_search').val(item);
	$('#food_search_list').hide();
}

$('body').on('click', '.food_search_item', function(){
	$('#food_search').val('Not working yet');
});

}); //End document