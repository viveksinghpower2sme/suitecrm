/* Description - It is handling all the validations of Quote Module
@author:: Vivek Mohan Singh
@author:: Dinesh Jangid

*/

var came_from_total_margin=0;
var tliq;

function shippingAccountDetailsValidations(){
	addToValidate('EditView', 'address_code_c', 'text', true,'Address Code' );
	addToValidate('EditView', 'address1_c', 'text', true,'Address1' );
	addToValidate('EditView', 'postcode_c', 'text', true,'Postcode' );
	addToValidate('EditView', 'city_c', 'text', true,'City' );
	
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'ecc_no_c', 'text', true,'ECC No' );
	}
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'collectorate_c', 'text', true,'Collectorate' );
	}	
	
	addToValidate('EditView', 'state_c', 'text', true,'State' );
	addToValidate('EditView', 'country_c', 'text', true,'Country' );
	
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'range_c', 'text', true,'Range' );
	}
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'division_c', 'text', true,'Division' );
	}
}

function billingAccountDetailsValidations(){
	addToValidate('EditView', 'b_address_code_c', 'text', true,'Address Code' );
	addToValidate('EditView', 'b_address1_c', 'text', true,'Address1' );
	addToValidate('EditView', 'b_postcode_c', 'text', true,'Postcode' );
	addToValidate('EditView', 'b_city_c', 'text', true,'City' );
	
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'b_ecc_no_c', 'text', true,'ECC No' );
	}
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'b_collectorate_c', 'text', true,'Collectorate' );
	}
	
	addToValidate('EditView', 'b_state_c', 'text', true,'State' );
	addToValidate('EditView', 'b_country_c', 'text', true,'Country' );
	if($('#customer_taxation_preference_c').val()=='CST_Only' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'b_cst_no_c', 'text', true,'CST No' );
	}
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'b_range_c', 'text', true,'Range' );
	}
	if($('#customer_taxation_preference_c').val()=='Excise_And_VAT' || $('#customer_taxation_preference_c').val()=='Excise_And_CST')
	{
		addToValidate('EditView', 'b_division_c', 'text', true,'Division' );
	}
}



function fillBillingAccountDetails()
{
	var sId = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').attr('data-id-value');
	var bId = $('#fp_event_locations_aos_quotes_2fp_event_locations_ida').attr('data-id-value');
	var fieldArray= ['address_code_c','address1_c','postcode_c','city_c','tin_no_c','ecc_no_c','collectorate_c','address_type_c','address2_c','state_c','country_c','cst_no_c','range_c','division_c','tin_no_reasons_c'];
	$.each(fieldArray,function(i,o){
						$('#b_'+o).val('');						
					});		
	var billToAddressId = $('#fp_event_locations_aos_quotes_2fp_event_locations_ida').attr('data-id-value');

	
	if(sId!=bId)
	billingAccountDetailsValidations();	
	
	if(!billToAddressId) return true;
	var response='';
	$.ajax({
		 
		    // The URL for the request
		    url: "service/getLocationDetail.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {
		    	locId : billToAddressId
		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
		 
		    // The type of data we expect back
		    dataType : "json",

		    success : function(resp){
		    		response = resp['rfq_won_c'];
		    	
					$.each(fieldArray,function(i,o){
						
						console.log('o==='+o);
						
						if(o=='address_type_c')
						{
							$('#b_'+o+ ' option[value="' +resp[o]+'"]').attr("selected", "selected");
							$('#b_address_type_c').val(resp[o]);
						
							
							if($('#b_address_type_c').val()!='')
							{
								$('#b_address_type_c').attr("disabled", true);
							}
							$('#EditView').prepend('<input type="hidden" name="b_address_type_c" value = "'+resp[o]+'">');
						
							
							
						}
						if(o=='tin_no_reasons_c')
						{
							$('#b_'+o+ ' option[value="' +resp[o]+'"]').attr("selected", "selected");
							$('#b_tin_no_reasons_c').val(resp[o]);
						}
						else						
						$('#b_'+o).val(resp[o]);					
						if(resp['rfq_won_c']=='1')
						{	
							
							if($('#b_'+o).val()!='')
							$('#b_'+o).attr('readonly', true);
						}
						else
						{
							$('#b_address_code_c').attr('readonly', true);
							$('#b_postcode_c').attr('readonly', true);
							$('#b_city_c').attr('readonly', true);
							$('#b_state_c').attr('readonly', true);
							$('#b_country_c').attr('readonly', true);
						}
						
					});
		    }
	})
	
	
	if(sId==bId)
	{
				
				var fieldArray= ['address_code_c','address1_c','postcode_c','city_c','tin_no_c','ecc_no_c','collectorate_c','address_type_c','address2_c','state_c','country_c','cst_no_c','range_c','division_c','tin_no_reasons_c'];
				$.each(fieldArray,function(i,o)
				{
					$('#b_'+o).attr('readonly', true);						
				});
				
				$('#b_address_type_c').change(function(){
					$('#b_address_type_c option[value="' +''+'"]').attr("selected", "selected");
				});
				$('#b_tin_no_reasons_c').change(function(){
					$('#b_tin_no_reasons_c option[value="' +''+'"]').attr("selected", "selected");
				});		
	}
	
	else{
			if(response=='1')
			{
						if($('#b_tin_no_c').val()=='')
						{
							$('#b_tin_no_c').attr('readonly', false);
						}
					
			}	
			
			BillToTinNoDropdown();
	}
	
}
var addtype='';
function fillShippingAccountDetails()
{
	

	var fieldArray= ['address_code_c','address1_c','postcode_c','city_c','tin_no_c','ecc_no_c','collectorate_c','address_type_c','address2_c','state_c','country_c','cst_no_c','range_c','division_c','tin_no_reasons_c'];
	
	$.each(fieldArray,function(i,o){
						$('#'+o).val('');						
					});	
	
	var shipToAddressId = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').attr('data-id-value');	
	shippingAccountDetailsValidations();
	if(!shipToAddressId) return true;

	
	$.ajax({
		 
		    // The URL for the request
		    url: "service/getLocationDetail.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {
		    	locId : shipToAddressId
		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
		 
		    // The type of data we expect back
		    dataType : "json",

		    success : function(resp){
		    	
		    		
					$.each(fieldArray,function(i,o){
						
						if(o=='address_type_c')
						{
							
							$('#'+o+ ' option[value="' +resp[o]+'"]').attr("selected", "selected");
							$('#address_type_c').val(resp[o]);
							
							
							$('#EditView').prepend('<input type="hidden" name="address_type_c" value = "'+resp[o]+'">');
							
							$('#address_type_c').attr("disabled", true); 
						}
						if(o=='tin_no_reasons_c')
						{
							$('#'+o+ ' option[value="' +resp[o]+'"]').attr("selected", "selected");
							$('#tin_no_reasons_c').val(resp[o]);
						}
						else{
							
						$('#'+o).val(resp[o]);
						}	
									
						if(resp['rfq_won_c']=='1')
						{
							if($('#'+o).val()!='')
							{
								$('#'+o).attr('readonly', true);
							}
							
								
							
						}
						else
						{
							$('#address_code_c').attr('readonly', true);
							$('#postcode_c').attr('readonly', true);
							$('#city_c').attr('readonly', true);
							$('#state_c').attr('readonly', true);
							$('#country_c').attr('readonly', true);
						}
					});
					
					if(resp['rfq_won_c']=='1')
					{
						if($('#tin_no_c').val()=='')
						{
							$('#tin_no_c').attr('readonly', false);
						}
					
					}
					ShipToTinNoDropdown();
		    }
	})
	
}

function custom_open_popup_vendor(name,ida,val){
open_popup( "FP_Event_Locations", 
600, 
400, 
"&vend_vendor_fp_event_locations_2_name_advanced="+val+"&address_type_c_advanced[]=billing_address", 
true, 
false, 
{"call_back_function":"setProductReturn_vendor","form_name":"EditView","field_to_name_array":{"id":ida,"name":name}}, 
"single", 
true);


}

function setProductReturn_vendor(popupReplyData)
{
	var data1 
	set_return(popupReplyData);
	
	$.each(popupReplyData.name_to_value_array,function(k,v){
	 data1 =k.split('_').pop();
	
	});	
	vendortax(data1);
	
	totalPurchaseCost(data1);
	
	calculate_margPer_totalSalesValue_totalMarginPer(data1);
	
	calculatecustomertax(data1);
}
function custom_open_popup(){
open_popup( "FP_Event_Locations", 
600, 
400, 
"&contacts_fp_event_locations_1_name_advanced="+document.getElementById("billing_contact").value, 
true, 
false, 
{"call_back_function":"setProductReturn","form_name":"EditView","field_to_name_array":{"id":"fp_event_locations_aos_quotes_1fp_event_locations_ida","name":"fp_event_locations_aos_quotes_1_name"}}, 
"single", 
true);


}

function parse_Float_Custom(val)
{
	if(!val) return 0;
	val=val.toString();
	
	val = val.replace(/,/g,'');
	val = parseFloat(val);
	return val;
}

function PopulateCommodity()
{
	$.ajax({
         
            // The URL for the request
            url: "service/getVMDetails.php",
         
            // The data to send (will be converted to a query string)
            data: {
                
            },
         
            // Whether this is a POST or GET request
            type: "GET",
         	async: false,
            // The type of data we expect back
            dataType : "json",

            success : function(resp){
            	
            	csco=resp;
 
            	var tmp = $('#category_c').val();
            	$('#category_c').empty();
            	$('#category_c').append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");

            	$.each( csco, function( commodity, val ) {	
            		
		  			
		  		 	$('#category_c').append("<option  label=\""+commodity+"\" value=\""+commodity+"\">" + commodity + "</option>");

		  		});

		  			$('#category_c').val(tmp); 
            	
            }
    	})
}

function PopulateVM(k,lid1,cat1,scat1)
{
			var tmp=$('#vm_c_'+i).val();
			$.ajax({
	         
	            // The URL for the request
	            url: "service/getVMDetails.php",
	         
	            // The data to send (will be converted to a query string)
	            data: {
	                location : lid1,
	                category : cat1,
	                subcategory : scat1
	            },
	         
	            // Whether this is a POST or GET request
	            type: "GET",
	         	async: false,
	            // The type of data we expect back
	            dataType : "json",

	            success : function(resp1){
	            	var f1=0;
	            	$("#vm_c_"+k).empty();

	            	$.each( resp1, function( id, pass ) {	

			  			$('#vm_c_'+k).append("<option  label=\""+pass.userName+' ('+pass.firstName+')'+"\" value=\""+pass.userId+"\">" + pass.userName+' ('+pass.firstName+')' + "</option>");


			  		});
			  		$('#vm_c_'+k).val(tmp);
			  		vendorNameChange(k);
	            	
	            }
	    	})
}
function setProductReturn(popupReplyData){
	
	set_return(popupReplyData);
	 
	 customertaxpercentajaxcall();
	
	
	//=============================================================================
	
				var lid1 = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').val();
				var cat1 = $('#category_c').val();
			
				var scat1 ;
				
				var line_Items = $('#vmrfq_count').val();	
				if(line_Items > 0)
				{
					for(i=1;i<=line_Items;i++)
					{
						scat1 = $('#sub_commodity_c_'+i).val();
						
						if(scat1)
						PopulateVM(i,lid1,cat1,scat1);
					}
				}
		
	//=============================================================================
	$('#users_aos_quotes_2_name').val('');
	$('#users_aos_quotes_2users_ida').val('');
}

function checkPOFormat()
{
	if($('#rfq_state_c').val() == "po_awaiting")
	{
		
		if($('#filename_file').val()!='')
		{
			var file = $('#filename_file').val().toString();
			var res = file.split('.');
			var format = res[res.length-1];
		
			if(!(format == 'pdf' || format == 'jpg' || format == 'jpeg' || format == 'png'))
			{
				alert('Please upload a valid PO format.');
				return false;
			}
		}
		return true;	
	}
}

