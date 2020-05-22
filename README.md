# vinculum development updates

4/10/2020
SQL Update:
ALTER TABLE `customer_vt` ADD `is_deleted` BOOLEAN NOT NULL AFTER `Notes`;

5/20/2020
SQL UPDATE:
Added 3 columns in 'service_report' table (requested_by,checked_by,prepared_by)
Modified service_report subtables
Service Report from selection of items to manual typing