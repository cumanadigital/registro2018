<<!-- script type="text/javascript" src="vistas/demo/jquery.js"></script>
<script type="text/javascript" src="vistas/demo/photobooth_min.js"></script>
<link type="text/css" rel="stylesheet" media="screen" href="vistas/demo/page.css" />
 -->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="photobooth_min.js"></script>
<link type="text/css" rel="stylesheet" media="screen" href="page.css" />

<div id="wrapper">
	<div id="example"></div>
	<div id="gallery"></div>			
</div>
<script type="text/javascript">
$(function(){
	$( '#example' ).photobooth().on( "image", function( event, dataUrl ){
		$( "#gallery" ).show().html( '<img src="' + dataUrl + '" >');
	});
	// $( '#example' ).data( "photobooth" ).resize( 400, 300 );s
});
</script>