function changeMap(){
	var map = document.getElementById('new-map-iframe').value;
	if (map != ""){
		var json = {
			method:'changeMap',
			map:map
		};
			$.ajax({
            	url: '/Redirect.php',
            	data: 'order=' + JSON.stringify(json),
            	type: 'post',
            	success: function (output) {
            		alert(output);
            		document.getElementById('new-map-iframe').value = "";
            	}
        	});
		
	}
	else 
		alert('Перед тим як натискати на кнопку введіть новий iframe!');
}