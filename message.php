<?php
//check are the msg is set or not
if(isset($_SESSION['message'])):
?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hi!</strong>  <?= $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
    unset($_SESSION['message']); //delete msg
    endif;
?>