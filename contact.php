
<!DOCTYPE html>
<html lang ="fr">


<?php $MetaTitle ='Mes contacts'; $MetaDescription ='Voici mes super contacts';?>

<!--Récupère tous les champs du formulaire de contact rempli et enregistre l'ensemble dans le fichier text  -->
<?php
file_put_contents('/var/www/adminer/contact/contact_Y-m-d-H-i-s.txt',$_POST["civilité"],FILE_APPEND);
file_put_contents('/var/www/adminer/contact/contact_Y-m-d-H-i-s.txt',$_POST["nom"],FILE_APPEND);
file_put_contents('/var/www/adminer/contact/contact_Y-m-d-H-i-s.txt',$_POST["prénom"],FILE_APPEND);
file_put_contents('/var/www/adminer/contact/contact_Y-m-d-H-i-s.txt',$_POST["email"],FILE_APPEND);
file_put_contents('/var/www/adminer/contact/contact_Y-m-d-H-i-s.txt',$_POST["raison_contact"],FILE_APPEND);
file_put_contents('/var/www/adminer/contact/contact_Y-m-d-H-i-s.txt',$_POST["message"],FILE_APPEND);
?>

<!--Récupère les valeurs des champs du formulaire de contact-->
<?php
$civility=filter_input(INPUT_POST,"civilité");

$nom=filter_input(INPUT_POST,"nom",FILTER_SANITIZE_SPECIAL_CHARS);

$firstName=filter_input(INPUT_POST,"prénom",FILTER_SANITIZE_SPECIAL_CHARS);

$email =filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);

$raisonContact=filter_input(INPUT_POST,"raison_contact");

$message=filter_input(INPUT_POST,"message");
$longueurMessage= strlen(trim( $message));

?>

<!--Récupère mon header-->
<?php include('header.php'); ?>


<!--Code pour ma page contact-->

<div>
    <a href="mailto:thouvenotandrea@orange.fr">Contactez-moi !</a>
</div>
<main class ="main">
    <div class="contactez-nous">
        <h1>Contactez-nous</h1>
        <p>Un problème, une question, contactez-nous ?</p>
        <!-- Début de formualire de contacte-->
        <form action="index1.php?page=contact" method="post">
            <!--   Un champ civilisé avec un select avec Mme et M.     -->
            <div>
                <label for="civilité">Quel est votre civilité ? </label>
                <select name="civilité"  id="civilité" placeholder="Votre civilité" required>
                    <option value="" disabled selected hidden>Choisissez votre civilité</option>
                    <option value="Vous_êtes_une_femme">Mme</option>
                    <option value="Vous_êtes_un_homme">M.</option>
                    <option value="autre">Autre</option>
                    <?php if (isset($_POST['civilité'])) {
                        echo "Rentrer votre civilité";}
                    ?>
                </select>
            </div>
            <!--  Champ pour le nom-->
            <div>
                <label for="nom">Votre nom ?</label>
                <input type="text" id="nom" name="nom" placeholder="LEGRAND">
            </div>
            <?php if (isset($_POST['nom'])) {
                echo "ATTENTION : Rentrer votre nom";}
            ?>
            <!--  Champ pour le prénom -->
            <div>
                <label for="prénom">Votre Prénom?</label>
                <input type="text" id="prénom" name="prénon" placeholder="Martin">
            </div>
            <?php if (isset($_POST['prénom'])) {
                echo "ATTENTION : Rentrer votre prénom";}
            ?>
            <!--  Champ pour l'email -->
            <div>
                <label for="email">Votre e-mail ?</label>
                <input type="text" id="email" name="email" placeholder="monadresse@mail.com" >
            </div>
            <?php if (isset($_POST['email'])) {
                echo "ATTENTION : Rentrer votre email";}
            ?>
            <!--  Champ pour la raison de contact -->
            <div>
                <p class="raison"> Raison de contact</p>
                <p class="raison_contact">
                    Demande d’information: <input type="radio" name="raison_contact"><br />
                    Prestations: <input type="radio" name="raison_contact"><br />
                    Demande d'information: <input type="radio" name="raison_contact">
                </p>
                <?php if (isset($_POST['raison_contact'])) {
                    echo "ATTENTION : Rentrer la raison de votre contact";}
                ?>
            </div>
            <!--  Champ pour le message-->
            <div>
                <label for="message">Votre message</label>
                <textarea id="message" name="message"  placeholder="Bonjour, je vous contacte car ..." ></textarea>
            </div>
            <?php if (isset($_POST['message']) || ($longueurMessage <= 5)) {
                echo "ATTENTION : Rentrer votre message ,pas assez de caractère.";}
            ?>
            <!--  LE BOUTON  pour valider-->
            <div>
                <button type="submit">Envoyer mon message</button>
            </div>
        </form>
    </div>
</main>

<!--Récupère les informations du footer-->
<?php include('footer.php'); ?>


</html>