$(document).ready(function(){
	$(".fancybox").fancybox();

	$(".fancymodal").fancybox({
		// hideOnOverlayClick	:	false,
		// hideOnContentClick	:	false,
	});

	$('#feedback-form').on("submit", function(event) {
		event.preventDefault();

		var form = $(this),
			url = form.attr("action"),
			type = form.attr("method"),
			data = form.serialize(),
			errInputClass = "error",
			errTag = $("<div />").addClass("error-text"),
			errEmptyText = "Это поле пусто.",
			errIncorrectText = "Это поле введено некорректно.",
			errWrongCaptcha = "Код введён неверно",
			inputTel = form.find("#tel"),
			fadeSpeed = 300;

		$.ajax({
			type: type,
			url: url,
			data: data,
			dataType: "json",
			success: function (ans) {
				// Clear old error tag
				form.find(".error-text").remove();

				//clear error style
				form.find(".error").removeClass("error");

				// Add error data
				if (ans == "empty") {
					prepareErrorEmpty = errTag.text(errEmptyText).fadeIn(fadeSpeed);
					inputTel.addClass(errInputClass).after(prepareErrorEmpty);
				} else if (ans == "incorrect") {
					prepareErrorIncorrect = errTag.text(errIncorrectText).fadeIn(fadeSpeed);
					inputTel.addClass(errInputClass).after(prepareErrorIncorrect);
				} else if (ans == "wrongCaptcha") {
					prepareErrorWrongCaptcha = errTag.text(errWrongCaptcha).fadeIn(fadeSpeed);
					form.find("#captcha").addClass(errInputClass).after(prepareErrorWrongCaptcha);
				} else {
					form.html(ans);
				}
			}
		});

		
	});

	$("#refresh-captcha").on("click", function() {
		var pic = $(".verify-pic"),
			src = pic.attr("src");
		pic.attr("src", src);
	})


	$(".scroll").click(function (event){
		event.preventDefault();
		var id = $(this).attr("href");
		$('html, body').animate({
			scrollTop: $(id).offset().top-20
		}, 300, "swing");
	});

	$(window).scroll(function() {
		if ($(this).scrollTop() > 300) {
			$(".scrolltop").show(300);
		} else {
			$(".scrolltop").hide(300);
		}
	})

	$(".scrolltop").click(function (event){
		$('html, body').animate({
			scrollTop: 0
		}, 300, "swing");
	});
	
	$("#feedback-form input").focusin(function() {
		if ($(this).hasClass("error")) {
			$(this).removeClass("error");
			if ($(this).siblings(".error-text").length) $(this).siblings(".error-text").fadeOut("fast", function() {$(this).remove();});
		}
	});

});