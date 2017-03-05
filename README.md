# Codeigniter4-ThemesAndLogin

Very simple starter with a base controller utilizing themes and a proof-of-concept login using Gatekeeper via Composer

A prerelease version of Codeigniter4 ( https://github.com/bcit-ci/CodeIgniter4 ) and Gatekeeper ( https://github.com/psecio/gatekeeper ) is included in this library.

The purpose of this repository is to show a base controller which 
1) demonstrates use of theme views 
2) integrate an authentication library and incorporate a simple proof-of-concept login screen

The exciting part of this is that PSR4 works great in Codeigniter4.

To run the login portion of this repository, you will need to do the following setup:

1) In mySQL, create database 'gatekeeper' and user 'gk-user'

2) Execute the vendor/bin/setup.sh file. This script will ask several questions about your database setup, write the needed files and run the migrations for you.

3) edit the paths in application/config/App.php lines 16 and 37 to change the path to correspond to your setup