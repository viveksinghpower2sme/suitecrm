
function checkpan(pan){
	
	if(pan == undefined  || pan == ''){
	
		return true;	
	}
		pan.toString();
		pan = pan.toUpperCase();
		if(pan.length != 10)
        {
            return false;
        }

        if( !(pan[3]=='A' || pan[3]=='B' || pan[3]=='C' || pan[3]=='F' || pan[3]=='G' || pan[3]=='H' || pan[3]=='L' || pan[3]=='J' || pan[3]=='P' || pan[3]=='T' || pan[3]=='K' ))
        {
            return false;
        }
        if( !((pan[0]>='A' && pan[0]<='Z') && (pan[1]>='A' && pan[1]<='Z') && (pan[2]>='A' && pan[2]<='Z') && (pan[3]>='A' && pan[3]<='Z') && (pan[4]>='A' && pan[4]<='Z'))) 

        {
            return false;
        }
        if( !((pan[5]>=0 && pan[5]<=9) && (pan[6]>=0 && pan[6]<=9) && (pan[7]>=0 && pan[7]<=9) && (pan[8]>=0 && pan[8]<=9) )) 

        {
            return false;
        }
        if( !((pan[9]>='A' && pan[9]<='Z'))) 

        {
            return false;
        }
        
        return true;
}
function checkcin(cin){
	
		if(cin == undefined  || cin == ''){
		return true;	
	}
		cin.toString();
		cin = cin.toUpperCase();
	    if(cin.length != 21)
        {
            return false;
        }

        if(!(cin[0] == 'U' || cin[0] == 'L'))
        {
            return false;
        }
        if( !((cin[1]>=0 && cin[1]<=9) && (cin[2]>=0 && cin[2]<=9) && (cin[3]>=0 && cin[3]<=9) && (cin[4]>=0 && cin[4]<=9) && (cin[5]>=0 && cin[5]<=9) )) 

        {
            return false;
        }
        
								if(!(cin[6]>='A' && cin[6]<='Z') || !(cin[7]>='A' && cin[7]<='Z'))
								{
										return false;
								}        
        
        if( !((cin[8]>=0 && cin[8]<=9) && (cin[9]>=0 && cin[9]<=9) && (cin[10]>=0 && cin[10]<=9) && (cin[11]>=0 && cin[11]<=9))) 
       {
            return false;
        }

        if( !( (cin[12]=='P' && cin[13]=='L' && cin[14]=='C') || (cin[12]=='P' && cin[13]=='T' && cin[14]=='C')) )

        {
            return false;
        }
        if( !((cin[15]>=0 && cin[15]<=9) && (cin[16]>=0 && cin[16]<=9) && (cin[17]>=0 && cin[17]<=9) && (cin[18]>=0 && cin[18]<=9) && (cin[19]>=0 && cin[19]<=9) && (cin[20]>=0 && cin[20]<=9) )) 

        {
            return false;
        }
        return true;
}
function check_custom_data(action)
{
		var panno = $('#pan_c').val();
		var cinno = $('#cin_c').val();

		if(panno != '' && !checkpan(panno)){
				alert('Kindly fill correct PAN no');
				$('#pan_c').val('');
				$('#pan_c').focus();
				return false;
		}
		if(cinno != '' && !checkcin(cinno)){
						alert('Kindly fill correct CIN no');
							$('#cin_c').val('');
							$('#cin_c').focus();
				return false;
		}
		
		return check_form(action);
}
$(document).ready(function(){
	 if($('#sme_id_c').val() ==''){
			 $('#sme_id_c').hide();
 
	}
	$("#sme_id_c").prop("readonly", true);
	$('#detailpanel_securitygroups').hide();
});




var add_phoneNumber = function(name,primary_contact,opt_out,invalid,sel_type){

name = name || '';
primary_contact=primary_contact||0;
opt_out= opt_out||0;
invalid = invalid||0;
sel_type=sel_type||'';
landline ='';
mobile ='';
fax ='';
if(sel_type == 'landline')
	landline = 'selected';
else if (sel_type == 'mobile')
	mobile = 'selected';
else
	fax = 'selected';

var phone_count = parseInt($('#phone_count').val());
var incr_count  = phone_count + 1;
var select_phonetype = '<select id="sel_'+incr_count+'" name="sel_'+incr_count+'"><option value="landline" '+landline+' >Landline</option><option value="mobile" '+mobile+'>Mobile</option>' +
                        '<option value="fax" '+fax+'>Fax</option></select>';
checked ='';
if(primary_contact == 1)
	checked = 'checked';
optout_checked ='';
if(opt_out == 1)
	optout_checked = 'checked';
if(invalid==1)
	invalid='checked';
str_append = '<tr ><td>'+select_phonetype+
' <input type="text" id = "phone_'+incr_count+'" name="phone_'+incr_count+'" value="'+name+'" size="30"/>' +
'<button onclick="javascript:remove_phoneNumber(this)" id="'+incr_count+'" class="id-ff-remove" name="'+incr_count+'" type="button" tabindex="0">' +
'<img src="index.php?entryPoint=getImage&amp;themeName=Sugar5&amp;imageName=id-ff-remove-nobg.png"></button></td><td>' +
'<input type="radio" style="vertical-align: middle" name="phoneradio" value="'+incr_count+'" '+checked+'></td><td>' +
'<input type="checkbox" name="optedout_phone_'+incr_count+'" '+optout_checked+'  value="'+incr_count+'"></td><td>' +
'<input type="checkbox" name="invalid_phone_'+incr_count+'" '+invalid+' value="'+incr_count+'"></td></tr>';
$("#tbl_phone").last().append(str_append);
$('#phone_count').val(incr_count);
}

var remove_phoneNumber = function(res){
//var decr_count = parseInt($('#phone_count').val()) -1;
$(res).closest( 'tr').remove();
//$('#phone_count').val(decr_count);
//resetTheOrder();
}

function resetTheOrder(){
var input = $('#tbl_phone input').attr('name','');
var select_val = $('#tbl_phone select').attr('name','');
var button = $('#tbl_phone button').attr('name','');

$.each(input,function(index,value){
  var incr_val = index+1;
  $(value).attr('name','phone_'+incr_val).prop('id','phone_'+incr_val);
});

$.each(select_val,function(index,value){
  var incr_val = index+1;
  $(value).attr('name','sel_'+incr_val).prop('id','sel_'+incr_val);
});

$.each(button,function(index,value){
  var incr_val = index+1;
  $(value).attr('name',incr_val).prop('id',incr_val);
});
}

function addRecords()
{
	var dat = $('#phonerecordedit').val();

	if(dat != "")
	{
		var phone_record = JSON.parse(dat);
		
		for (var i = 0; i < phone_record.length; i++) 
		{
			add_phoneNumber(phone_record[i].name,phone_record[i].primary_contact,phone_record[i].opted_out,phone_record[i].invalid,phone_record[i].sel_type);
		}
	}	
	
}
