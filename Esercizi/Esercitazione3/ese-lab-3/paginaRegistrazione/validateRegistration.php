<html>
    <head></head>
    <body>

        <?php

            $dbconn = pg_connect("host=localhost port=5434 dbname=Esercitazione2-LTW user=postgres password=password") or die('Could not connect: ' . pg_last_error());
            if(!(isset($_POST['registrationButton']))){
                header("Location: ../index.html");
            }
            else{
                $email = $_POST['email'];
                $q1="select * from utente where email= $1";
                $result=pg_query_params($dbconn, $q1, array($email));
                if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
                    //header("Location: alreadyRegistered.html");
                    echo "<h1> Sorry, you are already a registered user</h1>
                    <a href=../paginaLogin/login.html> Click here to login
                    </a>";
                }
                else{
                    $nome=$_POST['name'];
                    $cognome = $_POST['surname'];
                    $cap = $_POST['cap'];
                    $password = md5($_POST['password']);
                    $q2="insert into utente values ($1,$2,$3,$4,$5)";
                    $data=pg_query_params($dbconn,$q2,array($email,$nome,$cognome,$cap,$password));
                    if($data){
                        //header("Location: registrationCompleted.html");
                        echo "<h1> Registration is completed. Start using the website <br/></h1>";
                        echo "<a href=../Welcome.php?name=$nome> Premi qui
                        </a>
                        per inziare ad utilizzare il sito web";
                    }
                }
            }

        ?>

    </body>
</html>