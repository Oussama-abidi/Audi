const video = document.getElementById('background-video');
const videoControl = document.getElementById('video-control');
const controlIcon = document.getElementById('control-icon');

videoControl.addEventListener('click', () => {
  if (video.paused) {
    video.play();
    controlIcon.textContent = '||'; 
  } else {
    video.pause();
    controlIcon.textContent = '▶';
  }
});
