CREATE USER 'neslee'@'%' IDENTIFIED BY 'Canil@120758420'; 

GRANT ALL ON sales.sales_order TO 'neslee'@'%';

GRANT SELECT ON sales.sales_order TO 'neslee'@'%';

FLUSH PRIVILEGES;

update sales.sales_order
set state='Pune'
where entity_id=1;

select * from sales_order;

