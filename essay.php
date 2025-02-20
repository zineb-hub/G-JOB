
<script>
function addComments() {

$.ajax({
	url:"add_comments.php",
	method:"POST",
	data: {postID: $postID },
	success:function(data){
	 $('.comment-section').html(data);
	}
   })
}
setInterval(() => {
	addComments();
}, 5000);
</script>