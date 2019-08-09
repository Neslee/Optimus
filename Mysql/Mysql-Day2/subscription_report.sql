select ms.id as Subscription_id,ms.mccsid as MCCSID,mc.mobile as Customer_Mobile,
mc.`name` as Label,ms.product_id as Product_ID,ms.subscription_type as Subscription_Type,
ms.amount as Subscriptions_Amount,ms.quantity as Subscriptions_Quantity,
ma.name as Apartment,mb.name as Block,mf.name as Flat,
ms.start_date as Subscriptions_Start_Date,ms.end_date as Subscriptions_End_Date,
ms.stop_date as Subscriptions_Stop_Date,ms.resume_date as Subscriptions_Resume_Date,
ms.created as Subscriptions_Created_Date,ms.status as Subscriptions_Status
from mcart_subscriptions as ms
inner join mcart_customers as mc ON ms.mccsid=mc.mccsid
inner join mc_apartment as ma ON mc.acode=ma.id
inner join mc_block as mb ON mc.bcode=mb.id
inner join mc_flat as mf ON mc.fcode=mf.id





