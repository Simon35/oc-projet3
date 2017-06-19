<?php include 'header.php';?>
<?php include 'db.php';?>
<?php

// On récupère les 5 derniers billets
$req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
?>
      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo htmlspecialchars($donnees['titre']); ?></h2>
            <p class="blog-post-meta">le <?php echo $donnees['date_creation_fr']; ?><a href="#">Mark</a></p>

            <p><?php
				// On affiche le contenu du billet
				echo nl2br(htmlspecialchars($donnees['contenu']));
				?></p>
				<p>
				<em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em></p>
				<?php
				} // Fin de la boucle des billets
				$req->closeCursor();
				?>
			  <nav>
				<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul>
			  </nav>

		  </div><!-- /.blog-main -->
		</div>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>