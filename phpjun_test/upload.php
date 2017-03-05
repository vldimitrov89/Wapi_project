<?php
    if ($_FILES['fileToUpload']['name'] == "") {
        
    } else {
    $fileExt = explode(".", $_FILES['fileToUpload']['name']);
    $ext = $fileExt[1];
    $newFileName = $currentId . "." .  $ext;
    
    $target_dir = "uploads/covers/";
    $target_file = $target_dir . basename($newFileName);
    $status = "";
        if($_FILES["fileToUpload"]["size"] > 5000000) { 
            $status = 'File is too big';
        } else {
            if(preg_match('/\\.(jpg|JPG|gif|png|bmp|jpeg)$/i', $_FILES['fileToUpload']['name'])){
                if (@move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) { 
                $status = "File uploaded."; 
            } else { 
                $status = "File not uploaded."; 
            } 
            }
            else { 
                $status = 'File is not an image'; 
            } 
        }
    }


