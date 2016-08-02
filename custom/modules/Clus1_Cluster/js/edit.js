
  $(function() {
    $('#parent_category_c').change(function() {

		var selectedcategory=[];
		
		var parent_category = '';
		
		 $('#category_c :selected').each(function(citykey,selected){
		     selectedcategory.push($(selected).val());
		
		    });

	    	
	 		parent_category += $('#parent_category_c :selected').val();
	 		
	 		if(parent_category == ''){
	 			$('#category_c').empty();
	 			$('#subcategory_c').empty();
	 		}
	 		else{
	 			
			$('#category_c').empty();
			// Using the core $.ajax() method
			$.ajax({
			 
			    // The URL for the request
			    url: "service/category.php",
			 
			    // The data to send (will be converted to a query string)
			    data: {
			        parent_category: parent_category
			    },
			 
			    // Whether this is a POST or GET request
			    type: "GET",
			 
			    // The type of data we expect back
			    dataType : "json",
			})
			  // Code to run if the request succeeds (is done);
			  // The response is passed to the function
			  .done(function( jsoncategory) {
			  	
			  	
			
			    	
			  		$.each( jsoncategory, function( categorykey, subCatobj ) {	
			  	
			
			  		  		
			  		  		$('#category_c').append("<option value=\"" + categorykey + "\">" + categorykey + "</option>");
			  		  		
	
			  		});
					 $.each(selectedcategory,function(selcategorykey,selected){
					 	//console.log(selected);
					 	$("#category_c option[value='" + selected + "']").attr("selected","selected");
					 		
					 });
					  		
	  		
	  				//console.log($(selected).val());
	  			
			
	
					$( "#category_c" ).trigger( "change" ); 		  		
			  		
			     
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
    $('#category_c').change(function() {
    	
  		var selected_sub_cat= [];
			 $('#subcategory_c :selected').each(function(pinkey,selected){
			     selected_sub_cat.push($(selected).val());
			    });
				
				$('#subcategory_c').empty();
				

    	
    	var category = '';
    	
    	$('#category_c :selected').each(function(j, selected){ 
    		category += $(selected).val()+',';
    	
    	});
    	
    	if(category == ''){
    		$('#subcategory_c').empty(); 
    		
    	}
    	else{
		// Using the core $.ajax() method
		$.ajax({
		 
		    // The URL for the request
		    url: "service/category.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {
		        category: category
		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
		 
		    // The type of data we expect back
		    dataType : "json",
		  // Code to run if the request succeeds (is done);
		  // The response is passed to the function
		})
		  .done(function( json_sub_category ) {
    	
	
		  		  	$.each(json_sub_category,function(sub_cat_key,sub_cat_val){
		  		  		//console.log(pinval);
		  		  		$('#subcategory_c').append("<option value=\"" + sub_cat_val + "\">" + sub_cat_val + "</option>");
		  		  		
		   		  	});
		  		  

			  $.each(selected_sub_cat,function(sel_sub_cat_key,selected){
		 	//console.log(selected);
		 	$("#subcategory_c option[value='" + selected + "']").attr("selected","selected");
		 		
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


	var len = $("select[name='parent_category_c'] option:selected").length;	
	
	if(len <= 0){	
		$('#category_c').empty();
		$('#subcategory_c').empty();	
	}
	else{
		 $( "#parent_category_c" ).trigger( "change" );	
	} 
	
});