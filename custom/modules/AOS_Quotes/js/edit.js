// naming conventions
// comments

var locationDef = "";

$(document).ready(function(){
	
	locationDef = ($("#billing_contact_id").length > 0) ? $("#billing_contact_id").text() : $("#billing_contact").val(); 
	console.log("Location "+locationDef);
	categoryChange();
	changeLabels();
	
});

function categoryChange()
{
	$("#category_c").change(function(e){
		
		var category = this.value;
		getUomList(category);
		var newIdsHidden = $("#vmrfq_count1").val();
		var newIds = newIdsHidden.split(",");
		umoPopulate(newIds);		
	});
}

function changeLabels()
{
	$("#filename_label").text("Upload PO");
	$("#filename_1_label").text("Upload PDC");
	$("#fp_event_locations_aos_quotes_1_name_label").text("Ship To Address");
	$("#fp_event_locations_aos_quotes_2_name_label").text("Bill To Address");	
	$("#users_aos_quotes_2_name_label").text("SCM User");
}

var className = "vmrfqControls";
var incr_count = 0;
var deleteVmrfqIds = new Array();
var inserVmrfq = new Array();
var uomArray = "";
var htmlData = '';
//Call only in case of EDIT to avoid multiple ajax. Will find out better solution
//GetHtmlForLineItems
function GetHtml(recordId)
{

	$.ajax({
			 
			    // The URL for the request
			    url: "/suitecrm/index.php",
			 	// The data to send (will be converted to a query string)
			    data: {
			        keyid: incr_count,
			        target_module: 'VMRFQ_VMRFQ',
			        to_pdf: true,
			        tpl: 'QuickCreate.tpl',
			        return_module: 'AOS_Quotes',
			        return_action: 'DetailView',
			        action: 'SubpanelCreates',
			        module: 'Home',
					      //record1: '967ad3a5-99f0-6641-16c5-576d44d3b824',
			        target_action: 'QuickCreate',
			       // async:'false',
			        aos_quotes_vmrfq_vmrfq_1_create_button: 'Create',
			        record1 : recordId

			    },
			 
			    // Whether this is a POST or GET request
			    type: "GET",
			 
			    // The type of data we expect back
			    dataType : "html",
			})
			  // Code to run if the request succeeds (is done);
			  // The response is passed to the function
			  .done(function( html ) {
			  	/*console.log("----------Edit Case--------------");
			  	console.log(html);*/
				htmlData = html;
				PopulateEditData();
			  })
			  // Code to run if the request fails; the raw request and
		  // status codes are passed to the function
		  .fail(function( xhr, status, errorThrown ) {
		  	
		    console.log( "Error: " + errorThrown );
		    console.log( "Status: " + status );
		  })
}
var add_lineItem = function(j=-1,incr_count,quote_record,recordFlag){




if(!htmlData)
{


	$.ajax({
			 
			    // The URL for the request
			    url: "/suitecrm/index.php",
			 	// The data to send (will be converted to a query string)
			    data: {
			        keyid: incr_count,
			        target_module: 'VMRFQ_VMRFQ',
			        to_pdf: true,
			        tpl: 'QuickCreate.tpl',
			        return_module: 'AOS_Quotes',
			        return_action: 'DetailView',
			        action: 'SubpanelCreates',
			        module: 'Home',
					target_action: 'QuickCreate',
			       // async:'false',
			        aos_quotes_vmrfq_vmrfq_1_create_button: 'Create',
			        record1 : null

			    },
			 
			    // Whether this is a POST or GET request
			    type: "GET",
			 
			    // The type of data we expect back
			    dataType : "html",
			})
			  // Code to run if the request succeeds (is done);
			  // The response is passed to the function
			  .done(function( html ) {
			  /*	console.log("----------Add Case--------------");
			  	console.log(html);*/
				htmlData = html;
				CreateHTML(htmlData,j,incr_count,quote_record,recordFlag);

				
			  })
			  // Code to run if the request fails; the raw request and
		  // status codes are passed to the function
		  .fail(function( xhr, status, errorThrown ) {
		  	
		    console.log( "Error: " + errorThrown );
		    console.log( "Status: " + status );
		  })
}
else
{

	CreateHTML(htmlData,j,incr_count,quote_record,recordFlag);

}
	
}  

