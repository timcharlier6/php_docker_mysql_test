## Questions & Answers

1) How many customers do we have?
```sql
    SELECT COUNT(*) FROM customers;
```
    122

2) What is the customer number of Mary Young? 
```sql
    SELECT customerNumber FROM customers WHERE contactLastName='Young' && contactFirstName='Mary';
```
    219

3) What is the customer number of the person living at Magazinweg 7, Frankfurt 60528?
```sql
    SELECT customerNumber FROM customers WHERE addressLine1='Magazinweg 7' && city='Frankfurt' && postalCode='60528';
```
    247

4) If you sort the employees on their last name, what is the email of the first employee?
```sql
    SELECT email FROM employees ORDER BY lastName ASC;
```
    lbondur@classicmodelcars.com

5) If you sort the employees on their last name, what is the email of the last employee?
```sql
    SELECT email FROM employees ORDER BY lastName DESC;
```
    gvanauf@classicmodelcars.com;

6) What is first the product code of all the products from the line 'Trucks and Buses', sorted first by productscale, then by productname.
```sql
SELECT productCode FROM products WHERE productLine = 'Trucks and Buses' ORDER BY productScale, productName;
```
   S12_4473

7) What is the email of the first employee, sorted on their last name that starts with a 't'?
```sql
    SELECT email, lastName FROM employees WHERE lastName LIKE 't%' ORDER BY lastName ASC
```
    lthompson@classicmodelcars.com

8) Which customer (give customer number) payed by check on 2004-01-19?
```sql
    SELECT customerNumber FROM payments p WHERE p.paymentDate  = '2004-01-19'
```
    177

9) How many customers do we have living in the state Nevada or New York?
```sql
    SELECT count(*) FROM customers WHERE state = 'NV' OR state = 'NY'
```
    7

10) How many customers do we have living in the state Nevada or New York or outside the united states?
```sql
    SELECT count(*) FROM customers WHERE country != 'USA' OR state = 'NV' OR state = 'NY'
```
    93

11) How many customers do we have with the following conditions (only 1 query needed):
    - Living in the state Nevada or New York 
    - Living outside the USA and with a credit limit above 1000 dollar?

```sql 
    SELECT count(*) FROM customers 
    WHERE (country != 'USA' AND creditLimit  > 1000) OR state = 'NV' OR state = 'NY'
```
    70

12) How many customers don't have an assigned sales representative?

```sql
    SELECT count(*) FROM customers WHERE salesRepEmployeeNumber IS NULL
```
    22

13) How many orders have a comment?
```sql
    SELECT count(*) FROM orders WHERE comments IS NOT NULL
```
    80

14) How many orders do we have WHERE the comment mentions the word "caution"?
```sql
    SELECT count(*) FROM orders
    WHERE comments  LIKE '%caution%';
```
    4
        
15) What is the average credit limit of our customers from the USA? (rounded)
```sql
    SELECT round(avg(creditLimit)) FROM customers WHERE country = 'USA'
```    
    78103
    
16) What is the most common last name from our customers?
```sql
    SELECT count(*) AS total, contactLastName FROM customers 
    GROUP BY contactLastName 
    ORDER BY total DESC
```
    Young
    
17) What are the statuses of the orders?

    select distinct status from orders o 
    Shipped
    Resolved
    Cancelled
    On Hold
    Disputed
    In Process
    
18) In which countries don't we have any customers?
    
```sql 
    SELECT DISTINCT country FROM customers ORDER BY country ASC;
```

    Greece
    China
    South Korea

19) How many orders WHERE never shipped?
```sql
    SELECT count(*) FROM orders WHERE shippedDate IS NULL
```
    14

20) How many customers does Steve Patterson have with a credit limit above 100 000 EUR?
```sql
    SELECT * FROM customers WHERE salesRepEmployeeNumber = 1216 AND creditLimit > 100000
```
    3

21) How many products have been shipped to our customers?
```sql
    SELECT count(*) FROM orders WHERE status = 'shipped'
```
    303

22) On average, how many products do we have in each productLine?
```sql
    SELECT round(avg(innertable.total)) FROM (SELECT count(*) AS total FROM products GROUP BY productLine) AS innertable 
```
    16

23) How many products are low in stock? (below 100 pieces)
```sql
    SELECT count(*) FROM products WHERE quantityInStock < 100
```
    2
    
