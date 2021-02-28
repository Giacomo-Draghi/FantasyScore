/*Point 1*/
INSERT INTO clients (clients.clientFirstname, clients.clientLastname, clients.clientEmail, clients.clientPassword, clients.comment)
VALUES ("Tony", "Stark", "tony@starkent.com", "Iam1ronM@n", "I am the real Ironman")

/*Point 2*/
/*First we can ran a quey to see what the client id is

Select * from clients

*/

UPDATE clients 
SET clientLevel = 3 
WHERE clientFirstname = "Tony" and clientLastname = "Stark"

/*Point 3*/

UPDATE inventory
SET invDescription = REPLACE(invDescription, "small", "spacious")
WHERE invId = 12 and invMake = "GM" and invModel = "Hummer"

/*Point 4*/

SELECT i.invModel, c.classificationName 
FROM inventory as i
INNER JOIN carclassification as c
	ON i.classificationId = c.classificationId
WHERE c.classificationName = "SUV"

/*Point 5*/

DELETE FROM inventory 
WHERE invMake = "Jeep" and invModel = "Wrangler"

/*Point 6*/

UPDATE inventory SET invImage = concat("/phpmotors", invImage) ,  invThumbnail = concat("/phpmotors", invThumbnail)