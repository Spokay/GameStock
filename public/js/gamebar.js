let fullscreenBtn;
let likeBtn;

/*if (typeof(document.querySelector('.fullscreen-button')) !== 'undefined') {
    fullscreenBtn = document.querySelectorAll('.fullscreen-button');
    let iFrame = document.querySelector('.game-display');
    for (let fullscreenBtnElement of fullscreenBtn) {
        fullscreenBtnElement.addEventListener('click', function(){
            iFrame.requestFullscreen();
        });
    }
}*/
if (typeof(document.querySelector('.fullscreen-button')) !== 'undefined') {
    fullscreenBtn = document.querySelector('.fullscreen-button');
    let iFrame = document.querySelector('.game-display');
    fullscreenBtn.addEventListener('click', function(){
        iFrame.requestFullscreen();
    });
}
if (typeof(document.querySelector('.like-button')) !== 'undefined') {
    likeBtn = document.querySelector('.like-button');

}



