<?php


// Initialize the session





// If session variable is not set it will redirect to login page

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){ ?>

    <p><a href='index.php?pag=inloggen' class='btn btn-danger'>Inloggen</a></p>
<?php }
elseif($_SESSION['user_type'] == "ADMIN") { ?>
    <div class='page-header'>
      <div class='idk'>
        ADMIN, <?php echo htmlspecialchars($_SESSION['username']); ?> <br><br>

          Welkom op dit forum.
          <br><a href="index.php?pag=admin">Secret Admin page</a>


    </div>
    </div>
<?php }
    else { ?>
    <div class='page-header'>
      <div class='idk'>
        Hi, <?php echo htmlspecialchars($_SESSION['username']); ?> <br><br>

          Welkom op dit forum.


    </div>
    </div> <?php
};

?>








        <?php
        require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
        ?>


<div class="forum_irl">
    <div class="Content_1">
        <a href="index.php?pag=forum" class="fill-div">
            Title: Tactics <br>
            Unit builds, map strategies, etc.<br><br>
            Last post:
            <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            echo $row['username'] . "<br>" . $row['date'];
            ?></a>
    </div>
    <div class="Content_1">
        <a href="index.php?pag=forum" class="fill-div">
            Title: Player versus Player <br>
            Discussions about Aether Raids, Arena and Arena Assault.<br><br>
            Last post:
            <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            echo $row['username'] . "<br>" . $row['date'];
            ?></a>
    </div>
    <div class="Content_1">
        <a href="../index.php?pag=forum" class="fill-div">
            Title: Multimaps <br>
            Discussions about Chain Challenges, Squad Assauult and Blessed Garden.<br><br>
            Last post:
            <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            echo $row['username'] . "<br>" . $row['date'];
            ?></a>
    </div>
    <div class="Content_1">
        <a href="../index.php?pag=forum" class="fill-div">
            Title: Events <br>
            Discussions about Voting Gaunlet, Tap Battle, Tempest Trails Bound and Grand Hero Battles and Bond Forging.<br><br>
            Last post:
            <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            echo $row['username'] . "<br>" . $row['date'];
            ?></a>
    </div>
    <div class="Content_1">
        <a href="../index.php?pag=forum" class="fill-div">
            Title: Story <br>
            Story progression discussion [SPOILERS].<br><br>
            Last post:
            <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            echo $row['username'] . "<br>" . $row['date'];
            ?></a>
    </div>
    <div class="Content_1">
        <a href="../index.php?pag=forum" class="fill-div">
            Title: Salt <br>
            Daily salt mining.<br><br>
            Last post:
            <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            echo $row['username'] . "<br>" . $row['date'];
            ?></a>
    </div>

</div>


        <br>
        <br>

