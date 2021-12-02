BEGIN TRANSACTION; 
SET TRANSACTION ISOLATION LEVEL SERIALIZABLE READ ONLY; 
  SELECT Cart.id, Product.name, CartProduct.quantity 
  FROM CartProduct INNER JOIN Product ON Product.id = CartProduct.id_Product 
  INNER JOIN Cart ON Cart.id = CartProduct.id_Cart; 
END TRANSACTION;
