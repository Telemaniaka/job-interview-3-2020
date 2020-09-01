SELECT
 SUM(seoTotal) as seoTotal,
 SUM(ppcTotal) as ppcTotal,
 SUM(otherTotal) AS otherTotal
 FROM
 marketing_costs
 WHERE
 CONCAT(`year`,LPAD(`month`, 2, 0)) BETWEEN 201904 AND 202006 ;
 
 