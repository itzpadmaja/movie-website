


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Methods</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #121212; /* Dark black background */
      color: #e0e0e0; /* Light gray text for contrast */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      min-height: 100vh;
      margin: 0;
      overflow: auto;
      position: relative;
    }

    .payment-container {
      background-color: #1f1f1f; /* Slightly lighter gray for the content */
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      width: 100%;
      animation: fadeIn 1s ease-out;
      overflow-y: auto;
      height: 80vh; /* Allow scrolling if content is tall */
    }

    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    h1 {
      font-size: 28px;
      text-align: center;
      margin-bottom: 20px;
      color:rgb(39, 94, 176); /* Purple color (complementary to yellow) for a pop of color */
    }

    .payment-method {
      margin-bottom: 20px;
      padding: 20px;
      border-radius: 10px;
      border: 2px solid #333;
      background-color: #2c2c2c; /* Dark gray for payment options */
      cursor: pointer;
      text-align: center;
      transition: background-color 0.3s ease;
    }

    .payment-method:hover {
      background-color: #383838; /* Slightly lighter gray on hover */
    }

    .payment-method.selected {
      background-color: #4caf50; /* Green for a selected option (calming and positive) */
      border-color: #2e7d32; /* Darker green border for selection */
    }

    .payment-method img {
      max-width: 100px;
      margin-bottom: 10px;
    }

    .payment-form {
      display: none;
      margin-top: 20px;
    }

    .payment-form input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 2px solid #333;
      border-radius: 5px;
      background-color: #444; /* Dark gray input fields */
      color: #e0e0e0; /* Light gray text in input fields */
    }

    .confirm-button {
      display: block;
      width: 100%;
      padding: 15px;
      font-size: 18px;
      background-color: #28a745; /* Green button */
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 20px;
    }

    .confirm-button:hover {
      background-color: #218838; /* Darker green on hover */
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
    }

    .back-link a {
      color: #64b5f6; /* Soft blue link */
      text-decoration: none;
      font-size: 16px;
    }

    .back-link a:hover {
      text-decoration: underline;
    }

    /* QR Code Style */
    .qr-code {
      display: block;
      margin: 20px auto;
      max-width: 200px;
      height: auto;
    }

    .qr-container {
      text-align: center;
    }

    .instructions {
      font-size: 14px;
      text-align: center;
      margin-top: 10px;
      color: #bbb; /* Lighter gray text for instructions */
    }

  </style>
</head>
<body>

  <div class="payment-container">
    <h1>Choose Payment Method</h1>

    <!-- Google Pay -->
    <div class="payment-method" id="google-pay" onclick="selectPaymentMethod('google-pay')">
      <img src="https://developers.google.com/static/pay/api/images/brand-guidelines/google-pay-mark.png" alt="Google Pay">
      <p>Google Pay</p>
    </div>

    <!-- Credit Card -->
    <div class="payment-method" id="card" onclick="selectPaymentMethod('card')">
      <img src="https://cdn4.iconfinder.com/data/icons/payment-method/160/payment_method_card_visa-512.png" alt="Card Payment">
      <p>Pay by Card</p>
    </div>

    <!-- Internet Banking -->
    <div class="payment-method" id="internet-banking" onclick="selectPaymentMethod('internet-banking')">
      <img src="https://st4.depositphotos.com/16255066/31001/v/450/depositphotos_310012938-stock-illustration-vector-logo-for-online-bank.jpg" alt="Internet Banking">
      <p>Internet Banking</p>
    </div>

    <!-- Google Pay Form with QR Code -->
    <div id="google-pay-form" class="payment-form">
      <h3>Scan QR Code to Pay</h3>
      <div class="qr-container">
        <img src="https://randomqr.com/assets/images/randomqr-256.png" alt="QR Code" class="qr-code">
        <p>Scan the QR code and enter the code below:</p>
        <input type="text" id="google-qr-code" placeholder="Enter scanned code" required>
      </div>

      <!-- Gmail input field for Google Pay -->
      <h3>Enter your Gmail Address</h3>
      <input type="email" id="google-gmail" placeholder="Your Gmail Address" required>
    </div>

    <!-- Card Payment Form -->
    <div id="card-form" class="payment-form">
      <h3>Enter your Card Details</h3>
      <input type="email" id="card-email" placeholder="Your Email" required>
      <input type="text" id="card-number" placeholder="Card Number" required>
      <input type="text" id="card-expiry" placeholder="Expiry Date (MM/YY)" required>
      <input type="text" id="card-cvc" placeholder="CVC" required>
    </div>

    <!-- Internet Banking Form -->
    <div id="internet-banking-form" class="payment-form">
      <h3>Enter your Internet Banking Email</h3>
      <input type="email" id="banking-email" placeholder="Your Email" required>
      <input type="text" id="banking-account" placeholder="Account Number" required>
      <input type="text" id="banking-ifsc" placeholder="IFSC Code" required>
    </div>

    <!-- Confirm Payment -->
    <button class="confirm-button" id="confirm-btn" onclick="confirmPayment()" disabled>Pay Now</button>

    <!-- Back Link -->
    <div class="back-link">
      <a href="javascript:history.back()">Back to Seat Selection</a>
    </div>
  </div>

  <script>
    let selectedPaymentMethod = null;

    function selectPaymentMethod(method) {
      // Deselect any currently selected method
      const methods = document.querySelectorAll('.payment-method');
      methods.forEach((method) => method.classList.remove('selected'));

      // Select the clicked method
      const selectedMethod = document.getElementById(method);
      selectedMethod.classList.add('selected');

      selectedPaymentMethod = method;

      // Hide all forms
      document.querySelectorAll('.payment-form').forEach(form => form.style.display = 'none');

      // Display the form for the selected payment method
      document.getElementById(method + '-form').style.display = 'block';

      // Enable the confirm button
      document.getElementById('confirm-btn').disabled = false;

      // Hide other payment methods
      methods.forEach((methodElement) => {
        if (methodElement.id !== method) {
          methodElement.style.display = 'none';
        }
      });
    }

    function confirmPayment() {
      if (!selectedPaymentMethod) {
        alert('Please select a payment method.');
        return;
      }

      // If Google Pay is selected, validate the QR code and Gmail input
      if (selectedPaymentMethod === 'google-pay') {
        const qrCode = document.getElementById('google-qr-code').value;
        const gmail = document.getElementById('google-gmail').value;

        if (!qrCode) {
          alert('Please enter the QR code value!');
          return;
        }

        if (!gmail || !validateEmail(gmail)) {
          alert('Please enter a valid Gmail address!');
          return;
        }
      }

      // If Card or Internet Banking is selected, validate the email
      let emailField;
      if (selectedPaymentMethod === 'google-pay') {
        emailField = document.getElementById('google-gmail').value;
      } else if (selectedPaymentMethod === 'card') {
        emailField = document.getElementById('card-email').value;
      } else if (selectedPaymentMethod === 'internet-banking') {
        emailField = document.getElementById('banking-email').value;
      }

      if (!emailField || !validateEmail(emailField)) {
        alert('Please enter a valid email!');
        return;
      }

      // Simulate the process of handling payment (this is just for demonstration)
      // Redirect to a "confirmed" page (confirmed.php) after payment is confirmed
      window.location.href = 'confirmed.php?method=' + selectedPaymentMethod + '&email=' + emailField;
    }

    // Simple email validation
    function validateEmail(email) {
      const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return regex.test(email);
    }
  </script>

</body>
</html>
