-----Semestri---

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Летњи','Прва');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Зимски','Прва');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Летњи','Друга');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Зимски','Друга');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Летњи','Трећа');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Зимски','Трећа');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Летњи','Четврта');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Зимски','Четврта');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Летњи','Мастер');

INSERT INTO Semestar (Naziv, Godina)
VALUES ('Зимски','Мастер');


-----Studenti----

INSERT INTO Student (KorisnickoIme, BrIndeks, Ime, Prezime, Lozinka, JMBG, Email, Semestar_idSemestar)
VALUES ('Jole552/17','552/17','Јован','Главоњић','studnetdemo','1311997800221','jovan.glavonja85@gmail.com', '1');

INSERT INTO Student (KorisnickoIme, BrIndeks, Ime, Prezime, Lozinka, JMBG, Email, Semestar_idSemestar)
VALUES ('Bule54/17','54/17','Димитрије','Ђукић','studnetdemo','1311998800221','bule.djukic@gmail.com', '1');

INSERT INTO Student (KorisnickoIme, BrIndeks, Ime, Prezime, Lozinka, JMBG, Email, Semestar_idSemestar)
VALUES ('Аntona231/15','231/15','Марко','Антонић','studnetdemo','0811997800221','antonaa@gmail.com', '3');

INSERT INTO Student (KorisnickoIme, BrIndeks, Ime, Prezime, Lozinka, JMBG, Email, Semestar_idSemestar)
VALUES ('Pilja230/15','230/15','Милош','Пиља','studnetdemo','1312998800221','piljaM@gmail.com', '3');

-----Asistenti----


INSERT INTO Asistent (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Ass65','Марко','Пилиповић','asistent','markoP@mgail.com');


INSERT INTO Asistent (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Ass67','Марко','Никић','asistent','markoО@mgail.com');


INSERT INTO Asistent (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Bss65','Марко','Николић','asistent','markoN@mgail.com');


INSERT INTO Asistent (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Css65','Марко','Пешић','asistent','markoPe@mgail.com');

----Profesori----


INSERT INTO Profesor (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Sale2','Саша','Пешић','profesor','saleP@mgail.com');

INSERT INTO Profesor (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Nikoja','Никола','Пешић','profesor','nikolaa@mgail.com');

INSERT INTO Profesor (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Dragan3','Драган','Пешић','profesor','dragaa@mgail.com');

INSERT INTO Profesor (KorisnickoIme, Ime, Prezime, Lozinka, Email)
VALUES ('Milutinko','Милутин','Пешић','profesor','milutinn@mgail.com');


-----Predmet----

INSERT INTO Predmet (Sifra, Naziv, Asistent_KorisnickoIme, Profesor_KorisnickoIme, Semestar_idSemestar)
VALUES ('ИТ123','Обрада и пренос сигнала','Css65','Sale2','1');

INSERT INTO Predmet (Sifra, Naziv, Asistent_KorisnickoIme, Profesor_KorisnickoIme, Semestar_idSemestar)
VALUES ('ИТ133','Социјалне мреже','Bss65','Dragan3','3');

INSERT INTO Predmet (Sifra, Naziv, Asistent_KorisnickoIme, Profesor_KorisnickoIme, Semestar_idSemestar)
VALUES ('ИТ134','Увод у пајтон','Ass65','Dragan3','1');

INSERT INTO Predmet (Sifra, Naziv, Asistent_KorisnickoIme, Profesor_KorisnickoIme, Semestar_idSemestar)
VALUES ('ИТ135','Напредни пајтон','Ass65','Dragan3','');

INSERT INTO Predmet (Sifra, Naziv, Asistent_KorisnickoIme, Profesor_KorisnickoIme, Semestar_idSemestar)
VALUES ('ИТ135','Базе података 1','Ass65','Dragan3','3');


INSERT INTO Predmet (Sifra, Naziv, Asistent_KorisnickoIme, Profesor_KorisnickoIme, Semestar_idSemestar)
VALUES ('ИТ135','Структуре података 1','Ass65','Sale2','3');


INSERT INTO Predmet (Sifra, Naziv, Asistent_KorisnickoIme, Profesor_KorisnickoIme, Semestar_idSemestar)
VALUES ('ИТ136','Семинарски рад А','Ass65','Nikoja','3');


-----Ankete ----

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за професора', 1, 3);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за предмет', 1, 3);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за асистента', 1, 3);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за раднике', 1, 3);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за професора', 1, 1);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за предмет', 1, 1);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за асистента', 1, 1);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за раднике', 1, 1);

INSERT INTO Anketa (Naziv, PopunjenaAnketa, Semestar_idSemestar)
VALUES ('Анкета за факултет', 1, 3);

---Slusa predmet----

INSERT INTO SlusanjePredmeta (Student_KorisnickoIme, Predmet_idIspit)
VALUES ('Jole552/17', 2);

INSERT INTO SlusanjePredmeta (Student_KorisnickoIme, Predmet_idIspit)
VALUES ('Jole552/17', 4);

INSERT INTO SlusanjePredmeta (Student_KorisnickoIme, Predmet_idIspit)
VALUES ('Jole552/17', 1);

INSERT INTO SlusanjePredmeta (Student_KorisnickoIme, Predmet_idIspit)
VALUES ('Jole552/17', 4);


INSERT INTO SlusanjePredmeta (Student_KorisnickoIme, Predmet_idIspit)
VALUES ('Jole552/17', 8);


INSERT INTO SlusanjePredmeta (Student_KorisnickoIme, Predmet_idIspit)
VALUES ('Jole552/17', 9);

INSERT INTO SlusanjePredmeta (Student_KorisnickoIme, Predmet_idIspit)
VALUES ('Jole552/17', 10);

