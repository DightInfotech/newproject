/* $(document).ready(function() {
    $('.admin-header').click(function(e) {
        e.preventDefault();
        alert();
        $.ajax({
			headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url : 'http://jobotron.dev/jobs/1/clone',
			dataType : 'json',
            type: 'POST',
            data: {},
            success:function(response) {
            	alert('REQ DONE');
            	var res = JSON.stringify(response);
            	$('#jobs-list').append('<li>' + res + '</li>');
            	//alert(res);
            },
        })
    });
}); */
