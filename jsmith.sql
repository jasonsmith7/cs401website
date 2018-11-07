/*
 * Jay String Jewelry MySQL Script - jsmith.sql.
 */

CREATE TABLE users (
	email		VARCHAR(100)	NOT NULL,
	password	VARCHAR(20)		NOT NULL,
	PRIMARY KEY (email)
);

CREATE TABLE comments (
	comment_id		INT				NOT NULL,
	user_id			INT				NOT NULL,
	product_id		INTEGER,
	user_comment	VARCHAR(144)	NOT NULL,
	PRIMARY KEY	(comment_id),
	FOREIGN KEY	(user_id) REFERENCES users(user_id),
	FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE user_info (
	user_id		INT				NOT NULL,
	first_name	VARCHAR(14)		NOT NULL,
	last_name	VARCHAR(16)		NOT NULL,
	phone		VARCHAR(12),
	address_id	INT				NOT NULL,
	FOREIGN KEY (user_id)		REFERENCES users	(user_id) 		ON DELETE CASCADE,
	FOREIGN KEY (address_id) 	REFERENCES address	(address_id)	ON DELETE CASCADE
);

CREATE TABLE address (
	address_id	INT				NOT NULL,
	address		VARCHAR(60)		NOT NULL,
	city		VARCHAR(40)		NOT NULL,
	st			CHAR(2)			NOT NULL,
	zipcode		INT				NOT NULL,
	PRIMARY KEY (address_id)
);

CREATE TABLE ref_user_address (
	user_id		INT				NOT NULL,
	address_id	INT				NOT NULL,
	FOREIGN KEY (user_id) 		REFERENCES users	(user_id) 		ON DELETE CASCADE,
	FOREIGN KEY (address_id) 	REFERENCES address	(address_id)	ON DELETE CASCADE,
	PRIMARY KEY (user_id,address_id)
);

CREATE TABLE visits (
	user_id		INT				NOT NULL,
	visit_count	INT				NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE user_access (
	user_id		 INT			NOT NULL,
	access_level ENUM('user','admin')	NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE products (
	product_id	 INT			NOT NULL,
	stock		 INT			NOT NULL,
	price	  	 DECIMAL(8,2)	NOT NULL,
	product_name VARCHAR(20)	NOT NULL,
	PRIMARY KEY (product_id)
);

CREATE TABLE payment_info (
	user_id		INT				NOT NULL,
	cc_number	INT				NOT NULL,
	pmt_method	ENUM('visa', 'mastercard', 'discover')	NOT NULL,
	FOREIGN KEY (user_id) 	REFERENCES users	(user_id) 		ON DELETE CASCADE
);

CREATE TABLE orders (
	order_id 	INT				NOT NULL,
	user_id		INT				NOT NULL,
	order_status	ENUM('not started', 'in progress', 'complete')	NOT NULL,
	date_placed	DATE			NOT NULL,
	order_item_id 	INT			NOT NULL,
	PRIMARY KEY (order_id),
	FOREIGN KEY (user_id) REFERENCES orders (order_id) ON DELETE CASCADE
);

CREATE TABLE order_items (
	order_id		INT			NOT NULL,
	order_item_id	INT			NOT NULL,
	product_id		INT			NOT NULL,
	prod_qty		INT			NOT NULL,
	total			DECIMAL(8,2)	NOT NULL,
	PRIMARY KEY (order_item_id),
	FOREIGN KEY (order_id) REFERENCES orders (order_id) ON DELETE CASCADE,
	FOREIGN KEY (product_id) REFERENCES products (product_id)	
);

CREATE TABLE payments (
	payment_id		INT			NOT NULL,
	invoice_id		INT			NOT NULL,
	pmt_date		DATE		NOT NULL,
	pmt_amount		DECIMAL(8,2) NOT NULL,
	PRIMARY KEY (payment_id),
	FOREIGN KEY (invoice_id)
);

CREATE TABLE invoice (
	invoice_id		INT			NOT NULL,
	order_id		INT			NOT NULL,
	invoice_status	ENUM('outstanding','current') NOT NULL,
	invoice_date	DATE		NOT NULL,
	payment_id		INT,
	PRIMARY KEY (invoice_id),
	FOREIGN KEY	(order_id) REFERENCES orders (order_id),
	FOREIGN KEY (payment_id) REFERENCES payments (payment_id)
);
