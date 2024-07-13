Todo:

1. View all items in database even not logged in
2. add to cart
3. add admin to post and remove items


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

5. Product (x)
    - id (pk)
    - tags (json)
    - name (string)
    - description (text)
    - price (int)
    - stock (int)
    - category_id (FK Category) OUC

6. Category (x)
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