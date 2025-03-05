<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {background-color:lightblue;}
        h1 {color: darkblue; font-weight: bold; }
        p {margin-bottom:1em; }
        input { margin-bottom:2em; }
        label {color: darkblue; font-weight: bold; }
    </style>
    <title>Zusatzleistungen Wellness</title>

    <?php
    // Beispiel-Verbindungsdaten
    $dbServer   = "127.0.0.1";
    $dbUser     = "root";        // oder dein richtiger User
    $dbPassword = "";            // dein Passwort
    $dbName     = "yachthafenresort";

    // Verbindung herstellen
    $conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Verbindungsfehler: " . $conn->connect_error);
    }

    // Preis für Rückenmassage (ID=1)
    $sql = "SELECT preis FROM preise WHERE ProduktID = 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $preisRückenmassage = $row['preis'];

    // Preis für Moorbad (ID=2)
    $sql = "SELECT preis FROM preise WHERE ProduktID = 2";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $preisMoorbad = $row['preis'];     

    $conn->close(); // Datenbankverbindung schließen
    ?>

    <script type="text/javascript">
        // Übergabe der Preisvariablen von PHP an JavaScript
        var preisRM = <?php echo $preisRückenmassage; ?>;
        var preisMB = <?php echo $preisMoorbad; ?>;

        function berechneGesamtBetrag() {
            var gesamt = 0;
            var cbrm = document.getElementById("cbrm");
            var cbmb = document.getElementById("cbmb");

            if (cbrm.checked) {
                var anzahl_rm = document.getElementById("anzahl_rm").value;
                if (anzahl_rm >= 0 && anzahl_rm <= 10) {
                    // Richtiger Preis: preisRM
                    gesamt += anzahl_rm * preisRM;
                } else {
                    alert("Geben Sie bitte einen Wert im Bereich von 0 bis 10 ein.");
                    return;
                }
            }

            if (cbmb.checked) {
                var anzahl_mb = document.getElementById("anzahl_mb").value;
                if (anzahl_mb >= 0 && anzahl_mb <= 10) {
                    // Richtiger Preis: preisMB
                    gesamt += anzahl_mb * preisMB;
                } else {
                    alert("Geben Sie bitte einen Wert im Bereich von 0 bis 10 ein.");
                    return;
                }
            }
            document.getElementById("gesamt").value = gesamt;
        }
    </script>
</head>
<body>
    <h1>Zusatzleistungen im Wellnessbereich</h1>
    <form action="..." method="post">

        <input type="checkbox" id="cbrm">
        Rückenmassage 30 min 
        (Preis: <?php echo number_format($preisRückenmassage, 2, ',', '.'); ?> Euro)
        <label for="anzahl_rm" style="margin-left:1em"> Anzahl: </label>
        <input type="number" id="anzahl_rm" size="2" value="0" min="0" max="10" 
               oninput="this.value=this.value.replace(/[^0-9]/g,'');">
        <br>

        <input type="checkbox" id="cbmb">
        Moorbad 20 min 
        (Preis: <?php echo number_format($preisMoorbad, 2, ',', '.'); ?> Euro)
        <label for="anzahl_mb" style="margin-left:1em"> Anzahl: </label>
        <input type="number" id="anzahl_mb" size="2" value="0" min="0" max="10" 
               oninput="this.value=this.value.replace(/[^0-9]/g,'');">
        <br>

        <label for="gesamt"> Gesamtbetrag: </label>
        <input type="text" id="gesamt" size="10" readonly style="text-align:right"> Euro
        <input type="button" id="berechne" value="Berechnen" style="margin-left:1em" 
               onclick="berechneGesamtBetrag()"><br>

        <input type="submit" value="Leistung buchen">    
        <input type="reset" value="Abbrechen">
    </form> 
</body>
</html>
