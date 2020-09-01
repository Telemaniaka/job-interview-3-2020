# Task 1 - HTML, jQuery and Select2 library

1. Read documentation and get the library from https://select2.org
2. Use HTML, jQuery and Select2 to build the following demos:
     - dropdown loading with AJAX a list of address types (example values for address types: Shipping, Billing, Service, Selected, Original, Home, Work)
   - extend the dropdown for multiple selection
   - extend the multiple selection to have Selected and Shipping address types preselected
   - extend the two preselected options to be disabled for deselection (make the "X" button on the preselected values disabled)
   - extend the dropdown to support custom text value, outside of the provided list of address types (value should be typed from the user during typing in the filter popup and if no matches are found in the list of address types, new option should be generated with the custom text, so it can be submitted further as part of a POST request in case the dropdown was part of a HTML form)

# Task 2 - PHP, HTML, jQuery and Select2 library, Font Awesome toolkit (https://fontawesome.com/v4.7.0/)
Using the same Select2 library from task 1, make another contact form as per our design layout:
![enter image description here](https://imgur.com/vVlHMUz.png)
 
 When you type in one of the fields (Company, First Name or Last Name) the data should be requested by Ajax returning the filtered options in a custom layout for person and company.
 
![enter image description here](https://imgur.com/YMwMBrL.png)
When choosing one of the returned dropdown options, the other fields should be populated automatically with the contact address, phone and email.

![enter image description here](https://imgur.com/vJqgFnL.png)

Please provide the PHP code processing the search query and returning the JSON response (you can hardcode several contact examples for persons/companies, in order to skip preparing an actual database), HTML, CSS, JS and/or other files of the demo.

# Task 3 - PHP (OOP)

BigCommerce is an enterprise e-commerce platform (marketplace) where you can create online store and sell products. Use the following library and API reference to prepare a small tool to list customers of your shop:
PHP library: https://github.com/bigcommerce/bigcommerce-api-php
API Reference: https://developer.bigcommerce.com/api-reference
- use oAuth for connection
 - use JSON for content type
 - get all customers with emails @gmail.com

Use the following fake credentials:
```
Client ID: 123456
Client Secret: P$ssword
Store Hash: 5h79jw
```
The idea is to build the PHP logic consuming the library and API reference, and present concept of application. There is no need for the code to be executed, since the credentials are fake and actual responses cannot be obtained. Main target is to understand and implement PHP logic in order to show working level and experience with third party libraries, explore library code when necessary, load library resources, oAuth understanding, code structuring and readability, etc.
Secondary target (optional) is to write down technical instructions on how to install/initialize the application using Composer in a README.md file of your repository.

# Task 4 - MySQL

You have the following MySQL table containing tracking numbers for UPS and USPS (well known USА shipping companies):
```sql
CREATE TABLE `scan_shipped_orders` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL,
`tracking_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`user_id` int(10) unsigned DEFAULT NULL,
PRIMARY KEY (`id`),
KEY `scan_shipped_orders_user_id_foreign` (`user_id`),
CONSTRAINT `scan_shipped_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
It contains currently 176728 rows and it is heavily accessed by SELECT queries. Here are the last 50 records:

```sql
+--------+---------------------+---------------------+------------------------+---------+
| id     | created_at          | updated_at          | tracking_number        | user_id |
+--------+---------------------+---------------------+------------------------+---------+
| 176728 | 2020-03-30 19:41:11 | 2020-03-30 19:41:11 | 1Z31629V0399620256     | 77      |
| 176727 | 2020-03-30 19:41:09 | 2020-03-30 19:41:09 | 1Z31629V0395379392     | 77      |
| 176726 | 2020-03-30 19:41:08 | 2020-03-30 19:41:08 | 1Z31629V0398485628     | 77      |
| 176725 | 2020-03-30 19:41:06 | 2020-03-30 19:41:06 | 1Z31629V0390105445     | 77      |
| 176724 | 2020-03-30 19:41:05 | 2020-03-30 19:41:05 | 1Z31629V0390576866     | 77      |
| 176723 | 2020-03-30 19:41:04 | 2020-03-30 19:41:04 | 1Z31629V0394050916     | 77      |
| 176722 | 2020-03-30 19:16:07 | 2020-03-30 19:16:07 | 1Z31629V0397666578     | 77      |
| 176721 | 2020-03-30 19:16:05 | 2020-03-30 19:16:05 | 1Z31629V0398727205     | 77      |
| 176720 | 2020-03-30 19:16:04 | 2020-03-30 19:16:04 | 1Z31629V0394944004     | 77      |
| 176719 | 2020-03-30 19:16:03 | 2020-03-30 19:16:03 | 1Z31629V0399271188     | 77      |
| 176718 | 2020-03-30 19:16:00 | 2020-03-30 19:16:00 | 1Z31629V0399589569     | 77      |
| 176717 | 2020-03-30 19:15:43 | 2020-03-30 19:15:43 | 1Z31629V0390639780     | 77      |
| 176716 | 2020-03-30 19:15:40 | 2020-03-30 19:15:40 | 1Z31629V0398903309     | 77      |
| 176715 | 2020-03-30 19:15:38 | 2020-03-30 19:15:38 | 1Z31629V0391689966     | 77      |
| 176714 | 2020-03-30 19:15:34 | 2020-03-30 19:15:34 | 1Z31629V0396021668     | 77      |
| 176713 | 2020-03-30 19:15:28 | 2020-03-30 19:15:28 | 1Z31629V0392073575     | 77      |
| 176712 | 2020-03-30 18:44:35 | 2020-03-30 18:44:35 | 1Z31629V0398578993     | 77      |
| 176711 | 2020-03-30 18:44:32 | 2020-03-30 18:44:32 | 1Z31629V0398239751     | 77      |
| 176710 | 2020-03-30 18:44:29 | 2020-03-30 18:44:29 | 1Z31629V0399055000     | 77      |
| 176709 | 2020-03-30 18:44:26 | 2020-03-30 18:44:26 | 1Z31629V0399154242     | 77      |
| 176708 | 2020-03-30 18:44:22 | 2020-03-30 18:44:22 | 1Z31629V0393431659     | 77      |
| 176707 | 2020-03-30 18:43:27 | 2020-03-30 18:43:27 | 1Z31629V0393464534     | 77      |
| 176706 | 2020-03-30 18:41:19 | 2020-03-30 18:41:19 | 1Z31629V0391576275     | 77      |
| 176705 | 2020-03-30 18:37:46 | 2020-03-30 18:37:46 | 1Z31629V0396134788     | 77      |
| 176704 | 2020-03-30 18:36:41 | 2020-03-30 18:36:41 | 1Z31629V0398455286     | 77      |
| 176703 | 2020-03-30 18:36:39 | 2020-03-30 18:36:39 | 1Z31629V0399224158     | 77      |
| 176702 | 2020-03-30 18:36:37 | 2020-03-30 18:36:37 | 1Z31629V0394705852     | 77      |
| 176701 | 2020-03-30 18:36:34 | 2020-03-30 18:36:34 | 1Z31629V0393874681     | 77      |
| 176700 | 2020-03-30 18:36:29 | 2020-03-30 18:36:29 | 1Z31629V0392904597     | 77      |
| 176699 | 2020-03-30 18:36:25 | 2020-03-30 18:36:25 | 1Z31629V0394274738     | 77      |
| 176698 | 2020-03-30 18:36:24 | 2020-03-30 18:36:24 | 1Z31629V0390606547     | 77      |
| 176697 | 2020-03-30 18:36:23 | 2020-03-30 18:36:23 | 1Z31629V0396410612     | 77      |
| 176696 | 2020-03-30 18:36:21 | 2020-03-30 18:36:21 | 1Z31629V0392661528     | 77      |
| 176695 | 2020-03-30 18:36:20 | 2020-03-30 18:36:20 | 1Z31629V0397568237     | 77      |
| 176694 | 2020-03-30 18:36:19 | 2020-03-30 18:36:19 | 1Z31629V0392994017     | 77      |
| 176693 | 2020-03-30 18:36:17 | 2020-03-30 18:36:17 | 1Z31629V0390686907     | 77      |
| 176692 | 2020-03-30 18:36:16 | 2020-03-30 18:36:16 | 1Z31629V0391173496     | 77      |
| 176691 | 2020-03-30 18:36:15 | 2020-03-30 18:36:15 | 1Z31629V0391314477     | 77      |
| 176690 | 2020-03-30 18:36:13 | 2020-03-30 18:36:13 | 1Z31629V0397494674     | 77      |
| 176689 | 2020-03-30 18:35:46 | 2020-03-30 18:35:46 | 1Z31629V0399954146     | 77      |
| 176688 | 2020-03-30 18:33:41 | 2020-03-30 18:33:41 | 1Z31629V0398433942     | 77      |
| 176687 | 2020-03-30 18:29:58 | 2020-03-30 18:29:58 | 1Z31629V0398845122     | 77      |
| 176686 | 2020-03-30 18:29:57 | 2020-03-30 18:29:57 | 1Z31629V0396388059     | 77      |
| 176685 | 2020-03-30 18:29:56 | 2020-03-30 18:29:56 | 1Z31629V0390094332     | 77      |
| 176684 | 2020-03-30 18:29:54 | 2020-03-30 18:29:54 | 1Z31629V0395461168     | 77      |
| 176683 | 2020-03-30 18:29:52 | 2020-03-30 18:29:52 | 1Z31629V0395253268     | 77      |
| 176682 | 2020-03-30 18:29:31 | 2020-03-30 18:29:31 | 9805516901459096042300 | 77      |
| 176681 | 2020-03-30 18:29:06 | 2020-03-30 18:29:06 | 9805516901459096049217 | 77      |
| 176680 | 2020-03-30 18:29:04 | 2020-03-30 18:29:04 | 9805516901459096047688 | 77      |
| 176679 | 2020-03-30 18:29:02 | 2020-03-30 18:29:02 | 9805516901459096042706 | 77      |
+--------+---------------------+---------------------+------------------------+---------+

50 rows in set (0.00 sec)
```
When executing a simple SELECT query it takes ~ 0.15 seconds to return results:
```sql
mysql> select * from scan_shipped_orders where tracking_number = '1Z32629V0395461168';
+--------+---------------------+---------------------+--------------------+---------+
| id     | created_at          | updated_at          | tracking_number    | user_id |
+--------+---------------------+---------------------+--------------------+---------+
| 176684 | 2020-03-30 18:29:54 | 2020-03-30 18:29:54 | 1Z32629V0395461168 | 77      |
+--------+---------------------+---------------------+--------------------+---------+
1 row in set (0.15 sec)

mysql> explain select * from scan_shipped_orders where tracking_number = '1Z32629V0395461168';
+----+-------------+---------------------+------------+------+---------------+------+---------+------+--------+----------+-------------+
| id | select_type | table               | partitions | type | possible_keys | key  | key_len | ref  | rows   | filtered | Extra       |
+----+-------------+---------------------+------------+------+---------------+------+---------+------+--------+----------+-------------+
| 1  | SIMPLE      | scan_shipped_orders | NULL       | ALL  | NULL          | NULL | NULL    | NULL | 121661 | 10.00    | Using where |
+----+-------------+---------------------+------------+------+---------------+------+---------+------+--------+----------+-------------+
1 row in set, 1 warning (0.00 sec)
```
What would you do to make it ~ 15 times faster and run same SELECT query for less than 0.01 sec?

# Task 5 - MySQL
You have the following MySQL table containing financial records:
```sql
CREATE TABLE `marketing_costs` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`store_id` int(10) unsigned NOT NULL,
`year` year(4) NOT NULL,
`month` int(10) unsigned NOT NULL,
`seoTotal` decimal(10,2) DEFAULT NULL,
`ppcTotal` decimal(10,2) DEFAULT NULL,
`otherTotal` decimal(10,2) DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `unique_store_period` (`store_id`,`year`,`month`),
KEY `marketing_costs_store_id_foreign` (`store_id`),
CONSTRAINT `marketing_costs_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
```
Each month, certain amount of records are saved (single record per store_id) to save the financial totals. Here is an example selection for the records for 2020-1:
```sql
mysql> select * from marketing_costs where year = 2020 and month = 1;
+-----+------------+------+-------+----------+----------+------------+
| id  | store_id   | year | month | seoTotal | ppcTotal | otherTotal |
+-----+------------+------+-------+----------+----------+------------+
| 346 | 28         | 2020 | 1     | 69.00    | 60714.00 | 0.00       |
| 351 | 31         | 2020 | 1     | 0.00     | 15670.86 | 0.00       |
| 356 | 29         | 2020 | 1     | 0.00     | 8648.29  | 0.00       |
| 361 | 1          | 2020 | 1     | 0.00     | 2379.34  | 0.00       |
| 366 | 32         | 2020 | 1     | NULL     | NULL     | 12447.83   |
| 371 | 33         | 2020 | 1     | NULL     | NULL     | 158.34     |
| 376 | 34         | 2020 | 1     | NULL     | NULL     | 27.64      |
| 381 | 36         | 2020 | 1     | NULL     | NULL     | 4682.19    |
| 386 | 37         | 2020 | 1     | NULL     | NULL     | 791.67     |
| 391 | 35         | 2020 | 1     | NULL     | NULL     | 971.71     |
+-----+------------+------+-------+----------+----------+------------+
10 rows in set (0.00 sec)
```
Please write down a SELECT statement to return a short report for total amounts spent for SEO, PPC, Other (using the columns seoTotal, ppcTotal and otherTotal) for a given period of time (for example: from 2019-4 to 2020-6). Use the following example and finish the query with a single WHERE clause:
```sql
SELECT
SUM(seoTotal) as seoTotal,
SUM(ppcTotal) as ppcTotal,
SUM(otherTotal) AS otherTotal
FROM
marketing_costs
WHERE
... BETWEEN ... AND ... ;
```
Please avoid using any data type conversions and make the query run fast.


