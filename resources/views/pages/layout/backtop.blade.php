<div id="backtop">
		<ion-icon name="chevron-up-outline"></ion-icon>
</div>

<style type="text/css">
	#backtop{
		width: 50px;
		height: 50px;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: tomato;
		color: #fff;
		border-radius: 50%;
		font-size: 30px;
		position: fixed;
		bottom: 40px;
		right: 20px;
		cursor: pointer;
	}
</style>
<script>
	$(document).ready(function(){
		$('#backtop').fadeOut();
		$(window).scroll(function(){
			if($(this).scrollTop()){
				$('#backtop').fadeIn();
			}else{
				$('#backtop').fadeOut();
			}
		});
		$('#backtop').click(function() {
			$('body, html').animate({scrollTop: 0}, 300);
		});
	});
</script>