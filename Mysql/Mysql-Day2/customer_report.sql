select mc.mccsid as Customer_MCCSID,mc.`name` as Customer_Name,
mc.mobile as Customer_Mobile,ma.`name` as Apartment_Name,
mb.`name` as Block_Name,mf.`name` as Flat_Name,
mc.created as Customer_Created,mc.referral_contact as Referral_Contact,
mw.created as Wallet_Created,mw.total as Wallet_Total,from_unixtime(mw.created) as Wallet_Created
from mcart_customers as mc
inner join mc_apartment as ma ON mc.acode=ma.id
inner join mc_block as mb ON mc.bcode=mb.id
inner join mc_flat as mf ON mc.fcode=mf.id
inner join mcart_wallet as mw ON mc.mccsid=mw.mccsid
where mw.id in (select max(id) from mcart_wallet group by mccsid)

select * from mcart_wallet where id IN 
(select max(id) from mcart_wallet group by mccsid)

select case when transaction_type="Deduction" then "Purchases" else transaction_type end from mcart_wallet













