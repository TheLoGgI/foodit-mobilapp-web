<?php
            //Loading all php files into of functions/ folder 
            $folder =   "./views/"; 
            $files = glob($folder."*view.php"); // return array files
            foreach($files as $phpFile){   
                require_once("$phpFile"); 
            }
