        <?php
        $conn = new mysqli("localhost", "root", "1", "register");
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        function insert_user($table_name, $form_data)
        {
        global $conn;
        $fields = array_keys($form_data);
        $sql = "INSERT INTO ".$table_name."
        (`".implode('`,`', $fields)."`)
        VALUES('".implode("','", $form_data)."')";

        $result=mysqli_query($conn,$sql);
        $insert_id=mysqli_insert_id($conn);

        return $insert_id;

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        }
        else
        {
        echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        }

        function update_data($table_name, $form_data,$id,$user_id)
        {
        global $conn;

        $valueSets = array();
        foreach($form_data as $key => $value) {
        $valueSets[] = $key . " = '" . $value . "'";
        }
        $sql = "UPDATE $table_name SET ". join(",",$valueSets) . " WHERE " . " $id = '".$user_id."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            echo "Updated successfully";
        }
        else
        {
        echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        }

        ?>
