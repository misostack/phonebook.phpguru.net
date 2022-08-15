# PhoneBook Application

## Requirements

### Functional
- User must registered to use application
- User can only access their phone book
- User can register with their email + password
- User can register with SNS ( Social Network Service )
- User can login with their email/username + password or SNS
- User can reset their password via email
- User can organize their phone book by category
- User can search their phone book by: name or phone number - support full text  search and auto complete

### Non-Functional
- User password must be hashed
- Email must be encrypted
- Prevent CRS Attack
- Must use http only cookie for secure
- Enable Google Captcha if user enter password wrong 5 times
- No framework can be used
- Must use OOP
- Use composer to manage your external libraries

###  Infrastructure
- Application must be able to deploy via Docker
- Database must be MYSQL 8.x

## Technical Topics

1. [x] OOP
2. [x] Composer
3. [x] [Doctrine ORM](https://www.doctrine-project.org/)

```bash
php installer
php composer.phar -v
mv composer.phar $HOME/composer
composer -v
which composer

composer dumpautoload
```

### Dev enviroment

- [Deploy PHP Application in Heroku](https://devcenter.heroku.com/articles/deploying-php)

```bash
git push heroku main:master
- ```

> Test Account
- URL : https://phonebook-phpguru.herokuapp.com/ 
- Account: demo|123456

### Resources

1. [Packagist](https://packagist.org/)
2. [PHP Standards Recommendations](https://www.php-fig.org/psr/)

