<?php


// Initialize the session

session_start();



// If session variable is not set it will redirect to login page

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

    echo "<p><a href='index.php?pag=inloggen' class='btn btn-danger'>Inloggen</a></p>";
}
else {
    echo "<div class='page-header'>

    <h3>Hi, <b>"; echo htmlspecialchars($_SESSION['username']); "</b>. Welcome to our site.</h3>

</div>

<p><a href='index.php?pag=uitloggen' class='btn btn-danger'>Sign Out of Your Account</a></p>";
};

?>






    <p>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut commodo suscipit dui, commodo hendrerit risus feugiat in. Phasellus quis turpis pretium, fringilla mauris id, mollis urna. Nunc eu massa et dolor cursus bibendum. Nunc facilisis ipsum et iaculis commodo. Duis lacinia efficitur ultricies. Duis id urna ex. Phasellus sit amet enim velit.


    </p>
    <br>
    <br>

