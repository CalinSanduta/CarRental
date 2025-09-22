<?php $this->titre = "CarRental - Connexion" ?>

<p>Vous devez être en session pour accéder à cette zone.</p>

<form action="Utilisateurs/connecter" method="post">
    <input name="email" type="text" placeholder="Entrez votre email" required autofocus>
    <input name="mot_de_passe" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?= (isset($erreur) && $erreur == 'mdp') ? '<span style="color : red;">Email ou mot de passe incorrects</span>' : '' ?>
