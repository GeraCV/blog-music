<?php
  $posts = getLastPost($db);
  while ($post = mysqli_fetch_assoc($posts)):
?>

  <article class="article">
    <h3 class="title-article"> <?=  $post['title']?> </h3>
    <a class="subtitle"> <?=  $post['user-name']?> | </a> <a class="subtitle"> <?=  $post['name']?> | </a> <a class="subtitle"> <?= $post['date']?> </a> 
    <p class="text-article">
      <?= substr($post['description'], 0, 380).'...'?>
    </p>
  </article>
            
<?php endwhile; ?>