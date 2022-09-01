(function($,window){
	$('.sub-menu>a').click(function(e) {
		$(this).parent().siblings().find('ul').slideUp(300);
		$(this).next('ul').stop(true, false, true).slideToggle(300);
		$(this).parent().toggleClass('open');
	});	
	$('.dropdown>a').click(function(e) {
		$(this).parent().siblings().find('ul').slideUp(300);
		$(this).next('ul').stop(true, false, true).slideToggle(300);
		$(this).parent().toggleClass('open');
	});		
	$('.dropdownlist>li strong').click(function(e) {
		$(this).parent().siblings().find('ul').slideUp(300);
		$(this).next('ul').stop(true, false, true).slideToggle(300);
		$(this).parent().toggleClass('open');
	});	
	$('.menu-open').click (function(){
		$(this).toggleClass('open');
		$('.c-menu--slide-left').toggleClass('is-active');
	});
	$('.menu-close').click (function(){
		$(this).toggleClass('open');
		$('.c-menu--slide-left').removeClass('is-active');
	});
	

	 $(".applicationsTab-item li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("active");
        $(this).parent().siblings().removeClass("active");
        var tab = $(this).attr("href");
        $(".tab-applicants").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
	  $('#accordion').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle();

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp();

    });
	//$("input[type=number]").stepper({});
	  // Input radio-group visual controls
    $('.radio-group label').on('click', function(){
        $(this).removeClass('not-active').siblings().addClass('not-active');
    });

    //input mask
	//var phoneMask = IMask(document.getElementsByClassName('phone-mask'), {
//		mask: '+{7}(000)000-00-00'
//	})
	$('.currency-mask').each(function(index, element){
		var currencyMask = new IMask(
			element,
			{
				mask: 'num',
				blocks: {
					num: {
						mask: Number,
						thousandsSeparator: ',',
						radix: '.'
					}
				}
			});
	});
	var mixmask = new IMask(
		document.getElementById('dynamic-mask'),
		{
			mask: [
				{
					mask: 'num',
					blocks: {
						num: {
							mask: Number,
							thousandsSeparator: ',',
							radix: '.'
						}
					}
				},
				{
					mask: /^\S*?\S*$/
				}
			]
		});
	$('.phone-mask').each(function(index, element){
		var phoneMask = IMask(element,
			{
				mask: '+(000)-000-0000'
			});
	});


	$('pre').each(function(i, e) {hljs.highlightBlock(e)});

})(jQuery,window);

$('#annumFields').hide();
$('#hourFields').hide();
$('#dayFields').hide();

function show_relevant_pay_fields() {
	var selected = $('#payType option:selected').val();
	if(selected == 'per_annum') {
		$('#hourFields').hide();
		$('#dayFields').hide();
		$('#annumFields').show();
	}
	else if(selected == 'per_hour') {
		$('#annumFields').hide();
		$('#dayFields').hide();
		$('#hourFields').show();
	}
	else if(selected == 'per_day') {
		$('#annumFields').hide();
		$('#hourFields').hide();
		$('#dayFields').show();
	}
	else {
		$('#annumFields').hide();
		$('#hourFields').hide();	
		$('#dayFields').hide();	
	}	
}

$(function() {
	show_relevant_pay_fields();
});

$('#payType').change(function() {
	show_relevant_pay_fields();
});

$('.js-add-consultant-btn').click(function(e) {
	e.preventDefault();
	$('.js-add-consultant').show();
});

$('[data-action="edit_category"]').click(function(e) {
	$('.cats-item').find('.close-box').hide();
	$('.cats-item').find('.edit-del-icon').show();
	$('.cats-item').find('.update-category').hide();

	$(this).parent().parent().find('.edit-del-icon').hide();
	$(this).parent().parent().find('.close-box').show();
	$(this).parent().parent().find('.update-category').fadeIn();
});

