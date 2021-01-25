<?php
    include_once 'connect.php';
    $result = mysqli_query($conn,"SELECT * FROM incident");
?>



<html>
    <head>
        <title>customerDashboard</title>
        <link rel="stylesheet" type="text/css" href="dashboard1.css">
        <script src="dashboard1.js"></script>
    </head>

    <body class="body1">

         <!--sidepannel-->
        <div id="Sidepanel1" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="#">Dashboard</a>
            <a href="#">Agent</a>
            <a href="#">FAQs</a>
            <a href="#">Tutorials</a>
            <a href="#">Community Forum</a>
            <a href="#">Settings</a>
            <a href="#">About Us</a>
            <hr>
            <a href="#" class="sp1">Sign out</a>
          </div>
          
          <button class="openbtn" onclick="openNav()">☰ Menu</button>  
          <h1 class="h1c">Dashboard</h1>
          <hr>

          <!--create button-->
          <button class="createbtn" onclick="openForm()">Create</button>

          <!--create form-->
          <div class="container" id="myForm">

            <form action="process.php" method="POST">
                <h1>Incident</h1>
                <hr>

                <label for="uname"><b>User Name</b></label>
                <input type="text" placeholder="Enter User Name" name="uname" id="uname" required>

                <label for="problem"><b>Problem</b></label>
                <input type="text" placeholder="Enter Your Problem" name="problem" id="problem">
            
                <label for="description"><b>Description</b></label>
                <textarea  rows="10" cols="60" name="message" id="message"  placeholder="Write Your problem here"></textarea>
            
                <hr>
            
                <button type="submit" class="registerbtn" name='save'>Submit</button>
                <button type="button" class="btncancel" onclick="closeForm()">Close</button>
            </form>
          </div> 

          <!--staus div-->
        <div class="details1">
            <table class="details">
                <tr>
                    <th>Incident NO </th>
                    <th>Date</th>
                    <th>Problem</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action1</th>
                    <th>Action2</th>
                </tr>

                <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="details2">
                        <td><?php echo $row["number"]; ?></td>
                        <td><?php echo $row["day"]; ?></td>
                        <td><?php echo $row["problem"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td></td>
                        <td><a href="delete-process.php?number=<?php echo $row["number"]; ?>"><button class="d1">Delete</button></a></td>
                        <td><script src="updateform.js"></script><button class="createbtn1" onclick="updateform()">Update</button></td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>

            </table>

          <!--update form-->
        <div  id="update" class="form-popup">

            <form action="update-process.php" method="POST" class="container1" id="myForm2">
            <h1>Incident</h1>
            <hr>
             <?php
                        $results = mysqli_query($conn,"SELECT number FROM incident ORDER BY number ASC");
                        
                        $row = mysqli_fetch_array($results)
                        
            ?>
                            <label for="no"><b>NO</b></label>
                            <input type="text" placeholder="incident no" name="no" id="no" value="<?php echo $row["number"]; ?>  ">

                            <label for="description"><b>Description</b></label>
                            <textarea  rows="10" cols="60" name="message" id="message"  placeholder="Write Your problem here"></textarea>
                
                            <hr>
                
                            <button type="submit" class="registerbtn" name='update'>Submit</button>
                            <button type="button" class="btncancel" onclick="closeupdateform()">Close</button>


            </form>

        </div> 


    </body>
</html>