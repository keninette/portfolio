<?php
    // if we've just click "Envoyer", we get mail data and send it
    if(isset($_GET['mail']) && (int) $_GET['mail'] === 1){
        if (isset($_POST['inputMail']) && isset($_POST['inputText'])){
           $sMail = (string) htmlspecialchars($_POST['inputMail']);
           $sObj = (isset($_POST['obj'])) ? (string) htmlspecialchars($_POST['inputObj']) : "";
           $sText = (string) htmlspecialchars($_POST['inputText']);
           $bMailSent = mail('gauthier.delphine9@gmail.com',$sObj,'Mail de ' .$sMail .' -- ' .$sText);
           // displays a popup to inform user mail has been sent (or not)
           if($bMailSent){
               echo '<script>'
                    . 'alert("Votre message a bien été envoyé");'
                . '</script>';
           } else {
               echo '<script>'
                    . 'alert("Votre message n\'a pas pu être envoyé");'
                . '</script>';
           }
       } else {
           echo '<script>'
                    . 'alert("Votre message n\'a pas pu être envoyé");'
                . '</script>';
       }
    }

    include('view/v_home.php');

