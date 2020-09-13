<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn ajax</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="col-md-8">
            <div class="form-group">
                <select class= "form-control" name="" id="division">
                    <option value="">SELECT A DIVISION</option>
                    <?php 
                        include 'connection.php';
                        $query = "SELECT * FROM divisions";
                        $sql = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($sql))
                        { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php 
                        }                
                        ?>
                </select>
            </div>
            <div class="form-group">
                <select class= "form-control" name="" id="district">
                    <option value="">SELECT A DISTRICT</option>
                    <?php 
                        include 'connection.php';
                        $query = "SELECT * FROM districts";
                        $sql = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($sql))
                        { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php 
                        }                
                    ?>
                </select>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#division").change(function() {
                var div = $("#division").val();
                //alert('division is: '+div);
                //using ajax
                
                $.ajax({
                    url: "get_district.php",
                    dataType: 'json',
                    data: {
                        "div_id" : div
                    },
                    success: function(data) {
                        //console.log(data);
                        $("#district").html('<option value="">SELECT A DISTRICT</option>');
                        for(i=0; i<data.length;i++){
                            var x = '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                            $("#district").append(x);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>