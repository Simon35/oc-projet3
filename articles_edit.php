<?php include 'header.php';?>
<?php include 'session.php';?>
<?php include 'db.php';?>

<?php
		echo 'salut1';

if(isset($_POST['titre']) && isset($_POST['slug']) && isset($_POST['contenu'])){
		echo 'salut2';
    $slug = $_POST['slug'];
    if(preg_match('/^[a-z\-0-9]+$/', $slug)){
		echo 'salut3';
        $titre = $db->quote($_POST['titre']);
        $slug = $db->quote($_POST['slug']);
        $contenu = $db->quote($_POST['contenu']);
        if(isset($_GET['id'])){
            $id = $db->quote($_GET['id']);
            $db->query("UPDATE billets SET titre=$titre, slug=$slug WHERE id=$id");
        }else{
            $db->query("INSERT INTO billets SET titre=$titre, slug=$slug");
        }
		echo 'poppo';
        setFlash('L\'article a bien été ajouté');
        header('Location:articles_list.php');
        die();
    }else{
				echo 'Le slug n\'est pas valide';
    }

}
?>
<h1>Editer un article</h1>
<form action="#" method="post">
    <div class="form-group">
        <label for="titre">Titre de l'article</label>
        <input type="text" class="form-control" name="titre" />
        <label for="slug">Url de l'article</label>
        <input type="text" class="form-control" name="slug" />
        <label for="username">Contenu de l'article</label>
        <input type="text" class="form-control" name="contenu" />
    </div>
    <button type="submit" class="btn btn-default">Enregistrer</button>
</form>
