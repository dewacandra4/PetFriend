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
<!--DataTables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!--DateRangePicker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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

<script type="text/javascript">
    var start_date;
    var end_date;
    var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
        var dateStart = parseDateValue(start_date);
        var dateEnd = parseDateValue(end_date);

        var Date= parseDateValue(aData[5]);//date on column 5
          if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
              ( isNaN( dateStart ) && Date <= dateEnd ) ||
              ( dateStart <= Date && isNaN( dateEnd ) ) ||
              ( dateStart <= Date && Date <= dateEnd ) )
          {
              return true;
          }
          return false;
    });

    //convert date
    function parseDateValue(rawDate) {
        var dateArray= rawDate.split("-");
        var parsedDate= new Date(parseInt(dateArray[1])-1, dateArray[2],  dateArray[0]);  // -1 because months are from 0 to 11   
        return parsedDate;
    }    

    $( document ).ready(function() {
    //datatable config
    var $dTable = $('#history').DataTable({
      "dom": "<'row'<'col-sm-3'l><'col-sm-5' <'datesearchbox'>><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        "pagingType":"simple_numbers",
        "order": [[ 0, "desc" ]],
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
        
    });
    $('.dataTables_length').addClass('bs-select');

    //menambahkan daterangepicker di dalam datatables
    $("div.datesearchbox").html('<div class="input-group "> <div class="input-group-addon "><i class="fas fa-calendar-alt fa-lg mt-2 mr-3"></i></div><input type="text" class="form-control" id="datesearch" placeholder="Search by date range.."> </div>');

    document.getElementsByClassName("datesearchbox")[0].style.textAlign = "center";
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '-' + dd + '-' + yyyy;
    //konfigurasi daterangepicker pada input dengan id datesearch
    $('#datesearch').daterangepicker({
      autoUpdateInput: false,
      maxDate: today,
      ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
  },
      });

    //aply date range
      $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM-DD-YYYY') + ' - ' + picker.endDate.format('MM-DD-YYYY'));
        start_date=picker.startDate.format('MM-DD-YYYY');
        end_date=picker.endDate.format('MM-DD-YYYY');
        $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
        $dTable.draw();
      });

      $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        start_date='';
        end_date='';
        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
        $dTable.draw();
      });
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
