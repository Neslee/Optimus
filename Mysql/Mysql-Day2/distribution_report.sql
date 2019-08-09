select mc.name as `Name`,mc.mobile as `Mobile`,md.pid as `Product_id`,
ms.subscription_type  as `Subscription_Type`,md.quantity as `Product_quantity`,
md.amount as `Product_amount`,md.delivery_date as `Product_delivery_date`,
mds.mobile_number as `Distributor_Mobile_Number`,mds.name as `Distrbutor_Name`,
mdb.mobile_number as `Delivery_Boy_Mobile_Number`,mdb.name as `Delivery_Boy_Name`,
mc.acode `Mcart_apartment_ID`,ma.name as `apartment`,mc.bcode as `Mcart_block_ID`,
mb.name as `block`,mc.fcode as `Mcart_flat_ID`,mf.name as `flat`
from mc_distribution as md 
inner join mcart_customers as mc on md.mccsid=mc.mccsid
inner join mcart_subscriptions as ms on ms.mccsid=mc.mccsid 
inner join mc_distributors as mds on md.mcdid=mds.id 
inner join mc_delivery_boys mdb on md.mcdbid=mdb.id 
inner join mc_apartment as ma on mc.acode=ma.id 
inner join mc_block as mb on mc.bcode=mb.id 
inner join mc_flat as mf on mc.fcode=mf.id