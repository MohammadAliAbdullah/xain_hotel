-- booking
TRUNCATE `booked_details`;
TRUNCATE `booked_info`;
TRUNCATE `bill`;
TRUNCATE `customer_order`;
TRUNCATE `order_menu`;
TRUNCATE `tbl_guestpayments`;
TRUNCATE `tbl_housekeepingrecord`;
TRUNCATE `tbl_otherguest`;
TRUNCATE `tbl_pool_booking`;
TRUNCATE `tbl_pool_bookingitem`;
UPDATE tbl_roomnofloorassign SET status = 1;

-- accounting 
TRUNCATE `acc_transaction`;
TRUNCATE `tbl_openingbalance`;

-- truncated query for posted bills --
TRUNCATE `tbl_postedbills`;

-- additional tables
TRUNCATE `night_audit_setting`;
TRUNCATE `night_audit_time`;
TRUNCATE `tbl_cashregister`;