var final_scm_conf_margin;
function CheckMarginValue(){
	
	
	var margData = $('#finance_margin').val();
	margData = JSON.parse(margData);
	var a = margData['credit_days'];
	var credArray = a.split(',');
	console.log(credArray);
	var marg_diff = parse_Float_Custom($('#total_margin_percent_revenue_c').val()) - parse_Float_Custom(margData['finance_margin']);
	if(marg_diff < 0)
	{
		$('#final_scm_confirmation_status_c').val('finance_approval');
		return 'marg';
	}
	var flag=0;
	var lineitm3 = $('#vmrfq_count').val();
	for(var i=1;i<=lineitm3;i++)
	{
		var currday = parse_Float_Custom($('#vendor_credit_days_c_'+i).val());
		if((currday - credArray[i-1])<0)
		{
			flag=1;
			break;
		}
	}	
	if(flag==1)
	{
		$('#final_scm_confirmation_status_c').val('finance_approval');
		return 'cred';
	}
	
	$('#final_scm_confirmation_status_c').val('poso_creation');
	return 'poso';
	alert(marg_diff);
	
}

function syncSameBilltoShipto()
{	
	$('#b_address1_c').val($('#address1_c').val());
	$('#b_address2_c').val($('#address2_c').val());
	$('#b_tin_no_c').val($('#tin_no_c').val());
	$('#b_cst_no_c').val($('#cst_no_c').val());
	$('#b_ecc_no_c').val($('#ecc_no_c').val());
	$('#b_range_c').val($('#range_c').val());
	$('#b_collectorate_c').val($('#collectorate_c').val());
	$('#b_division_c').val($('#division_c').val());
	$('#b_address_type_c option:selected').attr('selected',true);
	$('#b_tin_no_reasons_c').val($('#tin_no_reasons_c').val());
	$('#b_tin_no_reasons_c option:selected').attr('selected',true);
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



function AlertlostRFQ()
{
	var lostrfqval = $('#lost_rfq_c option:selected').val();
	if(lostrfqval=='other')
	{
		if($('#lost_comments_c').val()=='')
		{
			alert('Please enter "Lost Comments"');
			$('#lost_comments_c').focus();
			return false;
		}
	}
}

function check_exp_deldate()
{	 var expectedDate = $('#expected_delivery_date_c').val();
	 var expDval;
   

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today =mm+'/'+dd+'/'+yyyy;
    
    var todayval= Date.parse(today);
	
	if(expectedDate!='')
	{
		expDval=Date.parse(expectedDate);
		if(expDval < todayval )
       	{
       		alert("Expected Delivery Date should not be past date");
            $('#expected_delivery_date_c').val('');
            $('#expected_delivery_date_c').focus();
            return false;
       	}
	}
	else {
        return true;
    }
}

function check_custom_data(action)
{
	var skipvalidations = false;
	if($('#lost_rfq_c').length > 0)
	{
		var lrfqval = $('#lost_rfq_c option:selected').val();
		if(lrfqval!='')
		{
			var alertval=true;
			alertval = AlertlostRFQ();
			
			if(alertval == false)
			return false;
			
			var rettval = confirm('Are you sure to lose RFQ?');
			if(rettval==true)
			{
				skipvalidations=true;
			}
			else {
				$('#lost_rfq_c option[value="' +''+'"]').attr("selected", "selected");
			}
		}	
	}
	if(skipvalidations==true)
	return true;
	
	if($('#rfq_state_c').val() == "final_scm_confirmation" || $('#rfq_state_c').val() == "goods_confirmation")
	{
		var expVal = true;
		expVal = check_exp_deldate();
		if(expVal==false)
		{
			return false;
		}
	}
	
	if($('#rfq_state_c').val() == "final_scm_confirmation")
	{
		var retval = CheckMarginValue();
		
		if(retval == 'marg')
		{
			var retval=confirm('Margin Change is -ve. RFQ will go to Finance Approval stage');
			if(retval==false)
			return false;
		}
		if(retval == 'cred')
		{
			var retval=confirm('One of the Vendor Credit Days has decreased. RFQ will go to Finance Approval stage');
			if(retval==false)
			return false;
		}
		
		
	}
	
	var line_Items = $('#vmrfq_count').val();
	
	
	if($('#rfq_state_c').val() == "po_awaiting")
	{
		
		if($('#filename_file').val()=='' && $('#filename_old a').text()=='')
		{
			
			alert('Please upload PO.');
			return false;
		}
		if($('#filename_file').val()!='')
		{	
			var file = $('#filename_file').val().toString();
			var res = file.split('.');
			var format = res[res.length-1];
		
			if(!(format == 'pdf' || format == 'jpg' || format == 'jpeg' || format == 'png'))
			{
				alert('Please upload a valid PO format.');
				return false;
			}
		}
	
	}
	
	if($('#rfq_state_c').val() == "account_creation")
	{
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
		
		var sId = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').attr('data-id-value');
		var bId = $('#fp_event_locations_aos_quotes_2fp_event_locations_ida').attr('data-id-value');	
		
		
		if($('#tin_no_c').val()=='')
		{	
			
			addToValidate('EditView', 'tin_no_reasons_c', 'enum', true,'Tin Number Unavailability Reasons');
		}
		else{
			custremoveFromValidate('EditView','tin_no_reasons_c');
		}
		
		if($('#b_tin_no_c').val()=='')
		{	
			var sId = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').attr('data-id-value');
			var bId = $('#fp_event_locations_aos_quotes_2fp_event_locations_ida').attr('data-id-value');			
			if(sId!=bId)
			addToValidate('EditView', 'b_tin_no_reasons_c', 'enum', true,'Tin Number Unavailability Reasons');
		}
		else{
			custremoveFromValidate('EditView','b_tin_no_reasons_c');
		}
		
		if(sId==bId)
		{
			syncSameBilltoShipto();
		}
	
	}
	
	
	if(line_Items > 0){
		for(i=1;i<=line_Items;i++){
			
			if($('#rfq_state_c').val() == "new")
			{


				if(document.getElementById('sku_sku_vmrfq_vmrfq_1_name_'+i)!=null)
				addToValidate(action,'sku_sku_vmrfq_vmrfq_1_name_'+i,'text',true,'Requested SKU');

				if(document.getElementById('requested_quantity_c_'+i)!=null)
				addToValidateMoreThan(action,'requested_quantity_c_'+i,'decimal',true,'Requested Quantity',0);
				
				custremoveFromValidate(action,'provided_quantity_c_'+i);
				custremoveFromValidate(action,'fp_event_locations_vmrfq_vmrfq_1_name_'+i);
				custremoveFromValidate(action,'purchase_cost_per_unit_c_'+i);
				custremoveFromValidate(action,'excise_per_unit_c_'+i);
				custremoveFromValidate(action,'freight_charges_c_'+i);
				custremoveFromValidate(action,'loading_charges_c_'+i);
				custremoveFromValidate(action,'professional_charges_c_'+i);
	
			}

			if($('#rfq_state_c').val() == "base_price")
			{
				if(document.getElementById('vend_vendor_vmrfq_vmrfq_1_name_'+i)!=null)
				addToValidate(action,'vend_vendor_vmrfq_vmrfq_1_name_'+i,'text',true,'Vendor');
				
				if(document.getElementById('provided_quantity_c_'+i)!=null)
				addToValidate(action,'provided_quantity_c_'+i,'decimal',true,'Provided Quantity');

				if(document.getElementById('vendor_tax_percent_c_'+i)!=null)
				addToValidateRange(action,'vendor_tax_percent_c_'+i,'decimal',true,'Vendor Tax Percent',0,100);	

				if(document.getElementById('freight_charges_c_'+i)!=null)
				if(document.getElementById('freight_charge_borne_by_c').checked)
				addToValidateMoreThan(action,'freight_charges_c_'+i,'decimal',true,'Freight Charges',0);
				
				var purchase_var = 'purchase_cost_per_unit_c_'+i;
		
				var vcredit_days_var = 'vendor_credit_days_c_'+i;
				
				var v_location = 'fp_event_locations_vmrfq_vmrfq_1_name_'+i;
				var v_tax_per = 'vendor_tax_percent_c_'+i;
				
				if(document.getElementById(purchase_var)!=null){
					addToValidateMoreThan(action, purchase_var, 'decimal', true,'Purchase Cost Per Unit',0);
				}
				if(document.getElementById(purchase_var)!=null){

					addToValidateRange(action, vcredit_days_var, 'int', true, 'Vendor Credit Days', 0, 120);
				}
				if(document.getElementById(v_location)!=null){

					addToValidate(action,v_location,'text',true,'Locations');
				}
				if(document.getElementById(v_tax_per)!=null){

					addToValidateRange(action, v_tax_per, 'decimal', true,'Vendor Tax Percent',0.01,100 );
				}
				if(document.getElementById('vendor_taxation_type_c_'+i)!=null)
				addToValidate(action, 'vendor_taxation_type_c_'+i, 'enum', true,'Vendor Taxation Type');
			}

			if($('#rfq_state_c').val() == "sales_quote_margin" || $('#rfq_state_c').val() == "sales_quote_price")
			{
				addToValidate(action, 'margin_percent_c_'+i, 'decimal', true,'Margin Percent');
			}
		}	
	}

	if(check_upto_date()){
		var chkform = check_form(action);
		
		if(chkform){
			$("#category_c").attr('disabled',false);
		}
		return chkform;
	}
	else{
		return false;
	}
}

function check_upto_date() { 
    var startDate = $('#goods_requirement_time_from_c').val();
    var endDate = $('#goods_requirement_time_upto_c').val(); 
    var startDateVal;
    var endDateVal; 

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today =mm+'/'+dd+'/'+yyyy;
    
    var todayval= Date.parse(today);

    
    if (startDate != '' && endDate != '') {
        startDateVal = Date.parse(startDate);
        endDateVal = Date.parse(endDate);
   
       	if(startDateVal < todayval )
       	{
       		alert("Goods Requirement Time Frame From should not be past date");
            $('#goods_requirement_time_from_c').val('');
            $('#goods_requirement_time_from_c').focus();
            return false;
       	}
       	if(endDateVal < todayval )
       	{
       		alert("Goods Requirement Time Frame Upto should not be past date");
            $('#goods_requirement_time_upto_c').val('');
            $('#goods_requirement_time_upto_c').focus();
            return false;
       	}
        if (endDateVal >= startDateVal ) {
            return true;
        } else {
        	
            alert("Time frame upto date should be greater than or equal to From date");
            $('#goods_requirement_time_upto_c').val('');
            $('#goods_requirement_time_upto_c').focus();
            return false;
        }
    } else {
        return true;
    }
}

function NBFCVisibility()
{	
	if($('#payment_method_c').val() == 'nbfc')
	{	console.log('abc');
		addToValidate('EditView', 'nbfc_partner_c', 'enum', true,'NBFC Partner');
		$('#nbfc_partner_c').attr("disabled", false);
	}
	else{
		custremoveFromValidate('EditView','nbfc_partner_c');
		clear_specific_error("nbfc_partner_c");
		$('#nbfc_partner_c').val('');
		$('#nbfc_partner_c').attr("disabled", true);
	}
}

var csco;


$(document).ready(function (){ 
	
	if($('#rfq_state_c').val()=="po_awaiting")
	{
		addToValidate('EditView', 'po_number_c', 'text', true,'PO Number');
	}
	if($('#rfq_state_c').val()=="account_creation")
	{
		
		$('#billing_account').attr('readonly', true);
		addToValidate('EditView', 'billing_account', 'text', true,'Account');
			
		fillShippingAccountDetails();
		
		fillBillingAccountDetails();
	
	}
	
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
	{
		addToValidate('EditView', 'expected_delivery_date_c', 'text', true,'Expected Delivery Date' );

		addToValidate('EditView', 'goods_confirmation_status_c', 'enum', true,'Goods Confirmation Status');
		if($('#goods_confirmation_status_c').val()=='rejected_by_scm')
		{
			addToValidate('EditView', 'good_cnf_rejec_comm_c', 'text', true,'Good Confirmation Comments' );
		}
		if(document.getElementById('freight_charge_borne_by_c').checked) 
		{
		 	addToValidateMoreThan('EditView', 'vendor_freight_charge_c', 'text', true,'Vendor Freight Charge(inclusive taxes)' , 0.0001);
		}
		else {
			$('#vendor_freight_charge_c').attr('readonly', true);
		}
		
		
	}
	if($('#rfq_state_c').val()=="finance_approval")
	{
			addToValidate('EditView', 'finance_status_c', 'enum', true,'Finance Status');
			if($('#finance_status_c').val()=='rejected_by_finance')
			{

				addToValidate('EditView', 'finance_rejec_comm_c', 'text', true,'Finance Comments' );
			}
	}
	
	if($('#rfq_state_c').val() == "sales_quote_price")
	{	
		setNBFCPartnerVisibility();
		addToValidate('EditView', 'price_status_c', 'text', true,'Price Status' );
		$('#btn_fp_event_locations_aos_quotes_2_name').css('visibility','hidden');
		$('#btn_clr_fp_event_locations_aos_quotes_2_name').css('visibility','hidden');
	}
	if($('#rfq_state_c').val() == "sales_quote_margin")
	{
	
		addToValidate('EditView', 'price_status_c', 'text', true,'Price Status' );
		addToValidate('EditView', 'mode_of_payment_c', 'enum', true,'Mode Of Payment' );
		addToValidate('EditView', 'mode_of_secured_business_c', 'enum', true,'Mode Of Secured Business' );
	}
	if($('#rfq_state_c').val()=="sales_quote_margin" || $('#rfq_state_c').val() == "sales_quote_price")
	{
			$('#fp_event_locations_aos_quotes_2_name').attr('readonly', true);
		$('#fp_event_locations_aos_quotes_1_name').attr('readonly', true);
		$('#btn_fp_event_locations_aos_quotes_1_name').css('visibility','hidden');
		$('#btn_clr_fp_event_locations_aos_quotes_1_name').css('visibility','hidden');
		
				
		
		addToValidate('EditView', 'total_sales_value_c', 'text', true,'Total Sales Value' );
		addToValidateRange('EditView', 'total_margin_c', 'text', true,'Total Margin %' ,-100 , 100);
		addToValidateRange('EditView', 'payment_c', 'text', true,'Payment %' ,0, 100);

		
		addToValidate('EditView', 'fp_event_locations_aos_quotes_2_name', 'text', true,'Bill To Address' );
		
		
		$('#total_margin_percent_revenue_c').attr('readonly', true);
	}

	if($('#rfq_state_c').val()=="new"){

		PopulateCommodity();
		
		NBFCVisibility();
		
		addToValidate('EditView', 'payment_method_c', 'enum', true,'Payment Method' );
		
		//-------------------------------------------------------------------
		 $('#btn_users_aos_quotes_2_name').css('visibility','hidden');
		 $('#btn_clr_users_aos_quotes_2_name').css('visibility','hidden');
		
		 $('#users_aos_quotes_2_name').attr('readonly', true);
		
		//--------------------------------------------------------------------
		
		$("#comments_c").attr("maxlength","150");

		$('#customer_tax_percent_c').attr('readonly', true);
		$('#fp_event_locations_aos_quotes_1_name').attr('readonly', true);
		$('#bank_bank_aos_quotes_name').attr('readonly', true);

		custremoveFromValidate('EditView','vendor_loading_charge_c');
		custremoveFromValidate('EditView','vendor_freight_charge_c');
	
		//------------by dinesh-----------------------------------
			var c_tax_p = $( "#customer_taxation_preference_c option:selected" ).val();
			$('#need_excise_exclusive_price_c').attr('onclick',"return true");

			if(c_tax_p == 'Excise_And_VAT' || c_tax_p == 'Excise_And_CST')
			{
				
				$('#need_excise_exclusive_price_c').attr('checked',true);
				$('#need_excise_exclusive_price_c').attr('onclick',"return false");
			}

		
			if(c_tax_p!='CST_Only' && c_tax_p!='Excise_And_CST')
			{
				
				$('#form_type_c_label').css('visibility','hidden');
				$('#form_type_c').css('visibility','hidden');
			
			}
		
			else
			{
				addToValidate('EditView', 'form_type_c', 'enum', true,'Form Type' );
			}
		//--------------------------------------------------------
		
	}	
	
	if($('#rfq_state_c').val()=="base_price")
	{
		setNBFCPartnerVisibility();
		$('#warehouse_address_c').attr('readonly', true);
		$('#fp_event_locations_aos_quotes_1_name').attr('readonly', true);
		$('#btn_fp_event_locations_aos_quotes_1_name').css('visibility','hidden');
		$('#btn_clr_fp_event_locations_aos_quotes_1_name').css('visibility','hidden');		
		
		$('#btn_users_aos_quotes_2_name').css('visibility','hidden');
		 $('#btn_clr_users_aos_quotes_2_name').css('visibility','hidden');
		 $('#users_aos_quotes_2_name').attr('readonly', true);
		if(document.getElementById('freight_charge_borne_by_c').checked) 
		{
		 	$('#vendor_loading_charge_c_label').css('visibility','visible');
			$('#vendor_loading_charge_c').css('visibility','visible');

			$('#vendor_freight_charge_c_label').css('visibility','visible');
			$('#vendor_freight_charge_c').css('visibility','visible');
		 	addToValidateMoreThan('EditView', 'vendor_freight_charge_c', 'decimal', true,'Vendor Freight Charge(inclusive taxes)' , 0.0001);
		}
		else
		{
			$('#vendor_freight_charge_c').attr('readonly', true);
		}
		
		addToValidateMoreThan('EditView', 'vendor_loading_charge_c', 'decimal', false,'Vendor Loading Charge(inclusive taxes)' , 0 );
		addToValidateMoreThan('EditView', 'professional_charge_c', 'decimal', false,'Professional Charge(inclusive taxes)' , 0 );
		addToValidateMoreThan('EditView', 'customer_loading_payment_c', 'decimal', false,'Customer Loading Payment' , 0 );
		addToValidateMoreThan('EditView', 'customer_loading_payment_c', 'decimal', false,'Customer Loading Payment' , 0 );
	}
})
function customertaxpercentajaxcall()
{	
	
	var loc_id = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').val();

	 	if(loc_id==""){$('#customer_tax_percent_c').val("");}
	 	var cat = $('#category_c').val();
	 	var tax1;
	 	if($('#customer_taxation_preference_c').val()=='VAT_Only' || $('#customer_taxation_preference_c').val()=='Excise_And_VAT') 	tax1="vat";
		else
	 	if($('#customer_taxation_preference_c').val()=='CST_Only' || $('#customer_taxation_preference_c').val()=='Excise_And_CST') 	tax1="cst";
		else if($('#customer_taxation_preference_c').val()=='E1_Sales') tax1="E1";

	 	if($('#form_type_c').val()=='C_Form')form1 = "cform";else form1="";

		if(tax1=="E1") $('#customer_tax_percent_c').val("0");
		else
	 	if(loc_id!="" && cat!="" && tax1!=""){

	 	$.ajax({
		 
		    // The URL for the request
		    url: "service/gettaxpercent.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {
		    	locationid : loc_id,
		    	category : cat,
		    	tax : tax1,
		    	form : form1

		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
		 
		    // The type of data we expect back
		    dataType : "json",

		    success : function(resp){$('#customer_tax_percent_c').val(resp['tax_perc'])}
	})}
}

function clearallvm(lineitem) {

	
	if(lineitem>0)
	{

		for(var j=1;j<=lineitem;j++)
		{
			$('#vm_c_'+j).empty();
			$('#sub_commodity_c_'+j).val('');
		}
	}
}
function ShipToTinNoDropdown(){
			$('#tin_no_c').change(function(){

			if($('#tin_no_c').val()!='')
			{
				$('#tin_no_reasons_c').val('');
				$('#tin_no_reasons_c option[value="' +''+'"]').attr("selected", "selected");
			}
			});
	
			$('#tin_no_reasons_c').change(function(){

			if($('#tin_no_c').val()!='')
			{
				$('#tin_no_reasons_c').val('');
				$('#tin_no_reasons_c option[value="' +''+'"]').attr("selected", "selected");
			}
			});
			
}

function BillToTinNoDropdown(){
			
			
			$('#b_tin_no_c').change(function(){

			if($('#b_tin_no_c').val()!='')
			{
				$('#b_tin_no_reasons_c ').val('');
				$('#b_tin_no_reasons_c option[value="' +''+'"]').attr("selected", "selected");
				
			}
			});
	
			$('#b_tin_no_reasons_c').change(function(){

			if($('#b_tin_no_c').val()!='')
			{
				$('#b_tin_no_reasons_c').val('');
				$('#b_tin_no_reasons_c option[value="' +''+'"]').attr("selected", "selected");
			}
			});
}
		
		
function CreditModeOfPayment(change1){
	if(change1=='method')
	{	
		if($('#payment_method_c').val()!='advance' && $('#customer_credit_days_c').val()=='0')
		{
			$('#customer_credit_days_c').val('');
		}
		if($('#payment_method_c').val()=='advance')
		{
			$('#customer_credit_days_c').val('0');
		}
	}
	else{
		if(change1=='credit')
		{
			
			
			if($('#payment_method_c').val()=='advance' && $('#customer_credit_days_c').val()!='0')
			{
				$('#payment_method_c').val('');
			}
			
			if($('#customer_credit_days_c').val()=='0')
			{
				$('#payment_method_c').val('advance');
			}
		}
	}
	
}
$(function() {

	if($('#rfq_state_c').val()=="finance_approval")
	{
		$('#finance_status_c').change(function(){
			if($('#finance_status_c').val()=='rejected_by_finance')
			{

				addToValidate('EditView', 'finance_rejec_comm_c', 'text', true,'Finance Comments' );
			}
			else {

				custremoveFromValidate('EditView','finance_rejec_comm_c');
			}
		});		
		
	}
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
	{
		$('#goods_confirmation_status_c').change(function(){
			if($('#goods_confirmation_status_c').val()=='rejected_by_scm')
			{
				addToValidate('EditView', 'good_cnf_rejec_comm_c', 'text', true,'Good Confirmation Comments' );
			}
			else 
			{
				custremoveFromValidate('EditView','good_cnf_rejec_comm_c');
			}
		});		
		
	}
	if($('#rfq_state_c').val()=="sales_quote_margin" || $('#rfq_state_c').val() == "sales_quote_price")
	{
		
		$('#total_sales_value_c').attr('readonly', true);
		$('#payment_c').change(function(){
			var tmpval=parse_Float_Custom($('#total_sales_value_c').val());
			tmpval = (parse_Float_Custom($('#payment_c').val())*tmpval)/100;
			
			tmpval = Math.floor(tmpval * 100) / 100;//14072016
			if(!tmpval)$('#payment_amount_c').val("0");
			else
			$('#payment_amount_c').val(parse_Float_Custom(tmpval));
		});

		$('#payment_amount_c').change(function(){
			var tp = parse_Float_Custom($('#total_sales_value_c').val());
			var paid = parse_Float_Custom($('#payment_amount_c').val());

			tp = parse_Float_Custom((tp - paid)/tp);
			tp = 100-tp*100;
			tp = Math.floor(tp * 100) / 100;
			if(!tp)
				$('#payment_c').val("0");
			else
				$('#payment_c').val(tp);
		});
	}
	//-----------------------------------------------------------------
	if($('#rfq_state_c').val()=="new"){
	$('#customer_tax_percent_c').attr('readonly', true);
	$('#billing_account').attr('readonly', true);
	$('#billing_contact').attr('readonly', true);

	//--------------------field validations-----------------------------
	addToValidateRange('EditView', 'customer_tax_percent_c', 'text', true,'Customer Tax Percent' , 0 , 100);
	addToValidate('EditView', 'billing_contact', 'text', true,'Contact' );
	addToValidate('EditView', 'customer_taxation_preference_c', 'enum', true,'Customer Taxation Preference' );
	addToValidate('EditView', 'category_c', 'enum', true,'Global Commodity' );
	addToValidate('EditView', 'fp_event_locations_aos_quotes_1_name', 'text', true,'Location(Ship to address)' );
	addToValidateRange('EditView', 'customer_credit_days_c', 'text', true,'Credit Days',0,120 );
	addToValidate('EditView', 'goods_requirement_time_from_c', 'text', true,'Goods Requirement Time Frame From' );
	addToValidate('EditView', 'goods_requirement_time_upto_c', 'text', true,'Goods Requirement Time Frame Upto' );

	// scm kam finance validations
	 addToValidate('EditView', 'users_aos_quotes_2_name', 'text', true,'SCM User: Please add atleast one line item with valid VM' );
	
	//------------------------------------------------------------------


	//-----------------------------------------------------------------------
	
	$('#payment_method_c').change(function(){
		NBFCVisibility();
	});
	
	$('#payment_method_c').change(function(){
		
		CreditModeOfPayment('method');
	});	
	$('#customer_credit_days_c').change(function(){
		
		CreditModeOfPayment('credit');
	});
	
	//-----------------------------------------------------------------------

	 //--------to fill customer tax percent-----by dinesh---------------------

	 $('#btn_clr_fp_event_locations_aos_quotes_1_name').click(function(){
		$('#customer_tax_percent_c').val('');
		$('#users_aos_quotes_2_name').val('');
		$('#users_aos_quotes_2users_ida').val('');
		clearallvm($('#vmrfq_count').val());
	});

	 $('#category_c').change(function(){
	 	customertaxpercentajaxcall();
	 });

	$('#customer_taxation_preference_c').change(function(){
	 	customertaxpercentajaxcall();
	 });	 

	$('#form_type_c').change(function(){
	 	customertaxpercentajaxcall();
	 });	
	 //--------------------------------------
	
	
	// End ware house DD 	

	
	$( "#customer_taxation_preference_c" ).change(function (){
		
	
		$('#need_excise_exclusive_price_c').prop('checked', false);



		var c_tax_p = $( "#customer_taxation_preference_c option:selected" ).val();
	
		if(c_tax_p == 'Excise_And_VAT' || c_tax_p == 'Excise_And_CST')
		{
			$('#need_excise_exclusive_price_c').prop('checked', true);

		}
		

		if(c_tax_p == 'CST_Only' || c_tax_p == 'Excise_And_CST'){
		
		addToValidate('EditView', 'form_type_c', 'enum', true,'Form Type' );
		$('#form_type_c_label').css('visibility','visible');
		$('#form_type_c').css('visibility','visible');
	
		}
		else{
			
				$('#form_type_c option[value=""]').attr("selected", "selected");
				$("#form_type_c").val("").change();
				removeFromValidate('EditView','form_type_c');  
				 
				clear_specific_error('form_type_c');
				
				$('#form_type_c_label').css('visibility','hidden');
				
				$('#form_type_c').css('visibility','hidden');
		
		}
		
		
	});
	
	
	
	$('#need_excise_exclusive_price_c').change(function (){
		// Start for line Item
			var price_ex = $('#need_excise_exclusive_price_c').prop('checked');
			var line_Items = $('#vmrfq_count').val();

		if(line_Items > 0){
			var j;
			for(j=1;j<=line_Items;j++){			
				// if excise exclusive is true then make excise per unit mandatory
				var ex_perunit_var = 'excise_per_unit_c_'+j;
				var ex_perunitlabel = 'excise_per_unit_c_label_'+j;
				var newexid = ex_perunit_var;        
				var newexlabel =  ex_perunitlabel;        
				
				if(price_ex && document.getElementById(newexid)!=null){
					
					addToValidate('EditView', newexid, 'decimal', true,'Excise Per Unit' );
					
					$('#'+ newexid).css('visibility','visible');
					$('#'+ newexlabel).css('visibility','visible');	
				}
				else if(document.getElementById(newexid)!=null){
					
					custremoveFromValidate('EditView',newexid);  
				 	clear_specific_error(newexid);
					
					
					$('#'+ newexid).val('');
					$('#'+ newexid).css('visibility','hidden');
					$('#'+ newexlabel).css('visibility','hidden');			
					
				}
			}	
		}
	});
	
	}
	
	$('#fp_event_locations_aos_quotes_1_name').on("autofill", function(){
		
	});

	if($('#rfq_state_c').val()=="base_price")
	{
		
		addToValidate('EditView', 'warehouse_location_c', 'enum', true,'Warehouse Code' );
			
		$.ajax({
		 
		    // The URL for the request
		    url: "service/getwarehousedetail.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {

		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
		 
		    // The type of data we expect back
		    dataType : "json",
		})
		  // Code to run if the request succeeds (is done);
		  // The response is passed to the function
		  .done(function( jsonwarehouse ) {
			$.each( jsonwarehouse, function( warehousekey, address ) {	
		  		  		$('#warehouse_location_c').append("<option  value=\""+warehousekey + "\" data-address=\""+address + "\">" + warehousekey + "</option>");
		  		});
		 })
		  // Code to run if the request fails; the raw request and
	  // status codes are passed to the function
	  .fail(function( xhr, status, errorThrown ) {
	  	
	    console.log( "Error: " + errorThrown );
	    console.log( "Status: " + status );
	  })	
	 
	 	// on change warehouse show its address
		$('#warehouse_location_c').change(function (){
			if($(this).find(':selected').attr('data-address') !=undefined && $(this).find(':selected').attr('data-address') !='' ){
				$('#warehouse_address_c').val($(this).find(':selected').attr('data-address'));
			}
			else{
					$('#warehouse_address_c').val('');
		
			}
			
		});
	}
});

function vendortax(k){
	
	$('#vendor_tax_percent_c_'+k).attr('readonly', true);
		var loc_id = $('#fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida_'+k).val();
		var cat =  $('#category_c').val();
	 
	 	var tax1;
	 	if($('#rfq_state_c').val()=='goods_confirmation' || $('#rfq_state_c').val()=="final_scm_confirmation"){
	 		if($('#vendor_taxation_type_c_'+k).val()=='VAT_Only' || $('#vendor_taxation_type_c_'+k).val()=='Excise_And_VAT') tax1="vat";
		 	else
		 	if($('#vendor_taxation_type_c_'+k).val()=='CST_Only' || $('#vendor_taxation_type_c_'+k).val()=='Excise_And_CST') tax1="cst";
		 	else if($('#vendor_taxation_type_c_'+k).val()=='E1_Sales') tax1="e1";
		 	else tax1="";
	 	}
	 	else {
	 		if($('#vendor_taxation_type_c_'+k+'_span').text()=='VAT_Only' || $('#vendor_taxation_type_c_'+k+'_span').text()=='Excise_And_VAT') tax1="vat";
		 	else
		 	if($('#vendor_taxation_type_c_'+k+'_span').text()=='CST_Only' || $('#vendor_taxation_type_c_'+k+'_span').text()=='Excise_And_CST') tax1="cst";
		 	else if($('#vendor_taxation_type_c_'+k+'_span').text()=='E1_Sales') tax1="e1";
		 	else tax1="";
	 	}
	 	
	 	if($('#rfq_state_c').val()=='goods_confirmation' || $('#rfq_state_c').val()=="final_scm_confirmation")
	 	{
	 		if($('#form_type_c_'+k).val()=='C_Form')
	 		form1 = "cform";
	 		else form1="";
	 	}
	 	else 
	 	{
		 	if($('#form_type_c_'+k+'_span').text()=='C_Form')
		 	form1 = "cform";
		 	else 
		 	form1="";
		}
	 	
	 	$.ajax({
		 
		    // The URL for the request
		    url: "service/gettaxpercent.php",
		 
		    // The data to send (will be converted to a query string)
		    data: {
		    	locationid : loc_id,
		    	category : cat,
		    	tax : tax1,
		    	form : form1

		    },
		 
		    // Whether this is a POST or GET request
		    type: "GET",
		    async: false,
		 
		    // The type of data we expect back
		    dataType : "json",

		    success : function(resp){
		    	//console.log('bahar');
		    	if($('#rfq_state_c').val()=='goods_confirmation' || $('#rfq_state_c').val()=="final_scm_confirmation"){
		    		$('#vendor_tax_percent_c_'+k).val(resp['tax_perc']);
		    	}
		    	else
			    	$('#vendor_tax_percent_c_'+k).val(resp['tax_perc']).change();
			    	vendortaxamount(k);
		    	}
	})
}

function vendortaxamount(k)
{			
			var vta;
			if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
			{
				vta=parse_Float_Custom($("#purchase_line_amount_c_"+k).val()) + parse_Float_Custom($("#total_excise_cost_c_"+k).val()) + parse_Float_Custom($("#loading_charges_c_"+k).val());		
			}
			else 
			{
				vta=parse_Float_Custom($("#purchase_line_amount_c_"+k).text()) + parse_Float_Custom($("#total_excise_cost_c_"+k).text()) + parse_Float_Custom($("#loading_charges_c_"+k).text());	
			}
			
			var per = parse_Float_Custom($('#vendor_tax_percent_c_'+k).val());
			
			vta = parse_Float_Custom(per*vta)/100;
			
			if(!vta){$("#vendor_tax_amount_c_"+k).val('0');}
			else
			$("#vendor_tax_amount_c_"+k).val(vta);	
}

function	calculate_sales_value_salesRatePerUnit(k)
{
		var vpc_ld_frt_prof;
		
		if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
		{
			vpc_ld_frt_prof = parse_Float_Custom($("#purchase_line_amount_c_"+k).val()) + parse_Float_Custom($("#loading_charges_c_"+k).val()) + parse_Float_Custom($("#freight_charges_c_"+k).val()) + parse_Float_Custom($("#professional_charges_c_"+k).val());			
		}
		else
		{
			vpc_ld_frt_prof = parse_Float_Custom($("#purchase_line_amount_c_"+k).text()) + parse_Float_Custom($("#loading_charges_c_"+k).text()) + parse_Float_Custom($("#freight_charges_c_"+k).text()) + parse_Float_Custom($("#professional_charges_c_"+k).text());			
		}		
		
		var vpc_ld_frt_vta_prof = parse_Float_Custom(vpc_ld_frt_prof) + parse_Float_Custom($("#vendor_tax_amount_c_"+k).val());
		
		var customer_tax_type = $('#customer_taxation_preference_c').val();
		
		var vendor_tax_type;
		
		if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
		{
			vendor_tax_type = $('#vendor_taxation_type_c_'+k).val();
		}
		else
		{
			vendor_tax_type = $('#vendor_taxation_type_c_'+k+'_span').text();
		}		
		
		
		if((vendor_tax_type=='CST_Only' || vendor_tax_type=='Excise_And_CST'))// && (customer_tax_type=='VAT_Only' || customer_tax_type=='Excise_And_VAT'))
		{
			var x = parse_Float_Custom($('#margin_percent_c_'+k).val());
			x = x/(100.0);
			var sp = vpc_ld_frt_vta_prof + x*vpc_ld_frt_vta_prof;
			if(!sp)
			{
				
				$("#customer_sales_price_c_"+k).val('0');  
				$("#sales_rate_per_unit_c_"+k).val('0');
			}
			else
			{
				sp = Math.floor(sp * 100) / 100;
				$("#customer_sales_price_c_"+k).val(sp);
				var srpu = parse_Float_Custom(sp)/parse_Float_Custom($('#provided_quantity_c_'+k).text());
				srpu = Math.floor(srpu * 100) / 100;
				$('#sales_rate_per_unit_c_'+k).val(srpu);
				
			}

		}
		else
		{
			var x = parse_Float_Custom($('#margin_percent_c_'+k).val());
			x = x/(100.0);

			var sp = vpc_ld_frt_prof + x*vpc_ld_frt_prof;

			if(!sp)
			{
				$("#customer_sales_price_c_"+k).val('0');
				$("#sales_rate_per_unit_c_"+k).val('0');  
			}
			else
			{
				
				$("#customer_sales_price_c_"+k).val(sp);//$("#customer_sales_price_c_"+k).val(sp).change();
				var srpu = parse_Float_Custom(sp)/parse_Float_Custom($('#provided_quantity_c_'+k).text());
				srpu = Math.floor(srpu * 100) / 100;
				$('#sales_rate_per_unit_c_'+k).val(srpu);
				
			}
		}
}

function marginpercentchanged(k)
{
		calculate_sales_value_salesRatePerUnit(k);
		//-----------------------------------------------------------------------------------------------------

		//----------------change total margin if margin % per line item changes--------------------------------

		if(came_from_total_margin==0)
		{

			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				var total_sales_price_for_total_margin=0;
				var total_purchase_cost_for_total_margin=0;
				for(i=1;i<=lineitm1;i++)
				{
					if(document.getElementById('customer_sales_price_c_'+i)!=null){
						total_sales_price_for_total_margin = parse_Float_Custom(total_sales_price_for_total_margin) + parse_Float_Custom($('#customer_sales_price_c_'+i).val());
					}
					if(document.getElementById('total_purchase_cost_c_'+i)!=null){
						total_purchase_cost_for_total_margin = parse_Float_Custom(total_purchase_cost_for_total_margin) + parse_Float_Custom($('#total_purchase_cost_c_'+i).val());
					}
				}
				

				var sp1 = total_sales_price_for_total_margin;
				var vpc1 = total_purchase_cost_for_total_margin;
				var num = sp1 - vpc1;
				num = Math.floor(num * 100) / 100;

								
				var den = vpc1/100.0;
				var den1 = sp1/100.0;
				den1 = num/den1;
				num = num/den;
				num = Math.floor(num * 100) / 100;
				if(!num) {$("#total_margin_c").val("0");}
				else
				{
					$('#total_margin_c').val(num);
				}
				den1 = Math.floor(den1 * 100) / 100;
				if(!den1) {$("#total_margin_percent_revenue_c").val("0");}
				else
				{
					$('#total_margin_percent_revenue_c').val(den1);
				}
			}
			}
		//-----------------------------------------------------------------------------------------------------

		//----------------------change total sales value-------------------------------------------------------
			var lineitm = $('#vmrfq_count').val();
			var tc1 = 0;
			for(var lol = 1;lol<=lineitm;lol=lol+1)
			{
				
				//-----------change Total Sales Value(global)------------------------------
				if(document.getElementById('customer_sales_price_c_'+lol)!=null)
				{
					tc1 = parse_Float_Custom(tc1) + parse_Float_Custom($('#customer_sales_price_c_'+lol).val());
				}
				//-------------------------------------------------------------------------
			}

			if(!tc1) $("#total_sales_value_c").val("0");
			else
			{

			tc1 = Math.floor(tc1 * 100) / 100;
			$('#total_sales_value_c').val(tc1);
			}
			$('#payment_amount_c').val('');
			$('#payment_c').val('');

		//-----------------------------------------------------------------------------------------------------
		//======================================
		calculatecustomertax(k);
		//======================================

}
function calculatecustomertax(k)
{

			if($('#customer_taxation_preference_c').val() == 'E1_Sales')
			{
				$("#customer_tax_c_"+k).val('0');
			}
			else
			{
				var ctp = parse_Float_Custom($('#customer_tax_percent_c').text());
				ctp = ctp/(100.0);

				var sp_e;
				if($('#rfq_state_c').val()=='goods_confirmation' || $('#rfq_state_c').val()=="final_scm_confirmation")
				{
					sp_e = parse_Float_Custom($('#customer_sales_price_c_'+k).val()) + parse_Float_Custom($('#total_excise_cost_c_'+k).val());	
				}
				else 
				{
					sp_e = parse_Float_Custom($('#customer_sales_price_c_'+k).val()) + parse_Float_Custom($('#total_excise_cost_c_'+k).text());					
				}
				var ct = parse_Float_Custom( ctp * sp_e);

				ct = Math.floor(ct * 100) / 100;
				if(!ct)$("#customer_tax_c_"+k).val("0");
				else
				$("#customer_tax_c_"+k).val(ct);  //$("#customer_tax_c_"+k).val(ct);
			}
}
function vendorFormType(k)
{	
	var vtt1 = $( "#vendor_taxation_type_c_" + k + " option:selected" ).val();
		if(vtt1!='CST_Only' && vtt1!='Excise_And_CST')
		{		
			$('#form_type_c_label_'+k).css('visibility','hidden');
			$('#form_type_c_'+k).css('visibility','hidden');
			custremoveFromValidate('EditView','form_type_c_'+k);
			clear_specific_error('form_type_c_'+k);
		}
		else
		{
			addToValidate('EditView', 'form_type_c_'+k, 'enum', true,'Form Type' );
		}
}
function fillvendortaxationtype(k)
{	
	var lineitm = $('#vmrfq_count').val();
	if(!$('#customer_taxation_preference_c').val())//if not working check its val ==""
	{
		for(var i=1;i<=lineitm;i++)
		{
			if(document.getElementById('vendor_taxation_type_c_'+i)!=null)
			{
				$('#vendor_taxation_type_c_'+i).empty();
			}
		}
		return false;
	}
	$('#vendor_taxation_type_c_'+k).empty();
	var cttv = $('#customer_taxation_preference_c').val();
	for(var i=1;i<=lineitm;i++)
	{
		if(document.getElementById('vendor_taxation_type_c_'+i)!=null)
		{
			if(cttv=='CST_Only') 
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"CST Only"+"\" value=\""+"CST_Only"+"\">" + "CST Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"VAT Only"+"\" value=\""+"VAT_Only"+"\">" + "VAT Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='VAT_Only')
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"CST Only"+"\" value=\""+"CST_Only"+"\">" + "CST Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"VAT Only"+"\" value=\""+"VAT_Only"+"\">" + "VAT Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='Excise_And_VAT')
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='Excise_And_CST')
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='E1_Sales') 
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"CST Only"+"\" value=\""+"CST_Only"+"\">" + "CST Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
		}
	}
}
function fillvendortaxationtype1(k)
{	
	var lineitm = $('#vmrfq_count').val();
	if(!$('#customer_taxation_preference_c').val())//if not working check its val ==""
	{
		for(var i=1;i<=lineitm;i++)
		{
			if(document.getElementById('vendor_taxation_type_c_'+i)!=null)
			{
				$('#vendor_taxation_type_c_'+i).empty();
			}
		}
		return false;
	}
	$('#vendor_taxation_type_c_'+k).empty();
	var cttv = $('#customer_taxation_preference_c').val();
	for(var i=1;i<=lineitm;i++)
	{
		if(i==k)
		if(document.getElementById('vendor_taxation_type_c_'+i)!=null)
		{
			if(cttv=='CST_Only') 
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"CST Only"+"\" value=\""+"CST_Only"+"\">" + "CST Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"VAT Only"+"\" value=\""+"VAT_Only"+"\">" + "VAT Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='VAT_Only')
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"CST Only"+"\" value=\""+"CST_Only"+"\">" + "CST Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"VAT Only"+"\" value=\""+"VAT_Only"+"\">" + "VAT Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='Excise_And_VAT')
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='Excise_And_CST')
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And VAT"+"\" value=\""+"Excise_And_VAT"+"\">" + "Excise And VAT" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
			else if(cttv=='E1_Sales') 
			{
				$('#vendor_taxation_type_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"CST Only"+"\" value=\""+"CST_Only"+"\">" + "CST Only" + "</option>");
		  		$('#vendor_taxation_type_c_'+i).append("<option  label=\""+"Excise And CST"+"\" value=\""+"Excise_And_CST"+"\">" + "Excise And CST" + "</option>");
			}
		}
	}
}