24) How many products have more the 100 pieces in stock, but are below 500 pieces.
```sql
    SELECT count(*) FROM products WHERE quantityInStock BETWEEN 100 AND 500
```
    3    
    
25) How many orders did we ship between June 2004 & September 2004
```sql
    SELECT count(*) FROM orders WHERE shippedDate BETWEEN CAST('2004-06-01' AS DATE) AND CAST('2004-09-31' AS DATE) AND status = 'shipped';
```
    42
    
26) How many customers share the same last name as an employee of ours?
```sql
    SELECT count(*) FROM customers WHERE contactLastName IN 
    (SELECT DISTINCT e2.lastName FROM employees e2 );
```
    9

27) Give the product code for the most expensive product for the consumer?
```sql
    SELECT * FROM products p ORDER BY MSRP DESC;
```
    S10_1949

28) What product offers us the largest profit margin (difference between buyPrice & MSRP).
```sql
    SELECT p.*, round(MSRP - buyPrice) AS profit FROM products p ORDER BY profit DESC
```
    S10_1949

29) How much profit (rounded) can the product with the largest profit margin (difference between buyPrice & MSRP) bring us.
```sql
    SELECT p.*, round(MSRP - buyPrice) AS profit FROM products p ORDER BY profit DESC
```
    116

    
30) Given the product number of the products (seperated with spaces) that have never been sold?
```sql
    SELECT productCode FROM products WHERE productCode not in (SELECT distinct productCode FROM orderdetails)
```
    S18_3233

31) How many products give us a profit margin below 30 dollar? 
```sql
    SELECT count(*) FROM (
        SELECT round(MSRP - buyPrice) AS profit FROM products p 
        having profit < 30
        ORDER BY profit ASC
    ) AS innerTable
```
    23

32) What is the product code of our most popular product (in number purchased)?
```sql 
    SELECT 
    productCode, sum(quantityOrdered) AS total
    FROM orderdetails
    GROUP BY productCode 
    ORDER BY total DESC    
```
    S18_3232

33) How many of our popular product did we effectively ship?

```sql    
    SELECT 
        productCode, sum(quantityOrdered) AS total
        FROM orderdetails
        LEFT JOIN orders o ON o.orderNumber = orderdetails.orderNumber 
        WHERE o.status = 'shipped'
        GROUP BY productCode 
        ORDER BY total DESC
```
    1720

34) Which check number paid for order 10210. Tip: Pay close attention to the date fields on both tables to solve this.
```sql
    SELECT p.* 
    FROM payments p 
    LEFT JOIN orders o on o.customerNumber = p.customerNumber
    WHERE o.orderNumber = 10210
    and paymentDate between o.orderDate and o.shippedDate
```
    CI381435
    
35) Which order was paid by check CP804873?
```sql
    SELECT p.* 
    FROM payments p 
    LEFT JOIN orders o on o.customerNumber = p.customerNumber
    WHERE p.checkNumber = 'CP804873' and paymentDate between o.orderDate and o.shippedDate
```
    385 

36) How many payments do we have above 5000 EUR and with a check number with a 'D' someWHERE in the check number, ending the check number with the digit 9?
```sql
    SELECT * FROM payments p WHERE p.amount > 5000 AND checkNumber LIKE ('%D%9')
```
    4    

37) How many products do we have in product scale 1:18 or 1:24 that are either trains and have a sell price above 100 EUR, or classic cars and a price between 50 and 80, or trucks and buses with a price below 100 EUR?
```sql
    SELECT * FROM products 
    WHERE productScale in ('1:18', '1:24')
    AND ((productLine = 'trains' AND msrp > 100)
    or (productLine = 'Classic Cars' AND msrp BETWEEN 50 AND 80)
    or (productLine = 'Trucks and Buses' AND msrp < 100))
    
```
    8

38) In which country do we have the most customers that we do not have an office in?
```sql
    SELECT country, count(country) as total FROM customers 
    WHERE country NOT IN (SELECT country FROM offices o2)
    GROUP BY country 
    ORDER BY total DESC
```
    Germany 

39) What city has our biggest office in terms of employees?
```sql
    SELECT count(*) as total, o2.city, o2.country 
    FROM employees e 
    LEFT JOIN offices o2 on e.officeCode = o2.officeCode 
    GROUP BY e.officeCode 
    ORDER BY total DESC    
```

