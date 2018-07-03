(function ($) {

	$(document).ready(function() {

		$('button#author_info_image').on("click",function(element){
			
			element.preventDefault();
			
			var imageUploader;
			imageUploader = wp.media(
				{
					'title' 	: 	'Upload Author Image',
					'button'	: 	{
										'text' : 'Set the image'
									},
					'multiple'	: 	false
				}
			);
			imageUploader.open();

			imageUploader.on("select", function() {

				var image = imageUploader.state().get("selection").first().toJSON();
				var imageLink  = image.url;
				$("input.author_info_image_link").val(imageLink);
				$(".image_show img").attr('src', imageLink);

			});

		});

	});

}(jQuery))