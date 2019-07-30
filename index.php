<?php

// include database and object files
include_once 'classes/database.php';
include_once 'classes/estudiantes.php';
include_once 'classes/pregrado.php';
include_once 'initial.php';

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 5; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and estudiante object
$estudiante = new Estudiantes($db);
$pregrado = new Pregrado($db);

// include header file
$page_title = "Estudiantes";
include_once "header.php";

// create user button
echo "<div class='right-button-margin'>";
echo "<a href='create.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> Create User";
echo "</a>";
echo "</div>";

// select all users
$prep_state = $estudiante->getAllUsers($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Nombres</th>";
    echo "<th>Apellidos</th>";
    echo "<th>Email</th>";
    echo "<th>Telefono</th>";
    echo "<th>Direccion</th>";
    echo "<th>Fecha de nacimiento</th>";
    echo "<th>Pregrado</th>";    
    echo "</tr>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tr>";

        echo "<td>$row[nombres]</td>";
        echo "<td>$row[apellidos]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[telefono]</td>";
        echo "<td>$row[direccion]</td>";
        echo "<td>$row[fecha]</td>";

        echo "<td>";
                    $pregrado->id = $pregrado_id;
					$pregrado->getName();
					echo $pregrado->name;
        echo "</td>";

        echo "<td>";
        echo "</tr>";
    }

    echo "</table>";

    // include pagination file

// if there are no user
else{
    echo "<div> No User found. </div>";
    }
?>


<?php
include_once "footer.php";
?>