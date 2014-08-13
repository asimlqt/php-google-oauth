php-google-oauth
================

This is a sample project to help you get started using Google OAuth 2.0.

There are a few different ways to authenticate but fou our purpose we're going to use the "web application" type as i believe this is the most common scenario.


I'm using Ubuntu 14.04 with the default Apache and PHP installed via apt-get. You'll have to make the necessary adjustments for your setup.


Google Developer Console setup
=================================
visit "https://code.google.com/apis/console" and create a new project. You can call it what you want. Once you've created it click on the project name in the project list and you will be taken to the project overview page.

Click on the "Credentials" link in the left menu and then "Create new Client ID". Make sure "Web application" is checked and insert "http://localhost" in the "Authorized redirect URI" text field. Once you've done that click "Create Client ID" and you will be taken back to the previous page where you will see a new section called "Client ID for web application". This contains everything you need for OAuth.

This is it for the Google setup.



Create a new virtual host
=================================

Clone this project and create a new virtual host. Make sure the index.php of this project is in the document root. Im not going to go into too much detail here, i assume you know how to create a new virtual host.

Make sure you copy the dlient id and secret from the Google developer console into index.php.

One thing we need to do is redirect localhost to our new site. Google requires a valid publicly available domain for oauth but they also allow "localhost" for development purposes. This is what we're using for this tutorial so we need to add a redirect so that when accessing localhost it will redirect to our new site.

I have created a separate vhost "localhost.conf" with the following contents

```
<VirtualHost *:80>
     ServerName http://localhost
     Redirect 301 / http://google-auth.local
</VirtualHost>
```


Test
================================

Once you have everything setup you can access the new site you created which should display a single link "Authenticate". When you click this link you will be redirected to Google which will require you to login to the account which you want to provide access to. Once you've logged in to your Google account and clicked "Accept" you will be redirected to localhost which will redirect you to your local site. This wiil simply print all the data which has been sent by Google.


It's as easy as that.
