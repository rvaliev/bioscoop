<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Bioscoop - zaal</title>
    <!--    <link rel="stylesheet" href="css/jquery-ui.css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <script src="../../../js/jquery-1.11.3.min.js"></script>
    <script src="../../../js/jquery-ui.js"></script>
    <script src="../../../js/scripts.js"></script>

    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ firstDay: 1, minDate: 0}).datepicker( "option", "dateFormat", "DD, d MM, yy" );
        });
    </script>
</head>
<body>
<header class="clearFix">
    <div class="container">
        <div id="logo">
            <a href="#">Bioscoop</a>
        </div>
    </div>
</header>

<div id="wrapper">
    <section class="clearFix">
        <div class="container">
            <div class="introMessage">
                <h1>Film: The Imitation Game (<a href="films.php">wijzigen</a>)</h1>
                <h2>Datum: 30/05/2015 (<a href="index.php">wijzigen</a>)</h2>
                <h2>Uur: 12:00 (<a href="films.php">wijzigen</a>)</h2>
            </div>
        </div>
    </section>


    <section class="clearFix">
        <div class="container">
            <table border="1" class="zaal">
                <caption class="tableCaption">Kies een zetel in zaal nummer 1</caption>
                <?php
                $x = 12;
                $y = 10;
                echo "<tr>";
                echo "<th></th>";
                for($j = 1; $j <= $y; $j++)
                {
                    echo "<th>Zetel $j</th>";
                }
                echo "</tr>";

                for($i = 1; $i <= $x; $i++)
                {
                    echo "<tr>";
                    echo "<th>Rij $i</th>";
                    for($j = 1; $j <= $y; $j++)
                    {
                        echo "<td>";
                        echo "<a href='zaal.php?rij=" . $i . "&kolom=" . $j . "'></a>";
                        echo "</td>";
                    }
                    echo "</tr>";

                }
                ?>
            </table>

            <img src="http://www.vdabantwerpen.be/php/barcode/generate.php?code=ruslan" alt=""/>
        </div>
    </section>







</div>
<footer>

</footer>




</body>
</html>