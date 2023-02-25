# Cliurches-API

Cliurches-API Documentation.

## EDIT USER DETAILS (Display Old info)![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/edit_details/?firstname=[first name]&lastname=[last name]&email=&api_key=[user api_key]
```
## USER DETAILS ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/user_details/?api_key=[user api_key]
```
## DISPLAY POST PER CATEGORY 
```
/api/view_category/?category=[category name]&api_key=[user api_key]
```
## SENDING LIKE TO A POST 
```
/api/sendlike/?postid=[post id]&api_key=[user api_key]
```
## DISPLAY ALL POSTS 
```
/api/view_timeline/?&api_key=[user api_key]
```
## POST NEW CONTENT 
```
/api/create_post/?title=[post title]&content=[post content]&category=[post category]&api_key=[user api_key]
```
## REGISTER USER 
```
/api/new_user/?email=[email]&password=[password]&firstname=[firstname]&lastname=[lastname]
```
## LOGOUT USER ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/logout/?api_key=[user api_key]
```
## LOGIN USER 
```
/api/login/?email=[email]&password=[password]
```
## CONFIRM EMAIL ADDRESS 
```
/api/confirm/?&uid=[user id]&api_key=[api key]
```
