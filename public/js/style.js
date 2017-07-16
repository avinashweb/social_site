var post_id = 0;
var postBodyElement = null;
$("a#editbtn").click(function(event){
	event.preventDefault();
	postBodyElement = event.target.parentNode.parentNode.parentNode.childNodes[1];
	var postBody = postBodyElement.textContent;
	post_id = event.target.parentNode.parentNode.parentNode.dataset['postid'];
	$("#edit-content").val(postBody);
	$("#edit_model").modal('show');
});

$("#save-change").click(function(){
	$.ajax({
		method: 'post',
		url: url,
		data: {content: $("#edit-content").val(), postId: post_id, _token: token },
		success: function(data){
			$(postBodyElement).text(data);
			$("#edit_model").modal('hide');
		}

	});
});

/* Like Post */

function like_btn(e){
	$.ajax({
		method: 'POST',
		url: like_url,
		data: {user_id: user_id, post_id: e, _token: token },
		success: function(data){
			$("#like-btn_"+e).text(data);
		}
	});
}