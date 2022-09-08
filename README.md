<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project
Shows the quotes as charts and table based on time constrain, and notifies user by email. 

## Important notes
What should be improved
- blades should be split into components 
- remove CDN links
- the behavior of date pickers (add date dependency)
- add form validation on frontend part
- improve the design 
- add more test cases 
- memory leaks in case of huge date interval 
- table pagination in case of huge date interval
- chart
- use cache for 3d party requests

In case of usage of Mailgun sandbox server in the search form in the field ***EMAIL*** you should input an email address that is verified in the mailgun test domain.
If you need to verify your email contact, please ***Roman_Sahan@epam.com*** <br>

## Set up project
To set up the project you need to add next env variables: <br>
MAIL_MAILER<br>
MAIL_HOST<br>
MAIL_PORT<br>
MAIL_USERNAME<br>
MAIL_PASSWORD<br>
MAIL_ENCRYPTION<br>
MAIL_FROM_ADDRESS<br>
MAILGUN_DOMAIN<br>
MAILGUN_SECRET<br>

PKG_STORE_URL<br>

YH_FINANCE_ROOT_URL<br>
YH_FINANCE_X_RAPIDAPI_KEY<br>
YH_FINANCE_X_RAPIDAPI_HOST<br>

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