$('[data-action="cancel_edit_category"]').click(function(e) {
	$(this).parent().find('.close-box').hide();
	$(this).parent().find('.edit-del-icon').show();
	$(this).parent().find('.update-category').fadeOut();
});


$('#addConsultantBtn').click(function(e) {
	e.preventDefault();
	$('#addConsultant').fadeIn();
});


const non_consultant_dropdown = $('[data-action="non_consultant_dropdown"]');

non_consultant_dropdown.dropdown({
	allowAdditions: true,
});


function view_application(element, app_url, s3_url) {
	var created_at_diff = element.data('created-at-diff'),
	application_data = element.data('application'),
	candidate_data = element.data('candidate'),
	candidate_details_data = element.data('candidate-details'),
	location_pref_data = element.data('location-prefs'),
	category_pref_data = element.data('category-prefs'),
	type_pref_data = element.data('type-prefs'),
	salary_pref_data = element.data('salary-prefs'),
	job_cv_data = element.data('job-cv'),
	cvs_data =  element.data('cvs'),
	histories_data = element.data('histories'),
	histories_data = element.data('country');

	if(created_at_diff) {
		$('[data-application-target="created_at_diff"]').text('Applied ' + created_at_diff);
	}
	else {
		$('[data-application-target="created_at_diff"]').text('');
	}

	if(candidate_data.first_name) {
		$('[data-application-target="first_name"]').text(candidate_data.first_name.toString());
	}
	else {
		$('[data-application-target="first_name"]').text('');
	}

	if(candidate_data.last_name) {
		$('[data-application-target="last_name"]').text(candidate_data.last_name.toString());
	}
	else {
		$('[data-application-target="last_name"]').text('');
	}

	if(candidate_data.email) {
		$('[data-application-target="email_and_mailto"]').text(candidate_data.email.toString());
		$('[data-application-target="email_and_mailto"]').attr('href', 'mailto:' + candidate_data.email.toString());
	}
	else {
		$('[data-application-target="email_and_mailto"]').text('');
		$('[data-application-target="email_and_mailto"]').attr('href', 'mailto:');
	}

	if(candidate_data.email) {
		$('[data-application-target="mailto"]').attr('href', 'mailto:' + candidate_data.email.toString());
		$('[data-application-target="mailto"]').removeClass('hidden');
	}
	else {
		$('[data-application-target="mailto"]').attr('href', 'mailto:');
		$('[data-application-target="mailto"]').addClass('hidden');
	}

	if(candidate_data.tel) {
		$('[data-application-target="tel"]').text(candidate_data.tel.toString());
		$('[data-application-target="tel"]').parent().removeClass('hidden');
	}
	else {
		$('[data-application-target="tel"]').text('');
		$('[data-application-target="tel"]').parent().addClass('hidden');
	}

	if(candidate_data.tel_additional) {
		$('[data-application-target="tel_additional"]').text(candidate_data.tel_additional.toString());
		$('[data-application-target="tel_additional"]').parent().removeClass('hidden');
	}
	else {
		$('[data-application-target="tel_additional"]').text('');
		$('[data-application-target="tel_additional"]').parent().addClass('hidden');
	}

	if(candidate_data.avatar) {
		$('[data-application-target="avatar"]').removeClass('hidden');
		$('[data-application-target="avatar"]').attr('src', s3_url + '/avatar/' + candidate_data.avatar.toString());
	}
	else {
		$('[data-application-target="avatar"]').attr('src', app_url + '/images/default-avatar.jpg');
	}


	if(!candidate_details_data.overview && !candidate_details_data.career_history && !candidate_details_data.education && !candidate_details_data.skills && !candidate_details_data.awards && !candidate_details_data.interests && !candidate_details_data.references) {
		$('.js-toggle-candidate-profile').addClass('hidden');
	}
	else {
		$('.js-toggle-candidate-profile').removeClass('hidden');
	}

	if(candidate_details_data.overview) {
		$('[data-application-target="overview"]').parent().removeClass('hidden');
		$('[data-application-target="overview"]').html(candidate_details_data.overview.toString());
	}
	else {
		$('[data-application-target="overview"]').html('');
		$('[data-application-target="overview"]').parent().addClass('hidden');
	}

	if(candidate_details_data.career_history) {
		$('[data-application-target="career_history"]').parent().removeClass('hidden');
		$('[data-application-target="career_history"]').html(candidate_details_data.career_history.toString());
	}
	else {
		$('[data-application-target="career_history"]').html('');
		$('[data-application-target="career_history"]').parent().addClass('hidden');
	}

	if(candidate_details_data.education) {
		$('[data-application-target="education"]').parent().removeClass('hidden');
		$('[data-application-target="education"]').html(candidate_details_data.education.toString());
	}
	else {
		$('[data-application-target="education"]').html('');
		$('[data-application-target="education"]').parent().addClass('hidden');
	}

	if(candidate_details_data.skills) {
		$('[data-application-target="skills"]').parent().removeClass('hidden');
		$('[data-application-target="skills"]').html(candidate_details_data.skills.toString());
	}
	else {
		$('[data-application-target="skills"]').html('');
		$('[data-application-target="skills"]').parent().addClass('hidden');
	}

	if(candidate_details_data.awards) {
		$('[data-application-target="awards"]').parent().removeClass('hidden');
		$('[data-application-target="awards"]').html(candidate_details_data.awards.toString());
	}
	else {
		$('[data-application-target="awards"]').html('');
		$('[data-application-target="awards"]').parent().addClass('hidden');
	}

	if(candidate_details_data.interests) {
		$('[data-application-target="interests"]').parent().removeClass('hidden');
		$('[data-application-target="interests"]').html(candidate_details_data.interests.toString());
	}
	else {
		$('[data-application-target="interests"]').html('');
		$('[data-application-target="interests"]').parent().addClass('hidden');
	}

	if(candidate_details_data.references) {
		$('[data-application-target="references"]').parent().removeClass('hidden');
		$('[data-application-target="references"]').html(candidate_details_data.references.toString());
	}
	else {
		$('[data-application-target="references"]').html('');
		$('[data-application-target="references"]').parent().addClass('hidden');
	}

	if(app_url && application_data.job_id && application_data.id) {	
		$('[data-application-target="toggle_qualified_action"]').attr('action', app_url + '/jobs/' + application_data.job_id + '/applications/' + application_data.id + '/' + 'toggleQualified');
	}

	if(application_data.qualified) {
		$('[data-application-target="qualified"]').text('Disqualify');
	}
	else {
		$('[data-application-target="qualified"]').text('Qualify');
	}

	if(app_url && candidate_data.id) {	
		$('[data-application-target="block_candidate_action"]').attr('action', app_url + '/candidates/' + candidate_data.id + '/block');
	}

	if(candidate_details_data.linkedin) {
		$('[data-application-target="linkedin"]').parent().removeClass('hidden');

		$('[data-application-target="linkedin"]').text(candidate_data.first_name.toString() + '  ' + candidate_data.last_name.toString());
		$('[data-application-target="linkedin"]').attr('href', candidate_details_data.linkedin.toString());
	}
	else {
		$('[data-application-target="linkedin"]').attr('href', '');
		$('[data-application-target="linkedin"]').text('');
		$('[data-application-target="linkedin"]').parent().addClass('hidden');
	}

	if(app_url && candidate_data.id) {
		$('[data-application-target="view_profile"]').attr('href', app_url + '/candidates/' + candidate_data.id);
	}
	else {
		$('[data-application-target="view_profile"]').attr('href', '');
	}

	if(location_pref_data == '' && category_pref_data == '' && type_pref_data == '' && salary_pref_data == '') {
		$('.js-toggle-job-prefs').addClass('hidden');
	}
	else {
		$('.js-toggle-job-prefs').removeClass('hidden');
	}

	if(location_pref_data) {
		$('[data-application-target="location_prefs"] .perf-btn').remove();

		$.each(location_pref_data, function(i, k) {
			$('[data-application-target="location_prefs"]').append('<div class="perf-btn">' + k.place_name + '</div>');
		});
	}
	else {
		$('[data-application-target="location_prefs"] .perf-btn').remove();
	}

	if(category_pref_data) {
		$('[data-application-target="category_prefs"] .perf-btn').remove();

		$.each(category_pref_data, function(i, k) {
			$('[data-application-target="category_prefs"]').append('<div class="perf-btn">' + k.name + '</div>');
		});
	}
	else {
		$('[data-application-target="category_prefs"] .perf-btn').remove();
	}

	if(type_pref_data) {
		$('[data-application-target="type_prefs"] .perf-btn').remove();

		$.each(type_pref_data, function(i, k) {
			$('[data-application-target="type_prefs"]').append('<div class="perf-btn">' + k.name + '</div>');
		});
	}
	else {
		$('[data-application-target="type_prefs"] .perf-btn').remove();
	}

	if(salary_pref_data) {
		$('[data-application-target="salary_min"]').removeClass('hidden');
		$('[data-application-target="salary_max"]').removeClass('hidden');
		$('[data-application-target="salary_max"]').siblings('span').removeClass('hidden');

		$('[data-application-target="salary_min"]').text(salary_pref_data.salary_min);
		$('[data-application-target="salary_max"]').text(salary_pref_data.salary_max);
	}
	else {
		$('[data-application-target="salary_min"]').addClass('hidden');
		$('[data-application-target="salary_max"]').addClass('hidden');
		$('[data-application-target="salary_max"]').siblings('span').addClass('hidden');

		$('[data-application-target="salary_min"]').text('');
		$('[data-application-target="salary_max"]').text('');
	}

	if(job_cv_data || application_data.cover_letter) {
		$('.download-items').removeClass('hidden');

		if(job_cv_data && application_data.cover_letter) {
			$('.download-items').removeClass('download-items--single');

			$('.download-items .cv').css('width', '50%');
			$('.download-items .cover-letter').css('width', '50%');
		}
		else {
			$('.download-items').addClass('download-items--single');
		}

		if(job_cv_data) {
			$('.download-items .cv').removeClass('hidden');

			$('[data-application-target="job_cv"]').attr('href', s3_url + '/candidate-cvs/' + job_cv_data)

			if(!application_data.cover_letter) {
				$('.download-items .cv').css('width', '100%');
			}
		}
		else {
			$('.download-items .cv').addClass('hidden');
		}

		if(application_data.cover_letter) {
			$('.download-items .cover-letter').removeClass('hidden');

			//alert('SHOW MODAL');

			if(!job_cv_data) {
				$('.download-items .cover-letter').css('width', '100%');
			}

			$('[data-application-target="cover_letter"]').text(application_data.cover_letter);
		}
		else {
			$('.download-items .cover-letter').addClass('hidden');
		}
	}
	else {
		$('.download-items').addClass('hidden');
	}

	if(cvs_data.length >= 1) {
		$('.js-toggle-cvs').removeClass('hidden');
		$('[data-application-target="cvs"] li').remove();

		$.each(cvs_data, function(i, k) {
			$('[data-application-target="cvs"]').append('<li><a href="' + s3_url + '/candidate-cvs/' + k.file + '" class="cv-name text-center" download><div><i class="nc-icon-outline files_single-paragraph"></i><strong>' + k.file + '</strong></div></a></li>');
		});
	}
	else {
		$('.js-toggle-cvs').addClass('hidden');
		$('[data-application-target="cvs"] li').remove();
	}

	if(histories_data.length >= 1) {
		$('.js-toggle-histories').removeClass('hidden');
		$('[data-application-target="histories"] li').remove();

		$.each(histories_data, function(i, k) {
			if(k.icon) {
				var icon = k.icon;
			}
			else {
				var icon = '';
			}

			if(k.title) {
				var title = k.title;
			}
			else {
				var title = '';
			}

			if(k.subtitle) {
				var subtitle = k.subtitle;
			}
			else {
				var subtitle = '';
			}

			if(k.diff) {
				var diff = k.diff;
			}
			else {
				var diff = '';
			}

			$('[data-application-target="histories"]').append('<li><div class="relative"><span><i class="nc-icon ' + icon + '"></i></span></div><div class="title-text"><h3>' + title + '</h3><h4>' + subtitle + '</h4></div><div class="time-text text-right"><p>' + diff + '</p></div></li>');
		});
	}
	else {
		$('.js-toggle-histories').addClass('hidden');
	}

	if(!application_data.employed && !candidate_details_data.notice && !candidate_details_data.eligible) {
		$('.js-toggle-question-responses').addClass('hidden');
	}
	else {
		$('.js-toggle-question-responses').removeClass('hidden');
	}

	if(application_data.employed) {
		if(application_data.eligible) {
			var eligible = 'Yes';
		}
		else {
			var eligible = 'No';
		}

		$('[data-application-target="employed"]').parent().removeClass('hidden');
		$('[data-application-target="employed"]').text(eligible);
	}
	else {
		$('[data-application-target="employed"]').text('');
		$('[data-application-target="employed"]').parent().addClass('hidden');
	}

	if(country_data.name) {
		$('[data-application-target="country-name"]').text(country_data.name);
	}
	else {
		$('[data-application-target="country-name"]').text('country of job');
	}

	if(application_data.notice) {
		$('[data-application-target="notice"]').parent().removeClass('hidden');
		$('[data-application-target="notice"]').text(application_data.notice);
	}
	else {
		$('[data-application-target="notice"]').text('');
		$('[data-application-target="notice"]').parent().addClass('hidden');
	}

	// ELIGIBLE LOGIC
}