function calculate_margPer_totalSalesValue_totalMarginPer(k) {
	
		var csp2 = parse_Float_Custom($('#customer_sales_price_c_'+k).val());
		var liwpc2 = parse_Float_Custom($('#total_purchase_cost_c_'+k).val());

		var liwmp2 = parse_Float_Custom(((csp2 - liwpc2)/liwpc2)*100);
		
		liwmp2 = Math.floor(liwmp2 * 100) / 100;
		if(!liwmp2) $('#margin_percent_c_'+k).val('0');
		else 	$('#margin_percent_c_'+k).val(liwmp2);
 
	//--------------------------------------------------------------------------
		
	//-----------calculate total sales value------------------------------------
	if($('#rfq_state_c').val()!="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
	{
			var lineitm0 = $('#vmrfq_count').val();
			var final_val = '0';
			for(var i=1;i<=lineitm0;i++)
		  	{
		  		final_val = parse_Float_Custom(final_val) + parse_Float_Custom($('#customer_sales_price_c_'+i).val()); 
		  	}
		  	if(!final_val) $('#total_sales_value_c').val('0');
		  	else {
		  		final_val = Math.floor(final_val * 100) / 100;
		  	$('#total_sales_value_c').val(final_val);
		  	}
	}
	//--------------------------------------------------------------------------
	
	//-----------calculate total margin percent---------------------------------
			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				var total_sales_price_for_total_margin=0;
				var total_purchase_cost_for_total_margin=0;
				for(var i=1;i<=lineitm1;i++)
				{
					if(document.getElementById('customer_sales_price_c_'+i)!=null){
						total_sales_price_for_total_margin = parse_Float_Custom(total_sales_price_for_total_margin) + parse_Float_Custom($('#customer_sales_price_c_'+i).val());
					}
					if(document.getElementById('total_purchase_cost_c_'+i)!=null){
						total_purchase_cost_for_total_margin = parse_Float_Custom(total_purchase_cost_for_total_margin) + parse_Float_Custom($('#total_purchase_cost_c_'+i).val());
					}
				}
				

				var sp1 = total_sales_price_for_total_margin;
				var vpc1 = total_purchase_cost_for_total_margin;
				var num = sp1 - vpc1;
				var den = vpc1/100.0;
				var den1 = sp1/100.0;
				den1 = num/den1;

				num = num/den;

				num = Math.floor(num * 100) / 100;
				
				if(!num) {$("#total_margin_c").val("0");}
				else
				{$('#total_margin_c').val(num);}
				den1 = Math.floor(den1 * 100) / 100;
				if(!den1) {$("#total_margin_percent_revenue_c").val("0");}
				else
				{$('#total_margin_percent_revenue_c').val(den1);}
			}
	//--------------------------------------------------------------------------
	
}

