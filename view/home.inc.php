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
?>

<a href="index.php?nav=projects"><div id="optProj"><h2>Mon travail / Mes projets</h2><img src="view/images/work.gif" alt="Mes projets" /></div></a>
<a href="index.php?nav=cv"><div id="optCv"><h2>Mon CV</h2><img src="view/images/cv.png" alt="CV" /></div></a>
<a href="index.php?nav=me"><div id="optMe"><h2>Qui suis-je ?</h2><img src="view/images/question.png" alt="Qui suis-je ?" /></div></a>
<div id="optVeille"><h2>Veille technologique</h2><img src="view/images/veille.jpg" alt="Veille" /></div>
<div id="optContact">
    <h2>Contact</h2>   <img src="" id='contactArrow' alt="&#8595;" onclick="showContact()" meta="0" />
    <form id="formContact" method="POST" action="index.php?nav=home&mail=1">
        <input type="email" name ="inputMail" id="inputMail" placeholder="email@email.com" required />
        <input type="text" name="inputObj" id="inputObj" placeholder="Objet" />
        <textarea name="inputText" id="inputText" placeholder="Tapez votre texte ici" required></textarea>
        <input type="submit" value="Envoyer" />
    </form>
</div>