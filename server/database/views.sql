CREATE VIEW productDetailView AS
SELECT 
    varer.titel,
    varer.pris,
    varer.billede,
    varer.saelger,
    bruger.navn,
    bruger.brugerType,
    bruger.postnummer,
    bruger.vej,
    bruger.rating
FROM
    varer
    INNER JOIN bruger ON varer.saelger = bruger.PK_id
    