//var tqty=parseFloat(0);//by dinesh
function CreateHTML(html,j=-1,incr_count,quote_record,recordFlag)
{
	var priceRegex = /<div id="detailpanel_1" >[\s\S]*?<\/div>/igm;
	html = html.match(priceRegex)
	var data = html,
	numCompare = incr_count;
	

	div = $("<div>");

	div.append(data);

	div.find("[id]").each(function () {

		$(this).attr("id", function (index, attr) {
			return attr + "_" + numCompare;
		});
		//console.log(this);
		var typeOfControl = $(this)[0].tagName;
		var attr = $(this).attr('type');
		var cId = $(this).attr("id");
		
		var hiddenIdsArray = ["fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida_"+numCompare,"sku_sku_vmrfq_vmrfq_2_name_"+numCompare,"sku_sku_vmrfq_vmrfq_1sku_sku_ida_"+numCompare,"uom_c_"+numCompare,"vend_vendor_vmrfq_vmrfq_1vend_vendor_ida_"+numCompare,"vendor_taxation_type_c_"+numCompare,"sku_code_c_"+numCompare,"sku_sku_vmrfq_vmrfq_2sku_sku_ida_"+numCompare,"sub_commodity_c_"+numCompare,"vm_c_"+numCompare,"vm_name_c_"+numCompare,"form_type_c_"+numCompare,"vendor_payment_method_c_"+numCompare]; 
		
		//if((typeOfControl == "INPUT" && attr == "text") || typeOfControl == "SELECT" || typeOfControl == "SPAN" || (typeOfControl == "INPUT" && attr == "hidden" && cId == fg))
		if((typeOfControl == "INPUT" && attr == "text") || typeOfControl == "SELECT" || typeOfControl == "SPAN" || ($.inArray(cId , hiddenIdsArray) >= 0))
		{	
			//console.log(typeOfControl);
			
			var prevClassName = $(this).attr('class');
			var newClassName = className;
			if(prevClassName != undefined)
			{
				newClassName  = prevClassName + " " + className;
			}						
			$(this).attr('class',newClassName);
		}
			
	});
	
	div.find("[name]").each(function () {
		$(this).attr("name", function (index, attr) {
			return attr + "_" + numCompare;
		});
		
	});
	
	var buttonId = "removeButton_"+numCompare;
	var providedSkufield = "sku_code_c_"+numCompare;
	var requestedSkufield = "r_sku_code_c_"+numCompare;
	var vmrfqId = "vmrfqId_"+numCompare;
	var isEdit = "isEdit_"+numCompare;
	var vmName = "vm_name_c_"+numCompare;
	
	var horizontal_line_id =  "horizontal_line_"+numCompare;
	var mainHtml = div.html() ;
	
	mainHtml = mainHtml.substring(0, mainHtml.length - 6);
	
	var hiddenHtml = mainHtml ;
	hiddenHtml += '<input type="hidden"  class="'+className+'" name="'+providedSkufield+'" id ="'+providedSkufield+'" value="">';
	hiddenHtml += '<input type="hidden"  class="'+className+'" name="'+requestedSkufield+'" id ="'+requestedSkufield+'" value="">';
	hiddenHtml += '<input type="hidden"  class="'+className+'" name="'+isEdit+'" id ="'+isEdit+'" value="bond">';
	hiddenHtml += '<input type="hidden"  class="'+className+'" name="'+vmName+'" id ="'+vmName+'" value="">';


	//if(quote_record != null && quote_record != "" && quote_record.hasOwnProperty('rfq_state') && quote_record.rfq_state == "new" )
	if(recordFlag == 0)
	{
		hiddenHtml += '<button tabindex="0" type="button" name="'+buttonId+'" class="id-ff-remove" id="'+buttonId+'" onclick="javascript:removeLineItems(\''+numCompare+'\')">';
		hiddenHtml += '<img src="index.php?entryPoint=getImage&amp;themeName=Sugar5&amp;imageName=id-ff-remove-nobg.png"></button>';
	}
	
	hiddenHtml += '<input type="hidden" name="'+vmrfqId+'" class="checkCount '+className+'"  id ="'+vmrfqId+'" value="0" />';
	hiddenHtml += '<hr id="'+horizontal_line_id+'" />' ;
	hiddenHtml += '</div>';
	$("#tbl_vmrfqdata").prepend(hiddenHtml);
	
	
	changeHtmlLables(numCompare);
	
	var strVendor = [{'previousStr':'form_SubpanelQuickCreate_VMRFQ_VMRFQ','currentStr' : 'EditView'},{'previousStr':'vend_vendor_vmrfq_vmrfq_1_name', 'currentStr':'vend_vendor_vmrfq_vmrfq_1_name_'+numCompare},{"previousStr":"vend_vendor_vmrfq_vmrfq_1vend_vendor_ida","currentStr":"vend_vendor_vmrfq_vmrfq_1vend_vendor_ida_" + numCompare}];

	var strLocation = [{'previousStr':'form_SubpanelQuickCreate_VMRFQ_VMRFQ','currentStr' : 'EditView'},{'previousStr':'fp_event_locations_vmrfq_vmrfq_1_name', 'currentStr':'fp_event_locations_vmrfq_vmrfq_1_name_'+numCompare},{"previousStr":"fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida","currentStr":"fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida_"+numCompare},{'previousStr':'vend_vendor_vmrfq_vmrfq_1_name', 'currentStr':'vend_vendor_vmrfq_vmrfq_1_name_'+numCompare}];

	var strCrossVendor = [{'previousStr':'vend_vendor_vmrfq_vmrfq_1_name','currentStr' : 'vend_vendor_vmrfq_vmrfq_1_name_'+numCompare},{"previousStr":"vend_vendor_vmrfq_vmrfq_1vend_vendor_ida","currentStr":"vend_vendor_vmrfq_vmrfq_1vend_vendor_ida"+numCompare}];

	var strCrossLocation = [{'previousStr':'fp_event_locations_vmrfq_vmrfq_1_name','currentStr' : 'fp_event_locations_vmrfq_vmrfq_1_name_'+numCompare},{"fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida":"fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida_"+numCompare}];


	
	changeStringOfButton("btn_vend_vendor_vmrfq_vmrfq_1_name_",numCompare,'onclick',strVendor); 
	changeStringOfButton("btn_fp_event_locations_vmrfq_vmrfq_1_name_",numCompare,'onclick',strLocation);
	changeStringOfButton("btn_clr_vend_vendor_vmrfq_vmrfq_1_name_",numCompare,'onclick',strCrossVendor);
	changeStringOfButton("btn_clr_fp_event_locations_vmrfq_vmrfq_1_name_",numCompare,'onclick',strCrossLocation);
	var skuTypeId ={'requested':'sku_sku_vmrfq_vmrfq_1_name_','provided':'sku_sku_vmrfq_vmrfq_2_name_'};
	revampLineItemHtml(numCompare);
	//getUomList($("#category_c").val());
	umoPopulate([numCompare]);	

	populateSkuAutoComplete(numCompare, skuTypeId);

	// add all validation for line items
	validateexciseperunit(numCompare);
	PopulateCommodity();		
	formulaImplementation(numCompare); 
	
	
	PopulateSubCommodity1(numCompare);
	var locationId = $('#fp_event_locations_aos_quotes_1fp_event_locations_ida').val();
	var categoryName = $('#category_c').val();
	
	
	if(quote_record!=null)	
	{
		var subcatName = quote_record.sub_commodity_c;
		PopulateVM(numCompare,locationId,categoryName,subcatName);
	}	

	
	
	// -----------------------------Edit SKU--------------------------------				
	if(quote_record!=null)	
	{
		setValues(j,quote_record);
	}
	copySku(numCompare);
	copyQty(numCompare);
	$('#form_type_c_label_'+numCompare).css('visibility','visible');
	$('#form_type_c_'+numCompare).css('visibility','visible');
	vendorFormType(numCompare);
	setFormVisibility(numCompare);
	vendortax(numCompare);
	FillVendorCreditDaysDSODays();  
	
}


