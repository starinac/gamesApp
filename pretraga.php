<?php
    include 'konekcija.php';
    include 'igriceClass.php';
    if(isset($_GET['konzolaID']))
    {
        $id = mysqli_real_escape_string($conn,$_GET['konzolaID']);
        $niz = [];
        $rez = $conn->query("select * from igrice where konzolaID=$id");

        while($red= $rez->fetch_assoc()):
        $igrica = new Igrica($red['igricaID'],$red['nazivIgrice'],$red['Cena'],$id);
        array_push($niz,$igrica);
        endwhile;
    ?>
    <table class="table table-hover">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($niz as $vrednost):
            ?>
                <tr>
                    <td><?php echo $vrednost->nazivIgrice ?>  </td>
                    <td><?php echo $vrednost->Cena ?>  dinara</td>
                </tr>
            <?php
        endforeach;
        ?>
    </tbody>
    </table>
    <?php

    }else{
    echo("Molimo vas da prosledite konzolu za koju zelite igrice");
    }


 ?>