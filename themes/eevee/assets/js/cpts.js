jQuery(document).ready(($)=>{
	const the_filter = ()=>{
		// console.log("Filtering...");
		$.ajax({
			url: $('#filter').attr('action'),
			data: $('#filter').serialize(), // form data
			type: $('#filter').attr('method'), // POST
			success: function(data){
				$('.homilies').html(data); // insert data
			}
		});
		// console.log($('#filter').serialize());
	}

  $('#filter select').on('change', (e)=>{
    e.preventDefault();
    the_filter();
  });

	// $('#filter select').change((e)=>{
	// 	e.preventDefault();
	// 	the_filter();
	// });

	$('#filter #filterSubmit').on('click', (e)=>{
		e.preventDefault();
    the_filter();
	});

	// $('#filter #filterSubmit').click((e)=>{
	// 	e.preventDefault();
  //   the_filter();
	// });
})

// jQuery(document).ready(($) => {
// 	function the_filter(){
// 		console.log("Filtering...");
// 		var filter = $('#filter');
// 		$.ajax({
// 			url: filter.attr('action'),
// 			data: filter.serialize(), // form data
// 			type: filter.attr('method'), // POST
// 			success: function(data){
// 				$('.homilies').html(data); // insert data
// 			}
// 		});
// 		console.log(filter.serialize());
// 	}
//
// 	$('#filter select').change(function(event){
// 		event.preventDefault();
// 		the_filter();
// 	});
//
// 	$('#filter #filterSubmit').click(function(){
// 		event.preventDefault();
//
// 		var filter = $('#filter');
// 		$.ajax({
// 			url: filter.attr('action'),
// 			data: filter.serialize(), // form data
// 			type: filter.attr('method'), // POST
// 			success: function(data){
// 				$('.homilies').html(data); // insert data
// 			}
// 		});
// 		console.log(filter.serialize());
// 	});
// })
