
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CI Pusher</title>
</head>
<body>
	<form class="form" action="<?php echo base_url(); ?>index.php/welcome/process" method="post">
	<input type="text" name="message" value="">
	<button type="submit" name="button">Submit</button>
	</form>
	
	<div id="message">
	
	</div>

	<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>
	$('.form').submit(function(e){
		e.preventDefault();

		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: new FormData($(this)[0]),
			contentType: false,
			processData: false,
			success: function(data){
			}
		})
	})

	Pusher.logToConsole = true;

    var pusher = new Pusher('943f3528bdcb04af4fbc', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('ci_pusher');
    channel.bind('my-event', function(data) {
      $('#message').append('<div' +data.message+ '</div>');
    });
	</script>
</body>
</html>