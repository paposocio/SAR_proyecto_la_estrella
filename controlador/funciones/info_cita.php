<?php
include"../../modelo/modelo_1.php";
include"../sesion.php";
$o=new cita ();
$retorno=$o->informacion_cita((int)$_GET ['a']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>correspondencia</title>
        
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
        <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>

    </head>
    <body class="container-fluid p-5">
    <a href="panel_citas.php">
            <center>
                Volver
            </center>
        </a>
    <h1 style="text-align:center;font-size:larger">vinculaciones</h1>
<div class="table-responsive" id="mydatatable-container">
    <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
        <thead> 
            <tr>
                <th>Numero cita</th> 
                <th>Servicio tomado</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($retorno as $fila)
                    {
                        echo "<tr>";
        
                        foreach ($fila as $columna)
                        {
                              echo "<td>$columna</td>";
                        }

                        echo "</tr>";
                    }
                    echo "</table>"
            ?>
        </tbody>
    </table>
</div>
<style>
#mydatatable tfoot input{
    width: 100%;
}
#mydatatable tfoot {
    display: table-header-group;
}
#mydatatable-container
{
    width:100%;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $('#mydatatable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Filtrar.." />' );
    } );

    var table = $('#mydatatable').DataTable({
        "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
        "responsive": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "order": [[ 0, "desc" ]],
        "initComplete": function () {
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                        }
                });
            })
        }
    });
});
</script>
</body>
</html>