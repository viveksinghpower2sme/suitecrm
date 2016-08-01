$(document).ready(function revampDocumentUrl()
{
	$("#filename a").attr('href',$("#filename a").attr('href') + "&filename="+$("#filename a").text());
	$("#filename_1 a").attr('href',$("#filename_1 a").attr('href') + "&filename="+$("#filename_1 a").text());
	$("#filename").parent().siblings().text("Upload PO");
	$("#filename_1").parent().siblings().text("Upload PDC");
	$("#fp_event_locations_aos_quotes_1fp_event_locations_ida").parents('td').prev().text("Ship To Address:");
	$("#fp_event_locations_aos_quotes_2fp_event_locations_ida").parents('td').prev().text("Bill To Address");
}
);