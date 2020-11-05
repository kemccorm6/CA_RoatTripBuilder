Log In
<br>
New here? <a href="CA_RoadTripCREATEACC.php">Create an Account</a>

<form action="">
    Username: <br>
    <input type="text" name="username" placeholder="Type Username"><br>
    Password: <br>
    <input type="text" name="password" placeholder="Type Password"><br>
    <input type="checkbox" name="admin" value="admin" id="admincheck" onclick="reveal()"> Check if Admin <br>
    <input type="text" name="adminpassword" placeholder="Type Admin Password" style="display:none" id="checkedadmin">
    <input type="submit" value="Log In">

    <script>
        function reveal(){
            var checkbox = document.getElementById("admincheck");
            var text = document.getElementById("checkedadmin");
            if (checkbox.checked == true){
                text.style.display = "block";
            }else{
                text.style.display = "none";
            }
        }
    </script>
</form>