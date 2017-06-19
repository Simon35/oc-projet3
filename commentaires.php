<?php include 'header.php';?>
<?php include 'db.php';?>
<h2>Mon super blog !</h2>
        <p><a href="index.php">Retour à la liste des billets</a></p>
 
<?php
// Récupération du billet
$req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
<form action="#" method="post" >
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="auteur" />
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" />
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label>Votre commentaire</label>
                <textarea class="form-control" name="commentaire" </textarea>
            </div>
		</div>
        <div class="col-xs-12">
            <div class="form-group">
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</div>
        </div>
        <input type="hidden" name="id_billet" value="0" id="id_billet"/>
    </div>
</form>

</body>
</html>