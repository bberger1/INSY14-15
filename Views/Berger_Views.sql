# Punkt 1

CREATE VIEW max_maschine AS
SELECT maschnummer, beschreibung, count(*) AS "Anzahl Produkte" FROM erzeugt
INNER JOIN maschine ON maschnummer=nummer
GROUP BY maschnummer, beschreibung
ORDER BY count(*) DESC
LIMIT 1;

SELECT person.nummer, vorname, nachname FROM bedient
INNER JOIN mitarbeiter ON mitnummer = nummer
INNER JOIN person ON person.nummer = mitarbeiter.nummer
WHERE bedient.maschnummer = (SELECT maschnummer FROM max_maschine);

DROP VIEW max_maschine;

# Punkt 2

CREATE VIEW max_produkt AS
SELECT pnummer, SUM(menge) AS "Anzahl" FROM lagert
GROUP BY pnummer
ORDER BY pnummer ASC;

SELECT nummer, bezeichnung, "Anzahl"
FROM produkt
INNER JOIN max_produkt ON nummer = pnummer
ORDER BY "Anzahl" DESC
LIMIT 5;

DROP VIEW max_produkt;
