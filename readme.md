# Cliurches-API

Cliurches-API Documentation.


## User: Create Pamisa ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/pamisa/?parish=[bauan,bolo,sanpascual,aplaya]&recipient=[padasal ni]&forwhom=[para kay]&date=[petsa]&time=[oras]&type=[uri ng padasal]&comment=[mensahe]&api_key=[user api_key]
```
## User: Display Payment Method in "Payment" ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
Returns Payment Method, Account Number, Account Name na ni set ni Admin.
```
/api/donation/?parish=[bauan,bolo,sanpascual,aplaya]&api_key=[user api_key]
```
## User: Display User Pamisa ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/displayPamisa/?api_key=[user api_key]
```
## User: Cancel Pamisa ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/cancelPamisa/?id=[id]&api_key=[user api_key]
```

## Admin: Set Payment ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/admin/paymentMethod/?bank=[Bank Name]&accountNum=[Account Number]&accountName=[Account Name]&donationPayment=[cost]&api_key=[user api_key]
```
## Admin: Approve Payment ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/admin/approve/?id=[id]&api_key=[user api_key]
```
## Admin: Deny Payment ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/admin/decline/?id=[id]&api_key=[user api_key]
```
## Admin: List All Declined ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/admin/declinedList/?parish=[bauan,bolo,sanpascual,aplaya]&api_key=[user api_key]
```
## Admin: List All Approved ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/admin/approvedList/?parish=[bauan,bolo,sanpascual,aplaya]&api_key=[user api_key]
```
## Admin: List All ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/api/admin/Allpamisa/?parish=[bauan,bolo,sanpascual,aplaya]&api_key=[user api_key]
```

## EDIT USER DETAILS 
```
/api/edit_details/?firstname=[first name]&lastname=[last name]&email=[new email]&api_key=[user api_key]
```
## DELETE POST
```
/api/delete_post/?postid=[Post ID]&api_key=[user api_key]
```
## USER DETAILS 
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
## LOGOUT USER 
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
