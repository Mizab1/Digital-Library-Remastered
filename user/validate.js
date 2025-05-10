$(document).ready(function () {
    $("#signup_form").validate({
        debug: true,
        rules: {
            user_name: {
                required: true,
                minlength: 10,
            },
        },
    });
});
