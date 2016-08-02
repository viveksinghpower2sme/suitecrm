// for edit section of region module

function check_custom_data(action)
{
	var pincode = $("#postcode_c").val();
	if(pincode != ''){
			$.ajax({
		 
		    // The URL for the request
		    url: "service/pincode.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {
		        pin: pincode
		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
			
			async: false,
		 
		    // The type of data we expect back
		    dataType : "json",
		  // Code to run if the request succeeds (is done);
		  // The response is passed to the function
		})
		  .done(function( jsonregion ) {
		  	if(jQuery.isEmptyObject( jsonregion ))
		  	{
		  		$("#postcode_c").val('');
		  		$("#postcode_c").focus();
		  		alert('No Region found for this Pincode!Kindly choose valid Pincode');
				return false;

		  	}
		  	else{
		  		
	    		$("#rgn_region_fp_event_locationsrgn_region_ida").val(jsonregion.id);
	    		$("#rgn_region_fp_event_locations_name").val(jsonregion.name);
    		 	$( "input[name='state_c']" ).val(jsonregion.state);
    		 	$( "input[name='city_c']" ).val(jsonregion.district);
		$( "input[name='country_c']" ).val(jsonregion.country);

    		}	
			     
		  })
		  // Code to run if the request fails; the raw request and
	  // status codes are passed to the function
	  .fail(function( xhr, status, errorThrown ) {
	  	
	    console.log( "Error: " + errorThrown );
	    console.log( "Status: " + status );
	  })    
		
	}
		
		// validate TIN and ECC no
		var tinno = $('#tin_no_c').val();
		var eccno = $('#ecc_no_c').val();

		if(tinno != '' && !checktin(tinno)){
				alert('Kindly fill correct TIN no');
				$('#tin_no_c').val('');
				$('#tin_no_c').focus();
				return false;
		}
		if(eccno != '' && !checkecc(eccno)){
						alert('Kindly fill correct ECC no');
							$('#ecc_no_c').val('');
							$('#ecc_no_c').focus();
				return false;
		}
		
		/*	var reason = $("#reason_c  option:selected").val();
				if(tinno == '' && reason == ''){
						
						alert('Kindly choose reason for non availability of TIN'+reason);
							$('#reason_c').focus();
				return false;
		}*/
			
    return check_form('EditView');
	
}
function checktin(tin){
	
		if(tin == undefined || tin == '')
		{
					return true;
		}
		tin.toString();
		tin = tin.toUpperCase();
		if(tin.length != 11)
        {
            return false;
        }

        if( !((tin[0]>=0 && tin[0]<=9) && (tin[1]>=0 && tin[1]<=9) && (tin[2]>=0 && tin[2]<=9) && (tin[3]>=0 && tin[3]<=9) && (tin[4]>=0 && tin[4]<=9) && (tin[5]>=0 && tin[5]<=9) && (tin[6]>=0 && tin[6]<=9) && (tin[7]>=0 && tin[7]<=9) && (tin[8]>=0 && tin[8]<=9) && (tin[9]>=0 && tin[9]<=9) && (tin[10]>=0 && tin[10]<=9))) 
        {
            return false;
        }

        return true;
}


function checkecc(ecc){
	
		if(ecc == undefined || ecc == '')
		{
					return true;
		}
	
		ecc.toString();
		ecc = ecc.toUpperCase();
		if(ecc.length != 15)
        {
            return false;
        }

        
        if( !(ecc[3]=='A' || ecc[3]=='B' || ecc[3]=='C' || ecc[3]=='F' || ecc[3]=='G' || ecc[3]=='H' || ecc[3]=='L' || ecc[3]=='J' || ecc[3]=='P' || ecc[3]=='T' || ecc[3]=='K' ))
        {
            return false;
        }
        if( !((ecc[0]>='A' && ecc[0]<='Z') && (ecc[1]>='A' && ecc[1]<='Z') && (ecc[2]>='A' && ecc[2]<='Z') && (ecc[3]>='A' && ecc[3]<='Z') && (ecc[4]>='A' && ecc[4]<='Z'))) 

        {
            return false;
        }
        if( !((ecc[5]>=0 && ecc[5]<=9) && (ecc[6]>=0 && ecc[6]<=9) && (ecc[7]>=0 && ecc[7]<=9) && (ecc[8]>=0 && ecc[8]<=9) )) 

        {
            return false;
        }
        if( !((ecc[9]>='A' && ecc[9]<='Z'))) 

        {
            return false;
        }
        //-----------pan check till now
        if( !((ecc[10]=='X' && ecc[11]=='D') || (ecc[10]=='X' && ecc[11]=='M'))) 

        {
            return false;
        }
        if( !((ecc[12]==0 && ecc[13]==0 && ecc[14]==1) || (ecc[12]==0 && ecc[13]==0 && ecc[14]==2) || (ecc[12]==0 && ecc[13]==0 && ecc[14]==3) )) 

        {
            return false;
        }
        return true;
}



$(document).ready(function (){
	
	hideAddressCode();
	resettin();
	resetreason();
	
	function hideAddressCode()
	{
 	if($('#name').val() ==''){
				 $('#name').hide();
 
		}
		$("#name").prop("readonly", true);
	}
	function resettin()
	{
		$("#reason_c").change(function(){
		{
			
					if($("#reason_c  option:selected").val() != '')
					{
							$('#tin_no_c').val('');	
					}
			}
		});
	}

	function resetreason()
	{
		$("#tin_no_c").change(function(){
		{
					if(	$("#tin_no_c").val() != '')
					{
						$('#reason_c').val('');
					}
			}	
		});
	}

	$("#rgn_region_fp_event_locations_name").attr('readonly',true);
	$("#btn_rgn_region_fp_event_locations_name").hide();
	$("#btn_clr_rgn_region_fp_event_locations_name").hide();
	$( "input[name='state_c']" ).attr('readonly',true);
    $( "input[name='city_c']" ).attr('readonly',true);
        
    // $("#postcode_c").change(function(){
	    // $( "input[name='state_c']" ).val('');
	    // $( "input[name='city_c']" ).val('');
		// $("#rgn_region_fp_event_locations_name").val('');
		// check_custom_data("1");
//              
         // });
	
	
});
/*
$(function() {
	$("#address_postalcode").focusout(function(){
		)


});
$(function() { 
        $('#SAVE_FOOTER').click(function(e) {
  
return false;

        });
});

$(document).ready(function(){
	$('#SAVE_FOOTER').attr('onClick','');
	
	
	
})
$(function() { 
        $('#SAVE_FOOTER').click(function(e) {
  
		var _form = document.getElementById('EditView'); 
		var _onclick=(function(){_form.action.value='Savereturn check_custom_data();'}());
		 if(_onclick!==false) _form.submit();

        });
});


$('#SAVE_FOOTER').click(function(event) { 
	alert('hi');
    if ( $("#address_postalcode").val()==''){
        event.preventDefault();
        $('form#userForm .button').attr('onclick','').unbind('click');
    }   
});*/
