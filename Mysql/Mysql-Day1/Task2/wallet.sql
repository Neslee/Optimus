create table wallet(
id int(10) unsigned NOT NULL auto_increment comment "Id",
cid int(10) unsigned NOT NULL comment "Customer Id",
sid int(10) unsigned NOT NULL comment "Subscription Id",
line_item_id int(11) comment "Line Item Id",
line_item_aid int(11) comment "Line Item Id",
amount decimal(10,2) comment "Amount",
total decimal(10,2) comment "Total",
transaction_id varchar(255) comment "Transcation Id",
payment_id varchar(255) comment "Payment Id",
transaction_type varchar(255) comment "Transcation Type",
reversal varchar(255) comment "Reversal",
`status` tinyint(1) comment "Status",
created datetime comment "Creation Time",
updated datetime comment "Update Time",
user_id int(11) comment "User ID",
delivery_date date comment "Delivery Date",
PRIMARY KEY (`id`));


START TRANSACTION;
insert into wallet values (1,1,1,12,20,15000.00,20000.00,'5','10','online','Paytm','1',
'2018-05-05','2018-05-05',2,'2018-05-05');
insert into Transactions values (1,1,1,15000.00,20000.00,'5','10','online',
1,'2018-05-05','2018-05-05','Yes');
commit;


START TRANSACTION;
savepoint a;
update wallet 
set transaction_type="online" 
where id=1;
update Transactions 
set transaction_type="online" 
where id=1;
rollback to savepoint a;


START TRANSACTION;
insert into wallet values (2,2,3,12,20,15000.00,20000.00,'6','11','COD','Paytm','1',
'2018-05-05','2018-05-05',2,'2018-05-05');
insert into Transactions values (2,2,3,15000.00,20000.00,'6','11','COD',
1,'2018-05-05','2018-05-05','Yes');
savepoint a;
update wallet 
set transaction_type="online" 
where id=2;
update Transactions 
set transaction_type="online" 
where id=2;
rollback to savepoint a;

GRANT SELECT,UPDATE,DELETE ON wallet TO 'neslee'@'%';


REVOKE DELETE ON wallet FROM 'neslee'@'%';
delete from wallet where id=2;


SET SQL_SAFE_UPDATES = 0;
delete from wallet;


update wallet
set transaction_type="COD"
where id=3;


SET SQL_SAFE_UPDATES = 0;
update wallet set reversal='Paytm';


rename table wallet TO customer_wallet;







