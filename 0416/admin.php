<html>
    <head>
        <title>
            管理頁面
        </title>
        <meta charset="UTF-8">
        <script>
<?php
    if(isset($_GET["act"])){
        $db = new mysqli("localhost", "root","","msgboard");
        switch($_GET["act"]){
            case "del":
                $db->query("DELETE FROM account WHERE idno=",$_GET["id"]);
                break;
            case "chpw":
                $sql = sprintf("UPDATE account SET pass='%s' WHERE idno='%d'",password_hash($_GET["pw"],PASSWORD_DEFAULT),$_GET["id"]);
                $db->query($sql);
                break;
        }
        printf("location.href='mysql_login.php';");
    }
?>
    function del(id){
        if(confirm("Do you want to delete the account?")){
            location.href=`?act=del&id=${id}`;
        
        }
    }
    function chpw(id){
        if(confirm("Are you sure to modify the password?")){
            pw=prompt("please enter new password:")
            location.href=`?act=chpw&id=${id}`;
        }
    }
        </script>
    </head>
    <body>
        <table border =1 cellspacing =0 cellspadding=5>
    <?php
        $db = new mysqli("localhost", "root","","msgboard");
        $res=$db->query("SELECT * FROM account ORDER BY acct ASC");
    

        printf("<tr><th>%s</th></tr>\n",join("</th><th>",["acct","name","delete"]));
        foreach($all as $row){
        $line=[$row["acct"],$row["name"],sprintf("<button onclick=\"del('%d');\">delete<//button> <button onclick=\"chpw('%d');\">delete<//button>",$row["idno"],$row["idno"])];
        printf("<tr><th>%s</th></tr>\n",join("</td><td>",$line));
        }
    ?>
    </body>
</html>