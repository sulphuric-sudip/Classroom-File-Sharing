# Classroom-File-Sharing
A file sharing portal for teachers and students for multiple teachers and students.


Follow these steps to use:

	1) Create new database in your server
		GO to 'database' directory and run the '.sql' file for database.
		--> import file in your database

	2) Add the files in directory of server.

	3) There are two connection files for connecting database. Change code in there.
		"\includes\connection.php" &
		"\admin\includes\connection.php"
			Both files are identical.
	 		Change Code in one file and paste same in another.
      Change address and credentials of the server

	4) Login using the credentials below:
		Email: admin@root.admim.com
		Password: myfileportal@123
			(admin will redirected directly to admin panel)

	5) After login, follow these steps first:
		- Change Password
		- Add Subject on 'Subject List' tab
		- Upload a file
    
    
Admin can accept student in the portal, upload files, delete files. 
Student see only files of those subject they had choosed on login
