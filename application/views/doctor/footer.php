      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PetFriend 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url()?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url()?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url()?>assets/sbadmin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url()?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url()?>assets/sbadmin/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url()?>assets/sbadmin/js/demo/chart-pie-demo.js"></script>
  <!-- JQuery -->
  <script src="<?= base_url()?>assets/js/date-eu.js"></script>
  <script src="<?= base_url()?>assets/js/addons/datatables.min.js"></script>
  <script>
      import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';
      export default {
        name: 'TableResponsivePage',
        components: {
          mdbTbl,
          mdbTblHead,
          mdbTblBody
        }
      }
  </script>
  <script>
    $(document).ready(function () {
    $('#table-bootstrap').DataTable({
      "order": [[ 2, "desc" ]],
      "language": {
        "emptyTable": "You have no orders at this time"
      },
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: 7
      }],
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
    });
  </script>
  
  <script>
    $(document).ready(function () {
    $('#table-bootstrap-services').DataTable({
      "order": [[ 2, "desc" ]],
      "language": {
        "emptyTable": "You have no orders at this time"
      },
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: 7
      }],
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
    });
  </script>

  <script>
    $(document).ready(function () {
    $('#table-bootstrap-history').DataTable({
      "order": [[ 4, "desc" ]],
      "language": {
        "emptyTable": "You have no orders at this time"
      },
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: 7
      }],
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
    });
  </script>

<script>
    $(document).ready(function () {
    $('#table-bootstrap-history2').DataTable({
      "order": [[ 4, "desc" ]],
      "language": {
        "emptyTable": "You have no orders at this time"
      },
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: 7
      }],
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
    });
  </script>

  <script>
    $(document).ready(function () {
    $('#selectedColumn').DataTable({
      "order": [[ 8, "desc" ]],
      "aaSorting": [],
      columnDefs: [{
      orderable: false,
      targets: 9
      }],
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    });
    $('.dataTables_length').addClass('bs-select');
    });
  </script>


  <script>
    $('#image').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName.replace('C:\\fakepath\\'," "));
    })
  </script>
  <script>
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
  </script>
</body>

</html>
