<h2>Poster un article</h2>

<?php

    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));

        if(empty($title) || empty($content)){
            $errors['empty'] = "Veuillez remplir tous les champs";
        }
            post($title,$content);

                $id = $db->lastInsertId();
                header("Location:index.php");
/*        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['image'] = "Cette image n'est pas valable";
            }
        }

        if(!empty($errors)){
            ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                            foreach($errors as $error){
                                echo $error."<br/>";
                            }
                        ?>
                    </div>
                </div>
            <?php
        }else{
            if(!empty($_FILES['image']['name'])){
                post_img($_FILES['image']['tmp_name'], $extension);
            }else{
                $id = $db->lastInsertId();
                header("Location:index.php?page=post&id=".$id);
            }
        }*/
    }


?>


<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="title" id="title"/>
            <label for="title">Titre de l'article</label>
        </div>

        <div class="input-field col s12">
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Contenu de l'article</label>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Publier</button>
        </div>

    </div>



</form>