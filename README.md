# Projekt: Zusatzleistungen im Wellnessbereich

Dieses kleine Projekt dient als Vorlage für ein PHP-Formular, das Preise aus einer MySQL-Datenbank abruft und zur Laufzeit für eine Berechnung verwendet. Die Beispielanwendung stellt zwei Zusatzleistungen im Wellnessbereich dar (Rückenmassage und Moorbad).

---

## Voraussetzungen

- **XAMPP** (oder ein anderer LAMP/WAMP/MAMP-Stack), um:
  - Ein **MySQL**- bzw. **MariaDB**-Datenbankmanagementsystem zu haben
  - Einen **PHP**-fähigen Webserver zu betreiben (Apache)
- Ein **Browser**, um die PHP-Seite aufzurufen

---

## Datenbank einrichten

1. **XAMPP starten**  
   - Starte **Apache** und **MySQL** im XAMPP Control Panel.

2. **Datenbank anlegen**  
   - Öffne [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in deinem Browser.  
   - Lege eine neue Datenbank an, z.B. `yachthafenresort`.

3. **Tabellen erstellen**  
   Erstelle zwei Tabellen mit folgenden Spalten (als Beispiel):

   **Tabelle `leistungen`:**

   | Spalte | Datentyp                                  | Bemerkung                     |
   |--------|-------------------------------------------|-------------------------------|
   | ID     | `INT` (Primary Key, Auto Increment)       | Eindeutige ID der Leistung    |
   | Name   | `VARCHAR(255)`                            | Name der Leistung             |

   **Tabelle `preise`:**

   | Spalte    | Datentyp                           | Bemerkung                                                 |
   |-----------|------------------------------------|-----------------------------------------------------------|
   | ID        | `INT` (PK, AI)                     | Eindeutige ID                                             |
   | Preis     | `DOUBLE`                           | Preis zugehörig zur Leistung                              |
   | ProduktID | `INT`                              | Verknüpfung zu `leistungen.ID` (oder so ähnlich)          |

4. **Beispieldaten einfügen**  
   ```sql
   INSERT INTO leistungen (Name)
   VALUES ('Rückenmassage'), ('Moorbad');

   INSERT INTO preise (Preis, ProduktID)
   VALUES (45.00, 1),
          (30.00, 2);
    ```
   ---

Dein Projektverzeichnis könnte zum Beispiel folgendermaßen aussehen:
projektordner/
└── zusatzleistungen.php

---

## Nutzung
Datei ablegen
Lege zusatzleistungen.php in den htdocs-Ordner deines XAMPP (z.B. C:\xampp\htdocs\projektordner\).

Seite aufrufen

Öffne deinen Browser und rufe auf:
http://localhost/projektordner/zusatzleistungen.php.
Eingaben testen

Aktiviere die gewünschten Zusatzleistungen (Checkbox).
Gib eine Anzahl (0 bis 10) ein.
Klicke auf „Berechnen“, um den Gesamtpreis anzuzeigen.
Optional

Klicke „Leistung buchen“ (Submit-Button), um das Formular abzusenden (z.B. an eine weitere Seite).
Der „Abbrechen“-Button (Reset) setzt die Felder zurück.
Sicherheit & Weiteres
Dieses Beispiel dient primär zur Demonstration der Verknüpfung von PHP, MySQL und JavaScript.
In einer Produktivumgebung solltest du besonders auf Prepared Statements oder andere Sicherheitsmechanismen achten (SQL-Injection, XSS, etc.).
Benutzereingaben sollten stets validiert werden, bevor du sie weiterverarbeitest.
