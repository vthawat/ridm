$(function () {
 oTable=$('.table').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": true
       });
      //hidden fillter 
      $('.dataTables_filter').hide(); 
      
      $('.search').on('keyup',function(){
      	oTable.search($(this).val()).draw();
		});
});
