window.onload = function() {
    $.ajax({
        type: "GET",
        url: "http://localhost:8081/media-info/public/commentCount/"+movieId,
        dataType: 'json',
        success: function(data) {
            $('#comment-count').text("("+ data +")");
        },
        error: function(result) {
            alert("O no ima probem");
        }
    });
};