const view_candidate_button = $('[data-action="view_candidate"]');

view_candidate_button.click(function(e) {
	view_application($(this), app_url, s3_url);
});


const show_qualified_applications = $('[data-action="show_qualified_applications"]');

show_qualified_applications.click(function(e) {
	if($('.qualified-applicants li').length > 0) {
		$('.applications-right-col').removeClass('hidden');

		view_application($('.qualified-applicants li').first(), app_url, s3_url);
	}
	else {
		$('.applications-right-col').addClass('hidden');
	}
});









$('*[data-modal-open]').click(function(e) {
	e.preventDefault();
	$('html').css('overflow', 'hidden');
	$('html').css('padding-right', '10px');

	$('body').prepend('<div id="redactor-modal-overlay" style="" class=""></div>');
	$('*[data-modal="' + $(this).data('modal-open') + '"]').fadeIn();

	var half_win_h = $(window).height() / 2;
	var half_modal_h = $('*[data-modal="' + $(this).data('modal-open') + '"]').find('.j-modal').height() / 2;
	$('*[data-modal="' + $(this).data('modal-open') + '"] .j-modal').css('margin-top', half_win_h - half_modal_h);
});

$('*[data-modal-close]').click(function(e) {
	e.preventDefault();
	$('html').css('overflow', 'auto');
	$('html').css('padding-right', '0');
	$('body #redactor-modal-overlay').fadeOut();
	$('body #redactor-modal-overlay').remove();
	$('*[data-modal="' + $(this).data('modal-close') + '"]').fadeOut();
});

$('*[data-modal]').click(function(e) {
	e.preventDefault();
	$('html').css('overflow', 'auto');
	$('html').css('padding-right', '0');
	$('body #redactor-modal-overlay').fadeOut();
	$('body #redactor-modal-overlay').remove();
	$('*[data-modal]').fadeOut();
});

