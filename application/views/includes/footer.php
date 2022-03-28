				<!-- 
				<footer class="footer text-center text-sm-start">
                    <span class="text-muted d-none d-sm-inline-block float-end">Designed by  with <i
                            class="mdi mdi-heart text-danger"></i> by Brand Metrics Fintech Private Limited</span>
                </footer>
                 end Footer -->                
                <!--end footer-->
            </div>
            <!-- end page content -->
        </div>
		
		<script src="<?php echo base_url('asset/plugins/datatables/simple-datatables.js'); ?>"></script>



		<script src="<?php echo base_url('asset/js/app.js'); ?>"></script>
		<script>
		$(document).ready(function(){
		 const dataTable = new simpleDatatables.DataTable("#datatable_1", {
		searchable: true,
		fixedHeight: false,
			}) });
		</script>

    </body>
</html>
