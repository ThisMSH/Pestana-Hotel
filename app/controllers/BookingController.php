<?php
SELECT * FROM rooms LEFT JOIN reservations
ON rooms.ID = reservations.RoomID AND (
    "2023-02-15" BETWEEN reservations.Check_In AND reservations.Check_Out
    OR "2023-02-22" BETWEEN reservations.Check_In AND reservations.Check_Out
    OR ("2023-02-15" <= reservations.Check_In AND "2023-02-15" >= reservations.Check_Out)
)
WHERE reservations.RoomID IS NULL AND rooms.Room_Name = "Double" AND rooms.Room_Type = "";

SELECT rooms.* FROM rooms LEFT JOIN reservations
ON rooms.ID = reservations.RoomID AND (
    "2023-02-15" BETWEEN reservations.Check_In AND reservations.Check_Out
    OR "2023-02-16" BETWEEN reservations.Check_In AND reservations.Check_Out
    OR (
        "2023-02-15" <= reservations.Check_In AND "2023-02-16" >= reservations.Check_Out
    )
)
WHERE reservations.RoomID IS NULL AND rooms.Room_Name = "Double" AND rooms.Room_Type = "";