Project Setup Guide
1.Need to update .env file with database details and SMTP details
2.Need to update the composer
3.Need to create the 2 folders in storage/app/public/
	i)plan-document
	ii)upload-document

4.Need to run the below command for the storage link
	php artisan storage:link

5.run the db migration
	php artisan migrate 
 	-In user migration I have added the admin entry
 	for login use 
 	link  - http://localhost/cancer_treatment/public/login
 	Email - admin123@yopmail.com
 	Pass  - password

 	- In Cancer type table I have added some type directly in migration file. 

