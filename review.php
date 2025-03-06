<?php
include('db_connection.php'); 
include("review_header.php");


if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contact = htmlspecialchars($_POST['contact']);
    $experience = htmlspecialchars($_POST['experience']);

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.history.back();</script>";
        exit;
    }

    // Validate Contact Number (10 Digits)
    if (!preg_match('/^[0-9]{10}$/', $contact)) {
        echo "<script>alert('Invalid contact number!'); window.history.back();</script>";
        exit;
    }

    // Prepare SQL Statement
    $stmt = $conn->prepare("INSERT INTO review (name, email, contact, experience) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $contact, $experience);

    if ($stmt->execute()) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='thankyou.php';</script>";
    } else {
        echo "<script>alert('Error submitting feedback!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>


<head>
    <style>
        .form-container {
            max-width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 50px;
            border: 1px solid black;
        }
        .form-container h2{
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            align-items: center;
        }
        input, textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Feedback Form</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact No:</label>
                <input type="tel" name="contact" pattern="[0-9]{10}" required>
            </div>

            <div class="form-group">
                <label for="experience">Experience with Shivshakti Travels:</label>
                <textarea name="experience" rows="4" required></textarea>
            </div>

            <button type="submit" name="submit">Submit Feedback</button>
        </form>
    </div>

</body>
</html>

