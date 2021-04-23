
CREATE SCHEMA IF NOT EXISTS `demo_poo` DEFAULT CHARACTER SET latin1 ;



use demo_poo; 



CREATE TABLE IF NOT EXISTS annonces(

	id INT(2) NOT NULL AUTO_INCREMENT,
	titre VARCHAR(30), 
    description text,
    created_at datetime default CURRENT_TIMESTAMP,
    actif INT(1) default 0, 
    PRIMARY KEY (ID)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE articles(

	id INT(2) NOT NULL AUTO_INCREMENT,
	article_name VARCHAR(30), 
    description text,
    unit_price INT(2) default 0,
    availability INT(1) default 0, 
    PRIMARY KEY (ID)
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;


alter table annonces
add column users_id int(2);

alter table annonces
add foreign key (users_id) references users(id);


INSERT INTO annonces (titre, description, actif, users_id) VALUES('initiation oriente objet', 'cours de programmation oriente objets', 
 1, 1), ('learn symfony', 'basic knowledge in symfony with an example app', 
 0, 2),('angular 11', 'maitrise les concepts de base d angular 11', 
 1, 3);
  
ALTER TABLE users 
ADD roles json null after `pass` ; 

ALTER TABLE users 
modify role   ; 

update users set roles = '["ROLE_ADMIN"]' where id = 1;

update table users set roles = `["ROLE_ADMIN"]` where id = 8;

  
  
  
  
  
  
  
  
 
