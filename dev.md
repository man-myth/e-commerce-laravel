Todo:

- [x] View all items in database even not logged in
- [x] view product details, comments
- [x] add to cart (looged in or not logged in)
- [x] only admin can add items
- [ ] seo optimization (slug URL, meta tag, property="og:title", sitemaps)
- [ ] checkout items
- [x] admin can update or delete a product
- [ ] only logged in users who bought the product can comment once
- [ ] view comments images, summary of stars
- [ ] add payment
- [x] sort by categories

## Database Schema


### Order Details
- **id** (PK)
- **order_id** (FK Order)
- **product_id** (FK Product)
- **quantity** (int)
- **price** (double)
- **subtotal** (double)

### Order
- **id** (PK)
- **order_date**
- **order_total**
- **customer_id** (FK User)
- **shipping_date**
- **is_delivered**

### Order Payments
- **id** (PK)
- **order_id** (FK Order)
- **payment_type**
- **amount**
- **status**

### User
- **id** (PK)
- **email**
- **first_name**
- **last_name**
- **password**
- **postcode**
- **address**
- **phone**
- **is_admin**

### Product
- **id** (PK)
- **tags** (json)
- **name** (string)
- **description** (text)
- **price** (int)
- **stock** (int)
- **category_id** (FK Category)

### Category
- **id** (PK)
- **name** (string)
- **description** (text)

### Reviews
- **id** (PK)
- **stars** (int)
- **content** (text)
- **images** (json)
- **user_id** (FK User)
- **product_id** (FK Product)

### Product Images
- **id** (PK)
- **url** (string)
- **product_id** (FK Product)

### Review Images
- **id** (PK)
- **url** (string)
- **review_id** (FK Review)






