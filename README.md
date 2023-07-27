# Classroom-File-Sharing
A file-sharing portal for teachers and students.


Follow these steps to use:

	1) Create a new database on your server
		GO to the 'database' directory and run the '.sql' file for the database.
		--> Import file in your database

	2) Add the files to the directory of the server.

	3) There are two connection files for connecting the database. Change the credentials in there.
		"\includes\connection.php" &
		"\admin\includes\connection.php"
			Both files are identical.
      Change the address and credentials of the server

	4) After that, log in to the webpage using the credentials below:
		Email: admin@root.admim.com
		Password: myfileportal@123
			(admin will redirected directly to admin panel)

	5) After login, do these steps first:
		- Change Password
		- Add Subject on the 'Subject List' tab
  **Features:**
Admin can only verify students in the portal, upload files, and delete files. 
Students see only files of those subjects they had chosen on signup.
