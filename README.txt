==== Blue Falcon Package Delivery Company Localhost Prototype ====

Contributors: 	* Agacer, Sean Matthew
		* Gamata, Mark Christian
		* Nisay, Deiondre Judd
		* San Juan, Jan Catherine

Tags: packagedelivery, package, order, tracker, shipping, simple, phase4, receive, parcel, gift, javascript, css, html, php, xampp
Build: alpha build version 4.0


== README ==

     The Blue Falcon Package Delivery Company localhost is a prototype that provides the 
     users different functionalities based on the type of account they are logged in. This    
     project gives the users the capability to order, ship, track, and monitor packages     
     through virtual means.


     A customer account would allow you to create orders as well as tracking your 
     package.


     A staff account would allow you to assign riders to specific packages for delivery and 
     sortation.


     A rider account would allow you to track and update the progress of each packages 
     assigned to you.


     A branch manager account, or admin, is given permission to edit and/or delete certain 
     data, together with managing different creation of accounts, but branch-specific.


     A SuperAdmin is like a branch manager account, but there is only one of its kind and it 
     isn’t branch-specific. The only difference is a SuperAdmin can register branches and 
     manage the creation of admin accounts.


== Requirements ==

* Any PHP Development Environment such as XAMPP
* A web browser of your choice


== Setup ==

1. Run XAMPP Control Panel as administrator
2. On the Control Panel of XAMPP, click on Start next to Apache and MySql
3. On the same Control Panel, click on Admin next to the Start button of MySql. It should open ‘localhost/phpmyadmin’ on your web browser
4. Create a new database and name it “PackageDelivery”
5. Import the downloaded file named “db.sql” found in the ‘SQL’ folder into the newly created database
6. Transfer the entire ‘PackageDelivery’ folder into Drive:\xampp\htdocs
7. Lastly, on a web browser, go to ‘localhost/PackageDelivery/homepage.php’ to start.


== Notes ==
* You can either sign up as a customer to use an account, or use pre-existing accounts listed in the accounts table under the ‘packagedelivery’ database 
* All pre-existing accounts have a password of ‘12345’


== Files and Directories ==

* css folder
   * career.css
   * editRider.css.php
   * footer.css
   * forms.css.php
   * homepage.css
   * login.css.php
   * NavBar.css.php
   * profile.css
   * tracker.css
* includes folder
   * createBranch.inc.php
   * dbh.inc.php
   * functions.inc.php
   * login.inc.php
   * logout.inc.php
   * signup.inc.php
   * signupAdmin.inc.php
   * signupRider.inc.php
* admin.php
* adminaccounts.php
* career.php
* createBranch.php
* deleteaccount.php
* deleteorder.php
* editorder.php
* editprofile.php
* editRider.php
* footer.php
* header.php
* homepage.php
* login.php
* myShipping.php
* myShippingAdmin.php
* profile.php
* riderstatus.php
* shippingSuccess.php
* signup.php
* signUpAdmin.php
* signUpRider.php
* Tracker_page1.php