function changeHtmlLables(numCompare)
{
	$("#sku_sku_vmrfq_vmrfq_1_name_" + numCompare).siblings('span').remove();
	$("#sku_sku_vmrfq_vmrfq_2_name_" + numCompare).siblings('span').remove();
	$("#requested_quantity_c_"+numCompare).attr('size','10');
	$("#provided_quantity_c_"+numCompare).attr('size','10');

	$("#sku_sku_vmrfq_vmrfq_1_name_"+numCompare).attr('size','30');
	$("#sku_sku_vmrfq_vmrfq_2_name_"+numCompare).attr('size','30');
	$("#sku_sku_vmrfq_vmrfq_1_name_label_" + numCompare).text("Requested SKU");
	$("#sku_sku_vmrfq_vmrfq_2_name_label_" + numCompare).text("Provided SKU");
}

function populateSkuAutoComplete(numCompare,skuTypeId)
{
	$.each(skuTypeId,function(i,o){
							
		$( "#"+o+numCompare ).autocomplete({
	        source: function( request, response ) {
	            getSkuDesc(request,response,numCompare);
	        },
	        autoFocus: true,
	        minLength: 2,
	        change: function(event, ui) {
	       	 if (ui.item) {
			      
		        var sku1=ui.item.sku_val;
		       
		        if(i=='provided'){
		         $("#sku_code_c_"+numCompare).val(sku1);
		     	}
		     	else
		     	{
		     		 $("#r_sku_code_c_"+numCompare).val(sku1);
		     	}
		     } 
		     else {
		        	if(i=='provided'){
		          	 $( "#"+o+numCompare).val("");
		            $("#sku_code_c_"+numCompare).val("");
		      }
		      else{
		      		$("#r_sku_code_c_"+numCompare).val("");
		      }
		      
	    }
	        		
    
	    	}
	        
	       
	    });	 
	    

	 });
	 
	    
	    
}

