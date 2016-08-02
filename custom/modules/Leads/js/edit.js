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



var phone_count = parseInt($('#phone_count').val());
var incr_count  = phone_count + 1;
var select_phonetype = '<select id="sel_'+incr_count+'" name="sel_'+incr_count+'"><option value="landline" '+landline+' >Landline</option><option value="mobile" '+mobile+'>Mobile</option></select>';
checked ='';
if(primary_contact == 1)
	checked = 'checked';
optout_checked ='';
if(opt_out == 1)
	optout_checked = 'checked';
if(invalid==1)
	invalid='checked';

str_append = '<tr ><td>'+select_phonetype+' <input type="text" id = "phone_'+incr_count+'" name="phone_'+incr_count+'" value="'+name+'" size="30"/> <button onclick="javascript:remove_phoneNumber(this)" id="'+incr_count+'" class="id-ff-remove" name="'+incr_count+'" type="button" tabindex="0"><img src="index.php?entryPoint=getImage&amp;themeName=Sugar5&amp;imageName=id-ff-remove-nobg.png"></button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input type="radio" style="vertical-align: middle" name="phoneradio" value="'+incr_count+'" '+checked+' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input type="checkbox" name="optedout_phone_'+incr_count+'" '+optout_checked+'  value="'+incr_count+'">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input type="checkbox" name="invalid_phone_'+incr_count+'" '+invalid+' value="'+incr_count+'"> <br></td></tr>';

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
