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