40) How many employees does our largest office have, including leadership?
    6

```sql    
    SELECT count(*) as total, o2.city, o2.country 
        FROM employees e 
        LEFT JOIN offices o2 on e.officeCode = o2.officeCode 
        GROUP BY e.officeCode 
        ORDER BY total DESC    
```

41) How many employees do we have on average per country (rounded)?
```sql
    SELECT round(avg(innerTable.total)) FROM (
    SELECT count(*) as total
        FROM employees e 
        LEFT JOIN offices o2 on e.officeCode = o2.officeCode 
        GROUP BY o2.country 
        ORDER BY total DESC) 
        as innerTable
```
    5    

42) What is the total value of all shipped & resolved sales ever combined?
```sql
    SELECT round(sum(quantityOrdered * priceEach)) FROM orderdetails od
    LEFT JOIN orders o on od.orderNumber = o.orderNumber 
    WHERE o.status = 'shipped'
```
    8999331

43) What is the total value of all shipped & resolved sales in the year 2005 combined? (based on shipping date)
```sql
    SELECT round(sum(quantityOrdered * priceEach)) FROM orderdetails od
    LEFT JOIN orders o on od.orderNumber = o.orderNumber 
    WHERE o.status in ('shipped', 'Resolved')
    AND year(shippedDate) = 2005
```
    1427945

44) What was our most profitable year ever (based on shipping date), considering all shipped & resolved orders?
```sql
    SELECT year(shippedDate) as year, round(sum(quantityOrdered * priceEach)) as total FROM orderdetails od
    LEFT JOIN orders o on od.orderNumber = o.orderNumber 
    WHERE o.status in ('shipped', 'Resolved')
    GROUP BY year
    ORDER BY total DESC
```

    2004
    
45) How much revenue did we make on in our most profitable year ever (based on shipping date), considering all shipped & resolved orders?
```sql
    SELECT year(shippedDate) AS year, round(sum(quantityOrdered * priceEach)) AS total FROM orderdetails od
        LEFT JOIN orders o ON od.orderNumber = o.orderNumber 
        WHERE o.status IN ('shipped', 'Resolved')
        GROUP BY year
        ORDER BY total DESC
```
    4321168

46) What is the name of our largest customer inside the USA?
```sql
SELECT c.customerName, round(sum(quantityOrdered * priceEach)) AS total FROM customers c
    LEFT JOIN orders o ON c.customerNumber  = o.customerNumber 
    LEFT JOIN orderdetails od ON o.orderNumber = od.orderNumber 
    WHERE country = 'USA'
    GROUP BY c.customerNumber 
    ORDER BY total DESC
```
Mini Gifts Distributors Ltd.

47) How much has our largest customer inside the USA ordered with us (total value)?
591827

48) How many customers do we have that never ordered anything?
```sql
SELECT count(*) FROM (
SELECT c.customerName, count(o.orderNumber) as total FROM customers c
    LEFT JOIN orders o ON c.customerNumber  = o.customerNumber 
    GROUP BY c.customerNumber 
        having total = 0
    ORDER BY total ASC
    ) as innerTable
```
    24
    
49) What is the last name of our best employee in terms of revenue?
```sql
    SELECT e.lastName, employeeNumber, round(sum(quantityOrdered * priceEach)) as total FROM employees e
    LEFT JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber 
    LEFT JOIN orders o ON c.customerNumber  = o.customerNumber 
    LEFT JOIN orderdetails od ON o.orderNumber = od.orderNumber 
    GROUP BY e.employeeNumber 
    ORDER BY total DESC
```
    Hernandez

50) What is the office code of the least profitable office in the year 2004?
```sql 
    SELECT off.officeCode, round(sum(quantityOrdered * priceEach)) as total 
    FROM offices off 
    LEFT JOIN employees e ON e.officeCode = off.officeCode 
        LEFT JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber 
        LEFT JOIN orders o ON c.customerNumber  = o.customerNumber 
        LEFT JOIN orderdetails od ON o.orderNumber = od.orderNumber 
        WHERE year(o.shippedDate) = 2004
        GROUP BY off.officeCode 
        ORDER BY total ASC
```  
    5, Tokyo