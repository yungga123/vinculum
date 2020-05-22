# vinculum development updates

4/10/2020
SQL Update:
ALTER TABLE `customer_vt` ADD `is_deleted` BOOLEAN NOT NULL AFTER `Notes`;

5/20/2020
SQL UPDATE:
Added 3 columns in 'service_report' table (requested_by,checked_by,prepared_by)
Modified service_report subtables
Service Report from selection of items to manual typing

5/22/2020
SQL UPDATE:
Removed 1 column in 'service_report' table. Current table:
+------------------+---------------+------+-----+---------+----------------+
| Field            | Type          | Null | Key | Default | Extra          |
+------------------+---------------+------+-----+---------+----------------+
| id               | int(11)       | NO   | PRI | NULL    | auto_increment |
| customer_name    | varchar(500)  | NO   |     | NULL    |                |
| description      | varchar(1000) | NO   |     | NULL    |                |
| date_requested   | date          | NO   |     | NULL    |                |
| date_implemented | date          | NO   |     | NULL    |                |
| received_by      | varchar(500)  | NO   |     | NULL    |                |
| checked_by       | varchar(500)  | NO   |     | NULL    |                |
| is_deleted       | tinyint(1)    | NO   |     | NULL    |                |
+------------------+---------------+------+-----+---------+----------------+

Modifications in 'project_report' table:
+------------------+---------------+------+-----+---------+----------------+
| Field            | Type          | Null | Key | Default | Extra          |
+------------------+---------------+------+-----+---------+----------------+
| id               | int(11)       | NO   | PRI | NULL    | auto_increment |
| name             | varchar(1000) | NO   |     | NULL    |                |
| customer_id      | int(11)       | NO   |     | NULL    |                |
| description      | varchar(1000) | NO   |     | NULL    |                |
| date_requested   | date          | NO   |     | NULL    |                |
| date_implemented | date          | NO   |     | NULL    |                |
| date_finished    | date          | NO   |     | NULL    |                |
| prepared_by      | varchar(500)  | NO   |     | NULL    |                |
| checked_by       | varchar(500)  | NO   |     | NULL    |                |
| is_deleted       | tinyint(1)    | NO   |     | NULL    |                |
+------------------+---------------+------+-----+---------+----------------+


System Update:
- Requested By is replaced with Received By and Prepared by is removed. (Service Report Module)
- Project Report added checked by, prepared by, and customer name