function totalPurchaseCost(k) {

	var pla;
	
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
		pla = parse_Float_Custom($('#purchase_line_amount_c_'+k).val());
	}
	else {
		pla = parse_Float_Custom($('#purchase_line_amount_c_'+k).text())
	}
	
	var a;
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
		a=parse_Float_Custom($('#loading_charges_c_'+k).val());
	}
	else {
		a=parse_Float_Custom($('#loading_charges_c_'+k).text());
	}	
	
	if(!a) a='0';
	
	var a;
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
		a=parse_Float_Custom($('#loading_charges_c_'+k).val());
	}
	else {
		a=parse_Float_Custom($('#loading_charges_c_'+k).text());
	}	
	var b;
	if(!b) b='0';
	
	var b;
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
		b=parse_Float_Custom($('#professional_charges_c_'+k).val());
	}
	else {
		b=parse_Float_Custom($('#professional_charges_c_'+k).text());
	}	
	

	
	var c;
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
		c=parse_Float_Custom($('#freight_charges_c_'+k).val());
	}
	else {
		c=parse_Float_Custom($('#freight_charges_c_'+k).text());
	}	
	if(!c) c='0';
	var vta1;
	var charges = parse_Float_Custom(a) + parse_Float_Custom(b) + parse_Float_Custom(c);
	var total_purchase_cost = pla + parse_Float_Custom(charges);
	
	
	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){ 

		if($('#vendor_taxation_type_c_'+k).val()=='CST_Only' || $('#vendor_taxation_type_c_'+k).val()=='Excise_And_CST'){
			total_purchase_cost = total_purchase_cost + parse_Float_Custom($('#vendor_tax_amount_c_'+k).val());
			var t0=($('#vendor_tax_amount_c_'+k).val());

			}
			
	}
	else {

		if($('#vendor_taxation_type_c_'+k+'_span').text()=='CST_Only' || $('#vendor_taxation_type_c_'+k+'_span').text()=='Excise_And_CST')
		total_purchase_cost = total_purchase_cost + parse_Float_Custom($('#vendor_tax_amount_c_'+k).val());
	}
	
	if(!total_purchase_cost) $("#total_purchase_cost_c_"+k).val("0");
	else
	$("#total_purchase_cost_c_"+k).val(total_purchase_cost);	
}

