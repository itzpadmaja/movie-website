<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Movie Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        .btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Admin Panel - Movie Bookings</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Movie Name</th>
                <th>User Email</th>
                <th>Payment</th>
                <th>Timing</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="bookingTable">
            <!-- Movie bookings inserted dynamically -->
        </tbody>
    </table>
</div>

<script>
    const bookings = [
        { movie: "Venom", email: "user1@example.com", payment: "Paid", time: "5:00 PM" },
        { movie: "La La Land", email: "user2@example.com", payment: "Paid", time: "7:30 PM" },
        { movie: "Oppenheimer", email: "user3@example.com", payment: "Paid", time: "9:00 PM" },
        { movie: "3 Idiots", email: "user4@example.com", payment: "Paid", time: "6:15 PM" },
        { movie: "Spider-Man", email: "user5@example.com", payment: "Paid", time: "8:45 PM" },
        { movie: "Venom", email: "user6@example.com", payment: "Paid", time: "10:00 PM" },
        { movie: "Avengers", email: "user7@example.com", payment: "Paid", time: "4:30 PM" },
        { movie: "Venom", email: "user8@example.com", payment: "Paid", time: "5:30 PM" }
    ];

    function loadBookings() {
        const table = document.getElementById("bookingTable");
        table.innerHTML = ""; // Clear previous entries
        bookings.forEach((booking, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${booking.movie}</td>
                <td>${booking.email}</td>
                <td>${booking.payment}</td>
                <td>${booking.time}</td>
                <td><button class="btn" onclick="deleteBooking(${index})">Delete</button></td>
            `;
            table.appendChild(row);
        });
    }

    function deleteBooking(index) {
        bookings.splice(index, 1);
        loadBookings();
    }

    loadBookings(); // Load bookings on page load
</script>

</body>
</html>
