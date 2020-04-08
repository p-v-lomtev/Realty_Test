		$(document).ready(function(){
		 
		    $("#title_new").on('keyup',function(){
		    var $this = $(this),
            val = $this.val();
		    if(val.length >= 10) {
		            $('#title_new').removeClass('is-invalid');
    		        $('#title_new').addClass('is-valid'); 
    				} else {
    				$('#title_new').removeClass('is-valid');
    		        $('#title_new').addClass('is-invalid');
    				}
		    });
		    
		    $("#price_new").on('keyup',function(){
		    var $this = $(this),
            val = $this.val();
		    if(val.length >= 5) {
		            $('#price_new').removeClass('is-invalid');
    		        $('#price_new').addClass('is-valid'); 
    				} else {
    				$('#price_new').removeClass('is-valid');
    		        $('#price_new').addClass('is-invalid');
    				}
		    });
		    
		    $("#floor_new").on('keyup',function(){
		    var $this = $(this),
            val = $this.val();
		    if(val.length >= 1) {
		            $('#floor_new').removeClass('is-invalid');
    		        $('#floor_new').addClass('is-valid'); 
    				} else {
    				$('#floor_new').removeClass('is-valid');
    		        $('#floor_new').addClass('is-invalid');
    				}
		    });
		    
		    $("#area_new").on('keyup',function(){
		    var $this = $(this),
            val = $this.val();
		    if(val.length >= 1) {
		            $('#area_new').removeClass('is-invalid');
    		        $('#area_new').addClass('is-valid'); 
    				} else {
    				$('#area_new').removeClass('is-valid');
    		        $('#area_new').addClass('is-invalid');
    				}
		    });
		    
		    $("#live_area_new").on('keyup',function(){
		    var $this = $(this),
            val = $this.val();
		    if(val.length >= 1) {
		            $('#live_area_new').removeClass('is-invalid');
    		        $('#live_area_new').addClass('is-valid'); 
    				} else {
    				$('#live_area_new').removeClass('is-valid');
    		        $('#live_area_new').addClass('is-invalid');
    				}
		    });
		    
		    $("#address_new").on('keyup',function(){
		    var $this = $(this),
            val = $this.val();
		    if(val.length >= 5) {
		            $('#address_new').removeClass('is-invalid');
    		        $('#address_new').addClass('is-valid'); 
    				} else {
    				$('#address_new').removeClass('is-valid');
    		        $('#address_new').addClass('is-invalid');
    				}
		    });
		    
		    $("#description_new").on('keyup',function(){
		    var $this = $(this),
            val = $this.val();
		    if(val.length >= 1) {
		            $('#description_new').removeClass('is-invalid');
    		        $('#description_new').addClass('is-valid'); 
    				} else {
    				$('#description_new').removeClass('is-valid');
    		        $('#description_new').addClass('is-invalid');
    				}
		    });
		    
		    
			$('#btn_submit').click(function(){
			    
			   // собираем данные с формы
			
				var formData = new FormData();
                formData.append('image_file', $('#image_file').prop('files')[0]);
                formData.append('title_new', $('#title_new').val());
                formData.append('description_new', $('#description_new').val());
                formData.append('price_new', $('#price_new').val());
                formData.append('floor_new', $('#floor_new').val());
                formData.append('area_new', $('#area_new').val());
                formData.append('live_area_new', $('#live_area_new').val());
                formData.append('address_new', $('#address_new').val());
                formData.append('city_new', $('#city_new').val());
                formData.append('realty_new', $('#realty_new').val());

				// отправляем данные
				$.ajax({
					url: '/wp-content/themes/understrap-child/handler/send.php' , // куда отправляем
					type: "post", // метод передачи
					cache: false,
                    processData: false, // Don’t process the files
                    contentType: false,
                    dataType: "json", // тип передачи данных
					data: formData,
					// после получения ответа сервера
					success: function(data){
						$('.messages').html(data.result); // выводим ответ сервера
						$('.messages').html(data.error); // выводим ответ сервера

					}
				});
			});
		});