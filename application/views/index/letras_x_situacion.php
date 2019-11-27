<input type="hidden" id="tmp_name_table_letsit">

<h2 class="colortexto">Reportes de Letras por Situaci&oacute;n</h2>

<form class="form" id="form_letsit" onsubmit="return false;" data-tipo="">
	<div class="form-group row">
		<div class="col-lg-6">       

			<!-- <input type="hidden" id="hdcbo_empresa"> -->
			<!-- <label for="cbo_empresa_letxsit"><span class="colortexto">Empresa</span></label> -->
			<input type="hidden" id="hdcbo_empresa_letxsit">
			<div class="input-group my-group" style="box-shadow: 0px 2px 6px 1px rgba(0, 0, 0, 0.56);"> 
				<select id="cbo_empresa_letxsit" multiple="multiple" >
					<option value="0002">CAISAC</option>
					<option value="0003">ANDEX</option>
					<option value="0004">SEMILLAS</option>
					<option value="0016">SUNNY</option>
				</select>
				<span class="input-group-btn">
					<button id="btn_empresa_letxsit-deselectAll-all" class="btn btn-default my-group-button" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
				</span>
			</div>

		</div>
		
		<div class="col-lg-6">

			<button type="submit" id="btn_descargar_xlsx_letsit" class="btn  btn-excel-xlsx" onclick='$("form").attr("data-tipo","cons");'>
				<i class="fa fa-file-excel"></i>
				<span class="link-title">&nbsp;Descargar</span>
			</button>	

			<!-- <button class="btn btn-sm btn-excel-xlsx" >Large Button</button> -->


		</div>
	</div>
</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="modal modal-warning" id="vempre_letxsitu" aria-hidden="false" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Aviso!</h4>
			</div>
			<div class="modal-body">
				<p>Seleccionar la(s)<code>Empresa(s)</code> para la descarga</p>
			</div><!-- /.modal-body -->
			<div class="modal-footer">
				<!-- <div class="btn-group btn-group-justified" data-toggle="buttons"> -->

					<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

					<!-- <label class="btn btn-default">
						<input type="radio" name="modal-style" id="modal-default"> Default
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="modal-style" id="modal-primary"> Primary
					</label>
					<label class="btn btn-danger">
						<input type="radio" name="modal-style" id="modal-danger"> Danger
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="modal-style" id="modal-warning"> Warning
					</label>
					<label class="btn btn-info">
						<input type="radio" name="modal-style" id="modal-info"> Info
					</label> -->
				<!-- </div> -->
			</div><!-- /.modal-footer -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal modal-default fade" id="Pgbar_letsit" tabindex="-1" role="dialog" aria-labelledby="Pgbar_Tit_letsit" aria-hidden="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="Pgbar_Tit_letsit">Descarga de Detalle Cuenta en el formato <strong  id="formatodescarga"></strong> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none;">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<h3 id="Pgbar_Subtit_letsit">Explorando información</h3>
					<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" data-progress="0" style="width: 0%;">
							0%
						</div>
					</div>
					<div class="counter-sending">
						(<span id="done_letsit">0</span>/<span id="total_letsit">0</span>)
					</div>

					<div class="execute-time-content">
						Tiempo transcurrido: <span class="execute-time">0 segundos</span>
					</div>

					<br/>
					<textarea readonly id="Rpt_letsit" class="form-control" id="exampleFormControlTextarea1" rows="10" style="font-size: 8px;display:none;"></textarea>
					<br/>
					
					<div class="end-process" style="display:none;">
						<div class="alert alert-success" id="Down_letsit">
							
						</div>
					</div>    
			</div>			
			<div class="modal-footer" style="display:none">
				<!-- 
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button> 
				-->
			</div>
		</div>
	</div>
</div>

<div class="modal modal-info" id="Aviso_info_cero" aria-hidden="false" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Informacion</h4>
			</div>
			<div class="modal-body">
				<p><code>No existe Informacion</code> con los filtros de busqueda.</p>
			</div><!-- /.modal-body -->
			<div class="modal-footer">
				<!-- <div class="btn-group btn-group-justified" data-toggle="buttons"> -->

					<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>

					<!-- <label class="btn btn-default">
						<input type="radio" name="modal-style" id="modal-default"> Default
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="modal-style" id="modal-primary"> Primary
					</label>
					<label class="btn btn-danger">
						<input type="radio" name="modal-style" id="modal-danger"> Danger
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="modal-style" id="modal-warning"> Warning
					</label>
					<label class="btn btn-info">
						<input type="radio" name="modal-style" id="modal-info"> Info
					</label> -->
				<!-- </div> -->
			</div><!-- /.modal-footer -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->