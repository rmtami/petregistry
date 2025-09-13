<?php
session_start();
include "db_connect.php";

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_user.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Add Pet
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_pet'])) {
    $name = $_POST['name'];
    $type = $_POST['type'] === 'Other' ? $_POST['other_type'] : $_POST['type'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $age_unit = $_POST['age_unit'];
    $vaccinated = isset($_POST['vaccinated']) ? 1 : 0;
    $rabies = isset($_POST['rabies']) ? 1 : 0;
    $contact = $_POST['contact'];

    $stmt = $conn->prepare("INSERT INTO pets (user_id, name, type, breed, age, age_unit, vaccinated, rabies, contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiiiss", $user_id, $name, $type, $breed, $age, $age_unit, $vaccinated, $rabies, $contact);
    $stmt->execute();
    $stmt->close();
}

// Fetch pets
$pets = [];
$stmt = $conn->prepare("SELECT * FROM pets WHERE user_id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $pets[] = $row;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
<style>
body { font-family: Arial; background: #223b70; color: white; }
.container { max-width: 900px; margin: 40px auto; background: rgba(42,93,159,0.9); padding: 30px; border-radius: 15px; }
.btn { background: #fff; color: #2a5d9f; padding: 8px 15px; border: none; border-radius: 8px; cursor: pointer; margin: 3px; }
.pet-card { background: rgba(255,255,255,0.1); padding: 15px; border-radius: 10px; margin-bottom: 15px; }
</style>
</head>
<body>
<div class="container">
    <h2>🐾 User Dashboard</h2>

    <!-- Register Pet -->
    <form method="POST">
        <input type="text" name="name" placeholder="Pet Name" required>
        <input type="text" name="type" placeholder="Type" required>
        <input type="text" name="breed" placeholder="Breed" required>
        <input type="number" name="age" placeholder="Age" min="0" required>
        <select name="age_unit">
            <option value="months">Months old</option>
            <option value="years">Years old</option>
        </select>
        <label><input type="checkbox" name="vaccinated"> Vaccinated</label>
        <label><input type="checkbox" name="rabies"> Rabies</label>
        <input type="text" name="contact" placeholder="Contact Info" required>
        <button type="submit" class="btn">Add Pet</button>
    </form>

    <h3>My Pets</h3>
    <?php foreach ($pets as $pet): ?>
        <div class="pet-card">
            <strong><?= htmlspecialchars($pet['name']) ?></strong><br>
            <?= htmlspecialchars($pet['type']) ?> - <?= htmlspecialchars($pet['breed']) ?><br>
            Age: <?= $pet['age'] . ' ' . $pet['age_unit'] ?><br>
            <button class="btn" onclick="generateQR('<?= $pet['id'] ?>')">QR Code</button>
            <div id="qrcode-<?= $pet['id'] ?>" style="margin-top:10px;"></div>
        </div>
    <?php endforeach; ?>
</div>

<script>
function generateQR(petId) {
    let container = document.getElementById('qrcode-' + petId);
    container.innerHTML = "";
    let url = "http:// 192.168.254.166/pet_system/pet_info.php?pet_id=" + petId; // Change localhost to your live IP/domain
    new QRCode(container, { text: url, width: 128, height: 128, correctLevel: QRCode.CorrectLevel.H });
}
</script>
</body>
</html>
