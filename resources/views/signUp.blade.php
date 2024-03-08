<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .btn {
            border-radius: 35px;
            width: 96px;
            height: 39px;
            color: white;
            background-color: #58c9ed;
            border: none;
            font-weight: bold;
        }
        .form-control {
            height: 29px;
            width: 280px;
            border-radius: 6px;
        }
        .container {
            text-align: auto;
            border-radius: 10px;
            padding: 36px;
            width: fit-content;
            margin: auto;
            margin-top: 93px;
        }
        .hd {
            color: #00b5ff;
        }
        .pr1 {
            font-size: 14px;
        }
        .pr2 {
            font-size: 11px;
        }
        .faq {
            color: #00b5ff;
        }
        @media (max-width:740px) {
            .pr1 {
                width: 308px;
            }
        }
    </style>
</head>
<body>
    <!-- Use route() helper to generate form action based on route name -->
    <center>
        <div class="container"> <!-- Add container div -->
            <h1 class="hd">Enjoying this website?</h1>
            <p class="pr1">Sign up for our newsletter and stay up to date with the <br>latest rankings, interesting studies, and important updates.</p><br>
            <form id="signup-form" action="{{ route('signup.store') }}" method="POST"> <!-- Set form action and method -->
                @csrf <!-- Add CSRF token -->
                <div class="frm">
                    <label for="name" class="form-label"></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name *"> <!-- Add name attribute -->
                </div><br>
                <div class="frm">
                    <label for="email" class="form-label"></label> <!-- Change ID to email -->
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email *"> <!-- Add name attribute -->
                </div><br>
                <button type="submit" class="btn">I WANT IN</button><br>
            </form>
            <p class="pr2">We don't share your information with 3rd parties.<br> Please read our terms and conditions and privacy policy in <a class="faq" href="{{ route('faqs') }}">FAQs</a>.</p>
        </div> <!-- Close container div -->
    </center>
    <script>
    document.getElementById('signup-form').addEventListener('submit', function(event) {
    var nameField = document.getElementById('name');
    var emailField = document.getElementById('email');
    var nameValue = nameField.value.trim();
    var emailValue = emailField.value.trim();

    if (!nameValue) {
        displayMessage(nameField, 'Name field is required.');
        event.preventDefault();
        return;
    } else if (!isValidName(nameValue)) {
        displayMessage(nameField, 'Please enter a valid name with only alphabetic characters.');
        event.preventDefault();
        return;
    }

    if (!emailValue) {
        displayMessage(emailField, 'Email field is required.');
        event.preventDefault();
        return;
    } else if (!isValidEmail(emailValue)) {
        displayMessage(emailField, 'Please enter a valid email address.');
        event.preventDefault();
        return;
    }
});

function isValidName(name) {
    var namePattern = /^[A-Za-z]+$/;
    return namePattern.test(name);
}

function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function displayMessage(field, message) {
    var existingErrorMessage=field.parentNode.querySelector('.error-message');
    if(existingErrorMessage){
        existingErrorMessage.remove();
    }
    var errorMessage = document.createElement('div');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    errorMessage.style.color='red';
    field.parentNode.insertBefore(errorMessage, field.nextSibling);
}

</script>

</body>
</html>



