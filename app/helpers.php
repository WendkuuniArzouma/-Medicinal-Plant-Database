<?php

              function coupeCourt($texte,$long,$marge=10){
                $msg = stripslashes($texte) ;
                $msg = preg_replace("'<[^>]+>'U", "", trim(strip_tags($msg)) ) ;
                $taille = strlen($msg) ;
                if($long < $taille){
                    $message = substr($msg, 0, $long) ;
                    $i = $long ;
                    if ($i < $taille){ 
                        while ($msg[$i] != " " && isset($msg[$i]) && $i < ($long+$marge) ){
                            $message .= $msg[$i] ;
                            $i++ ;
                        }
                    }
                    if ($i < $taille){
                        $message .= "..." ;
                    }
                }else{
                    $message = $msg ;
                }
                return ($message) ;
            }