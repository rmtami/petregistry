<?php
include "db_connect.php";

if (!isset($_GET['pet_id'])) {
    die("Pet not found!");
}

$pet_id = intval($_GET['pet_id']);

// Fetch pet info + owner info
$stmt = $conn->prepare("
    SELECT pets.*, users.name AS owner_name, users.phone, users.email 
    FROM pets 
    JOIN users ON pets.user_id = users.id 
    WHERE pets.id=? 
    LIMIT 1
");
$stmt->bind_param("i", $pet_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Pet not found!");
}

$pet = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pet['name']) ?>'s Info</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(135deg, #0a0f1f, #1a2a4f, #223b70);
            color: white;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .card {
            background: rgba(255,255,255,0.1);
            padding: 25px;
            border-radius: 12px;
            max-width: 500px;
            margin: 40px auto;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.4);
        }
        h2 {
            font-family: 'Playfair Display', serif;
        }
        .btn-report {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.3s;
        }
        .btn-report:hover {
            background: #ff1a1a;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>🐾 <?= htmlspecialchars($pet['name']) ?>'s Profile</h2>
        <p><strong>Type:</strong> <?= htmlspecialchars($pet['type']) ?></p>
        <p><strong>Breed:</strong> <?= htmlspecialchars($pet['breed']) ?></p>
        <p><strong>Age:</strong> <?= $pet['age'] . " " . $pet['age_unit'] ?></p>
        <p><strong>Vaccinated:</strong> <?= $pet['vaccinated'] ? "Yes ✅" : "No ❌" ?></p>
        
        <hr>
        <h3>Owner Info</h3>
        <p><strong>Name:</strong> <?= htmlspecialchars($pet['owner_name']) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($pet['phone']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($pet['email']) ?></p>

        <form method="POST" action="report_pet.php">
            <input type="hidden" name="pet_id" value="<?= $pet['id'] ?>">
            <button type="submit" class="btn-report">🚨 Report This Pet</button>
        </form>
    </div>
</body>
</html>
