
   $(function() {
    $('#state_c').change(function() {

		var selectedcities=[];
		
		var states = '';
		
		 $('#city_c :selected').each(function(citykey,selected){
		     selectedcities.push($(selected).val());
		
		    });

	    	$('#state_c :selected').each(function(i, selected){ 
	 			states += $(selected).val()+',';
	 		});
	 		if(states == ''){
	 			$('#city_c').empty();
	 			$('#pin_c').empty();
	 		}
	 		else{
	 			
			$('#city_c').empty();
			// Using the core $.ajax() method
			$.ajax({
			 
			    // The URL for the request
			    url: "service/pincode.php",
			 
			    // The data to send (will be converted to a query string)
			    data: {
			        state: states
			    },
			 
			    // Whether this is a POST or GET request
			    type: "GET",
			 
			    // The type of data we expect back
			    dataType : "json",
			})
			  // Code to run if the request succeeds (is done);
			  // The response is passed to the function
			  .done(function( jsoncity ) {
			  	
			  	
			
			    	
			  		$.each( jsoncity, function( citykey, pinobj ) {	
			  	
			
			  		  		
			  		  		$('#city_c').append("<option value=\"" + citykey + "\">" + citykey + "</option>");
			  		  		
	
			  		});
					 $.each(selectedcities,function(selcitykey,selected){
					 	//console.log(selected);
					 	$("#city_c option[value='" + selected + "']").attr("selected","selected");
					 		
					 });
					  		
	  		
	  				//console.log($(selected).val());
	  			
			
	
					$( "#city_c" ).trigger( "change" ); 		  		
			  		
			     
			  })
			  // Code to run if the request fails; the raw request and
		  // status codes are passed to the function
		  .fail(function( xhr, status, errorThrown ) {
		  	
		    console.log( "Error: " + errorThrown );
		    console.log( "Status: " + status );
		  })
	     	
     	
     }
     	
    }); 
});



$(function() {
    $('#city_c').change(function() {
    	
  		var selectedpin= [];
			 $('#pin_c :selected').each(function(pinkey,selected){
			     selectedpin.push($(selected).val());
			    });
				
				$('#pin_c').empty();
				

    	
    	var cities = '';
    	
    	$('#city_c :selected').each(function(j, selected){ 
    		cities += $(selected).val()+',';
    	
    	});
    	
    	if(cities == ''){
    		$('#pin_c').empty(); 
    		
    	}
    	else{
		// Using the core $.ajax() method
		$.ajax({
		 
		    // The URL for the request
		    url: "service/pincode.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {
		        city: cities
		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
		 
		    // The type of data we expect back
		    dataType : "json",
		  // Code to run if the request succeeds (is done);
		  // The response is passed to the function
		})
		  .done(function( jsonpin ) {
    	
	
		  		  	$.each(jsonpin,function(pinkey,pinval){
		  		  		//console.log(pinval);
		  		  		$('#pin_c').append("<option value=\"" + pinval + "\">" + pinval + "</option>");
		  		  		
		   		  	});
		  		  

			  $.each(selectedpin,function(selpinkey,selected){
		 	//console.log(selected);
		 	$("#pin_c option[value='" + selected + "']").attr("selected","selected");
		 		
			 });		  		
			     
		  })
		  // Code to run if the request fails; the raw request and
	  // status codes are passed to the function
	  .fail(function( xhr, status, errorThrown ) {
	  	
	    console.log( "Error: " + errorThrown );
	    console.log( "Status: " + status );
	  })    	
    	
    	
   }  	
   
    }); 
});


// for edit section of region module
$(document).ready(function (){
var len = $("select[name='state_c[]'] option:selected").length;	

if(len <= 0){	
	$('#city_c').empty();
	$('#pin_c').empty();

	
}
else{
	
	 $( "#state_c" ).trigger( "change" );
	 /*
var selectedcities=[];
 $('#city_c :selected').each(function(citykey,selected){
     selectedcities.push($(selected).val());

    });

    
 var selectedpin= [];
 $('#pin_c :selected').each(function(pinkey,selected){
     selectedpin.push($(selected).val());
    });    

 $( "#state_c" ).trigger( "change" );  
  

 
 //console.log(selectedcities);
 
 $.each(selectedcities,function(selcitykey,selected){
 	//console.log(selected);
 	$("#city_c option[value='" + selected + "']").attr("selected","selected");
 		
 });
  $( "#city_c" ).trigger( "change" ); 
  $.each(selectedpin,function(selpinkey,selected){
 	//console.log(selected);
 	$("#pin_c option[value='" + selected + "']").attr("selected","selected");
 		
 }); 	*/
	
}
	
	
	
	
	
	
	
	
	 
	
});
