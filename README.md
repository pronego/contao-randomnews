# Random News / Zufallsnachricht

## Überblick
Mit dieser Erweiterung kann man im Contao-Backend als Modul „Zufallsnachricht“ ausgewählen und
zufällige Nachrichten aus auswählbaren Nachrichtenarchiven in verschiedenen Formaten anzeigen.

Diese Erweiterung wurde ursprünglich von [Heiko Unger von Odenwerk](odenwerk@gmail.com)
entwickelt und bis ca. 2013 gewartet. Auf Wunsch von [Lothar Schwalm](https://die-schreibmaus.de)
(derzeitiger Sponsor) wurde die Erweiterung 2023 nach vergeblichen Kontaktbemühungen zu dem Programmierer
von [Dr. Manuel Lamotte-Schubert/PRONEGO](https://www.pronego.com) übernommen und für Contao 5 angepasst.

## Installation
Die Installation des Bundles erfolgt
1. über den Contao-Manager. Hierfür einfach im Contao-Store auf Installieren klicken und
    Anschluss die erforderlichen Datenbankänderungen durchführen.

2. via Composer:
    ```
    composer require pronego/contao-randomnews
    ```
   Die Datenbankänderungen können im Anschluss durch Aufruf von
    ```
    vendor/bin/contao-console contao:migrate
   ```
   durchgeführt werden.
