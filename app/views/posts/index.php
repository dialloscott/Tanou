<div class="row">
 <div class="col-md-12">
   <div class="jumbotron">
       <div class="panel-default">
           <div class="panel text-center" style="border-radius: 5px;"><h4>Local developer</h4></div>
           <div class="panel-body">

               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           </div>
       </div>
   </div>
 </div>	
</div>
        <?php foreach ( $posts as $post):?>
            <div class="panel-default col-md-6">
                <div class="panel-heading"><h4><strong><?= $post->title ?></strong></h4></div>
                <div class="panel-body">
                    <p><?= substr($post->content ,0,100) ?></p>
                    <p>
                       <stong>Category:<?= $post->name ?></stong>
                    </p>
                    <p class="glyphicon-text-color" style="font-family: cursive; color: #1b6d85;">publier par : <?= $post->username ?></p>
                    <p style="color: #7319ff;">Depuis:<?= $post->create_at ?></p>
                    <a href="<?= route("post/show/{$post->id}") ?>" class="btn btn-default">Voire la suite</a>
                </div>
            </div>
        <?php endforeach ?>
<div class="text-center">
    <ul class="pagination pagination-lg">
        <li class="page-item"><?= $pagination ; ?></li>
    </ul>
</div>

