<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Confirmation</title>
  <style>
    /* Basic Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #000; /* Set background color to black */
      color: #fff; /* White text for contrast */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      text-align: center;
    }

    .confirmation-container {
      background-color: #222; /* Slightly darker container to contrast with the background */
      padding: 50px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 90%;
      transition: transform 0.3s ease;
    }

    .confirmation-container:hover {
      transform: scale(1.02);
    }

    h1 {
      font-size: 36px;
      color:rgb(229, 195, 44); /* Pink color */
      margin-bottom: 20px;
    }

    .confirmation-message {
      font-size: 18px;
      color: #bbb; /* Light gray for the message */
      margin-bottom: 30px;
    }

    .thanks-message {
      font-size: 24px;
      color:rgb(229, 195, 44);  /* Pink */
      font-weight: bold;
    }

    .enjoy-message {
      font-size: 18px;
      color: #bbb;
      margin-bottom: 40px;
    }

    .back-link {
      display: block;
      margin-top: 20px;
    }

    .back-link a {
      color:rgb(226, 234, 227);
      font-size: 18px;
      text-decoration: none;
      font-weight: bold;
    }

    .back-link a:hover {
      text-decoration: underline;
    }

    .confirmation-gif {
      margin-top: 30px;
      max-width: 100%;
      width: 300px;
      height: auto;
      display: none; /* Initially hidden */
      transition: opacity 1s ease;
      margin-left: auto;
      margin-right: auto;
    }

    .gif-visible {
      display: block;
      opacity: 1;
    }

  </style>
</head>
<body>

  <div class="confirmation-container">
    <h1>Payment Completed!</h1>
    <p class="confirmation-message">Thank you for your payment! 🎉</p>

    <p class="thanks-message">Your booking is confirmed, and we're excited to have you on board!</p>

    

    <!-- GIF Placeholder -->
    <img id="confirmation-gif" src="img/thank-you-large.gif" alt="Confirmation GIF" class="confirmation-gif">

    <div class="back-link">
      <a href="javascript:history.back()">🔙Back to Seat Selection 🔙</a>
    </div>
  </div>

  <script>
    // JavaScript to control the visibility of the GIF after the page loads
    window.onload = function() {
      const gif = document.getElementById('confirmation-gif');
      setTimeout(() => {
        gif.classList.add('gif-visible'); // Add class to show the GIF with fade-in effect
      }, 1000); // Delay to simulate loading time for better UX
    }
  </script>

</body>
</html>
