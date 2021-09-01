
# TelSender Event: Add-ons for the plugin [Telsender](https://ru.wordpress.org/plugins/telsender/)

## Events
- [x] Login Failed 
- [x] Login success
- [x] Post interception
- [x] Woocommerce Add To Cart
- [ ] Utm


---
###Login Failed
>Incorrect login and password entry in the admin panel

Message
```sh 📛 Failed login 📛:
Login : admin
Password : ******
Ip: 8.8.8.8
User agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36        
Domen: https://develop.pechenki.top/wp       
LOCATION: UA, test Oblast, test
```   
---
###Login success
>Successful login to Admin

Message
```✅ Login success ✅:
Login : admin  
Ip: 8.8.8.8
User agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36        
Domain: https://develop.pechenki.top/wp 
LOCATION: UA, test Oblast, test   
```   
---
###Post interception
>Successful login to Admin
> Interception Post queries.
> You must specify one of the parameters and its value.
> And the desired title

---
###Woocommerce Add To Cart
>Interception of the event of adding the product to the cart
> 
```🛒 Add to cart: 
quantity : 1
Product : Tests      
Ip: 0.0.0.0
#Add_to_cart
```


 