function purchaseLineAmount(k)
{
	var qty;

	if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
		qty = parse_Float_Custom($('#provided_quantity_c_'+k).text())
	}
	else 
	{
		qty = parse_Float_Custom($('#provided_quantity_c_'+k).val())
	}	
	
	var cost_per_unit = parse_Float_Custom($('#purchase_cost_per_unit_c_'+k).val());
	var purchase_line_amount = parse_Float_Custom(qty*cost_per_unit);
	
	if(!purchase_line_amount) $("#purchase_line_amount_c_"+k).val("0");
	else
	$("#purchase_line_amount_c_"+k).val(purchase_line_amount);
	
	
}

function calculateExcise(k){
	var qty = parse_Float_Custom($('#provided_quantity_c_'+k).val());
	var excise_cost_per_unit = parse_Float_Custom($('#excise_per_unit_c_'+k).val());
	var total_excise_cost =parse_Float_Custom(qty*excise_cost_per_unit);
	if(!total_excise_cost) $("#total_excise_cost_c_"+k).val("0");
	else
	$("#total_excise_cost_c_"+k).val(total_excise_cost);
}

function	CalculateVendorLoadingCharges(){
			tliq=0;
			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					if(document.getElementById('provided_quantity_c_'+i)!=null)
					{	
						var tmpvar;
						if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
						{
							tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).text());
						}
						else 
						{
							tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).val());
						}
						
						if(!parse_Float_Custom(tmpvar))
							tmpvar="0";
						tliq = parse_Float_Custom(tliq) + parse_Float_Custom(tmpvar);

					}

				}
			}
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					var vlc = parse_Float_Custom($('#vendor_loading_charge_c').val());
					var lc;
					if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
						{
							lc = parse_Float_Custom((vlc*(parse_Float_Custom($('#provided_quantity_c_'+i).text())))/tliq);
						}
						else 
						{
							lc = parse_Float_Custom((vlc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
						}
						
					if(!lc)$('#loading_charges_c_'+i).val('0');
					else
					{	lc = Math.floor(lc * 100) / 100;
						$('#loading_charges_c_'+i).val(lc);
					}
				}
			}
}
function CalculateVendorFreightCharges()
{
			tliq=0;
			
			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					if(document.getElementById('provided_quantity_c_'+i)!=null)
					{	
						var tmpvar;
						if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
							tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).text());
						}
						else 
						{
							tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).val());
						}
						if(!parse_Float_Custom(tmpvar))
							tmpvar="0";
						tliq = parse_Float_Custom(tliq) + parse_Float_Custom(tmpvar);

					}

				}
			}
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					var vfc = parse_Float_Custom($('#vendor_freight_charge_c').val());
					var fc;
					if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
						fc = parse_Float_Custom((vfc*(parse_Float_Custom($('#provided_quantity_c_'+i).text())))/tliq);
					}
					else {
						fc = parse_Float_Custom((vfc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					}
					if(!fc)$('#freight_charges_c_'+i).val('0');
					else
					{	fc = Math.floor(fc * 100) / 100;
						$('#freight_charges_c_'+i).val(fc);
					}
				}
			}

}

