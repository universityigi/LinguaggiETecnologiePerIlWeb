<html>
    <head></head>
    <body>
        <?php

            $dbconn = pg_connect("host=localhost port=5434 dbname=Esercitazione2-LTW user=postgres password=password") or die('Could not connect: ' . pg_last_error());
            if(!(isset($_POST['loginButton']))){
                header("Location: ../index.html");
            }
            else{
                $email = $_POST['inputEmail'];
                $password = $_POST['inputPassword'];
                $q1="select nome from utente where email=$1 and password=$2";
                $result=pg_query_params($dbconn,$q1,array($email,md5($password)));
                if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
                    $nome=$line['nome'];
                    header("Location: ../Welcome.php?name=$nome");
                }
                else{
                    header("Location: TryAgain.html");
                } 
            }
        ?>
    </body>
</html>