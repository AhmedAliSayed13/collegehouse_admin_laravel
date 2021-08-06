/*
Author       : Dreamguys
Template Name: Doccure - Bootstrap Template
Version      : 1.0
*/

(function($) {
    "use strict";
	

	
	// Education Add More
	$(".education-info").on('click','.trash', function () {
		$(this).closest('.education-cont').remove();
		return false;
    });

    $(".add-education").on('click', function () {
		
		var educationcontent = '<div class="row form-row education-cont">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6 col-lg-2">' +
						'<div class="form-group">' +
							'<label>Size</label>' +
							'<input type="number" name="flooer_size[]" required class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-2">' +
						'<div class="form-group">' +
							'<label>Bathrooms</label>' +
							'<input type="number" name="flooer_bathroom[]" required class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-2">' +
						'<div class="form-group">' +
							'<label>Rooms</label>' +
							'<input type="number" name="flooer_room[]" required  class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-3">' +
						'<div class="form-group">' +
							'<label>describe</label>' +
							'<input type="text" name="flooer_describe[]" required class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-3">' +
						'<div class="form-group">' +
							'<label>image</label>' +
							'<input type="file" name="flooer_image[]" required class="form-control" accept="image/*">' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="fa fa-trash"></i></a></div>' +
		'</div>';
		
        $(".education-info").append(educationcontent);
        return false;
    });
    




	


	




	
	
	
	
})(jQuery);