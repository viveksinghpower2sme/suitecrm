var jsondata = Object;
$.getJSON( "pincode.json", function( data ) {
	jsondata = data;
    	
   });
   
$(function() {
    $('#state_c').change(function() {

    	$('#city_c').empty();
    	$('#pin_c').empty();
    	$('#state_c :selected').each(function(i, selected){ 
  		$.each( jsondata, function( statekey, stateobj ) {	
  	
  		  if(statekey == $(selected).val()){
  		  	
  		  	$.each(stateobj,function(citykey,pinobj){
  		  		
  		  		$('#city_c').append("<option value=\"" + citykey + "\">" + citykey + "</option>");
  		  		
   		  	});
  		  }
  		  
    
  		});
  		//console.log($(selected).val());
  		
		
		});
    	
    }); 
});

$(function() {
    $('#city_c').change(function() {
    	
    	$('#pin_c').empty();
    	
    	$('#city_c :selected').each(function(j, selected){ 
  		$.each( jsondata, function( statekey, stateobj ) {	
	  		$.each( stateobj, function( citykey, cityobj ) {
	  				
	  	
	  		  if(citykey == $(selected).val()){
	  		  	console.log($(selected).val()+"<==>"+ citykey);
	  		  	$.each(cityobj.zip,function(pinkey,pinval){
	  		  		console.log(pinval);
	  		  		$('#pin_c').append("<option value=\"" + pinval + "\">" + pinval + "</option>");
	  		  		
	   		  	});
	  		  }
	  	});
    
  		});
  		//console.log($(selected).val());
  		
		
		});
    	
    }); 
});
