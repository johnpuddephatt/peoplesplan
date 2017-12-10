
// $('.laravelLike-icon').on('click', function(){

var likeIcons = document.querySelectorAll('.like-icon');

for (var i = 0; i < likeIcons.length; i++) {

  likeIcons[i].addEventListener('click', function(){

    if(!this.classList.contains('enabled')) {
      return false;
    }

    var likeable_id = this.dataset.id;
    var likeable_type = this.dataset.type;
    var vote = this.dataset.vote;
    $.ajax({
      method: "get",
      url: "/laravellikecomment/like/vote",
      data: {likeable_id: likeable_id, likeable_type: likeable_type, vote: vote},
      dataType: "json" })
    .done(function(msg){
      if(msg.flag == 1){
        console.log('up: ' + msg.upvote_delta + ' .... down: ' + msg.downvote_delta);
        if(msg.upvote_delta == 1) {
          document.getElementById(likeable_id+'-'+ likeable_type +'-like').classList.add('active');
        }
        if(msg.upvote_delta == -1) {
          document.getElementById(likeable_id+'-'+ likeable_type +'-like').classList.remove('active');
        }
        if(msg.downvote_delta == 1) {
          document.getElementById(likeable_id+'-'+ likeable_type +'-dislike').classList.add('active');
        }
        if(msg.downvote_delta == -1) {
          document.getElementById(likeable_id+'-'+ likeable_type +'-dislike').classList.remove('active');
        }
      }
      else if(msg.flag == 0) {
        window.location = '/login';
      }
    })
    .fail(function(msg){
      alert('Error occured! See console');
    });
  });
}

$(document).on('click', '.reply-button', function(){
  if($(this).hasClass("disabled"))
      return false;
  var toggle = $(this).data('toggle');
  $("#"+toggle).fadeToggle('normal');
});

var entityMap = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;', '/': '&#x2F;', '`': '&#x60;', '=': '&#x3D;' };

function escapeHtml (string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}

$(document).on('submit', '.comment-form', function(){
    var thisForm = $(this);
    var parent_id = $(this).data('parent');
    var commentable_id = $(this).data('id');
    var commentable_type = $(this).data('type');
    var comment = $('textarea#'+parent_id+'-textarea').val();

    $.ajax({
         method: "get",
         url: "/laravellikecomment/comment/add",
         data: {parent_id: parent_id, comment: comment, commentable_id: commentable_id, commentable_type: commentable_type},
         dataType: "json"
      })
      .done(function(msg){
        $(thisForm).toggle('normal');

        var newComment = '<div class="comment comment-new" id="comment-'+msg.id+'"><a class="avatar"><img src="'+msg.userPic+'"></a><div class="content"><a class="author">'+msg.userName+'</a><div class="metadata"><span class="date">Today at 5:42PM</span></div><div class="text">'+escapeHtml(msg.comment)+'</div><div class="actions"></div></div><div class="ui threaded comments" id="'+commentable_id+'-comment-'+msg.id+'"></div></div>';
        $('#'+commentable_id+'-comment-'+parent_id).prepend(newComment);
        $('textarea#'+parent_id+'-textarea').val('');
      })
      .fail(function(msg){
        alert('Error occured! See console');
        console.log(msg);
      });

    return false;
});