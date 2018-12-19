<?php


    $connect = mysqli_connect("localhost","root","","endtermexam");
    

    if(!$connect){
        
        die("Unable to connect to the database -> " . mysqli_connect_error());
        
    }else{
        

        $checkNumOfRows = "SELECT * FROM endtermexam";
        $checkSend = mysqli_query($connect, $checkNumOfRows);
        
        

        if(mysqli_num_rows($checkSend) == 0){
            
            $insertQuery = "INSERT INTO endtermexam (name, equipement, potions) VALUES ('Swords','17','2'),('Shields','80','1'),('Estus','97','7')";
            $insertSend = mysqli_query($connect, $insertQuery);
            
        }else{
            

            
        }
        

        $selectQuery = "SELECT * FROM endtermexam";
        $selectSend = mysqli_query($connect, $selectQuery);
        $numOfRows = mysqli_num_rows($selectSend);

        
        if($numOfRows > 0){
           
            while($row = mysqli_fetch_array($selectSend)){
                $name = $row['name'];
                $equipment = $row['equipment'];
                $potions = $row['potions'];

                $bmipotions = $potions * $potions ;

                $bmi = $equipment/$bmipotions;

               
                if($bmi > 100){
                    echo $name . " potions " . $potions . " are in plenty. " . "</br>";
                }else if($bmi >= 97 && $bmi <= 100){
                    echo $name . " potions " . $potions . " are enough. " . "</br>";
                }else if($bmi < 97){
                    echo $name . " potions " . $potions . " are running low." . "</br>";
                }

            }

        }
        
    }

?>