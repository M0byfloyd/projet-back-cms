<pre>
<?php
$allUsers = $vars['allUsers'];
?>

</pre>
<table>
    <tr>
        <th>Nom</th>
        <th>ID</th>
        <th>isAdmin</th>
    </tr>
    <?php
    foreach ($allUsers as $user):
    ?>
    <tr>
        <td class="card-title"><?= $user->name ?></td>
        <td class="card-title"><?= $user->id ?></td>
        <td class="card-title"><?php if($user->statut == '1') :
            echo '<input disabled type="checkbox" name="isAdmin'. $user->id .'"
            checked>';
        else:
            echo '<input disabled type="checkbox" name="isAdmin'. $user->id .'">';
        endif; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
