<?php include 'header.php';?>
<?php include 'session.php';?>
<?php include 'db.php';?>

<?php
/**
* SUPPRESSION
**/
if(isset($_GET['delete'])){
    checkCsrf();
    $id = $db->quote($_GET['delete']);
    $db->query("DELETE FROM billets WHERE id=$id");
    setFlash('Le biollet a bien été supprimée');
    header('Location:articles_list.php');
    die();
}

/**
* Catégories
**/
$select = $db->query('SELECT id, titre, slug FROM billets');
$billets = $select->fetchAll();
?>



<h1>La liste ces articles</h1>

<p><a href="articles_edit.php" class="btn btn-success">Ajouter un nouvel article</a></p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($billets as $billet): ?>
        <tr>
            <td><?= $billet['id']; ?></td>
            <td><?= $billet['titre']; ?></td>
            <td>
                <a href="articles_edit.php?id=<?= $billet['id']; ?>" class="btn btn-default">Edit</a>
                <a href="?delete=<?= $billet['id']; ?>" class="btn btn-error" onclick="return confirm('Sur de sur ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>