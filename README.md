### The Link shortener web-application

The principle of the application is based on assigning to the original link one of the available combinations of
symbols, numbers from 0 to 9 and Latin symbols, large and small, 7 digits long. The application connects its current
web domain using this combination. The number of such combinations is 62^7 or 3.521614606×10^12 or 3521 614 606 208. So 
application can store 62^7 urls.

Application receives from a user web link (original), stores it in DB, gives short link. Maximum length of
a short link is 7 symbols. Application redirects the incoming request on short link to original link, which has saved
earlier. Application counts the many of accessing to original link (which were made using the short link). There are
web interface which allows user to create short link, watch created short link and it's mirror - original link, number 
of clicks on the link. Application handles case when user inputted wrong url, case when limit of available short links
has reached and outputs errors messages in browser.

### How to run (with Docker):
* Clone the repository ```https://github.com/AlexKhranovskiy/link-shortener```
* Create in root folder file .env, copy content from .env.example file to .env file
* Run ```docker-compose up -d```
* Go inside the container ```docker exec -it link-shortener_php-apache_1 bash```
* Run ```composer install```
* Run ```php artisan key:generate```
* Run ```php artisan migrate```
* Run ```php artisan config:cache```
* Run ```php artisan config:clear```
* Run ```chmod 777 -R storage```
* Open [http://localhost](http://localhost)
* To exit, press ctrl+D and run ```docker-compose down```

### Access to DB:
* [http://localhost:8082](http://localhost:802)
* login: root
* password secret
