## About this coding challenge

Hello, my name is Ivan Vetsich and I am the author of the various controllers, database migrations, and blade files in this Github repository.

This coding challenge was extended by the MX Super Store, a successful online retailer in the motocross marketplace.

- [You can visit their website here](https://mxstore.com.au).

## The challenge, as specified by the Employer...

Using Vue.js and Laravel, create a simple application that meets the following acceptance criteria:

    Users can register for a new account.
    Users can login to their account.
    Logged in users are sent to a page that allows them to edit their profile with the following acceptance criteria
        Users can update their first and last names
        Users can add a phone number to their profile
        Users can add, edit or delete multiple addresses on their profile.
        Each address is comprised of 2 street lines, suburb, state, postcode and country.

BONUS: Which address attributes should be required/validated?

Once complete, share a link to the publicly available git repository so it can be checked out and instantiated for testing. Required env settings should also be provided.

Candidate is free to extend the acceptance criteria at their discretion.

## The resulting software, as created by me, Ivan Vetsich

You can see a "LIVE PREVIEW" of the MX Store coding challenge at [mx.velodata.org](https://mx.velodata.org). Please Note: I might pull that link down at a later date for whatever reason.

Velodata.org is my own website, I have a PHP cyber security system for Wordpress. [You can visit Velodata.org here ](https://velodata.org).

### Notes

If you choose to download this GitHub repository, please note the following.

(1) You must create an API key before running any artisan commands. The APP name is called 'mxProject', as specified in the .env file.

(2) Do NOT perform "php artisan migrate" before you create an API key. This is because the migrate function creates at least one record in the USER data table with an encrypted password.

(3) You will need to create a database somewhere in YOUR world prior to running "php artisan migrate".

(4) You will also need to enter your Database credentials in the supplied .env file.

## How to use the MX Store Coding Challenge

It's pretty straight forward. Add a new user by clicking on the word Register in the top right corner of the Top Navbar Menu.

After successful registration you will be prompted to Login with your email credentials.

After that you'll be taken to your own personal Dashboard where you can

(a) Edit your Personal Information and then

(b) Add, Edit, and Delete multiple addresses which are linked to your User account.

If you then Logout and Register as a SECOND user, any addresses which you add to THAT 'second account' can only be see by THAT account. And the addresses which you added to your first account can only be seen by your first account. You can logout and register as many new accounts as you'd like. You CANNOT register a new account if it has an email address which already linked to an existing User account.

## Bells and Whistles

I'm a big fan of using AJAX JSON responses to perform Validation authentication. Yes, I'm aware it's quite possible to drive the entire Laravel authentication process from the backend but I find that a bit clunky. I like being able to get HTTP 200 JSON responses which fluidly update a business form without needing to update (or refresh) an entire page. If you're a programmer, make sure to check out the programming in controllers/user_account.blade.php. There's some very nice javascript AJAX stuff going on that you can learn from.

This software was written in Laravel v8.0, and it uses Bootstrap v5.0 plis jQuery v3.6 with a few sprinklings of Bootstrap Icons here and there. I've also included my own CSS in a file called main.css in the /public/assets/css folder.

## Intellectual Property.

The software contained in this repository is the sole property of Ivan Vetsich.
