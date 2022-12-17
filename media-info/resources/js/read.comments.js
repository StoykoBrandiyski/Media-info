const MAIN_URL = window.location.origin + "/Media-info/media-info/public/";

const showButtonComment = document.getElementById("showCommentLink");
var movieId =document.querySelector("#reader").getAttribute("data-search");

showButtonComment.addEventListener('click',function(){

    const container = $(".container-comments");

    if ($(".container-comments div").hasClass("card p-3")) {
        container.toggleClass("hiden");
        return;
    } else {

        var response = "";
        $.ajax({
            type: "GET",
            url: MAIN_URL + "comments/"+movieId,
            
            dataType: 'json',
            beforeSend: function() {
                container.html("Loading..");
            },
            success: function(data) {
                container.empty();
                var countItem = 0;
                for (var c in data) {

                    var image = data[c].avatar;

                    if (image == null) {
                        image = "";
                    }
                    response += "<div class='card mb-3 p-3'><div class='d-flex'><div class='p-3'>" +
                        "<img src='" + image + "' width='30' class='rounded-circle mr-2'>" +
                        "<p class='font-weight-bold text-primary'>" + data[c].username + "</p></div>" +
                        "<p class='p-1' style='width: 70%'>" + data[c].content + "</p><p>" + data[c]
                        .created_at + "</p></div></div>";
                }

            $(response).appendTo($(".container-comments"));
            },
            error: function(result) {
                alert("O no ima probem");
            }
        });
    }


});
