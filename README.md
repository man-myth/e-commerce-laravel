Todo:

- [x] View all items in database even not logged in
- [x]view product details, comments
- add to cart (looged in or not logged in)
- [x] only admin can add items
- admin can update or delete a product
- only logged in users who bought the product can comment once
- view comments images, summary of stars
- add payment
- [x] sort by categories


SCHEMA

1. Order Details
    - id (PK)
    - order_id (FK Order) 
    - product_id (FK) 
    - quantity (int)  
    - price (double) 
    - subtotal (double) 
    
2. Order
    - id (pk)
    - order_date
    - order_total
    - customer_id
    - shipping_date
    - is_delivered

3. order_payments
    - id
    - order_id
    - payment_type
    - amount
    - status

4. User
    - id
    - email
    - first_name
    - last_name
    - password
    - postcode
    - address
    - phone
    - isadmin

5. Product 
    - id (pk)
    - tags (json)
    - name (string)
    - description (text)
    - price (int)
    - stock (int)
    - category_id (FK Category) OUC

6. Category
    - id 
    - name
    - description

7. reviews
    - id
    - stars
    - content
    - images
    - user_id(fk User)
    - product_id(fk Product)

8. Product Images
    - id
    - url
    - product_id(fk)
    
9. ReviewImages