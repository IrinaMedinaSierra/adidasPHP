<?php
if (isset($_SESSION["usuario"])) {
   header('Location: header.php');
    ?>
<div class="container">
    <h2>Pagar Pedido</h2>

</div>
<?php

}else{
    header("Location:regitro.php");
}