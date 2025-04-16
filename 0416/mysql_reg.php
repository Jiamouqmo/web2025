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
            $db = new mysqli("localhost", "root","","msgboard");
            $sql = sprintf("SELECT* FROM account WHERE acct='%s'",$_POST["acct"]);
            $res = $db->query($sql);
            if($res->num_rows>0){
                printf("alert('member is exist');");
            }else{
                $sql = sprintf("INSERT INTO account (acct,name,pass) VALUES ('%s','%s','%s')",
                $_POST["acct"],$_POST["name"],password_hash($_POST["pass1"],PASSWORD_DEFAULT));
                $db->query($sql);
                printf("location.href='login.php';");
            }
            /*
            $filename="member.json";
            $newmember=true;
            $member=[];
            if(file_exists($filename)){
                $all=file_get_contents($filename);
                $member=json_decode($all,true);
                foreach($member as $m){
                    if(0==strcmp($member["id"],$_POST["acct"])){
                        printf("alert('member already existed');");
                        $newmember=false;
                        break;
                    }
                }

                /* $fp=fopen($filename,"r");        
                while(($member=fgetcsv($fp,1000)!==FALSE)){
                    if(0==strcmp($member[0],$_POST["acct"])){
                        printf("alert('member already existed');");
                        $newmember=false;
                        break;
                    }
                }
                fclose($fp);*/
            }
            if($newmember){
                //$member=json_decode(file_get_contents($filename))
                array_push($member,[
                    "id"=>$_POST["acct"],
                    "name"=>$_POST["name"],
                    "pw"=>password_hash($_POST["pass1"],PASSWORD_DEFAULT)]);

                $json=json_encode($member);
                var_dump($member);
                var_dump(json_decode($json));

                file_put_contents($filename,json_encode($member));

                //printf("location.href='login.php';");
            }
        }
?>
        </script>
        <body>
            <H1>register account</H1>
            <form method="post">
            <p>account:<input type="text" name="acct" placeholder="sign in"></p>
            <p>name:<input type="text" name="name" placeholder="name"></p>
            <p>password:<input type="password" name="pass1" placeholder="password"></p>
            <p>confirm password:<input type="password" name="pass2" placeholder="comfirm password"></p>
            <p><input type="submit" value="sign up"></p>    
            </form>
        </body>
    </head>
</html>