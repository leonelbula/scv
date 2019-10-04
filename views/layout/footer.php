
<!-- ./wrapper -->


<script>
  $(function () {
    $('.tablaCategorias').DataTable()	
    $('.tablaCategorias ').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
	$('.tablasCompra ').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
	$('.tablaventas ').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
	$('.tablaestadocuentaprovedor ').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
	
	
  })

</script>
<!--
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
            
  })
</script>-->
<input type="hidden" value="<?php echo URL_BASE; ?>" id="rutaOculta">

<script src="<?= URL_BASE ?>assets/js/productos.js"></script>
<script src="<?= URL_BASE ?>assets/js/clienteventas.js"></script>
<script src="<?= URL_BASE ?>assets/js/productosventas.js"></script>
<script src="<?= URL_BASE ?>assets/js/productoscompras.js"></script>
<script src="<?= URL_BASE ?>assets/js/ventas.js"></script>
<script src="<?= URL_BASE ?>assets/js/compras.js"></script>
<script src="<?= URL_BASE ?>assets/js/mesaPedidos.js"></script>
<script src="<?= URL_BASE ?>assets/js/proveedorCompra.js"></script>
<!--<script src="<?= URL_BASE ?>assets/js/reportes.js"></script>-->
<script src="<?= URL_BASE ?>assets/js/reporteVentas.js"></script>
<script src="<?= URL_BASE ?>assets/js/reporteCompra.js"></script>
<script src="<?= URL_BASE ?>assets/js/funcionesProductos.js"></script>
  
</body>
</html>
