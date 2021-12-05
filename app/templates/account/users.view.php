<?php

foreach ($allUsers as $user):
    ?>
    <div class="card" style="width: 18rem;">
        <h5>User number : <?= $user->getId() ?></h5>
        <div class="card-body">
            <h5 class="card-title"><?= $user->getName() ?></h5>
        </div>               
    </div>
    <br>
<?php endforeach;