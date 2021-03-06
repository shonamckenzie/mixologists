create table cocktails (
cocktailid int not null auto_increment,
cocktailname varchar(255) not null,
containsalcohol char(1) not null,    
fullingredients text not null,
preparation text not null,
cocktailimage mediumblob,
primary key (cocktailid)
);


create table type (
typeid int not null auto_increment,
typename varchar(50) not null,
cocktailid int,
primary key (typeid),
foreign key (cocktailid) references cocktails(cocktailid)
);


create table ingredients (
ingredientid int not null auto_increment,
ingredientname varchar(100) not null,
primary key (ingredientid) 
);


create table strength (
strengthid int not null auto_increment,
strengthvalue int not null,
strengthimage blob,
cocktailid int,
primary key (strengthid),
foreign key (cocktailid) references cocktails(cocktailid)
);


create table difficulty (
difficultyid int not null auto_increment,
difficultyrating varchar(50) not null,
cocktailid int,
primary key (difficultyid),
foreign key (cocktailid) references cocktails(cocktailid)
);


create table cocktail_ingredients(
id int not null auto_increment,
cocktailid int,
ingredientid int,
primary key (id),
foreign key (cocktailid) references cocktails(cocktailid),
foreign key (ingredientid) references ingredients(ingredientid)
);







insert into type(typeid, typename)
values(1, ‘dry’); 

insert into type(typeid, typename)
values(2, ‘sweet’);

insert into type(typeid, typename)
values(3, ‘sour’);

insert into type(typeid, typename)
values(4, ‘fruity’);

insert into type(typeid, typename)
values(5, ‘fizzy’);

insert into type(typeid, typename)
values(6, ‘spicy’);

---------------------------------------------------------------------------------------------------------------------------


insert into ingredients(ingredientid, ingredientname)
values(1, ‘tequila’);
insert into ingredients(ingredientid, ingredientname)
values(2, ‘vodka’);
insert into ingredients(ingredientid, ingredientname)
values(3, ‘gin’);
insert into ingredients(ingredientid, ingredientname)
values(4, ‘light rum’);
insert into ingredients(ingredientid, ingredientname)
values(5, ‘pimms’);
insert into ingredients(ingredientid, ingredientname)
values(6, ‘triple sec’);
insert into ingredients(ingredientid, ingredientname)
values(7, ‘cherry liquer’);
insert into ingredients(ingredientid, ingredientname)
values(8, ‘angostura bitter’);
insert into ingredients(ingredientid, ingredientname)
values(9, ‘soda water’);

insert into ingredients(ingredientid, ingredientname)
values(10, ‘coke’);

insert into ingredients(ingredientid, ingredientname)
values(11, ‘lemonade’);

insert into ingredients(ingredientid, ingredientname)
values(12, ‘lime juice’);

insert into ingredients(ingredientid, ingredientname)
values(13, ‘lemon juice’);

insert into ingredients(ingredientid, ingredientname)
values(14, ‘pineapple juice’);

insert into ingredients(ingredientid, ingredientname)
values(15, ‘tomato juice’);

insert into ingredients(ingredientid, ingredientname)
values(16, ‘worcester sauce’);

insert into ingredients(ingredientid, ingredientname)
values(17, ‘celery stick’);

insert into ingredients(ingredientid, ingredientname)
values(18, ‘mint leaf’);

insert into ingredients(ingredientid, ingredientname)
values(19, ‘lemon’);

insert into ingredients(ingredientid, ingredientname)
values(20, ‘ginger beer’);

insert into ingredients(ingredientid, ingredientname)
values(21, ‘pineapple’);

insert into ingredients(ingredientid, ingredientname)
values(22, ‘pepper’);

insert into ingredients(ingredientid, ingredientname)
values(23, ‘coconut cream’);

insert into ingredients(ingredientid, ingredientname)
values(24, ‘water’);



---------------------------------------------------------------------------------------------------------------------------

insert into strength(strengthid, strengthvalue)
values(1, 1);

insert into strength(strengthid, strengthvalue)
values(2, 2);

insert into strength(strengthid, strengthvalue)
values(3, 3);

