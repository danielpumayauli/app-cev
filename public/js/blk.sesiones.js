
	// function initDataTable(id_tabla){
	// 	$(id_tabla).DataTable({
	// 		autoWidth:false,
	// 		responsive:false,
	// 		lengthMenu:[[15,30,45,-1],["15 Rows","30 Rows","45 Rows","Everything"]],
	//         language:{searchPlaceholder:"Search for records..."},
	//         dom:"Blfrtip",
	//         buttons:[{extend:"excelHtml5",title:"Export Data"},
	//                  {extend:"csvHtml5",title:"Export Data"},
	//                  {extend:"print",title:"Print"}],
	//         initComplete:function(a,b){
	//         	$(this).closest(".dataTables_wrapper").prepend('<div class="dataTables_buttons hidden-sm-down actions"><span class="actions__item zmdi zmdi-print" data-table-action="print" /><span class="actions__item zmdi zmdi-fullscreen" data-table-action="fullscreen" /><div class="dropdown actions__item"><i data-toggle="dropdown" class="zmdi zmdi-download" /><ul class="dropdown-menu dropdown-menu-right"><a href="" class="dropdown-item" data-table-action="excel">Excel (.xlsx)</a><a href="" class="dropdown-item" data-table-action="csv">CSV (.csv)</a></ul></div></div>')
	//         	}
	//         });		
	// }



	$(document).ready(function(){

		const onInit = () => {

			//console.log('en blk ... ', contTabla);
			// contTabla.textContent = '000000';

			// var vin = document.getElementById("id_vin").value;
		 //    console.log(vin);

		    var url_b = `https://us-lti.bbcollab.com/collab/api/csa/users`;

		    // $.ajax({
		    //     url: url_b,
		    //     headers: {
		    //     'Authorization':'Bearer eyJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJiYkNvbGxhYkFwaSIsInN1YiI6ImJiQ29sbGFiQXBpIiwidHlwZSI6MSwiZXhwIjoxNTQxMDAxMDI5LCJpYXQiOjE1Mzg0MDkwMjksImNvbnN1bWVyIjoiQTU5RUU5Q0FFRURBMUMxNEY4NkJFM0RCNDhBM0E1MzQifQ.rhze4CRIwySoQpJzd0hVXy8vSjJ-XI8qft4ve-eL5_M'},
		    //     type: 'GET',
		    //     accepts: "application/json",
		    //     crossDomain: true,
		    //     dataType: 'jsonp',
		    //     success: function (result) {
		    //         // process result
		    //         // $('#result').html(result.ip);
		    //         console.log('en el success');
		    //     },
		    //     error: function (e) {
		    //          // log error in browser
		    //         console.log(e.message);
		    //     }
		    	
		 //     });
		 //    $.ajaxSetup({
			//     beforeSend: function(xhr) {
			//         xhr.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJiYkNvbGxhYkFwaSIsInN1YiI6ImJiQ29sbGFiQXBpIiwidHlwZSI6MSwiZXhwIjoxNTQxMDAxMDI5LCJpYXQiOjE1Mzg0MDkwMjksImNvbnN1bWVyIjoiQTU5RUU5Q0FFRURBMUMxNEY4NkJFM0RCNDhBM0E1MzQifQ.rhze4CRIwySoQpJzd0hVXy8vSjJ-XI8qft4ve-eL5_M');
			//     }
			// });

		 //    $.ajax({
			//     url: 'https://canvas.instructure.com/api/v1/courses?access_token=11286~TgOq16pPAwbBAdkxugJMPlI3j66cSNygSLtw0Ybmi8Hm6yRdC3DJu0ekYK1GdKfw',
			//     // url: 'https://canvas.instructure.com/api/v1/courses?access_token=4xoQuJePEel43cGTBiniyzzgmbAROZsrSZl9xK7xn3xAKrjgXLkzniYpbpKNckjL',    clave desarrollador daniel
			//   	method: 'GET',
			//     crossDomain: true,
			//     dataType: 'jsonp',
			//     headers: {
			// 	    'Access-Control-Allow-Credentials' : true,
			// 	    'Access-Control-Allow-Origin':'*',
			// 	    'Access-Control-Allow-Methods':'GET',
			// 	    'Access-Control-Allow-Headers':'application/json',
			// 	  },
			//     success: function( data, txtStatus, xhr ) {
			//         console.log( data );
			//         console.log( xhr.status );
			//     },
			//     error: function (e) {
		 //            console.log(e.message);
		 //        }
			// });

		    $.ajax({
			     url: "https://usil.instructure.com/api/v1/courses?access_token=11286~TgOq16pPAwbBAdkxugJMPlI3j66cSNygSLtw0Ybmi8Hm6yRdC3DJu0ekYK1GdKfw",
			     type: 'GET',
			     //contentType: 'application/javascript; charset=utf-8',
			     contentType: 'application/x-www-form-urlencoded',
			     dataType: 'jsonp',
			     responseType: 'application/javascript; charset=utf-8',
			     //responseType: 'application/x-www-form-urlencoded',
			     headers: {
			          Authorization: "Bearer " + "11286~TgOq16pPAwbBAdkxugJMPlI3j66cSNygSLtw0Ybmi8Hm6yRdC3DJu0ekYK1GdKfw"
			          //Origin: "file://"
			     },
			     beforeSend: function (xhr) {
			          xhr.setRequestHeader ("Authorization", "Bearer " + "11286~TgOq16pPAwbBAdkxugJMPlI3j66cSNygSLtw0Ybmi8Hm6yRdC3DJu0ekYK1GdKfw");
			          console.log("Before send token: " + "11286~TgOq16pPAwbBAdkxugJMPlI3j66cSNygSLtw0Ybmi8Hm6yRdC3DJu0ekYK1GdKfw");
			     },
			     success: function (data) {
			          console.log("Canvas Ajax call successfull");
			          console.log(JSON.stringify(data));
			      },
			      error: function (jqxhr, textStatus, errorThrown){
			          console.log("Canvas Ajax call failed!!!");
			          console.log("jqxhr: " + JSON.stringify(jqxhr));
			          console.log("textStatus: " + textStatus);
			          console.log("errorThrown: " + errorThrown);
			      }
			 })




			//$('#contTabla').html('data');

		}


     
     	

		onInit();


	});
	