function CalculateCustomerLoadingCharges()
{
			tliq=0;
			
			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					if(document.getElementById('provided_quantity_c_'+i)!=null)
					{	
						var tmpvar;
						if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
						{
							tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).text());
						}
						else 
						{
							tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).val());
						}
						if(!parse_Float_Custom(tmpvar))
							tmpvar="0";
						tliq = parse_Float_Custom(tliq) + parse_Float_Custom(tmpvar);

					}

				}
			}
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					
					//=======================customer loading charges calculation===========
					var clc = parse_Float_Custom($('#customer_loading_payment_c').val());
					var lc_c ;
					if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
					{
						lc_c = parse_Float_Custom((clc*(parse_Float_Custom($('#provided_quantity_c_'+i).text())))/tliq);
					}
					else
					{
						lc_c = parse_Float_Custom((clc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					}

					if(!lc_c)$('#customer_loading_charges_c_'+i).val('0');
					else
					{	lc_c = Math.floor(lc_c * 100) / 100;
						$('#customer_loading_charges_c_'+i).val(lc_c);
					}
				}
			}
}

function CalculateCustomerFreightCharges()
{
			tliq=0;
			
			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					var tmpvar;
					if(document.getElementById('provided_quantity_c_'+i)!=null)
					{	
					
					if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
					{
						tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).text());
					}
					else
					{
						tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).val());
					}
						if(!parse_Float_Custom(tmpvar))
							tmpvar="0";
						tliq = parse_Float_Custom(tliq) + parse_Float_Custom(tmpvar);

					}

				}
			}
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					//=======================customer freight charges calculation===========
					var cfc = parse_Float_Custom($('#customer_freight_payment_c').val());
					var fc_c;
					
					if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
					{
						fc_c = parse_Float_Custom((cfc*(parse_Float_Custom($('#provided_quantity_c_'+i).text())))/tliq);
					}
					else
					{
						fc_c = parse_Float_Custom((cfc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					}
					if(!fc_c)$('#customer_freight_charges_c_'+i).val('0');
					else
					{	fc_c = Math.floor(fc_c * 100) / 100;
						$('#customer_freight_charges_c_'+i).val(fc_c);
					}

					//===================================================================
				}
			}
}

function CalculateProfessionalCharges()
{
		tliq=0;
			
			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					var tmpvar;
					if(document.getElementById('provided_quantity_c_'+i)!=null)
					{	
					
					if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
					{
						tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).text());
					}
					else
					{
						tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).val());
					}
						if(!parse_Float_Custom(tmpvar))
							tmpvar="0";
						tliq = parse_Float_Custom(tliq) + parse_Float_Custom(tmpvar);

					}

				}
			}
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					//=======================professional charges calculation===========
					var cfc = parse_Float_Custom($('#professional_charge_c').val());
					var fc_c;
					
					if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation")
					{
						fc_c = parse_Float_Custom((cfc*(parse_Float_Custom($('#provided_quantity_c_'+i).text())))/tliq);
					}
					else
					{
						fc_c = parse_Float_Custom((cfc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					}
					if(!fc_c)$('#professional_charges_c_'+i).val('0');
					else
					{	fc_c = Math.floor(fc_c * 100) / 100;
						$('#professional_charges_c_'+i).val(fc_c);
					}

					//===================================================================
				}
			}
}

