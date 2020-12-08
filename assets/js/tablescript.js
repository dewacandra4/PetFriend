

// $(document).ready(function () {
//     $('#history').DataTable({
//       "order": [[ 5, "desc" ]],
//       "aaSorting": [],
//       columnDefs: [{
//       orderable: false,
//       targets: 6
//       }],
//       "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
//     });
//     $('.dataTables_length').addClass('bs-select');
//     });
    
$(function() {
    var oTable = $('#history').DataTable({
      "oLanguage": {
        "sSearch": "Filter Data",
        "order": [[ 5, "desc" ]],
        "aaSorting": [],
        columnDefs: [{
        orderable: false,
        targets: 6
        }],  
    },
    "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
      
    });
  
    
    
  
  
    $("#datepicker_from").datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: false,
      "onSelect": function(date) {
        minDateFilter = new Date(date).getTime();
        oTable.fnDraw();
      }
    }).keyup(function() {
      minDateFilter = new Date(this.value).getTime();
      oTable.fnDraw();
    });
  
    $("#datepicker_to").datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: false,
      "onSelect": function(date) {
        maxDateFilter = new Date(date).getTime();
        oTable.fnDraw();
      }
    }).keyup(function() {
      maxDateFilter = new Date(this.value).getTime();
      oTable.fnDraw();
    });
  
  });
  
  // Date range filter
  minDateFilter = "";
  maxDateFilter = "";
  
  $.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aData, iDataIndex) {
      if (typeof aData._date == 'undefined') {
        aData._date = new Date(aData[0]).getTime();
      }
  
      if (minDateFilter && !isNaN(minDateFilter)) {
        if (aData._date < minDateFilter) {
          return false;
        }
      }
  
      if (maxDateFilter && !isNaN(maxDateFilter)) {
        if (aData._date > maxDateFilter) {
          return false;
        }
      }
  
      return true;
    }
  );