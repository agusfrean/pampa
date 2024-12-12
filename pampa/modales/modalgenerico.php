<!-- Modal -->
<div class="modal fade" id="modalgenerico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				  <div class="modal-header">
				  <h4 class="modal-title" id="modalgen"></h4>
					<button type="button" class="close" data-dismiss="modal" onclick="cerrargen()"><span >&times;</span></button>
					
				  </div>
				  <div class="modal-body">
					
				  </div>
				  <div class="modal-footer ">
					<button type="button" class="close "  onclick="cerrargen()" >Cerrar</button>
				  </div>
				</div>
			  </div>
			</div>
			<script>
			function cerrargen() {
				$('iframe').attr('src','');
				$('#modalgenerico').modal('hide');
				//$('modal-body').removeClass('modal-open');
			}
			</script>