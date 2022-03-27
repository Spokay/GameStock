let fullscreenBtn;
console.log('ouai');

if (typeof(document.querySelector('.fullscreen-button')) !== 'undefined') {
    fullscreenBtn = document.querySelectorAll('.fullscreen-button');
    let iFrame = document.querySelector('.game-display');
    for (let fullscreenBtnElement of fullscreenBtn) {
        fullscreenBtnElement.addEventListener('click', function(){
            iFrame.requestFullscreen();
        });
    }
}
console.log(fullscreenBtn);

