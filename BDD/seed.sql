INSERT INTO user(id,nom,prenom,fonction,pays,etablissement,ville,adresse,photo)
	VALUES (1,"HURTER","Jonathan","Dev","France","ENSIIE","Illkirch","9 rue des bananes","profiles/1.jpeg"),
		   (2,"KOBERSI","Pauline","Dev","France","ENSIIE","Illkirch","9 rue des bananes","profiles/2.jpeg"),
		   (3,"MARTIN","Anthony","Dev","France","CNAM","Strasbourg","10 rue des patates","profiles/3.jpeg");

INSERT INTO request(id,idUser,titre,message,type)
	VALUES	(1,1,"Test","Je suis la pour le test","pub"),
		 	(2,2,"Test2","Je suis aussi la pour le test","ann"),
		 	(3,3,"Test3","Ah toi aussi ? Moi aussi !","requ");
