<?php
$resultMessage = ""; // This will hold our success/error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";
    
    // Server-side validation
    if (empty($_POST["email"])) {
        $error .= "Email is Required.<br>";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error .= "Email is invalid.<br>";
    }
    if (empty($_POST["subject"])) {
        $error .= "Subject is Required.<br>";
    }
    if (empty($_POST["textarea"])) {
        $error .= "Textarea is Required.<br>";
    }

    if ($error != "") {
        $resultMessage = '<div class="alert alert-danger">' . $error . '</div>';
    } else {
        // Send email
        $emailto = "sumitlobhyaan7310@gmail.com";
        $subject = $_POST["subject"];
        $content = $_POST["textarea"];
        $headers = "From: " . $_POST["email"];

        if (mail($emailto, $subject, $content, $headers)) {
            $resultMessage = '<div class="alert alert-success">Your mail has been sent :)</div>';
        } else {
            $resultMessage = '<div class="alert alert-danger">:( Oh oh! Error occurred.</div>';
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
    <div class="container mt-5">
        <h1>Get in Touch!</h1>
        
        <div id="error">
            <?php echo $resultMessage; ?>
        </div>

        <form id="form" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label">Message</label>
                <textarea class="form-control" id="textarea" name="textarea" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $("#form").submit(function (e) {
            var error = "";
            if ($("#subject").val() == "") error += "<p>Please fill the subject field!</p>";
            if ($("#email").val() == "") error += "<p>Please fill the email field!</p>";
            if ($("#textarea").val() == "") error += "<p>Please fill the textarea field!</p>";

            if (error != "") {
                $("#error").html('<div class="alert alert-danger">' + error + '</div>');
                e.preventDefault(); // Stop form submission
            }
        });
    </script>
</body>
</html>