function PopulateSubCommodity()
{
				$('#users_aos_quotes_2_name').val("");
				$('#users_aos_quotes_2users_ida').val("");
		  			var lineitm3 = $('#vmrfq_count').val();
		  			for(var i=1;i<=lineitm3;i++)
		  			{
		  				if(document.getElementById('sub_commodity_c_'+i)!=null)
		  				{
		  							$('#vm_c_'+i).empty();
		  							$('#sku_sku_vmrfq_vmrfq_1_name_'+i).val('');
		  							$('#sku_sku_vmrfq_vmrfq_1sku_sku_ida_'+i).val('');
		  							$('#sub_commodity_c_'+i).empty();
		  							
		  							$('#sub_commodity_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");

		  					      	$.each( csco, function( commodity, val ) {	
		  							if(commodity==$('#category_c').val()){
					  		  		$.each(val, function(a,b){
					  		  			a = $.trim(a);
					  		  			$('#sub_commodity_c_'+i).append("<option  label=\""+a+"\" value=\""+a+"\">" + a + "</option>");

					  		  		});}

					  		});
		  				}
		  			}
}

function PopulateSubCommodity1(numCompare)
{
			
		  			var lineitm3 = $('#vmrfq_count').val();
		  			for(var i=1;i<=lineitm3;i++)
		  			{
		  				if(i== numCompare)
		  				{	
		  					var tmp=$('#sub_commodity_c_'+i).val();
		  				if(document.getElementById('sub_commodity_c_'+i)!=null)
		  				{
		  							$('#vm_c_'+i).empty();
		  							$('#sku_sku_vmrfq_vmrfq_1_name_'+i).val('');
		  							$('#sku_sku_vmrfq_vmrfq_1sku_sku_ida_'+i).val('');
		  							$('#sub_commodity_c_'+i).empty();
		  							
		  							$('#sub_commodity_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");

		  					      	$.each( csco, function( commodity, val ) {	
		  							if(commodity==$('#category_c').val()){
					  		  		$.each(val, function(a,b){
					  		  			$('#sub_commodity_c_'+i).append("<option  label=\""+a+"\" value=\""+a+"\">" + a + "</option>");

					  		  		});}

					  		});
		  				}
		  				$('#sub_commodity_c_'+i).val(tmp);
		  			}
		  			}
}

function copyQty(k)
{
	$('#provided_quantity_c_'+k).val($('#requested_quantity_c_'+k).text());
}

function copySku(k)
{
				if($('#rfq_state_c').val()=="base_price"){
				if(document.getElementById('r_sku_code_c_'+k)!=null)
				{
					var code = $('#r_sku_code_c_'+k).val();

					if(code.charAt(0) != 'P')
					{
						$('#sku_sku_vmrfq_vmrfq_2_name_'+k).val($('#sku_sku_vmrfq_vmrfq_1sku_sku_ida_'+k).text());
						$('#sku_code_c_'+k).val($('#r_sku_code_c_'+k).val());		
					}
				}}
}

function setNBFCPartnerVisibility()
{
	var paymentVal = $('#payment_method_c').val();
	
	if( paymentVal != 'nbfc')
	{
			$('#nbfc_partner_c_label').css('visibility','hidden');
			$('#nbfc_partner_c').css('visibility','hidden');
	}
}
function setFormVisibility(k)
{
				if($('#rfq_state_c').val()=="won" || $('#rfq_state_c').val()=="poso_creation" || $('#rfq_state_c').val()=="rejected_by_finance" || $('#rfq_state_c').val()=="rejected_by_scm" || $('#rfq_state_c').val()=="sales_quote_margin" || $('#rfq_state_c').val() == "sales_quote_price" || $('#rfq_state_c').val()=="po_awaiting" || $('#rfq_state_c').val()=="finance_approval" || $('#rfq_state_c').val()=="account_creation")
				{
					if( $('#vendor_taxation_type_c_'+k+'_span').text()=="CST_Only" || $('#vendor_taxation_type_c_'+k+'_span').text()=="Excise_And_CST" )
					{

						$('#form_type_c_label_'+k).css('visibility','visible');
						$('#form_type_c_'+k+'_span').css('visibility','visible');
					}
					else 
					{

						$('#form_type_c_label_'+k).css('visibility','hidden');
						$('#form_type_c_'+k+'_span').css('visibility','hidden');
					}
				}
}

function FillVendorCreditDaysDSODays(){
	if($('#rfq_state_c').val()=="finance_approval"){
	$('#global_vendor_credit_days_c').attr('readonly', true);
	$('#dso_days_c').attr('readonly', true);
	
	
	var lineitm3 = $('#vmrfq_count').val();

	var maxDay=-1;
	for(var i=1;i<=lineitm3;i++)
	{
		var currDay = parse_Float_Custom($('#vendor_credit_days_c_'+i).text());
		console.log('with parsefloat   '+currDay);
		if(currDay > maxDay)
		{
			maxDay = currDay;
		}
	}
	
	$('#global_vendor_credit_days_c').val(maxDay);
	
	var DSOdays = parse_Float_Custom($('#customer_credit_days_c').text()) - maxDay;
	$('#dso_days_c').val(DSOdays);
	
}
}

function formulaImplementation(k){
	
			if($('#rfq_state_c').val()=="finance_approval")
			{			
				
				if( $('#vendor_taxation_type_c_'+k+'_span').text()=="CST_Only" || $('#vendor_taxation_type_c_'+k+'_span').text()=="Excise_And_CST" )
				{
					$('#form_type_c_label_'+k).css('visibility','visible');
					$('#form_type_c_'+k+'_span').css('visibility','visible');
				}
				else {
					$('#form_type_c_label_'+k).css('visibility','hidden');
					$('#form_type_c_'+k+'_span').css('visibility','hidden');
				}
				return false;
			}

		if($('#rfq_state_c').val()=="goods_confirmation" || $('#rfq_state_c').val()=="final_scm_confirmation"){
			
			
					$('#fp_event_locations_vmrfq_vmrfq_1_name_'+k).attr('readonly', true);
					
					$('#vend_vendor_vmrfq_vmrfq_1_name_'+k).attr('readonly', true);
					
					
					addToValidate('EditView', 'fp_event_locations_vmrfq_vmrfq_1_name_'+k, 'enum', true,'Locations');
					
					
				//----------------------clear all data when vendor location is cleared---------------
				
				$('#btn_clr_fp_event_locations_vmrfq_vmrfq_1_name_'+k).click(function(){
					
					$("#total_margin_c").val('');
					$("#total_margin_percent_revenue_c").val('');
					$("#vendor_tax_percent_c_"+k).val('');
					$('#fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida_'+k).val('');
					$("#vendor_tax_amount_c_"+k).val('');
					$("#margin_percent_c_"+k).val('');
					$("#total_purchase_cost_c_"+k).val('');
				});
				//-----------------------------------------------------------------------------------
				//----------------------------validations--------------------------------
				addToValidateRange('EditView', 'total_margin_c', 'text', true,'Total Margin %' ,-100 , 100);
				
				addToValidate('EditView', 'vendor_taxation_type_c_'+k, 'enum', true,'Vendor Taxation Type');
				
				//-----------------------------------------------------------------------
				
				//-------------------read only work--------------------------------------
				
				$('#vendor_tax_amount_c_'+k).attr('readonly', true);
				$('#loading_charges_c_'+k).attr('readonly', true);
				$('#customer_loading_charges_c_'+k).attr('readonly', true);
				$('#customer_freight_charges_c_'+k).attr('readonly', true);
				$('#professional_charges_c_'+k).attr('readonly', true);
				$('#freight_charges_c_'+k).attr('readonly', true);
				$('#total_purchase_cost_c_'+k).attr('readonly', true);
				$('#total_excise_cost_c_'+k).attr('readonly', true);
				$('#total_margin_percent_revenue_c').attr('readonly', true);
				$('#total_sales_value_c').attr('readonly', true);
				$('#purchase_line_amount_c_'+k).attr('readonly', true);
				$('#margin_percent_c_'+k).attr('readonly', true);
				$('#total_margin_c').attr('readonly', true);
				$('#sales_rate_per_unit_c_'+k).attr('readonly', true);
				$('#customer_sales_price_c_'+k).attr('readonly', true);
				$('#customer_tax_c_'+k).attr('readonly', true);
				$('#excise_per_unit_c_'+k).attr('readonly', true);

				
				//---------------------------------------------------------------------
				//populate vendor tax type according to customer taxation type
				var tmp=$('#vendor_taxation_type_c_'+k).val();
				fillvendortaxationtype1(k);
				$('#vendor_taxation_type_c_'+k).val(tmp);
				//---------------------------------------------------------------------
				
				//-----------------------------------------------------------------------
				//form type work according to vendor taxation type

				
				$('#form_type_c_label_'+k).css('visibility','visible');
				$('#form_type_c_'+k).css('visibility','visible');

				vendorFormType(k);
				
				$('#vendor_taxation_type_c_'+k).change(function(){
					$('#form_type_c_'+k).val('');
					$('#form_type_c_label_'+k).css('visibility','visible');
					$('#form_type_c_'+k).css('visibility','visible');
					vendorFormType(k);
				});
				
				//-------------------on vendor tax % change---------------------------
				$('#vendor_taxation_type_c_'+k).change(function(){
					vendortax(k);
					totalPurchaseCost(k);
					calculate_margPer_totalSalesValue_totalMarginPer(k);

				});
				
				$('#form_type_c_'+k).change(function(){
					vendortax(k);
					totalPurchaseCost(k);	
					calculate_margPer_totalSalesValue_totalMarginPer(k);				
				});
				//--------------------------------------------------------------------				
			
				//-----------------on purchase cost per unit change-------------------------------
				$('#purchase_cost_per_unit_c_'+k).change(function(){
				 purchaseLineAmount(k);
				 vendortaxamount(k);
				 totalPurchaseCost(k);
				 calculate_margPer_totalSalesValue_totalMarginPer(k);
				});

				//-----------------------------------------------------------------------
				
				//------------------on global vendor loading charges change-------------
				$('#vendor_loading_charge_c').change(function () {
					vendortaxamount(k);
					CalculateVendorLoadingCharges(k);
					totalPurchaseCost(k);
					calculate_margPer_totalSalesValue_totalMarginPer(k);
				});
				//----------------------------------------------------------------------

				//-------------------on loading charge change---------------------------				
				$('#vendor_freight_charge_c').change(function () {
					CalculateVendorFreightCharges(k);
					totalPurchaseCost(k);
					calculate_margPer_totalSalesValue_totalMarginPer(k);
				});
				
				//-----------------------------------------------------------------------
				
				//-----------------customer loading charges change-------------------------
				$('#customer_loading_payment_c').change(function(){
					CalculateCustomerLoadingCharges();
				});
				//-----------------------------------------------------------------------
				
				//-----------------customer freight charges change-------------------------
				$('#customer_freight_payment_c').change(function(){
					CalculateCustomerFreightCharges();
				});
				//-----------------------------------------------------------------------
				
				//-----------------professional charges change-------------------------
				$('#professional_charge_c').change(function(){
					CalculateProfessionalCharges();
					totalPurchaseCost(k);
					calculate_margPer_totalSalesValue_totalMarginPer(k);
				});
				//-----------------------------------------------------------------------
	
		}
		else{
			
			$('#loading_charges_c_'+k).attr('readonly', true);
			$('#customer_loading_charges_c_'+k).attr('readonly', true);
			$('#customer_freight_charges_c_'+k).attr('readonly', true);
			$('#professional_charges_c_'+k).attr('readonly', true);
			$('#freight_charges_c_'+k).attr('readonly', true);
	
		if($('#rfq_state_c').val()=="base_price"){

			
			if(document.getElementById('vend_vendor_vmrfq_vmrfq_1_name_'+k)!=null)
			{	
				$('#vend_vendor_vmrfq_vmrfq_1_name_'+k).attr('readonly', true);
			}
			if(document.getElementById('fp_event_locations_vmrfq_vmrfq_1_name_'+k)!=null)
			{	
				$('#fp_event_locations_vmrfq_vmrfq_1_name_'+k).attr('readonly', true);
			}
			if(document.getElementById('sku_sku_vmrfq_vmrfq_2_name_'+k)!=null)
			{
				addToValidate('EditView', 'sku_sku_vmrfq_vmrfq_2_name_'+k, 'text', true,'Provided SKU' );

				copySku(k);
				
			}
			if(document.getElementById('provided_quantity_c_'+k)!=null)
			{	
				copyQty(k);
			}
		}

		// Hide location for SQM role
		if($('#rfq_state_c').val()=="sales_quote_margin" || $('#rfq_state_c').val() == "sales_quote_price"){
		
				setFormVisibility(k);
				
				
				
		
		$('#fp_event_locations_vmrfq_vmrfq_1_name_'+k).attr('readonly', true);
	
				if(document.getElementById('btn_clr_fp_event_locations_vmrfq_vmrfq_1_name_'+k)!=null){
					$('#btn_clr_fp_event_locations_vmrfq_vmrfq_1_name_'+k).css('visibility','hidden');
					
				}
				if(document.getElementById('btn_fp_event_locations_vmrfq_vmrfq_1_name_'+k)!=null){
					$('#btn_fp_event_locations_vmrfq_vmrfq_1_name_'+k).css('visibility','hidden');
					
				}	
		}

		//--------------------populate vm------------------------------------
		$('#sub_commodity_c_'+k).change(function(){

			if(!$('#fp_event_locations_aos_quotes_1_name').val())
			{
				$('#sub_commodity_c_'+k).val("");
				alert("Select customer location (Ship To Address) first.");
			}
			else{
				var lid1 = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').val();
				var cat1 = $('#category_c').val();
				var scat1 = $('#sub_commodity_c_'+k).val();
				
				if(scat1==''){
					$("#vm_c_"+k).empty();
					$("#users_aos_quotes_2_name").val('');
					
				}
				else {
					PopulateVM(k,lid1,cat1,scat1)
	
			var lineitm3 = $('#vmrfq_count').val();
				for(var i=1;i<=lineitm3;i++)
			  	{
			  		if(document.getElementById('vm_c_'+i)!=null)
			  		{
			  			$('#users_aos_quotes_2_name').val($('#vm_c_'+i+' option:selected').attr('label'));
			  			$('#users_aos_quotes_2users_ida').val($('#vm_c_'+i).val());
			  			break;
			  		}
			  	}	
		  }
		}	
		$('#sku_sku_vmrfq_vmrfq_1_name_'+k).val('');
		$('#r_sku_code_c_'+k).val('');
		});
		$('#vm_c_'+k).change(function(){
			var lineitm3 = $('#vmrfq_count').val();

			for(var i=1;i<=lineitm3;i++)
		  	{
		  		if(document.getElementById('vm_c_'+i)!=null)
		  		{
		  			$('#users_aos_quotes_2_name').val($('#vm_c_'+i+' option:selected').attr('label'));
					$('#users_aos_quotes_2users_ida').val($('#vm_c_'+i).val());
					break;
		  		}
		  	}

			
		});
		//-------------------------------------------------------------------
		$('#vendor_tax_amount_c_'+k).attr('readonly', true);
		//$('#customer_sales_price_c_'+k).attr('readonly', 'true');
		$('#customer_tax_c_'+k).attr('readonly', true);
		$('#customer_sales_price_c_'+k).attr('readonly', true);
		if($('#category_c').val())
		{
			var lineitm3 = $('#vmrfq_count').val();
		  			for(var i=1;i<=lineitm3;i++)
		  			{
		  				if(i==k)
		  				if(document.getElementById('sub_commodity_c_'+i)!=null)
		  				{
		  							$('#sub_commodity_c_'+i).empty();
		  							$('#sub_commodity_c_'+i).append("<option  label=\""+""+"\" value=\""+""+"\">" + "" + "</option>");
						
		  					      	$.each( csco, function( commodity, val ) {	

		  							if(commodity==$('#category_c').val()){
					  		  		$.each(val, function(a,b){
					  		  			$('#sub_commodity_c_'+i).append("<option  label=\""+a+"\" value=\""+a+"\">" + a + "</option>");

					  		  		});}

					  		});
		  				}
		  			}
		}

		$('#category_c').change(function(){
			PopulateSubCommodity();
			});

		//--------------------------vendor taxation type acc to customer taxation type----------------------
		fillvendortaxationtype1(k);
		$('#customer_taxation_preference_c').change(function(){

			$('#form_type_c_label_'+k).css('visibility','hidden');
			$('#form_type_c_'+k).css('visibility','hidden');
			fillvendortaxationtype(k);
		});
		//--------------------------------------------------------------------------------------------------
		


		//----------------form type work------------------------------------------
		vendorFormType(k);

		$('#vendor_taxation_type_c_'+k).change(function(){
			//--------------------change vendor tax percent and all its dependent values-------------
			$('#vendor_tax_percent_c_'+k).val('0').change();
			//---------------------------------------------------------------------------------------
			$('#form_type_c_label_'+k).css('visibility','visible');
			$('#form_type_c_'+k).css('visibility','visible');
			$('#form_type_c_'+k).val('');//7july
			vendorFormType(k);
		});

		//------------------------------------------------------------------------

		//-----------fill total margin to all line item margins and----------------
		//-----------change Total Sales Value(global)------------------------------
		$('#total_margin_c').change(function(){
			came_from_total_margin=0;
			var lineitm = $('#vmrfq_count').val();
			var tc1 = 0;
			for(var lol = 1;lol<=lineitm;lol=lol+1)
			{
				//-----------fill total margin to all line item margins -------------------
				if(document.getElementById('margin_percent_c_'+lol)!=null)
				{
					$('#margin_percent_c_'+lol).val(parse_Float_Custom($('#total_margin_c').val()));
					came_from_total_margin=1;
					marginpercentchanged(k);
					
					var lineitm1 = $('#vmrfq_count').val();
					if(lineitm1 > 0)
					{
						var total_sales_price_for_total_margin=0;
						var total_purchase_cost_for_total_margin=0;
						for(i=1;i<=lineitm1;i++)
						{
							if(document.getElementById('customer_sales_price_c_'+i)!=null){
								total_sales_price_for_total_margin = parse_Float_Custom(total_sales_price_for_total_margin) + parse_Float_Custom($('#customer_sales_price_c_'+i).val());
							}
							if(document.getElementById('total_purchase_cost_c_'+i)!=null){
								total_purchase_cost_for_total_margin = parse_Float_Custom(total_purchase_cost_for_total_margin) + parse_Float_Custom($('#total_purchase_cost_c_'+i).val());
							}
						}
				

						var sp1 = total_sales_price_for_total_margin;
						var vpc1 = total_purchase_cost_for_total_margin;
						var num = sp1 - vpc1;
						var den1 = sp1/100.0;
						den1 = num/den1;
				
				den1 = Math.floor(den1 * 100) / 100;
				
						if(!den1) {$("#total_margin_percent_revenue_c").val("0");}
						else
						{$('#total_margin_percent_revenue_c').val(den1);}
					}
					came_from_total_margin=0;
				}
				//-------------------------------------------------------------------------
				//-----------change Total Sales Value(global)------------------------------
				if(document.getElementById('customer_sales_price_c_'+lol)!=null)
				{
					tc1 = parse_Float_Custom(tc1) + parse_Float_Custom($('#customer_sales_price_c_'+lol).val());
				}
				//-------------------------------------------------------------------------
			}
			tc1 = Math.floor(tc1 * 100) / 100;
			if(!tc1) $("#total_sales_value_c").val("0");
			else
			{$('#total_sales_value_c').val(tc1);}
			$('#payment_amount_c').val('');
			$('#payment_c').val('');


		});
		//--------------------------------------------------------------------

		//----------------change customer sales price on the basis of margin % change in per line item and-----
		//----------------change total margin if margin % per line item changes and----------------------------
		//----------------change margin cost per line item-----------------------------------------------------

		$('#margin_percent_c_'+k).change(function(){
			marginpercentchanged(k);

		});
		//-----------------------------------------------------------------------------------------------------


		//=======================total purchase cost  and purchase line amount calculation=============
		$('#total_purchase_cost_c_'+k).attr('readonly', true);
		$('#purchase_line_amount_c_'+k).attr('readonly', true);
		
		$('#purchase_cost_per_unit_c_'+k).change(function(){

			 purchaseLineAmount(k);
		});

		$('#provided_quantity_c_'+k).change(function(){

			purchaseLineAmount(k);
		});
		//===================================================================
		

		//=======================total excise cost calculation===============
		$('#total_excise_cost_c_'+k).attr('readonly', true);
	
		$('#excise_per_unit_c_'+k).change(function(){
			calculateExcise(k);
		});

		$('#provided_quantity_c_'+k).change(function(){
			calculateExcise(k);
		});
		//===================================================================

		//=======================vendor tax amount calculation===============
		$('#vendor_tax_amount_c_'+k).attr('readonly', true);


		$('#vendor_tax_percent_c_'+k).change(function(){
			vendortaxamount(k);
			totalPurchaseCost(k);
		});

		//===================================================================

	

		//=======================customer tax calculation====================
		$('#customer_tax_c_'+k).attr('readonly', true);
				
			calculatecustomertax(k);

	
		
		$('#sales_rate_per_unit_c_'+k).change(function(){
			var qtyy = parse_Float_Custom($('#provided_quantity_c_'+k).text());
			var srpu1 = parse_Float_Custom($('#sales_rate_per_unit_c_'+k).val());
			var csp1 = parse_Float_Custom(qtyy*srpu1);
			
			csp1 = Math.floor(csp1 * 100) / 100;
			if(!csp1) $('#customer_sales_price_c_'+k).val('0');
			else $('#customer_sales_price_c_'+k).val(csp1);
			
			calculatecustomertax(k);
			calculate_margPer_totalSalesValue_totalMarginPer(k);
			
		});
		
		

		//===================================================================

		

		//====================charges calculation============================
		
		$('#provided_quantity_c_'+k).change(function(){
			tliq=0;
			
			var lineitm1 = $('#vmrfq_count').val();
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					if(document.getElementById('provided_quantity_c_'+i)!=null)
					{	
						var tmpvar = parse_Float_Custom($('#provided_quantity_c_'+i).val());
						if(!parse_Float_Custom(tmpvar))
							tmpvar="0";
						tliq = parse_Float_Custom(tliq) + parse_Float_Custom(tmpvar);
					}

				}
			}
			
			if(lineitm1 > 0)
			{
				for(i=1;i<=lineitm1;i++)
				{
					//=======================customer freight charges calculation===========
					var cfc = parse_Float_Custom($('#customer_freight_payment_c').val());
					var fc_c = parse_Float_Custom((cfc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					if(!fc_c)$('#customer_freight_charges_c_'+i).val('0');
					else
					{	fc_c = Math.floor(fc_c * 100) / 100;
						$('#customer_freight_charges_c_'+i).val(fc_c);
					}

					//===================================================================
					//=======================customer loading charges calculation===========
					var clc = parse_Float_Custom($('#customer_loading_payment_c').val());
					var lc_c = parse_Float_Custom((clc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					if(!lc_c)$('#customer_loading_charges_c_'+i).val('0');
					else
					{	lc_c = Math.floor(lc_c * 100) / 100;
						$('#customer_loading_charges_c_'+i).val(lc_c);
					}

					//===================================================================

					//=======================total freight charges calculation===========
					var vfc = parse_Float_Custom($('#vendor_freight_charge_c').val());
					var fc = parse_Float_Custom((vfc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					if(!fc)$('#freight_charges_c_'+i).val('0');
					else
					{	fc = Math.floor(fc * 100) / 100;
						$('#freight_charges_c_'+i).val(fc);
					}

					//===================================================================

					//=======================total loading charges calculation===========
					var vlc = parse_Float_Custom($('#vendor_loading_charge_c').val());
					var lc = parse_Float_Custom((vlc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					if(!lc)$('#loading_charges_c_'+i).val('0');
					else
					{	lc = Math.floor(lc * 100) / 100;
						$('#loading_charges_c_'+i).val(lc);
					}

					//===================================================================

					//=======================total professional charges calculation======
					var vpc = parse_Float_Custom($('#professional_charge_c').val());
					var pc = parse_Float_Custom((vpc*(parse_Float_Custom($('#provided_quantity_c_'+i).val())))/tliq);
					if(!pc)$('#professional_charges_c_'+i).val('0');
					else
					{	pc = Math.floor(pc * 100) / 100;
						$('#professional_charges_c_'+i).val(pc);
					}
				}
			}
			//===================================================================
				
			
			//===================================================================

		});

		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$('#vendor_loading_charge_c').change(function(){
			CalculateVendorLoadingCharges();
		});

		
		$('#vendor_freight_charge_c').change(function(){
			CalculateVendorFreightCharges();	
		});
		
		$('#customer_loading_payment_c').change(function(){
			CalculateCustomerLoadingCharges();
		});
		
		$('#customer_freight_payment_c').change(function(){	
			CalculateCustomerFreightCharges();
		});
		
		$('#professional_charge_c').change(function(){
			CalculateProfessionalCharges();
		});
	}
}

	function validateexciseperunit(k){
	
	var price_ex = $('#need_excise_exclusive_price_c').prop('checked');


			var load_ex_perunit_var = 'excise_per_unit_c_'+k;
			var load_ex_perunitlabel = 'excise_per_unit_c_label_'+k;
			
			var loadnewexid = load_ex_perunit_var;         
			var loadnewexlabel =  load_ex_perunitlabel;        

			if(price_ex && document.getElementById(loadnewexid)!=null){
				
					addToValidate('EditView', loadnewexid, 'decimal', true,'Excise Per Unit' );
					
				}
				else if(document.getElementById(loadnewexid)!=null){
					
							
						custremoveFromValidate('EditView',loadnewexid);  
					 	clear_specific_error(loadnewexid);
						
						
							$('#'+ loadnewexid).val('');
							$('#'+ loadnewexid).css('visibility','hidden');
							$('#'+ loadnewexlabel).css('visibility','hidden');			
						
							
					
					
					
				}
			}

function clear_specific_error(id)
	{
		
		for(var wp=0;wp<inputsWithErrors.length;wp++)
		{
			
			if(inputsWithErrors[wp].id == id){
				if(typeof(inputsWithErrors[wp])!='undefined'&&typeof inputsWithErrors[wp].parentNode!='undefined'&&inputsWithErrors[wp].parentNode!=null){if(inputsWithErrors[wp].parentNode.className.indexOf('x-form-field-wrap')!=-1)
				{
					// only remove if validation message is there
					if(inputsWithErrors[wp].parentNode.parentNode.lastChild.className == 'required validation-message'){

						inputsWithErrors[wp].parentNode.parentNode.lastChild.innerHTML="";
					}
				}
			else
			{
				if(inputsWithErrors[wp].parentNode.lastChild.className == 'required validation-message'){
				

					inputsWithErrors[wp].parentNode.lastChild.innerHTML="";
				}
				}}
			}

		}

	}
	
	function custremoveFromValidate(formname,name)
	{
		var i;
		for(i=0;i<validate[formname].length;i++)
			{

				if(validate[formname][i][nameIndex]==name)
				{
					
					validate[formname].splice(i--,1);
				}
			}
}