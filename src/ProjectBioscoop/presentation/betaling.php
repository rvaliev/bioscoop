<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Bioscoop - overzicht</title>
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

<div id="wrapper" class="fullHeight">
    <section class="clearFix">
        <div class="container">
            <div class="introMessage">
                <h1>Overzicht van reservatie</h1>
                <br>
                <h3>Film: The Imitation Game</h3>
                <h3>Datum: 30/05/2015</h3>
                <h3>Uur: 12:00</h3>
                <br>
                <p>Uw reservatiecode:</p>
                <img src="http://www.vdabantwerpen.be/php/barcode/generate.php?code=reservatie" alt=""/>
            </div>
        </div>
    </section>


    <section class="clearFix">
        <div class="container">



        </div>
    </section>







</div>
<footer>

</footer>




</body>
</html>