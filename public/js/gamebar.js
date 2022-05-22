let fullscreenBtn;
let likeBtn;


fullscreenBtn = document.querySelector('.fullscreen-button');
    let iFrame = document.querySelector('.game-display');
    fullscreenBtn.addEventListener('click', function(){
        iFrame.requestFullscreen();
    });

    $('.like-button').on('click', function(){
        $.ajax({
            method: 'get',
            url: '/like/'+$(this).val(),
            data: {'isSelected': $(this).hasClass("selected")},
            success: function () {
                $('.like-button').toggleClass("selected");
            }
        });
    });

/*$(function() {
    $(".like-button").on("click", function() {
        $(this).toggleClass("is-active");
    });
});*/




