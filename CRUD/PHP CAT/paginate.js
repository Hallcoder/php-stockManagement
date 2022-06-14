jQuery( document ).ready(function() {
	var table = jQuery('#example').dataTable({			
			 "bProcessing": true,
			 "sAjaxSource": "pagination_data.php",
			 "bPaginate":true,
			 "sPaginationType":"full_numbers",
			 "iDisplayLength": 10,
			 "bLengthChange":false,	
			 "bFilter": false,			 
			 "aoColumns": [
                { mData: 'provinceName' },
                { mData: 'districtName' },
                { mData: 'sectorName' },
                { mData: 'cellId' },
                { mData: 'cellName' },
                { mData: 'NumberOfVillages' },
			]
	});   
});