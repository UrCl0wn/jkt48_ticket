<?php
include 'config/db.php';
$tickets = $conn->query("SELECT * FROM tickets")->fetchAll();
?>

<form method="POST" action="purchase.php">
    <select name="ticket_id">
        <?php foreach ($tickets as $ticket): ?>
            <option value="<?= $ticket['id'] ?>">
                <?= $ticket['event_name'] ?> - <?= $ticket['price'] ?> IDR
            </option>
        <?php endforeach; ?>
    </select>
    <label for="quantity">Jumlah:</label>
    <input type="number" name="quantity" min="1" required>
    <button type="submit" name="buy">Beli Tiket</button>
</form>
<?php
if (isset($_POST['buy'])) {
    $ticket_id = $_POST['ticket_id'];
    $quantity = $_POST['quantity'];

    // Ambil data tiket
    $stmt = $conn->prepare("SELECT * FROM tickets WHERE id = ?");
    $stmt->execute([$ticket_id]);
    $ticket = $stmt->fetch();

    if ($ticket && $ticket['available_tickets'] >= $quantity) {
        $total_price = $ticket['price'] * $quantity;

        // Kurangi jumlah tiket
        $updateStmt = $conn->prepare("UPDATE tickets SET available_tickets = available_tickets - ? WHERE id = ?");
        $updateStmt->execute([$quantity, $ticket_id]);

        // Simpan pesanan
        $orderStmt = $conn->prepare("INSERT INTO orders (user_id, ticket_id, quantity, total_price) VALUES (?, ?, ?, ?)");
        $orderStmt->execute([$_SESSION['user_id'], $ticket_id, $quantity, $total_price]);

        echo "Tiket berhasil dibeli!";
    } else {
        echo "Jumlah tiket tidak mencukupi!";
    }
}
?>
