<!-- resources/views/emails/contact.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
</head>

<body>
    <h2>Contact Details:</h2>
    <p>Name:{{ $contact['name'] }}</p>
    <p>Email: {{ $contact['email'] }}</p>
    <p>Phone: {{ $contact['phone'] }}</p>
    <p>Subject: {{ $contact['subject'] }}</p>
    <p>Message: {{ $contact['message'] }}</p>

    <p>Thank you for using our service!</p>
</body>

</html>