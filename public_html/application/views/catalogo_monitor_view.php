<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <table id="infoCatologoActual" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Categoría
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Código de premio
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Nombre de premio
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Marca
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Modelo
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Puntos
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>electronica</td>
                        <td>99999</td>
                        <td>box</td>
                        <td>lg</td>
                        <td>asdf</td>
                        <td>987654</td>
                    </tr>
                    <tr>
                        <td>electronica</td>
                        <td>99999</td>
                        <td>box</td>
                        <td>lg</td>
                        <td>asdf</td>
                        <td>987654</td>
                    </tr>
                    <tr>
                        <td>electronica</td>
                        <td>99999</td>
                        <td>box</td>
                        <td>lg</td>
                        <td>asdf</td>
                        <td>987654</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Categoría</th>
                        <th>Código de premio</th>
                        <th>Nombre de premio</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Puntos</th>
                    </tr>
                </tfoot>
            </table>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Informacion del catologo actual</h1>";

            $(document).ready(function() {
                $('#infoCatologoActual').DataTable();
            } );

        </script>-
</body>
</html>