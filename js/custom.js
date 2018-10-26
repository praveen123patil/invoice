$(document).ready(function(){
	//var htmlelemet="<tr><th scope="row">1</th><td><input type="text" class="form-control" placeholder="Item"></td><td><input type="text" class="form-control" placeholder="HSN/SAC"></td><td><input type="text" class="form-control" placeholder="Description"></td> <td><input type="text" class="form-control" placeholder="Amount"></td></tr>";
    $("#addelement").click(function(){
    	var htmlelemet = $("#hidden-row").html();
    	$(".tblcls").append(htmlelemet);
    	$("td.sno").each(function(index,element){                 
           $(element).text(index + 1); 
        });
    });
    
    $("td.sno").each(function(index,element){                 
        $(element).html(index + 1); 
    });


    $(document).on('keyup','.item-amount', function(event){
    //$('.item-amount').keyup(function(ev){
    	var sub_total=0;
    	$('.item-amount').each(function(index,element){
    		console.log($(element).val());
    		if(!isNaN($(element).val()) && $(element).val() != ''){
	    		sub_total=parseInt($(element).val())+sub_total;
	    		var divobj4 = document.getElementById('sub_total')
	    		divobj4.value=sub_total;
    		}
    	});

		var total = $('#sub_total').val() * 1;
		var tot_price1 = (total/100)*9;
        var num1 = tot_price1;
        var n1 = num1.toFixed(2);
		var divobj1 = document.getElementById('sgst');
		divobj1.value = n1;
		var tot_price2 = (total/100)*9;
        var num2 = tot_price2;
        var n2 = num2.toFixed(2);
		var divobj2 = document.getElementById('cgst');
		divobj2.value = n2;
		var grandtotal=tot_price1+tot_price2+total;
		var divobj3 = document.getElementById('total');
		divobj3.value= grandtotal;
	});


});

