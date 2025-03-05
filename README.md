# php-datenbankverbindung-
README
Dieses kleine Projekt dient als Vorlage für ein PHP-Formular, das Preise aus einer MySQL-Datenbank abruft und zur Laufzeit für eine Berechnung verwendet. Die Beispielanwendung stellt zwei Zusatzleistungen im Wellnessbereich dar (Rückenmassage und Moorbad).

Voraussetzungen
XAMPP (oder ein anderer LAMP/WAMP/MAMP-Stack), um:
Ein MySQL- bzw. MariaDB-Datenbankmanagementsystem zu haben
Einen PHP-fähigen Webserver zu betreiben (Apache)
Ein Browser, um die PHP-Seite aufzurufen
Datenbank einrichten
XAMPP starten

Starte Apache und MySQL im XAMPP Control Panel.
Datenbank anlegen

Öffne http://localhost/phpmyadmin in deinem Browser.
Lege eine neue Datenbank an, z.B. yachthafenresort.
Tabellen erstellen
Erstelle zwei Tabellen mit den folgenden Spalten (dies ist nur ein Beispiel):

Tabelle leistungen:

Spalte	Datentyp	Bemerkung
ID	INT (Primary Key, Auto Increment)	Eindeutige ID der Leistung
Name	VARCHAR(255)	Name der Leistung
Tabelle preise:

Spalte	Datentyp	Bemerkung
ID	INT (PK, AI)	Eindeutige ID
Preis	DOUBLE	Preis zugehörig zur Leistung
ProduktID	INT	Verknüpfung zu leistungen.ID (oder so ähnlich)
Beispieldaten einfügen

sql
Kopieren
Bearbeiten
INSERT INTO leistungen (Name)
VALUES ('Rückenmassage'), ('Moorbad');

INSERT INTO preise (Preis, ProduktID)
VALUES (45.00, 1),
       (30.00, 2);
Hierbei steht z.B. ProduktID = 1 für die Rückenmassage und ProduktID = 2 für das Moorbad.
