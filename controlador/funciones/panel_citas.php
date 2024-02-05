<?php
include"../../modelo/modelo_1.php";
include"../sesion.php";
$b=new cita ();
$retorno=$b->consulta_citas($_SESSION);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel citas</title>
        
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
    <h1 style="text-align:center;font-size:larger">Citas</h1>
<div class="table-responsive" id="mydatatable-container">
    <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
        <thead>
            <?php
            if ($_SESSION ['rol']=='administrador')
            {
                echo "
                <a style='font-size: 20px;' href='pdf_citas.php'>Exportar PDF
                <img style='width: 25px;'src='https://www.clubviana.org/wp-content/uploads/2020/07/icono-PDF.png'>
                </a>
                ";
            }
 
                ?>
            <tr>
                <th>#</th> 
                <th>Estado</th>
                <th>Fecha y hora</th>
                <th>ID administrador</th>
                <th>ID residente</th>
<?php
    if ($_SESSION['rol'] == 'administrador')  
    {
        echo "<th>Acciones</th>";
    }
?>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <?php
    if ($_SESSION['rol'] == 'administrador')  
    {
        echo "<th></th>";
    }
?>
            </tr>
        </tfoot>
        <tbody>
            <?php
            foreach ($retorno as $fila)
                    {
                        echo "<tr>";
        
                        foreach ($fila as $columna)
                        {
                          if ($columna == 'activo')
                          {  
                              echo "<td style='color:#648f24;'>
                              <img style='width: 10px;' src='https://www.pngkey.com/png/full/968-9682806_green-circle-png-fluorescent-yellow-circle.png'> 
                              $columna</td>";
                          }
                          else if ($columna == 'inactivo')
                          {  
                              echo "<td style='color:#AEAEAE;'>
                              <img style='width: 10px;' src='https://images.squarespace-cdn.com/content/v1/543a8586e4b06f81e20a529b/1509707246026-0TN7O0MYIQZRVXVDEW0Q/32012-L_gris_moyen_Light_Base_df9c44d3-d2ba-450a-9aac-991407158fca.png?format=1500w'> 
                              $columna</td>";
                          }
                          else 
                          {
                              echo "<td>$columna</td>";
                          }              
                        }

                        if ($_SESSION['rol'] == 'administrador')
                        {
                            echo    
                            "<td>
                            <a href='info_cita.php?
                            a=".(INT)$fila ["id_cita"]."'>
                            <img style='width: 25px;'src='https://cdn.pixabay.com/photo/2016/03/31/18/32/edit-1294441_1280.png'>
                            </a>

                            <a  href='acti_inacti_cita.php?
                            a=".(INT)$fila ["id_cita"]."& 
                            b=".(int)(2)."'>
                            <img style='width: 25px;'src='https://www.freeiconspng.com/thumbs/turn-off-icon-png/red-turn-off-png-0.png'>
                            </a>

                            <a href='acti_inacti_cita.php?
                            a=".(INT)$fila ["id_cita"]."& 
                            b=".(int)(1)."'>
                            <img style='width: 25px;'src='https://cdn.pixabay.com/photo/2012/04/11/18/29/button-29286_640.png'>
                            </a>

                            </td>" ;
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