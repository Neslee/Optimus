create table sales_order_item 
(item_id int(10) unsigned NOT NULL auto_increment,
order_id int(10) unsigned NOT NULL DEFAULT 0,
parent_item_id int(10) unsigned,
quote_item_id int(10) unsigned,
store_id smallint(5) unsigned,
created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
product_id int(10) unsigned,
product_type varchar(255),
product_options text,
weight decimal(12,4) DEFAULT 0,
is_virtual smallint(5) unsigned,
sku varchar(255),
`name` varchar(255),
description text,
applied_rule_ids text,
additional_data text,
is_qty_decimal smallint(5) unsigned,
no_discount smallint(5) unsigned NOT NULL DEFAULT 0,
qty_backordered decimal(12,4) DEFAULT 0,
qty_canceled decimal(12,4) DEFAULT 0,
qty_invoiced decimal(12,4) DEFAULT 0,
qty_ordered decimal(12,4) DEFAULT 0,
qty_refunded decimal(12,4) DEFAULT 0,
qty_shipped decimal(12,4) DEFAULT 0,
base_cost decimal(12,4) DEFAULT 0,
price decimal(12,4) NOT NULL DEFAULT 0,
base_price decimal(12,4) NOT NULL DEFAULT 0,
original_price decimal(12,4),
base_original_price decimal(12,4),
tax_percent decimal(12,4) DEFAULT 0,
tax_amount decimal(12,4) DEFAULT 0,
FOREIGN KEY (order_id) REFERENCES sales_order(entity_id),
PRIMARY KEY (`item_id`));


alter table sales_order_item
ADD COLUMN subscription_info int(11),
ADD COLUMN subscription_type text,
ADD COLUMN no_of_days text;

alter table sales_order_item DROP FOREIGN KEY sales_order_item_ibfk_1;

alter table sales_order_item
add FOREIGN KEY (order_id) REFERENCES sales_order(entity_id);


insert into sales_order_item values (1,1,2,3,4,'2018-05-05 00:00:00','2018-05-05 00:00:00',
2,'Cloth','Mens Cloth','200.0',1,'Skull Candy','Neslee','Puma Cloths','Puma Brand',
'Band Extra',2,3,100.0,20.0,10.0,20.0,2.0,1.0,
3.0,1.0,2.0,2.0,22.0,33.0,44.0,1,'Hello','Five');

  
  
  

