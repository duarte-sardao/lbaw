CREATE INDEX order_user ON Purchase(id_Customer);
CLUSTER Purchase USING order_user;

CREATE INDEX product_price ON Product(price);

CREATE INDEX product_brand ON Product USING hash (brand);

CREATE INDEX cooler_type ON Cooler USING hash(type);

CREATE INDEX supply_type ON PowerSupply USING hash(type);

CREATE INDEX case_type ON PcCase USING hash(type);

CREATE INDEX storage_type ON Storage USING hash(type);

CREATE INDEX mb_type ON Motherboard USING hash(type);

CREATE INDEX review_author ON Review USING hash(id_Customer);

CREATE INDEX review_product ON Review (id_Product);
CLUSTER Order USING order_user;

CREATE INDEX review_rating ON Review(rating);


ALTER TABLE Product
ADD COLUMN tsvectors TSVECTOR;

CREATE FUNCTION product_search_update() RETURNS TRIGGER AS $$
BEGIN
 IF TG_OP = 'INSERT' THEN
        NEW.tsvectors = (
         setweight(to_tsvector('english', NEW.name), 'A') ||
         setweight(to_tsvector('english', NEW.brand), 'B')
        );
 END IF;
 IF TG_OP = 'UPDATE' THEN
         IF (NEW.name <> OLD.name OR NEW.brand <> OLD.brand) THEN
           NEW.tsvectors = (
             setweight(to_tsvector('english', NEW.name), 'A') ||
             setweight(to_tsvector('english', NEW.brand), 'B')
           );
         END IF;
 END IF;
 RETURN NEW;
END $$
LANGUAGE plpgsql;

CREATE TRIGGER product_search_update
 BEFORE INSERT OR UPDATE ON Product
 FOR EACH ROW
 EXECUTE PROCEDURE product_search_update();

CREATE INDEX search_idx ON work USING GIN (tsvectors);