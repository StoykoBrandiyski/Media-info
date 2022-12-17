
window.onload = function() {
    $.ajax({
        type: "GET",
        url: MAIN_URL + "commentCount/"+movieId,
        dataType: 'json',
        success: function(data) {
            $('#comment-count').text("("+ data +")");
        },
        error: function(result) {
            alert("O no ima probem");
        }
    });
};