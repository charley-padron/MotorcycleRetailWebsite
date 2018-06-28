<!DOCTYPE>
<html>
	<head>
		<title>Login Page</title>
	
	<link href="http://cyan.csam.montclair.edu/~padronc1/Styles/styles.css" rel="stylesheet" media="all"/>	
	</head>
	
	<body>
		
        <h1 align="center">Welcome to the motorcycle shop!</h2>
        <h2 align="center">Please login to access site.</h2>
        
        <center>
		<form method="post" action="validate_login.php" >
            <table border="1" >
                <tr>
                    <td><label for="username">User Name</label></td>
                        <td><input type="text" 

                            name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                        <td><input name="password" 

                            type="password" id="password"></input></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"/>
                </tr>
            </table>
        </form>
        </center>
		        

	</body>

</html>