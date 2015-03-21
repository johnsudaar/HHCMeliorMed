INSERT INTO user(id,nom,prenom,fonction,pays,etablissement,ville,adresse,photo, tags)
	VALUES (1,"HURTER","Jonathan","Dev","France","ENSIIE","Illkirch","9 rue des bananes","profiles/1.jpeg","test,lol,qt"),
		   (2,"KOBERSI","Pauline","Dev","France","ENSIIE","Illkirch","9 rue des bananes","profiles/2.jpeg","bana,dl,dkl"),
		   (3,"MARTIN","Anthony","Dev","France","CNAM","Strasbourg","10 rue des patates","profiles/3.jpeg","lll,mmm,nnn");

INSERT INTO request(id,idUser,titre,message,type)
	VALUES	(1,1,"Test","Je suis la pour le test","pub"),
		 	(2,2,"Test2","Je suis aussi la pour le test","ann"),
		 	(3,3,"Test3","Ah toi aussi ? Moi aussi !","requ");

INSERT INTO reply(id,message,request,resolu,idUser)
	VALUES	(1,"Ok thx",1,0,2),
			(2,"2riz1",1,1,3),
			(3,"Lol g pa lu",2,1,1);

INSERT INTO notif(id,dest,reply_id,request_id)
	VALUES	(1,1,0,1),
			(2,2,0,1);