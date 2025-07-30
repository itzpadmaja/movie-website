<?php
// Define prices for different seat categories
$bronzePrice = 100;
$silverPrice = 150;
$goldPrice = 200;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seat Booking</title>
  <style>
    body {
      background-image: url('img/movies.webp');
      background-size: cover;
      background-position: center center;
      font-family: Arial, sans-serif;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      height: auto;
    }

    h1 {
      font-size: 36px;
      margin-top: 30px;
      border-radius: 2ch;
    }

    .main-content {
      text-align: center;
      max-width: 1200px;
      width: 100%;
    }

    /* 🎟️ Seat Price Section */
    .seat-price-tab {
      display: flex;
      justify-content: center;
      gap: 30px;
      background-color: rgba(0, 0, 0, 0.7);
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 18px;
      font-weight: bold;
    }

    .price-box {
      padding: 10px 20px;
      border-radius: 5px;
      color: black;
    }

    .bronze-price { background-color: #cd7f32; }
    .silver-price { background-color: #c0c0c0; }
    .gold-price { background-color: #ffd700; }

    .seats-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 30px;
      border: 2px solid black;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
    }

    .row {
      display: flex;
      justify-content: center;
      margin: 10px 0;
    }

    .seat {
      width: 50px;
      height: 50px;
      border-radius: 5px;
      margin: 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
      cursor: pointer;
    }

    .bronze { background-color: #cd7f32; }
    .silver { background-color: #c0c0c0; }
    .gold { background-color: #ffd700; }
    .booked { background-color: black; cursor: not-allowed; }
    .selected { background-color: pink; }

    .book-now {
      margin-top: 30px;
      padding: 15px 30px;
      font-size: 18px;
      background-color: #28a745;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .book-now:hover { background-color: #218838; }

    /* Dropdown Select */
    .dropdown-container {
      margin-top: 20px;
      text-align: center;
    }

    select {
      padding: 10px;
      font-size: 16px;
      margin: 10px;
      border-radius: 5px;
      border: 1px solid black;
    }

    /* Seat Price Info */
    .price-info {
      margin-top: 10px;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.7);
      color: white;
      font-size: 16px;
      border-radius: 5px;
      display: none;
    }
    .footer-note {
      margin-top: 30px;
      font-size: 14px;
      text-align: center;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.8);
      width: 100%;
      border-top: 2px solid gray;
    }
  </style>

  <script>
    let selectedSeats = [];
    let totalPrice = 0;

    function selectSeat(seatNumber, category) {
      const theater = document.getElementById("theater").value;
      const showTime = document.getElementById("show-time").value;
      const language = document.getElementById("language").value;

      if (!theater || !showTime || !language) {
        alert("Please select a theater, show time, and language before selecting a seat.");
        return;
      }

      const seat = document.getElementById(`seat-${seatNumber}`);
      const priceInfo = document.getElementById("price-info");

      // Define seat prices
      const seatPrices = {
        bronze: 100,
        silver: 150,
        gold: 200
      };

      if (seat.classList.contains("selected")) {
        seat.classList.remove("selected");
        selectedSeats = selectedSeats.filter(s => s !== seatNumber);
        totalPrice -= seatPrices[category];
      } else {
        seat.classList.add("selected");
        selectedSeats.push(seatNumber);
        totalPrice += seatPrices[category];

        // Show price info
        priceInfo.innerHTML = `Category: ${category.toUpperCase()} <br> Price: ₹${seatPrices[category]}`;
        priceInfo.style.display = "block";
      }

      document.getElementById("selected-seats").innerText = selectedSeats.length ? selectedSeats.join(", ") : "None";
      document.getElementById("total-price").innerText = `₹${totalPrice}`;
    }

    function goToPayment() {
      if (selectedSeats.length === 0) {
        alert("Please select at least one seat before proceeding to payment.");
        return;
      }

      window.location.href = "payment.php";
    }
  </script>
</head>
<body>

  <div class="main-content">
    <h1>Seat Booking</h1>

  
    <!-- Dropdowns for selecting theater, time, and language -->
    <div class="dropdown-container">
      <label for="theater">Select Theater:</label>
      <select id="theater">
        <option value="">-- Select Theater --</option>
        <option value="PVR Phoenix Marketcity">PVR Phoenix Marketcity</option>
        <option value="INOX Bund Garden Road">INOX Bund Garden Road</option>
        <option value="Cinepolis Seasons Mall">Cinepolis Seasons Mall</option>
        <option value="E-Square University Road">E-Square University Road</option>
      </select>

      <label for="show-time">Select Time:</label>
      <select id="show-time">
        <option value="">-- Select Show Time --</option>
        <option value="10:00 AM">10:00 AM</option>
        <option value="1:00 PM">1:00 PM</option>
        <option value="4:00 PM">4:00 PM</option>
        <option value="7:00 PM">7:00 PM</option>
        <option value="10:00 PM">10:00 PM</option>
      </select>

      <label for="language">Select Language:</label>
      <select id="language">
        <option value="">-- Select Language --</option>
        <option value="English">English</option>
        <option value="Hindi">Hindi</option>
        <option value="Tamil">Tamil</option>
        <option value="Telugu">Telugu</option>
      </select>
    </div>

    <div class="seats-container">
      <?php
      for ($i = 1; $i <= 30; $i++) {
        if ($i % 5 == 1) echo "<div class='row'>";
        $category = ($i <= 10) ? "bronze" : (($i <= 20) ? "silver" : "gold");
        echo "<div class='seat $category' id='seat-$i' onclick='selectSeat($i, \"$category\")'>$i</div>";
        if ($i % 5 == 0) echo "</div>";
      }
      ?>
    </div>
  <!-- 🎟️ Seat Price Tab -->
  <div class="seat-price-tab">
      <div class="price-box bronze-price">Bronze: ₹<?php echo $bronzePrice; ?></div>
      <div class="price-box silver-price">Silver: ₹<?php echo $silverPrice; ?></div>
      <div class="price-box gold-price">Gold: ₹<?php echo $goldPrice; ?></div>
    </div>

    <button class="book-now" onclick="goToPayment()">Book Now</button>
     <!-- Footer Note -->
  <div class="footer-note">
    <p>Note: Prices are subject to change based on demand. Seats are assigned on a first-come, first-served basis.</p>
  </div>
  </div>
</body>
</html>
