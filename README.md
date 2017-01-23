## Development Knowledge Test

This will be a practical test to analyze your knowledge using GIT and CodeIgniter. However, any additional knowledge that can be used, i.e., reasonable, will also be analyzed.

### Test

To begin, you should fork this repository. This will be your workstation.

1. Create a CodeIgniter/Laravel APP on your fork. We're currently using version 2.
2. Your app should do some tasks:  
 a. CRUD for products.  
 b. A cron to create an order with random products every thirty minutes.  
 c. Display all orders, this query should be cached.  

### Tasks Explanation

2.a - This should be basic stuff (name of product, price, stock quantity).  
2.b - Orders must include random products that is available in stock. Also include new informations, like total value and an unique identifier.  
2.c - Display a view with all created orders sorted by latest created. This query should be cached, because orders are only created every thirty minutes.  

### Conclusion

Will be also analyzed, code organization (we follow PSR-2), creativity and functionality.
When you finish, do a PR and we analyze.

**Do your best! :wink:**
