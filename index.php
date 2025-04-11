<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styl_1.css">
</head>
<body>
    <div class="banner">
        <h1>Witamy w restauracji "Wszystkie Smaki"</h1>
    </div>
    <div class="main">
        <div class="up">
            <div class="left">
                <img src="img/menu.jpg" alt="Nasze danie">
            </div>
            <div class="right">
                <h4>U nas dobrze zjesz!</h4>
                <ol>
                    <li>Obiady od 40 zł</li>
                    <li>Przekąski od 10 zł</li>
                    <li>Kolacje od 20 zł</li>
                </ol>
            </div>
        </div>
        <div class="down">
            <form action="php/rezerwacja.php" class="form" method="post">
                <h2>Zarezerwuj stolik on-line</h2>
                <div class="osoby">
                    <label for="Data">Data (format rrrr-mm-dd)</label>
                    <input type="date" name="Data">
                </div>
                <div class="osoby">
                    <label for="Osoby">Ile osób?</label>
                    <input type="number" name="Osoby">
                </div>
                <div class="osoby">
                    <label for="Phone">Twój numer telefonu</label>
                    <input type="text" name="Phone">
                </div>
                <div class="dany no_style">
                    <input type="checkbox" name="DanyOsobowy" id="PD" required>
                    <label for="DanyOsobowy">Zgadzam się na przetwarzanie moich danych osobowych</label>
                </div>
                    <button type="reset">WYCZYŚĆ</button>
                    <button type="submit">REZERWUJ</button>
            </form>
                <!-- Display the message here if there is one -->
                <?php include 'php/rezerwacja.php'; if ($message != ""): ?>
                <div class="message"></div>
                <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        <p>Stronę internetową opracował: 00000000000000</p>
    </div>
</body>
</html>