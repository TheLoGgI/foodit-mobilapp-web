DROP VIEW IF EXISTS productDetailView;

CREATE VIEW productDetailView AS
SELECT 
    varer.titel as title,
    varer.pris as price,
    varer.billede as productImage,
    varer.saelger as seller,
    bruger.navn as sellerName,
    bruger.brugerType as userType,
    bruger.postnummer as postalcode,
    bruger.vej as address,
    bruger.rating
FROM
    varer
    INNER JOIN bruger ON varer.saelger = bruger.PK_id;
    