function changeStringOfButton(buttonId,rowCount,attrName,stringArray)
{
	if($("#"+buttonId+rowCount).length > 0)
	{
		var buttonStr = $("#"+buttonId+rowCount).attr(attrName); 
		//console.log("previous "+buttonStr);
		$.each(stringArray,function(i,o){

			var as = '"'+o.previousStr+'"';
			var bs = '"'+o.currentStr+'"';
			//console.log(buttonStr);
			//console.log(bs);
			
			buttonStr = buttonStr.replace(as,bs);

			var as = "'"+o.previousStr+"'";
			var bs = "'"+o.currentStr+"'";
			//console.log(buttonStr);
			//console.log(bs);
			
			buttonStr = buttonStr.replace(as,bs);
			//console.log("inside loop " +sd);

		});

		//console.log("after replace "+buttonStr);
		$("#"+buttonId+rowCount).attr(attrName,buttonStr);
	}
	
}

function getSkuDesc(request,response,line_no)
{
	
var subcommvalspan = '';
var subcommvaldd = '';
var subcommval = '';

	subcommvalspan = 'sub_commodity_c_'+line_no+'_span';

	subcommvaldd = 'sub_commodity_c_'+line_no;
	
	if(document.getElementById(subcommvaldd) != null)
	{
			 subcommval = 	$('#'+subcommvaldd).val();
	}
	else if(document.getElementById(subcommvalspan) != null){
				 subcommval = 	$('#'+subcommvalspan).text();
	}
	
	
	
	//console.log(request);
    $.ajax({
        type:'Post',
        url : 'service/sku.php',
        dataType: "json",
        data: {
            action: 'autocomSkuDesc',
            name_startsWith: request.term,
            type: 'PRODUCT_NAME',
            category: $('#category_c').val(),
            subcategory: subcommval,
           },
        success: function( data ) {
        	        	
            var longDescArray = [];
            $.each(data,function(index,value){
                longDescArray.push(value);

            })
            response( $.map( longDescArray, function( item ) {

                return {
                    label: item.longDescription,
                    value: item.longDescription,
                    sku_val: item.skucode
                    

                }
            }));


        }
    });
}

function umoPopulate(numCompare)
{
	var selectOptions = "";
	
	$.each(numCompare,function(j,obj){
		
		$.each(uomArray,function(i,obj){

			var optionVal = obj;
			selectOptions += "<option value = \'"+optionVal+"\'>"+optionVal+"</option>";
		});
	
		$("#uom_c_"+obj).html(selectOptions);
	});
	
	$("#sku_sku_vmrfq_vmrfq_2_name_"+numCompare).val("");
	
}

function getUomList(category){

    $.ajax({
        type:'Post',
        url : 'service/sku.php',
        async:false,
        dataType: "json",
        data: {
            action: 'fetchUom',
            category: category

        },
        success: function( data ) {
            
    		//console.log(data);
    		uomArray = data;

        }
    });
}

function assignScmOnDeletion(k)
{
	
	var lineitm = $('#vmrfq_count').val();

	var flag=0;
	for(var j=1 ; j<=lineitm ; j++)
	{
		if(document.getElementById('vm_c_'+j)!=null)
		{
			flag=1;
			break;
		}

	}
	if(flag==0)
	{
		
		$('#users_aos_quotes_2_name').val("");
		$('#users_aos_quotes_2users_ida').val("");
		return false;
	}
	
	for(var i=1;i<=lineitm;i++)
  	{
  		if(document.getElementById('vm_c_'+i)!=null)
  		{
  			$('#users_aos_quotes_2_name').val($('#vm_c_'+i+' option:selected').attr('label'));
			$('#users_aos_quotes_2users_ida').val($('#vm_c_'+i).val());
			break;
  		}
  	}

}

