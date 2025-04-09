<table border=1>
    <tr>
        <th>ID</th>
        <th>name</th>
    </tr>
    <?php
    $mysqli = new mysqli("localhost","root","","msgboard");
    $result = $mysqli->query("SELECT * FROM account");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach($rows as $row){
        printf("<tr><td>%d</td><td>%s</td></tr>\n",$row["idno"],$row["name"]);
    }    
    ?>
</table>