insert into strength(strengthid, strengthvalue)
values(4, 4);
---------------------------------------------------------------------------------------------------------------------------

insert into difficulty(difficultyid, difficultyrating)
values(1, ‘beginner’);

insert into difficulty(difficultyid, difficultyrating)
values(2, ‘intermediate’);

insert into difficulty(difficultyid, difficultyrating)
values(3, ‘advanced’);

insert into difficulty(difficultyid, difficultyrating)
values(4, ‘pro’);




insert into cocktails(cocktailname, containsalcohol, fullingredients, preparation)
values(‘'singapore sling', 'y',  '45ml gin, 30ml lemon juice, 15ml pineapple juice, 10ml cherry liqueur, 8ml triple sec, 8ml pimms, 2 dashes bitter, 5ml simple syrup, soda water', 'pour all ingredients into cocktail shaker filled with ice cubes. shake well. strain into highball glass. garnish with pineapple and cocktail cherry.');

insert into cocktails(cocktailid, cocktailname, containsalcohol, fullingredients, preparation)
values(2, 'virgin mary', 'n', '120ml tomato juice, 20ml worcestershire sauce, 20ml lemon juice, 3 dashes hot sauce, 1 teaspoon horseradish, 1 pinch celery salt, 1 pinch ground black pepper, 1 stick celery, 1 wedge lemon', 'fill a highball glass with ice cubes. add all ingredients. stir. garnish with celery and lemon.');


insert into cocktails(cocktailid, cocktailname, containsalcohol, fullingredients, preparation)
values(3, 'mojito', 'y', '50ml light rum, 30ml lime juice, 20ml simple syrup, 240ml mint leaf,soda water', 'muddle mint leaves and simple syrup in a highball glass. fill with ice cubes. add lime juice and light rum. top up with soda water. garnish with a mint leaf.');

insert into cocktails(cocktailid, cocktailname, containsalcohol, fullingredients, preparation)
values(4, 'moscow mule', 'y',  '50ml absolut vodka, 20ml lime juice, 30ml ginger beer, 1 part lime', 'fill a mule mug with ice cubes. add absolut vodka and lime juice. top up with ginger beer. garnish with lime.');


insert into cocktails(cocktailid, cocktailname, containsalcohol, fullingredients, preparation)
values(5, 'pina colada', 'y',  '60ml light rum, 120ml pineapple juice, 30ml coconut cream, pineapple, 1 whole maraschino berry', 'fill a wine glass with crushed ice. add all ingredients. stir. garnish with pineapple and a maraschino berry.');




insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 3);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 13);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 14);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 7);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 6);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 5);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 8);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(1, 9);



insert into cocktail_ingredients(cocktailid, ingredientid)
values(2, 15);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(2, 13);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(2, 16);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(2, 17);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(2, 22);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(2, 19);






insert into cocktail_ingredients(cocktailid, ingredientid)
values(3, 4);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(3, 12);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(3, 9);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(3, 18);



insert into cocktail_ingredients(cocktailid, ingredientid)
values(4, 12);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(4, 2);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(4, 20);



insert into cocktail_ingredients(cocktailid, ingredientid)
values(5, 4);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(5, 14);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(5, 23);

insert into cocktail_ingredients(cocktailid, ingredientid)
values(5, 21);





update type
set cocktailid = 1
where typeid = 2;

update type
set cocktailid = 2
where typeid = 6;

update type
set cocktailid = 3
where typeid = 3;

update type
set cocktailid = 4
where typeid = 2;

update type
set cocktailid = 5
where typeid = 4;



update strength
set cocktailid = 1
where strengthid = 4;

update strength
set cocktailid = 3
where strengthid = 3;

update strength
set cocktailid = 4
where strengthid = 1;

update strength
set cocktailid = 5
where strengthid = 2;





update difficulty
set cocktailid = 1
where difficultyid = 3;

update difficulty
set cocktailid = 2
where difficultyid = 1;

update difficulty
set cocktailid = 3
where difficultyid = 4;

update strength
set cocktailid = 4
where difficultyid = 1;

update difficulty
set cocktailid = 5
where difficultyid = 2;

