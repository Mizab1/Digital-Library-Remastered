$(document).ready(function () {
    $("#signup_form").validate({
        rules: {
            user_name: {
                required: true,
                minlength: 5,
            },
            user_email: {
                required: true,
                email: true,
            },
            user_password: {
                required: true,
            },
        },
    });
});
