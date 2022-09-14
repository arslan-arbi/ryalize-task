$(document).ready(function() {

    function getAlertHTML(alertType, message) {
        return `<div id="login-alert" class="alert alert-block fade in alert-` + alertType + `" role="alert" data-aria-autofocus="true">` + message +
            `<button type="button" class="close" data-dismiss="alert">
                    </button>
                </div>`;
    }

	$(document).on('submit',".loginForm", function (e) {
        e.preventDefault();

        let formdata = new FormData($(this)[0]);

        $.ajax({
			url: `${baseUrl}/auth/login`,
			type: "POST",
			dataType: 'json',
			contentType: false,
			processData: false,
			data: formdata,
			success: function (res) {
                $('#response').html(getAlertHTML("success", "Login Successfull"));
			},
            error: function(e) {
                $('#response').html(getAlertHTML("danger", e.responseJSON.errors));
            }
		});
    });

});