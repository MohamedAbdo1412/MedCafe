
    
    <form action="index.php?action=addcourses&confirm=yes" method="post">
        <table>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            <tr>
                <td><label for="title">Title</label></td>
                <td><input type="text" name="title" id="title" required></td>
            </tr>
            <tr>
                <td><label for="description">Description</label></td>
                <td><textarea name="description" id="description" cols="25" rows="7" required></textarea></td>
            </tr>
            <tr>
                <td><label for="teacher">Teacher</label></td>
                <td>
                    
                    <select name="teacher" id="teacher" required>
                        <option disabled selected hidden>Select A Teacher</option>
                        <?php 
                            $query = "SELECT * FROM users WHERE admin=2";
                            $response = mysqli_query($conn , $query);
                            while($row = mysqli_fetch_assoc($response)){
                                echo "<option value=' ${row['id']}'>${row['username']}</option>" ;
                            }
                        ?>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="price">Price</label></td>
                <td><input type="number"  name="price" id="price" required></input> $</td>
            </tr>
        </table>
        <br>
        <div class="button-container" >
            <button class="noselect add-button-courses" style="background-color:rgb(0, 82, 175);" id="edit-button delete-button-confirm" type="submit">
                    <span class="text">Add</span
                    ><span class="icon" style="border-left-color:rgb(50, 100, 210);"
                    ><svg
                        viewBox="0 0 24 24"
                        height="24"
                        width="24"
                        xmlns="http://www.w3.org/2000/svg"
                    ></svg><span class="buttonSpan">+</span></span>
            </button>
            <button id="ignore-button"  type="reset" style="background-color:#ccc; color:black;">Reset</button>
            <button id="ignore-button" type="reset" onclick="window.location.href='index.php?action=courses'">Ignore</button>
        </div>
        
    </form>