<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Payment Success</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        
        }

        .success-message {

            /* background-color: #4CAF50; */
            color: rgb(9, 8, 25);
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            display: none;
        }

        .success-message h1 {
            font-size: 24px;
            margin: 0;
        }

        .success-message p {
            font-size: 12px;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="success-message" id="successMessage">
            <h1>Payment Successful!</h1>
            <p>Thank you for your payment. Your transaction has been processed successfully.</p>
            <h1>Redirecting in <span id="countdown">5</span> seconds...</h1>
        </div>
    </div>
   <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Display the success message with a fade-in effect
    const successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block';

    // Smooth fade-in animation
    let opacity = 0;
    const fadeInInterval = setInterval(function() {
        if (opacity >= 1) {
            clearInterval(fadeInInterval);
        } else {
            opacity += 0.02;
            successMessage.style.opacity = opacity;
        }
    }, 20);
});

localStorage.removeItem("myData");
const countdownElement = document.getElementById('countdown');
    let countdown = 5; // Initial countdown value in seconds

    // Function to update the countdown element
    function updateCountdown() {
        countdownElement.textContent = countdown;
        countdown--;

        if (countdown < 0) {
            // Redirect to another page when countdown reaches 0
            window.location.href = '{{url('/user/dashboard')}}'; // Replace with your target URL
        } else {
            // Schedule the next update
            setTimeout(updateCountdown, 1000); // Update every 1 second
        }
    }

    // Initial call to start the countdown
    updateCountdown();

   </script>
</body>

</html>
