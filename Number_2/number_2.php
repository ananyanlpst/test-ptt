SELECT 
	WorkSchedule.EmployeeID, WorkSchedule.WorkDate, MIN(CardScan.Clock) AS ClockIn, MAX(CardScan.Clock) AS ClockOut
FROM 
	WorkSchedule, CardScan
WHERE
	WorkSchedule.EmployeeID = CardScan.EmployeeID AND WorkSchedule.WorkDate = SUBSTR(CardScan.Clock, 1, 10)
GROUP BY
	WorkSchedule.EmployeeID, WorkSchedule.WorkDate
ORDER BY
	WorkSchedule.EmployeeID ASC