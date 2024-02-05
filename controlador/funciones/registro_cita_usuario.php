<?php
include"../../modelo/modelo_1.php";
include"../sesion.php";
$o=new cita ();
$retorno=$o->consulta_citas ($_SESSION);
?>
<html>
    <head>
        <meta charset="UTF-8">
        
        <!--Metainformacion necesaria-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
        <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>

        <style>
            #mydatatable tfoot input{
                width: 100% !important;
            }
            #mydatatable tfoot {
                display: table-header-group !important;
            }
        </style>
    </head>
    <body class="container-fluid p-5">
                        <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Reservar nueva cita
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Diligencie los datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    <form action="cita-servi.php" method="get">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input onchange="TDate()" name="fecha_hora" required type="datetime-local" id="fecha" class="form-control" />
                                    <label class="form-label" for="form6Example7">Fecha y hora</label>
                                </div>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <select name="name_servicio" required class="form-select" aria-label="Default select example">
                                <option >Quejas / Reclamos</option>
                                <option >Seguridad</option>
                                <option >Parqueaderos</option>
                                <option >Convivencia</option>
                                <option >Administracion</option>
                                <option >Salon comunal</option>
                                <option >Zonas comunes</option>
                                <option >Otros</option>
                            </select>
                            <label class="form-label" for="form6Example7">Servicio que desea tomar</label>
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <textarea required name="descrip_servicio" maxlength="255" class="form-control" id="form6Example7" rows="4"></textarea>
                            <label class="form-label" for="form6Example7">Motivo/Descripcion del servicio</label>
                        </div>
                        <input hidden name="id_user_reserva" type="text" <?php echo"value='".$_SESSION ['id']."'";?>/>
                        <!-- Submit button -->
                        <button type="submit" id='submitButton' class="btn btn-primary btn-block mb-4" disabled >Reservar</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                
        <div class="table-responsive" id="mydatatable-container">
            <table class="records_list table table-striped table-bordered table-hover" id="mydatatable">
                <thead>
                    <tr>
                        <th>#</th> 
                        <th>Estado</th>
                        <th>Fecha y hora</th>
                        <th># Administrador</th>
                        <th># Residente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                                echo "<td style='color:#AEAEAE;font-size:15px;'>
                                <img style='width: 10px;' src='https://images.squarespace-cdn.com/content/v1/543a8586e4b06f81e20a529b/1509707246026-0TN7O0MYIQZRVXVDEW0Q/32012-L_gris_moyen_Light_Base_df9c44d3-d2ba-450a-9aac-991407158fca.png?format=1500w'> 
                                $columna</td>";
                            }
                            else 
                            {
                                echo "<td>$columna</td>";
                            }    
                        }
                        if ($fila ["estado_cita"] == 'activo')
                        {  
                            echo
                            "<td>
                            <a href='acti_inacti_cita.php?
                            a=".(INT)$fila ["id_cita"]."& 
                            b=".(int)(2)." '>
                            <img style='width: 25px;'src='https://www.freeiconspng.com/thumbs/turn-off-icon-png/red-turn-off-png-0.png'>
                            </a>
                            </td>" ;
                        }
                        else if ($fila ["estado_cita"] == 'inactivo')
                        {  
                            echo
                            "<td>
                            N/A
                            </td>" ;
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </body>
</html>
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
            <script>
                $( document ).ready(function() {
                var hoy = new Date()
                var fecha = hoy.getFullYear() + '-' + ('0' + (hoy.getMonth() + 1)).slice(-2) + '-' + ('0' + hoy.getDate()).slice(-2) ;
                var hora = ('0' + hoy.getHours()).slice(-2) + ':' + ('0' + hoy.getMinutes()).slice(-2);
                var fecha_hora = fecha +'T'+ hora;
                document.getElementById('fecha').value = fecha_hora;
                $('#submitButton').prop('disabled', true);
                });


                function TDate() {
                var UserDate = document.getElementById("fecha").value;
                var ToDate = new Date();
                console.log(ToDate.toISOString());
                if (new Date(UserDate).toISOString() <= ToDate.toISOString()) {
                    alert("La cita debe ser registrada para fechas u horas posteriores a la actual");
                    return false;
                }
                $('#submitButton').prop('disabled', false);
                return true;}
            </script>