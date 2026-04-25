
$(document).ready(function () {
    // 1. Password Visibility
    $('#togglePassword').on('click', function () {
        let p = $('#Password');
        let type = p.attr('type') === 'password' ? 'text' : 'password';
        p.attr('type', type);
        $(this).text(type === 'password' ? 'Show' : 'Hide');
    });

    // 2. Phone: Only numbers allowed
    $('#Phone').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // 3. Form Validation
    $('#registrationForm').on('submit', function (e) {
        let email = $('#Email').val();
        let phone = $('#Phone').val();
        let pass = $('#Password').val();

        let emailValid = /^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(email);
        let phoneValid = /^\d{10}$/.test(phone);
        let passValid = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(pass);

        $('#emailError').toggle(!emailValid);
        $('#phoneError').toggle(!phoneValid);
        $('#passwordError').toggle(!passValid);

        if (!emailValid || !phoneValid || !passValid) {
            e.preventDefault(); // Stop submission
        } else {
            alert("Success! Form is valid.");
        }
    });
});