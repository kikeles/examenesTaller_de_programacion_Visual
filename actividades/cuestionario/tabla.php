







<div class="row">
	<div class="col-sm-12">
		<h2>Tabla Preguntas</h2>
		<table class="table table-hover table-condensed table-bordered">
			<!-- button modal para agregar nuevas preguntas-->
			<caption>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
					Agregar
					<span class="glyphicon glyphicon-plus"></span>
				</button>
			</caption>
			<tr>
				<td>Pregunta</td>
				<td>Tipo</td>
				<td>Puntaje</td>
				<td>Tema</td>
				<td>Estatus</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th>
					<!-- Button modal para editar preguntas-->
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion">
						
					</button>
				</th>
				<th>
					<button class="btn btn-danger glyphicon glyphicon-remove"></button>
				</th>
			</tr>
		</table>
	</div>
</div><!--cierre del row-->