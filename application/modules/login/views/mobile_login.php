<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>

<body>
    <div data-role="page" id="first" >
        <div data-role="header" data-theme="a">
            <h3>Login Page</h3>
        </div>
 
        <div data-role="content">
            <form id="check-user" class="ui-body ui-body-a ui-corner-all" 
                  data-ajax="false" method="post" action="second.php" align="center">
                <fieldset >
                    <div data-role="fieldcontain">
                        <label for="username">NIP / NIM:</label>
                        <input type="text" value="" name="userid" id="username"/>
                    </div>                                 
                    <div data-role="fieldcontain">                                     
                        <label for="password">PASSWORD:</label>
                        <input type="password" value="" name="passid" id="password"/>
                    </div>
                    <input type="submit"  name="submit" id="submit" value="login">
                </fieldset>
            </form>                             
        </div>
    

            <div data-role="footer"data-theme ="b" data-position="fixed" >

                  <p align="center"><small>Universitas 
                      <strong >Muhammadiyah</strong>  
                      Tangerang <br>
                      &copy; 2014
                      </small>

                  <p>


              </div>
        </div> 
    </body>
</html>
