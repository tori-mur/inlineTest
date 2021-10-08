$(function(){$('.who').bind("change keyup input click", function(){if(this.value.length >= 1){$.ajax({
 type: 'post',
 url: "search.php",
 data: {'referal':this.value},
 response: 'text',
 success: function(data){
$(".search_result").html(data).fadeIn();}})}})
 $(".search_result").hover(function(){$(".who").blur();})
 $(".search_result").on("click", "li", function(){s_user = $(this).text();$(".search_result").fadeOut();
})})
