<form action="index.php?action=addusers&confirm=yes" method="POST">
    <table id="delete-table">
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username" ></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email" ></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" id="password" ></td>
            </tr>
            <tr>
                <td>Number</td>
                <td><input type="text" name="number" id="number" ></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><input type="radio" name="type" id="member" Value="0" <?php if($_GET['type']=='member'){echo 'checked';}?>  readonly><label for="member"> Member</label><br><input type="radio" name="type" id="teacher" value="2" readonly <?php if($_GET['type']=='teacher'){echo 'checked';}?>><label for="teacher"> Teacher</label></td>
            </tr>
        </table>
        <br>
        <h2>Are You Sure You Want To Add This User?</h2>
        <br>
        <div id="delete-table-Confirm">
            <button class="noselect" style="background-color:rgb(0, 82, 175);" id="edit-button delete-button-confirm" type="submit">
                <span class="text">Add</span
                ><span class="icon" style="border-left-color:rgb(50, 100, 210);"
                ><svg
                    viewBox="0 0 24 24"
                    height="24"
                    width="24"
                    xmlns="http://www.w3.org/2000/svg"
                ></svg><span class="buttonSpan">+</span></span>
            </button>        
        </form>
        <button id="ignore-button" type="reset" onclick="window.location.href='index.php?action=<?php if($_GET['type']== 'teacher'){echo 'teachers';}else{echo 'members';}?>'">Ignore</button>
        </div>
