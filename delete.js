$(document).ready(function(){

$(".delete").on("click", function(event){

	var ele = $(this);
	var eachRecord = ele.parent().parent();

	var eachName = eachRecord.find("td:nth-child(3)").html();
	var uName = eachName.toUpperCase();

	var canIdelete = confirm("ARE U SURE U WANT TO DELETE RECORD OF " + uName);
	if( !canIdelete ) event.preventDefault();

});


});