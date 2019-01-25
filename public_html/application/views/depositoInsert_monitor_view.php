<!DOCTYPE html>
<html  ng-app="monitor" >
<?php
include 'home_monitor_view_header.php';
?>

        <div class="container">

            <div id="MessageInsertarDepositos"></div>

            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Advertencia!</h4>
                <p>Para subir el archivo es necesario que tenga la extensión CSV</p>
            </div>

            <form>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Sube tu archivo CSV</label>
                    <input type="file" class="form-control-file" id="files" accept=".csv" required>
                </div>
                <div class="form-group">
				    <button type="button" id="submit-file" class="btn btn-primary"><i class="fas fa-upload"></i> Subir archivo</button>
			    </div>
            </form>

            <div id="parsed_csv_list"></div>

        </div>

<?php
include 'home_monitor_view_footer.php';
?>

        <script>
            document.getElementById("navegacionMonitor").innerHTML = "<h1>Insertar depósitos</h1>";
            $('#submit-file').on("click",function(e){
				e.preventDefault();
				$('#files').parse({
					config: {
						delimiter: "auto",
						complete: displayHTMLTable,
					},
					before: function(file, inputElem)
					{
						console.log("Cargando archivo...", file);
					},
					error: function(err, file)
					{
						console.log("ERROR:", err, file);
					},
					complete: function()
					{
						console.log("Se cargo exitosamente");
					}
				});
			});
			
			function displayHTMLTable(results){
				var table = "<table class='table'>";
				var data = results.data;
				console.log(data);
				
				for(i=0;i<data.length;i++){
					table+= "<tr>";
					var row = data[i];
					var cells = row.join(",").split(",");
					for(j=0;j<cells.length;j++){
						table+= "<td>";
						table+= cells[j];
						table+= "</th>";
					}
					table+= "</tr>";
				}
				table+= "</table>";
				$("#parsed_csv_list").html(table);
			}
        </script>
</body>
</html>