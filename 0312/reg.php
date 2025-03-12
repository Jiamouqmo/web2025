<html>
    <head>
        <title>register account</title>
        <meta charset="UTF-8">
        <script>
<?php
    if(isset($_POST["acct"])){
        if(strcmp($_POST["pass1"],$_POST["pass2"])){
            printf("<script>alert('password not same');<script>");
        }else{
            $filename="member.csv";
            $newmember=true;
            if(file_exists($filename)){
                $fp=fopen($filename,"r");
                while(($member=fgetcsv($fp,1000)!==FALSE)){
                    if(0==strcmp($member[0],$_POST["acct"])){
                        printf("alert('member already existed');");
                        $newmember=false;
                        break;
                    }
                }
                fclose($fp);
            }
            if($newmember)
                $fp=fopen($filename,"a");
                fputcsv($fp,[$_POST["acct"],$_POST["name"],
                    password_hash($_POST["pass1"],PASSWORD_DEFAULT)]);
                fclose($fp);
                print("location");
        }
            
        var_dump($_POST);
        
    }
?>
        </script>
        <body>
            <H1>register account</H1>
            <form method="post">
            <p>account:<input type="text" name="acct"></p>
            <p>name:<input type="text" name="name"></p>
            <p>password:<input type="password" name="pass1"></p>
            <p>confirm password:<input type="password" name="pass2"></p>
            <p><input type="submit"></p>    
            </form>
        </body>
    </head>
</html>