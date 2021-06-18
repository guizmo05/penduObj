<?php

declare(strict_types=1);

use App\core\Tools;

$game = unserialize($_SESSION['game']);

?>
<h2>Mot à trouver : <?php echo $game->getWord()->getMaskedWord();?></h2>
<h2>il vous reste <?php echo $game->getTry().' essai'.($game->getTry()>1?'s':'');?></h2>
<?php
if (isset($_SESSION['game'])) {
    echo Tools::getLink('/giveUp');
}
?>
<form method="POST">
    <label for="letter">Entrez une lettre : </label>
    <input type="text" name="letter" id="letter" maxlength="1"/>
    <input type="submit" value="Proposer une lettre"/>
</form>
<h2>OU</h2>
<form method="POST">
    <label for="word">Entrez un mot : </label>
    <input type="text" name="word" id="letter" maxlength="26"/>
    <input type="submit" value="Proposer un mot"/>
</form>
