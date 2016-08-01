<?php $numCounter = $_GET['num']; ?>
<?php $vmrfqId = $_GET['vmrfqId']; ?>

<table width="">
<tr>
<td width="12.5%" valign="top" scope="col">
Payment Method:
<span class="required">*</span>
</td>

<td>
<select title="" id="payment_method_c_<?php echo $numCounter; ?>" name="payment_method_c_<?php echo $numCounter; ?>">
<option selected="selected" value="advance" label="Advance">Advance</option>
<option value="nbfc" label="NBFC">NBFC</option>
<option value="lc" label="LC">LC</option>
<option value="p2s_credit" label="P2S Credit">P2S Credit</option>
</select>
</td>
</tr>

<tr>
<td width="12.5%" valign="top" scope="col">
Payment Amount:
</td>

<td>
<input type="text" tabindex="0" title="" value="" maxlength="18" size="30" id="payment_amount_c_<?php echo $numCounter; ?>" name="payment_amount_c_<?php echo $numCounter; ?>">
</td>
</tr>
<tr>
<td width="12.5%" valign="top" scope="col">
Payment %:
</td>

<td>
<input type="text" tabindex="0" title="" value="" maxlength="18" size="30" id="payment_c_<?php echo $numCounter; ?>" name="payment_c_<?php echo $numCounter; ?>">
</td>
</tr>
<tr>
	<td colspan="2">
		<button tabindex="0" type="button" name="removePayment" class="id-ff-remove" id="removePayment" onclick="javascript:removePaymentHtml('payment',<?php echo $numCounter; ?>,<?php echo $vmrfqId; ?>)"><img src="index.php?entryPoint=getImage&amp;themeName=Sugar5&amp;imageName=id-ff-remove-nobg.png"></button>
	</td>
</tr>	

</table>