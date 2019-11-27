var DataTableCuenta = {
    DataTable_Base_Cliente_Lista : function (){
        $tb = "#tbBaseClienteLista";
        $($tb).DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',    
            'scrollY':        "300px",
            'scrollX':        true,
            'scrollCollapse': true,
            //'paging':         false,
            "responsive": true,
            "searching": true,
            'ajax': {
                //'url':'ajaxfile.php'
                url: '../Index/ListCliente',
            },
            "language": {
                "search": "Cod.Cliente/Cliente:",
                "info": "Resultado _START_ - _END_ de _TOTAL_ Registros",
            },
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ Registros",
            },
            // dom: "Bfrltip", // Botones de impresion xlsx
            'columns': [
                // {data:'ROW_NUMBER',"title":"#", "orderable":true,"responsivePriority":1000},
                // {data:'RUC',"title":"Cod. Cliente", "orderable":true,"responsivePriority":1000},
                // {data:'CLIENTE',"title":"Cliente", "orderable":true,"responsivePriority":1001},
                // {data:'TIPO_CLIENTE',"title":"Tipo Cliente","orderable":true,"responsivePriority":1},
                // {data:'SUPERVISOR',"title":"Supervisor","orderable":true,"responsivePriority":1003},
                // {data:'LINEA_BASE',"title":"Linea Base","orderable":true,"responsivePriority":1004},
                // {data:'SOBREGIRO_CAMPANIA',"title":"Sobre Giro","orderable":false,"responsivePriority":1005},
                // {data:'LINEA_CREDITO_TOTAL',"title":"Linea Credito Total","orderable":false,"responsivePriority":1006},
                // {data:'ESTUDIO_EXTERNO',"title":"Estudio Externo","orderable":false,"responsivePriority":1007}
                    
                    {data:'ROW_NUMBER',"title":"#", "orderable":true,"responsivePriority":1000},
                    {data:'RUC','title':'RUC',"orderable":true,'responsivePriority':1000},
                    {data:'CLIENTE','title':'CLIENTE',"orderable":true,'responsivePriority':1},
                    {data:'TIPO_CLIENTE','title':'TIPO_CLIENTE',"orderable":true,'responsivePriority':1003},
                    {data:'COD_ZONA','title':'COD_ZONA',"orderable":true,'responsivePriority':1004},
                    {data:'ZONA','title':'ZONA',"orderable":true,'responsivePriority':10005},
                    {data:'COD_VEN','title':'COD_VEN',"orderable":true,'responsivePriority':1006},
                    {data:'RESPONSABLE_ZONA','title':'RESPONSABLE_ZONA',"orderable":true,'responsivePriority':1007},
                    {data:'COD_VEN_RTC_JUNIOR','title':'COD_VEN_RTC_JUNIOR',"orderable":true,'responsivePriority':1008},
                    {data:'RTC','title':'RTC',"orderable":true,'responsivePriority':1009},
                    {data:'SUPERVISOR','title':'SUPERVISOR',"orderable":true,'responsivePriority':1010},
                    {data:'TIPO_RIESGO','title':'TIPO_RIESGO',"orderable":true,'responsivePriority':1011},
                    {data:'LINEA_BASE','title':'LINEA_BASE',"orderable":true,'responsivePriority':1012},
                    {data:'SOBREGIRO_CAMPANIA','title':'SOBREGIRO_CAMPANIA',"orderable":true,'responsivePriority':1013},
                    {data:'LINEA_CREDITO_TOTAL','title':'LINEA_CREDITO_TOTAL',"orderable":true,'responsivePriority':1014}

            ],
            // "columnDefs": [
            // 	{ className: "dt-center","width": "90px", "targets": [0]},
            // 	{ className: "dt-left","width": "300px", "targets": [1]}
            //   ]
            "initComplete": function(settings, json) {
                
            },
            "fnDrawCallback": function () { // ESTE EVENTO SE EJECUTA POR CADA BOTON PAGINADOR QUE PRESIONO 
                $($tb+"_filter input").addClass("ui-widget ui-widget-content ui-corner-all"); // ESTILO PARA INPUT DEL SEARCH
                $($tb+"_wrapper th").css({'font-size':'10px'}); // TAMAÑO DE CABECERA
                $($tb+"_wrapper td").css({'font-size':'11px'}); // TAMAÑO DE CADA REGISTRO DE LA GRILLA
                $($tb+" .dataTables_wrapper .dataTables_filter,"+$tb+" .dataTables_wrapper .dataTables_length,"+$tb+" .dataTables_wrapper .dataTables_info,"+$tb+" .dataTables_wrapper .ui-button").css({
                    "font-size": "12px",
                    "padding": "0px"
                });// ESTILO A FUENTE DE TEXTO A HEADER Y FOOTER DE LA TABLA 

                $($tb+" .dataTables_wrapper .ui-toolbar").css({
                    "font-size": "12px",
                    "padding": "0px"
                }); // ESTILO A FUENTE DE TEXTO  FOOTER DE LA TABLA

                $($tb+"_wrapper .dataTables_scrollHeadInner").css({
                    'margin': '0' // EL BLOQUE DE CABECERAS LO PONE A LA IZQUIERDA
                    // 'margin': '0 auto' // EL BLOQUE DE CABECERAS LO CENTRA
                });

                $($tb+"_wrapper table.dataTable").css({
                    'margin': '0' // EL BLOQUE DE CABECERAS LO PONE A LA IZQUIERDA
                    // 'margin': '0 auto' // EL BLOQUE DE CABECERAS LO CENTRA POR DEFECTO APARECE ESTE VALOR NO DESCOMENTARLO
                });

                

            }
        });

        var table = $($tb).DataTable();


        $($tb + ' tbody').on( 'dblclick', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );

        $($tb).on('dblclick','tr',function(e){
            // e.stopPropagation()                       
            // let rowID = $(this).attr('id')                          
            // $($tb).rows('#'+rowID).select()
     
            $("#myModal").modal('toggle');
        })

 

    }

}