<?php
$par = 'Filastrocca impertinente,
<br>
chi sta zitto non dice niente;
<br>
chi sta fermo non cammina;
<br>
chi va lontano non s’avvicina;
<br>
chi si siede non sta ritto;
<br>
chi va storto non va dritto;
<br>
e chi non parte, in verità,
<br>
in nessun posto arriverà.';

if(empty($_GET['nascondi'])){
    $hide = false;
}else{
    $hide = true;
}

if(empty($_GET)){
    $message = "<strong style='color: red'>ERRORE: dopo l'indirizzo della pagina, inserisci la parola che vuoi censurare in questo modo: <span style='color: black'>[indirizzo]/?badWord=[tua parola]</span>
    <br>
    Se non vuoi censurare nessuna parola, inserisci '<span style='color: black'>nessuna censura</span>' al posto della tua parola.</strong>";
}else{
    $badWord = $_GET['badWord'];
    if($badWord !== 'nessuna censura'){
        $message = 'La parola censurata è: <strong>' . $badWord . "</strong><br>Se vuoi nascondere questo paragrafo, aggiungi <strong>&nascondi=si</strong> alla fine dell'indirizzo di questa pagina.";
        $par = str_ireplace($badWord, '***', $par);
    }else{
        $message = 'Questo testo non contiene nessuna censura.';
    }
}

if($hide){
    $message = ' ';
}

$parLength = strlen($par);
?>


<h1>Filastrocca impertinente</h1>
<p><?php echo $par ?></p>
<br>
<p><em>Questa filastrocca è lunga <?php echo $parLength ?> caratteri.</em></p>
<p><?php echo $message ?></p>