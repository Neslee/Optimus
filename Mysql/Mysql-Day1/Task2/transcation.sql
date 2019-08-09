create table `Transactions` (
  id int(10) unsigned NOT NULL AUTO_INCREMENT comment 'Id',
  cid int(10) unsigned NOT NULL comment 'Customer Id',
  sid int(10) unsigned NOT NULL comment 'Subscription Id',
  amount decimal(10,2) comment 'Amount',
  total decimal(10,2) comment 'Total',
  transaction_id varchar(255) comment 'Transcation Id',
  payment_id varchar(255) comment 'Payment Id',
  transaction_type varchar(255) comment 'Transcation Type',
  `status` tinyint(1)  comment 'Status',
  created datetime  comment 'Creation Time',
  updated datetime comment 'Update Time',
  response varchar(45),
  PRIMARY KEY (`id`),
  UNIQUE KEY (`transaction_id`),
  UNIQUE KEY (`payment_id`)
);











