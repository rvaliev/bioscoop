<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Bioscoop</title>
<!--    <link rel="stylesheet" href="css/jquery-ui.css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ firstDay: 1, minDate: 0}).datepicker( "option", "dateFormat", "DD, d MM, yy" );
        });
    </script>
</head>
<body>


<?php

if(isset($_POST['kiesDatum']))
{
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}


?>


<header class="clearFix">
    <div class="container">
        <div id="logo">
            <a href="#">Bioscoop</a>
        </div>
    </div>
</header>


<section>
    <div class="container">
        <div class="introMessage">
            <h1>Welkom bij bioscoop</h1>
        </div>
        <div id="date">
            <form action="#" method="post">
                <label for="gekozenDatum">Kies een programmatiedatum:</label>
                <input type="text" id="datepicker" name="gekozenDatum">
                <input type="submit" value="Verder" name="kiesDatum"/>
            </form>
        </div>
    </div>
</section>



<footer>

</footer>




</body>
</html>