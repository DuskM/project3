<?php ?>
<div class="page-header">
    <div class="profile">
    <h3>Profiel</h3>
    <br>
        <div class="picture">
            <b>Profiel foto:</b> <br><img src="../images/profile/<?php echo ($_SESSION['image']); ?>" width=250 height=250
        </div>
        <br><a href="index.php?pag=imupdate">Update profiel foto</a>

    </div>
    <p>
        <b>Gebruikersnaam:</b> <?php echo htmlspecialchars($_SESSION['username']); ?> <br>
    </p>
    <p><a href="index.php?pag=uitloggen">Uitloggen</a></p>
    <div>
    </div>