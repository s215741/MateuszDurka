<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $imie = htmlspecialchars($_POST['imie']);
    $nazwisko = htmlspecialchars($_POST['nazwisko']);

    $dzien = intval($_POST['dzien']);
    $miesiac = intval($_POST['miesiąc']);
    $rok = intval($_POST['rok']);

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $plec = htmlspecialchars($_POST['plec']);
    $uwagi = htmlspecialchars($_POST['uwagi']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $haslo = htmlspecialchars($_POST['haslo']); // w prawdziwych projektach należy hasło hashować!

    $bledy = [];

    if (!checkdate($miesiac, $dzien, $rok)) {
        $bledy[] = "Nieprawidłowa data urodzenia.";
    }

    if (!$email) {
        $bledy[] = "Niepoprawny adres e-mail.";
    }

    if (!preg_match('/^[0-9]{9}$/', $telefon)) {
        $bledy[] = "Numer telefonu musi zawierać 9 cyfr.";
    }
	
    if (strlen($haslo) < 8) {
        $bledy[] = "Hasło musi mieć minimum 8 znaków.";
    }

    if (!empty($bledy)) {
        echo "<h2>Wystąpiły błędy:</h2><ul>";
        foreach ($bledy as $blad) {
            echo "<li>$blad</li>";
        }
        echo "</ul>";
        echo '<a href="Zadanie3.html">Powrót</a>';
        exit;
    }

    echo "<h2>Otrzymane dane:</h2>";
    echo "Imię: $imie <br>";
    echo "Nazwisko: $nazwisko <br>";
    echo "Data urodzenia: $dzien-$miesiac-$rok <br>";
    echo "Email: $email <br>";
    echo "Płeć: $plec <br>";
    echo "Uwagi: $uwagi <br>";
    echo "Telefon: $telefon <br>";

    echo "<br><a href='Zadanie3.html'>Powrót</a>";
} else {
    echo "Formularz nie został wysłany.";
}
?>
