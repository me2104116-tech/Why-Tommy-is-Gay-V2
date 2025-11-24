<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $comment = htmlspecialchars($_POST['comment']);

    // Save to a file (simple version)
    $file = fopen("signatures.txt", "a");
    fwrite($file, "Name: $name, Email: $email, Comment: $comment\n");
    fclose($file);

    echo "Thank you for signing the petition!";
} else {
    echo "Invalid request.";
}
?>
<?php
$signatures = file("signatures.txt");
echo "<h2>Petition Signatures</h2>";
echo "<ul>";
foreach ($signatures as $sig) {
    echo "<li>" . htmlspecialchars($sig) . "</li>";
}
echo "</ul>";
?>
