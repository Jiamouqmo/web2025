<html>
    <head>
        <title>register account</title>
        <meta charset="UTF-8">
        <script>
<?php
    if(isset($_POST["acct"])){
        $filename="member.json";
        if(file_exists($filename)){
            $all=file_get_contents($filename);
            $member=json_decode($all,true);
            foreach($member as $m){
                if(0==strcmp($_POST["acct"],$m["id"]) && password_verify($_POST["pass"],$m["pw"])){
                    printf("alert('success');",$member[1]);
                    printf("location.href='reg.php';");
                    break;
                }
            }
                fclose($fp);
        }else{
                printf("alert('no member');");
        }
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