var removeLineItems = function(res){

	
	var vmrfqId = $("#vmrfqId_" + res).val();
	//alert(vmrfqId);
	if(vmrfqId != 0)
	{
		deleteVmrfqIds.push(vmrfqId);
		$('#vmrfqrecorddelete').val(deleteVmrfqIds);
	}
	$("#detailpanel_1_"+res).remove();
	
	

	var delVal = inserVmrfq.indexOf(res);
	if(delVal != -1)
	{
		inserVmrfq.splice(delVal,1);
		$('#vmrfq_count1').val(inserVmrfq);
	}

	/*if($(".checkCount").length == 0)
	{
		$("#category_c").attr("disabled",false);
	}*/

	assignScmOnDeletion(res);// today
}


var fetchRecords = function(recordId){
		
		
	var cat = $("#category_c").val();

	getUomList();
	if($("#rfq_state_c").val() == 'new')
	{
		recordId = null;
	}

	GetHtml(recordId);
			
}

function PopulateEditData()
{

	var rfq_records=$('#vmrfqrecordedit').val();
	if(rfq_records != "")
	{
		var quote_record = JSON.parse($('#vmrfqrecordedit').val());
		
		if(quote_record.length > 0)
		{		
			//$("#category_c").attr('disabled',true);
			$.each(quote_record,function(i,o){
				
				var j=parseInt(i)+1;
				var vmrfq_count = parseInt($('#vmrfq_count').val());
		
				incr_count  = vmrfq_count + 1;
				$('#vmrfq_count').val(incr_count);
		
				

				inserVmrfq.push(incr_count);
	
				$('#vmrfq_count1').val(inserVmrfq);

				
				var recFlag = 1;
				//console.log(quote_record[i].rfq_state);
				if(quote_record[i].rfq_state == "new")
				{
					recFlag = 0;
				}
			

				add_lineItem(j,incr_count,quote_record[i],recFlag);
				
				
			})
		}	
			
	}
}

function CreateNewLineItem()
{

	var vmrfq_count = parseInt($('#vmrfq_count').val());
	incr_count  = vmrfq_count + 1;
	$('#vmrfq_count').val(incr_count);
	
	inserVmrfq.push(incr_count);
	
	$('#vmrfq_count1').val(inserVmrfq);

	
	revampLineItemHtml(incr_count);
	add_lineItem(-1,incr_count,null,0);
	
}

function revampLineItemHtml(cout)
{
	 var Dynamichtml = '<tbody>';
	 var tdcount = 0;
	 Dynamichtml = Dynamichtml+'<tr>';
	 $("#detailpanel_1_" + cout + " table tr").each(function(i,o){		
		var tds = $(o).children('td');	
		var remove = 0;
		//console.log(tds);
		tds.each(function(k,objtd) {
			//console.log("-------"+unescape(this.innerHTML)+"-------"); 
			var txt = $('<div/>').html(this.innerHTML).text();
			
			if(tdcount%2 != 0)
			{
				$(this).attr('width','30');
				$(this).attr('colspan','2');
			}
			if ($.trim(txt) != '' || tdcount%2 != 0){
			Dynamichtml = Dynamichtml+this.outerHTML;
			tdcount++;
			if(tdcount==6)
			{
				tdcount = 0;
				Dynamichtml = Dynamichtml + '</tr><tr>';
			}
		}});
	});
	Dynamichtml = Dynamichtml + '</tr><tr>';
	Dynamichtml = Dynamichtml + '</tbody>';
	//console.log(Dynamichtml);
	$("#detailpanel_1_" + cout + " table tbody").remove();
	$("#detailpanel_1_" + cout + " table").append(Dynamichtml);

}

function vendorNameChange(incr_count)
{
	
	var vmName = $("#vm_c_"+incr_count+" option:selected").attr('label');
	$("#vm_name_c_"+incr_count).val(vmName);
	vmOnchange(incr_count);
}

var recordCount =0;
function fetchEditData(quote_record)
{

	setTimeout(function(){
		var j=parseInt(recordCount)+1;
		var vmrfq_count = parseInt($('#vmrfq_count').val());

		incr_count  = vmrfq_count + 1;
		$('#vmrfq_count').val(incr_count);

		add_lineItem(j,incr_count,quote_record[recordCount]);

		recordCount++

		if(recordCount<quote_record.length)
		{
			fetchEditData(quote_record);
		}

	},0);	
	
}



