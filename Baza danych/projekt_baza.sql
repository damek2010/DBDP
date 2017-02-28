
CREATE
  TABLE Projekty
  (
    id_projektu      CHAR (4) NOT NULL ,
    nazwa_projektu   VARCHAR (33) NOT NULL ,
    data_startu      DATE NOT NULL ,
    data_zakonczenia DATE
  ) ;
ALTER TABLE Projekty ADD CONSTRAINT Projekty_PK PRIMARY KEY ( id_projektu ) ;


CREATE
  TABLE Role
  (
    id_roli CHAR (3) NOT NULL ,
    wartosc VARCHAR (15) NOT NULL
  ) ;
ALTER TABLE Role ADD CONSTRAINT Role_PK PRIMARY KEY ( id_roli ) ;


CREATE
  TABLE Sprinty
  (
    id_sprintu           CHAR (4) NOT NULL ,
    poczatek             DATE NOT NULL ,
    koniec               DATE ,
    Projekty_id_projektu CHAR (4) NOT NULL
  ) ;
ALTER TABLE Sprinty ADD CONSTRAINT Sprinty_PK PRIMARY KEY ( id_sprintu ) ;


CREATE
  TABLE Stany
  (
    id_stanu CHAR (4) NOT NULL ,
    wartosc  VARCHAR (15) NOT NULL
  ) ;
ALTER TABLE Stany ADD CONSTRAINT Stany_PK PRIMARY KEY ( id_stanu ) ;


CREATE
  TABLE Uczestnicy
  (
    id_uczestnicy             CHAR (4) NOT NULL ,
    Projekty_id_projektu      CHAR (4) NOT NULL ,
    Uzytkownicy_identyfikator CHAR (4) NOT NULL ,
    Role_id_roli              CHAR (3) NOT NULL
  ) ;
ALTER TABLE Uczestnicy ADD CONSTRAINT Uczestnicy_PK PRIMARY KEY ( id_uczestnicy
, Projekty_id_projektu ) ;


CREATE
  TABLE Uzytkownicy
  (
    identyfikator CHAR (4) NOT NULL ,
    haslo         CHAR (4) NOT NULL ,
    imie          VARCHAR (15) NOT NULL ,
    nazwisko      VARCHAR (25) NOT NULL
  ) ;
ALTER TABLE Uzytkownicy ADD CONSTRAINT Uzytkownicy_PK PRIMARY KEY (
identyfikator ) ;


CREATE
  TABLE Zadania
  (
    id_zadania           CHAR (4) NOT NULL ,
    procent_wykoanania   int(11) NOT NULL ,
    czas_trwania         DATE NOT NULL ,
    kupka                CHAR (1) NOT NULL ,
    Stany_id_stanu       CHAR (4) NOT NULL ,
    Projekty_id_projektu CHAR (4) NOT NULL
  ) ;
ALTER TABLE Zadania ADD CONSTRAINT Zadania_PK PRIMARY KEY ( id_zadania ) ;


CREATE
  TABLE odpowiedzialny
  (
    Id_odpowiedzlnosci       CHAR (4) NOT NULL ,
    data                     DATE NOT NULL ,
    aktualne                 CHAR (1) ,
    Zadania_id_zadania       CHAR (4) ,
    Uczestnicy_id_uczestnicy CHAR (4) NOT NULL ,
    --  ERROR: Column name length exceeds maximum allowed length(30)
    Uczestnicy_Projekty_id_projektu CHAR (4) NOT NULL
  ) ;
ALTER TABLE odpowiedzialny ADD CONSTRAINT odpowiedzialny_PK PRIMARY KEY (
Id_odpowiedzlnosci ) ;


ALTER TABLE Sprinty ADD CONSTRAINT Sprinty_Projekty_FK FOREIGN KEY (
Projekty_id_projektu ) REFERENCES Projekty ( id_projektu ) ;

ALTER TABLE Uczestnicy ADD CONSTRAINT Uczestnicy_Projekty_FK FOREIGN KEY (
Projekty_id_projektu ) REFERENCES Projekty ( id_projektu ) ;

ALTER TABLE Uczestnicy ADD CONSTRAINT Uczestnicy_Role_FK FOREIGN KEY (
Role_id_roli ) REFERENCES Role ( id_roli ) ;

ALTER TABLE Uczestnicy ADD CONSTRAINT Uczestnicy_Uzytkownicy_FK FOREIGN KEY (
Uzytkownicy_identyfikator ) REFERENCES Uzytkownicy ( identyfikator ) ;

ALTER TABLE Zadania ADD CONSTRAINT Zadania_Projekty_FK FOREIGN KEY (
Projekty_id_projektu ) REFERENCES Projekty ( id_projektu ) ;

ALTER TABLE Zadania ADD CONSTRAINT Zadania_Stany_FK FOREIGN KEY (
Stany_id_stanu ) REFERENCES Stany ( id_stanu ) ;

ALTER TABLE odpowiedzialny ADD CONSTRAINT odpowiedzialny_Uczestnicy_FK FOREIGN
KEY ( Uczestnicy_id_uczestnicy, Uczestnicy_Projekty_id_projektu ) REFERENCES
Uczestnicy ( id_uczestnicy, Projekty_id_projektu ) ;

ALTER TABLE odpowiedzialny ADD CONSTRAINT odpowiedzialny_Zadania_FK FOREIGN KEY
( Zadania_id_zadania ) REFERENCES Zadania ( id_zadania ) ;

