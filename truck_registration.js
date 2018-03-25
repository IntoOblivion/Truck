$("document").ready(function(){
	
	$("#truck_make").blur(function(){
		var truck_make_value = truck_make.value
		var truck_model_options = document.getElementById('truck_model');
		var truck_model_Array= new Array();
		var truck_models = document.getElementById('truck_model');
		for (i = 0; i < truck_models.options.length; i++) {//i was originally 0
			truck_model_Array[i] = truck_models.options[i].value;
			window.alert(truck_model_Array[i]);
		}
		
		$one = $('.truck_model option[value="FH"]');
		$two = $('.truck_model option[value="FH16"]');
		$three = $('.truck_model option[value="R200"]');
		$four = $('.truck_model option[value="R350"]');
		$five = $('.truck_model option[value="ACTROSS"]');
		
		if(truck_make_value == 'VOLVO'){
			$three.hide();
			$four.hide();
			$five.hide();
		}
	});

	
});