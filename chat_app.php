<?php
// Database connection
$conn = new mysqli("localhost", "root", "51614824", "anyface");

// Handle new message submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $message = $conn->real_escape_string($_POST['message']);
    
    $stmt = $conn->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $message);
    $stmt->execute();
    $stmt->close();
    exit();
}

// Fetch all messages
$messages = $conn->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; flex-direction: column; align-items: center; margin: 0; padding: 0; }
        #chatBox { width: 100%; max-width: 500px; height: 400px; border: 1px solid #ccc; overflow-y: auto; display: flex; flex-direction: column-reverse; padding: 10px; margin-bottom: 10px; }
        .message { display: flex; align-items: center; gap: 10px; padding: 8px; border-top: 1px solid #eaeaea; }
        .username { font-weight: bold; color: #333; }
        .time { font-size: 0.85em; color: #777; }
        .avatar { width: 40px; height: 40px; border-radius: 50%; background-color: #<?php echo substr(md5(rand()), 0, 6); ?>; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; }
        form { display: flex; gap: 5px; width: 100%; max-width: 500px; }
        input, textarea, button { padding: 10px; font-size: 16px; }
        textarea { resize: none; flex: 1; }
        button { background: #4CAF50; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Chat Application</h2>
    
    <div id="chatBox">
        <?php while ($row = $messages->fetch_assoc()): ?>
            <div class="message">
                <div class="avatar"><?= strtoupper($row['username'][0]) ?></div>
                <div>
                    <span class="username"><?= htmlspecialchars($row['username']) ?>:</span>
                    <span class="time">(<?= date("g:i A", strtotime($row['created_at'])) ?>)</span>
                    <p><?= htmlspecialchars($row['message']) ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    
    <form id="chatForm" method="POST">
        <input type="text" name="username" placeholder="Your name" required>
        <textarea name="message" placeholder="Enter message" required></textarea>
        <button type="submit">Send</button>
    </form>
    
    <script>
        
        const chatBox = document.getElementById("chatBox");

        // Automatically fetch new messages
        setInterval(loadMessages, 3000);

        // Handle form submission via AJAX
        chatForm.onsubmit = async (e) => {
            e.preventDefault();
            const formData = new FormData(chatForm);
            await fetch("chat_app.php", { method: "POST", body: formData });
            chatForm.reset();
            loadMessages();
        };

        async function loadMessages() {
            const response = await fetch("chat_app.php");
            const text = await response.text();
            chatBox.innerHTML = new DOMParser().parseFromString(text, "text/html").querySelector("#chatBox").innerHTML;
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>

