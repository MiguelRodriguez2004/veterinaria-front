

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<?php
// session_start();
// if (empty($_SESSION['user']) and empty($_SESSION['clave'])) {
//     header('location:login/login.php');
// }

?>

<div class="page-content">

<div>
    <p><strong>Información Relevante</strong></p>
    <p>Recuerda modificar tus variables de entorno en el archivo <code>.env</code> de la API.</p>
    <p>Hecho por Miguel Rodriguez ❤️</p>
</div>

</div>
</div>



<?php require('./layout/footer.php'); ?>