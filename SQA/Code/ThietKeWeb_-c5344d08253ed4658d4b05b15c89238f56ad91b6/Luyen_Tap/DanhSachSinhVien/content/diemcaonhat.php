
select k1.malhp,hp.tenhp,hp.tinchi,k1.diem from ketqua k1 inner join hocphan hp on left(k1.malhp,3) = hp.mahp where diem >= (select max(diem) from ketqua k2 where masv = 's02' and left(k1.malhp,3) = LEFT(k2.malhp,3)) and masv = 's02'



SELECT 
   ID, 
   (SELECT MAX(LastUpdateDate)
      FROM (VALUES (UpdateByApp1Date),(UpdateByApp2Date),(UpdateByApp3Date)) AS UpdateDate(LastUpdateDate)) 
   AS LastUpdateDate
FROM ##TestTable
	https://www.mssqltips.com/sqlservertip/4067/find-max-value-from-multiple-columns-in-a-sql-server-table/