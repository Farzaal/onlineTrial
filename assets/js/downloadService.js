$(document).ready(function(){
	$('#downloadBtn').click(function(){
		var selected = [];
		//var fileName = [];
		var obj = {};
		$('#cptDownload input:checked').each(function() {
    		selected.push($(this).attr('id'));
		});

		var ReportPath = selected;

		 $.ajax({
        	url: BASE_URL+"welcome/downloadReport",
        	type: "post",
        	data: { ReportPath:ReportPath },
        	success:function(response){
        		//console.log(response);
        	}		    	
    	});
	});

   $('#emailSubmit').click(function(){

        var email = $('#repEmail').val();
        if (email == '') {
            $('.emailValid').html('<p style="color:red;">Invalid Email</p>');
            $('.emailValid').show();
        }else{
            $('.emailValid').hide();
            $.ajax({
                url: BASE_URL+"welcome/missingReport",
                type: "post",
                data: { email:email },
                success:function(response){
                    if (response == 'updated') {
                        $('.emailValid').html('<p style="color:green;">Email Updated Successfully<p/>');
                        $('.emailValid').show()
                    }
                }               
            });
        }
   });
})