<?php

// set page headers
$page_title = "Create Student";
include_once "header.php";

// read user button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Read Users ";
    echo "</a>";
echo "</div>";

// get database connection
include_once 'classes/database.php';
include_once 'initial.php';


// check if the form is submitted
if ($_POST){

    // instantiate user object
    include_once 'classes/estudiantes.php';
    $user = new User($db);

    // set user property values
    $user->nombres = htmlentities(trim($_POST['nombres']));
    $user->apellidos = htmlentities(trim($_POST['apellidos']));
    $user->email = htmlentities(trim($_POST['email']));
    $user->telefono = htmlentities(trim($_POST['telefono']));
    $user->direccion = htmlentities(trim($_POST['direccion']));
    $user->fecha = htmlentities(trim($_POST['fecha']));
    $user->pregrado_id = $_POST['pregrado_id'];


    // if the user able to create
    if($user->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! User is created.";
        echo "</div>";
    }

    // if the user unable to create
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Unable to create user.";
        echo "</div>";
    }
}
?>

<!-- Bootstrap Form for creating a user -->
<form action='create.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nombres</td>
            <td><input type='text' name='nombres'  class='form-control' placeholder="Ingrese los nombres" required></td>
        </tr>

        <tr>
            <td>Apellidos</td>
            <td><input type='text' name='apellidos' class='form-control' placeholder="Ingrese los apellidos" required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' placeholder="Ingrese el email" required></td>
        </tr>

        <tr>
            <td>Telefono</td>
            <td><input type='number' name='telefono' class='form-control' placeholder="Ingrese el telefono" required></td>
        </tr>

        <tr>
            <td>Direccion</td>
            <td><input type='text' name='direccion' class='form-control' placeholder="Ingrese la direccion" required></td>
        </tr>

        <tr>
            <td>Fecha de nacimiento</td>
            <td><input type='date' name='fecha' class='form-control' placeholder="Ingrese la fecha de nacimiento" required></td>
        </tr>

        <tr>
            <td>Category</td>
            <td>
                <?php
                    // choose user categories
                    include_once 'classes/pregrado.php';

                    $category = new Category($db);
                    $prep_state = $category->getAll();
                    echo "<select class='form-control' name='pregrado_id'>";

                        echo "<option>--- Seleccione pregrado ---</option>";

                        while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){

                            extract($row_category);

                            echo "<option value='$id'> $name </option>";
                        }
                    echo "</select>";
                ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Create
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "footer.php";
?>

