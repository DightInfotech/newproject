$(document).ready(function(){    
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#role").change( function() {
		if($(this).val() == 2){
			$("#company-name").fadeOut();
		} else{
			$("#company-name").fadeIn();
		}
	});
	$(document).ready(function(){    
		$image_crop = $('#upload-image').croppie({
			enableExif: true,
			viewport: {
				width: 450,
				height: 200,
				type: 'vertical'
			},
			boundary: {
				width: 450,
				height: 450
			}
		});
		$('#images').on('change', function () { 
			var reader = new FileReader();
			reader.onload = function (e) {
				$image_crop.croppie('bind', {
					url: e.target.result
				}).then(function(){
					console.log('jQuery bind complete');
				});			
			}
			reader.readAsDataURL(this.files[0]);
		});
		$('.cropped_image').on('click', function (ev) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (response) {
			   
				$.ajax({
					url: "/newproject/public/ajaxRequest",
					type: "POST",
					data: {"image":response},
					success: function (data) {
						html = '<img src="' + response + '" />';
						$("#upload-image-i").html(html);
					}
				});
			});
		});	
	});
});
function showPropertyTitle(event)
{
    const value = event.target.value;
    document.getElementById("propertytitle").innerText = value;
}
function showPropertyAddress(event)
{
    const value = event.target.value;
    document.getElementById("propertyaddress").innerText = value;
}
function showPropertyCity(event)
{
    const value = event.target.value;
    document.getElementById("propertycity").innerText = value;
}
function showPropertyState(event)
{
    const value = event.target.value;
    document.getElementById("propertystate").innerText = value;
}
function showPropertyZip(event)
{
    const value = event.target.value;
    document.getElementById("propertyzip").innerText = value;
}