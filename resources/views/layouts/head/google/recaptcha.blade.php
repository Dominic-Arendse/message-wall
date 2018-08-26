<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	function onSubmitForRecaptcha(token) {
		if (document.getElementById("message").value.length > 0) {
			var formData = JSON.stringify({
				"message": document.getElementById("message").value
			});
			
		    $.ajax({
		        type: 'PUT',
		        url: '{{ url('message') }}',
		        data: formData,
  				contentType : "application/json",
		        success: function (data) {
		        	data = JSON.parse(data).data;
		        	var note = document.createElement("li"),
		        		aHref = document.createElement("a"),
		        		noteMessage = document.createElement("p");

		        	noteMessage.innerHTML = data.message;
		        	aHref.appendChild(noteMessage);
		        	aHref.setAttribute("href", "#");
		        	note.appendChild(aHref);

		        	document.getElementById("messages_list").prepend(note);
		        	document.getElementById("message").value = "";
		        },
		        error: function (data) {
		        	//console.log(data);
		        }
		    });
		} else {
			M.toast({html: 'You need to leave a message first!'})
		}
	}
</script>