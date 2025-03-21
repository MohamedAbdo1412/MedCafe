
    <table id="delete-table">
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Id</td>
            <td><?=$row['id'];?></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><?=$row['username'];?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?=$row['email'];?></td>
        </tr>
        <tr>
            <td>Number</td>
            <td><?=$row['number'];?></td>
        </tr>
    </table>
    <br>
    <h2>Are You Sure You Want To Delete This User?</h2>
    <br>
    <div id="delete-table-Confirm">
        <button id="delete-button-confirm"class="noselect red" onclick="window.location.href='index.php?action=delete&id=<?= $row['id'];?>&confirm=yes'"><span class="text">Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>
        <button id="ignore-button"  onclick="window.location.href='index.php?action=<?php if($row['admin']== 2){echo 'teachers';}else{echo 'members';}?>'">Ignore</button>
    </div>
