<?php
function heading($title)
{
    echo "<head>\n";
        echo "<meta charset='UTF-8'>\n";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        echo "<meta name='description' content='CS313 Web Engineering II'>\n";
        echo "<meta name='keywords' content='Home, counterdown, Assigments'>\n";
        echo "<meta name='author' content='Henry Diaz'>\n";
        echo "<link rel='shortcut icon' href='img/favicon.ico'>\n";
        echo "<title>$title</title>\n";

        echo "<!-- Fonts -->\n";
        echo "<link href='https://fonts.googleapis.com/css?family=Lato:300,400,500,700|Open+Sans:400italic,300,400,700' rel='stylesheet' type='text/css'>\n";

        echo "<!-- CSS Stylesheets -->\n";
        echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>\n";
        echo "<link rel='stylesheet' type='text/css' href='css/style.css'>\n";

    echo "</head>\n";
}
