<?php
// Verifică dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preia datele din formular
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $meetingDate = htmlspecialchars($_POST['meeting-date']);

    // Formatează datele pentru fișierul text
    $data = "Nume: $name\nEmail: $email\nTelefon: $phone\nDată Întâlnire: $meetingDate\n\n";

    // Specifică numele fișierului unde vor fi salvate datele
    $file = 'inscrieri.txt';

    // Scrie datele în fișier
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirecționează utilizatorul către o pagină de confirmare
    header("Location: multumim.html");
    exit();
} else {
    // Dacă formularul nu a fost trimis corect, redirecționează utilizatorul înapoi la formular
    header("Location: inscriere.html");
    exit();
}
?>