var readOnlyFields=
{'sku_sku_vmrfq_vmrfq_1sku_sku_ida':'sku_sku_vmrfq_vmrfq_1_name',
'sku_sku_vmrfq_vmrfq_2sku_sku_ida':'sku_sku_vmrfq_vmrfq_2_name',
'requested_quantity_c':'requested_quantity_c',
'provided_quantity_c':'provided_quantity_c',
'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida':'vend_vendor_vmrfq_vmrfq_1_name',
'fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida':'fp_event_locations_vmrfq_vmrfq_1_name',
'purchase_cost_per_unit_c':'purchase_cost_per_unit_c',
'vendor_credit_days_c':'vendor_credit_days_c',
'excise_per_unit_c':'excise_per_unit_c',
'uom_c':'uom_c',
'vendor_taxation_type_c':'vendor_taxation_type_c',
'loading_charges_c':'loading_charges_c',
'vendor_tax_percent_c' : 'vendor_tax_percent_c',
'vendor_tax_amount_c':'vendor_tax_amount_c',
'customer_freight_charges_c':'customer_freight_charges_c',
'professional_charges_c':'professional_charges_c',
'sales_rate_per_unit_c':'sales_rate_per_unit_c',
'customer_loading_charges_c':'customer_loading_charges_c',
'freight_charges_c':'freight_charges_c',
'total_purchase_cost_c':'total_purchase_cost_c',
'customer_tax_c':'customer_tax_c',
'customer_sales_price_c':'customer_sales_price_c',
'total_excise_cost_c':'total_excise_cost_c',
'margin_percent_c':'margin_percent_c',
'vm_c':'vm_name_c',
'vendor_payment_method_c':'vendor_payment_method_c',
'fb_event_locations_vmrfq_vmrfq_1_name':'fb_event_locations_vmrfq_vmrfq_1_name',
'form_type_c':'form_type_c',
'purchase_line_amount_c':'purchase_line_amount_c',
'sku_code_c':'sku_code_c',
'r_sku_code_c':'r_sku_code_c',
'sub_commodity_c':'sub_commodity_c'

};

var setValues = function(j,quote_record)
{
	
	console.log(quote_record);

	$("#detailpanel_1_" + j + " .vmrfqControls").each(function(){
			
		var controls = $(this).attr('id');
		
		controlValues = controls.substring(0,controls.lastIndexOf("_"));
		controlID ='#'+controls ;
		//console.log(controlID);
 		var a = $(this)[0].tagName;
		//console.log(a);

		if(a == "SPAN")
		{	
			/*console.log(controlID);
			console.log(controlValues);*/
			if(controlValues == "sku_sku_vmrfq_vmrfq_1sku_sku_ida" || controlValues == "sku_sku_vmrfq_vmrfq_2sku_sku_ida")
			{
				$(controlID).attr('data-id-value',quote_record[controlValues]);
			}		
			$(controlID).text(quote_record[readOnlyFields[controlValues]]);		
		}
		else if($(controlID).length > 0){
			/*console.log(controlID);
			console.log(quote_record[controlValues]);*/
			$(controlID).val(quote_record[controlValues]);	
			if(readOnlyFields[controlValues] == "uom_c" || readOnlyFields[controlValues] == "vendor_taxation_type_c" || readOnlyFields[controlValues] == "sub_commodity_c" || readOnlyFields[controlValues] == "vm_c" || readOnlyFields[controlValues] == "vm_name_c" || readOnlyFields[controlValues] == "form_type_c" || readOnlyFields[controlValues] == "vendor_payment_method_c")
			{
				
				var controlType = $(this).attr('type');
				//console.log(controlType);
				if( controlType == "hidden")
				{										
					$(controlID).replaceWith("<span id='"+controls+"_span'>"+quote_record[readOnlyFields[controlValues]]+"</span>");
				}	
			}
			
		}	
	 });

 	
	
	
}

function vmOnchange(rowCount)
{
	
 	$("#vm_c_"+rowCount).change(function(){
		var vmName = $("#vm_c_"+rowCount+" option:selected").text();
		$("#vm_name_c_"+rowCount).val(vmName);
	});
}


function CheckSave()
{
	$("#issave").val("1");
	return checkPOFormat();
}


