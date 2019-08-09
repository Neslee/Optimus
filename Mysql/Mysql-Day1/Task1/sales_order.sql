create table sales_order 
(entity_id int(10) unsigned NOT NULL auto_increment comment "Entity Id",
state varchar(32) comment "State",
`status` varchar(32) comment "Status",
coupon_code varchar(255) comment "Coupon Code",
protect_code varchar(255) comment "Protect Code",
shipping_description varchar(255) comment "Shipping Description",
is_virtual smallint(5) unsigned comment "Is Virtual",
store_id smallint(5) unsigned comment "Store Id",
customer_id int(10) unsigned comment "Customer Id",
base_discount_amount decimal(12,4) comment "Base Discount Amount",
base_discount_canceled decimal(12,4) comment "Base Discount Canceled",
base_discount_invoiced decimal(12,4) comment "Base Discount Invoiced",
base_discount_refunded decimal(12,4) comment "Base Discount Refunded",
base_grand_total decimal(12,4) comment "Base Grand Total",
base_shipping_amount decimal(12,4) comment "Base Shipping Amount",
base_shipping_canceled decimal(12,4) comment "Base Shipping Canceled",
base_shipping_invoiced decimal(12,4) comment "Base Shipping Invoiced",
base_shipping_refunded decimal(12,4) comment "Base Shipping Refunded",
base_shipping_tax_amount decimal(12,4) comment "Base Shipping Tax Amount",
base_shipping_tax_refunded decimal(12,4) comment "Base Shipping Tax Refunded",
base_subtotal decimal(12,4) comment "Base Subtotal",
base_subtotal_canceled decimal(12,4) comment "Base Subtotal Canceled",
base_subtotal_invoiced decimal(12,4) comment "Base Subtotal Invoiced",
base_subtotal_refunded decimal(12,4) comment "Base Subtotal Refunded",
base_tax_amount decimal(12,4) comment "Base Tax Amount",
base_tax_canceled decimal(12,4) comment "Base Tax Canceled",
base_tax_invoiced decimal(12,4) comment "Base Tax Invoiced",
base_tax_refunded decimal(12,4) comment "Base Tax Refunded",
base_to_global_rate decimal(12,4) comment "Base To Global Rate",
base_to_order_rate decimal(12,4) comment "Base To Order Rate",
base_total_canceled decimal(12,4) comment "Base Total Canceled",
base_total_invoiced decimal(12,4) comment "Base Total Invoiced",
base_total_invoiced_cost decimal(12,4) comment "Base Total Invoiced Cost",
base_total_offline_refunded decimal(12,4) comment "Base Total Offline Refunded",
base_total_online_refunded decimal(12,4) comment "Base Total Online Refunded",
base_total_paid decimal(12,4) comment "Base Total Paid",
base_total_qty_ordered decimal(12,4) comment "Base Total Qty Ordered",
base_total_refunded decimal(12,4) comment "Base Total Refunded",
discount_amount decimal(12,4) comment "Discount Amount",
discount_canceled decimal(12,4) comment "Discount Canceled",
discount_invoiced decimal(12,4) comment "Discount Invoiced",
discount_refunded decimal(12,4) comment "Discount Refunded",
grand_total decimal(12,4) comment "Grand Total",
created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP comment "Created At",
updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP comment "UPDATED At",
PRIMARY KEY (`entity_id`));


insert into sales_order values (1,'Karnataka','Verified','EC1234','RC1234','Cargo',
1,5,1,220.00,11.00,55.00,20.0,30.0,100.0,20.0,10.0,20.0,2.0,1.0,
3.0,1.0,2.0,2.0,22.0,33.0,44.0,55.0,15.0,15.0,20.0,20.0,15.0,20.0,
30.0,20.0,20.0,20.0,20.0,20.0,20.0,20.0,12.0,now(),'2018-06-06 00:00:00');

insert into sales_order values (2,'Goa','Verified','NS1234','RC1234','Cargo',
1,5,1,220.00,11.00,55.00,20.0,30.0,100.0,20.0,10.0,20.0,2.0,1.0,
3.0,1.0,2.0,2.0,22.0,33.0,44.0,55.0,15.0,15.0,20.0,20.0,15.0,20.0,
30.0,20.0,20.0,20.0,20.0,20.0,20.0,20.0,12.0,now(),'2018-06-06 00:00:00');

insert into sales_order values (3,'Delhi','Verified','NS1234','RC1234','Cargo',
1,5,1,220.00,11.00,55.00,20.0,30.0,100.0,20.0,10.0,20.0,2.0,1.0,
3.0,1.0,2.0,2.0,22.0,33.0,44.0,55.0,15.0,15.0,20.0,20.0,15.0,20.0,
30.0,20.0,20.0,20.0,20.0,20.0,20.0,20.0,12.0,now(),now());

update sales_order
set state="Mumbai" where entity_id=2;

