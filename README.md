# API Test v1.0.0
use ip

## Used
* https://ip-api.com/docs.

## License
* Author: Adam Nielski
* CopyRight: Adam Nielski
* MIT License

# Descriptio Task

## Zadanie 1 - PHP
Napisz proste rozwiązanie wykorzystujące API do pobierania informacji o 
lokalizacji na podstawie adresu IP.
Link do dokumentacji: https://ip-api.com/docs.
Klasa po dostarczeniu adresu IP powinna móc zwrócić: 
* kraj, 
* kod iso, 
* miasto 
* i kod pocztowy. 

Kod powinien być prosty, ale uniwersalny i elastyczny.

**RUN:** make test 

## Zadanie 2 - PHP
Oprogramuj poniższy formularz, tak aby po wpisaniu adresu IP w pole tekstowe 
pozostałe pola uzupełniały się automatycznie. Możesz wykorzystać czysty js 
lub dowolną bibliotekę.
Wykorzystaj to samo API co w zadaniu 1: https://ip-api.com/docs.
Pola:
* IP
* Country
* City
* Zip

**RUN:** make run (and see http://localhost:8080/)

## Zadanie 3 - SQL
Opisz lub przedstaw na diagramie rozwiązanie poniższego problemu.

System wykorzystuje relacyjną bazę danych SQL. Każdy użytkownik systemu może 
mieć przypisaną przynależność do jednego lub wielu krajów. Jakie tabele i ich 
relacje najlepiej spełnią to wymaganie? Zaproponuj tabele wraz z kluczami 
głównymi i obcymi.

**Rozwiązanie:**

### User
* user_id int
* user_name varchar
* user_surname varchar
* user_login varchar
* user_password varchar

PK i index user_id

### UserHasCountry
* uhc_user_id int
* uhc_country_id int

PK na {uhc_user_id, uhc_country_id}

index uhc_user_id
 
index uhc_country_id

### Country
* country_id int
* country_name varchar

PK i index country_id

# Bibliography and pice of code especially configs
https://geek.justjoin.it/rozpoczac-projekt-uzyciem-composera-phpunit/
https://blog.jgrossi.com/2013/creating-your-first-composer-packagist-package/

#ToDo
Send packege to the Packagist ;)