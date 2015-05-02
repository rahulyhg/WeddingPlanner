CREATE TABLE inquiries (inquiry_id INT NOT
NULL PRIMARY KEY AUTO_INCREMENT, submit_date
DATETIME,first_name VARCHAR(35),last_name
VARCHAR(35),address VARCHAR(255),postcode
VARCHAR(8),email VARCHAR(254),phone
VARCHAR(11),wedding_date
DATE,wedding_location VARCHAR(50),special_req
TEXT 
);