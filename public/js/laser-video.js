(function () {
    'use strict';

    var video = document.querySelector('[data-laser-video]');

    if (!video) {
        return;
    }

    var action = video.querySelector('[data-laser-video-action]');
    var endScreen = video.querySelector('.mohni-laser-video__end');
    var status = video.querySelector('[data-laser-video-status]');
    var player;
    var mode = 'ready';

    function cover(nextMode) {
        mode = nextMode;
        video.classList.remove('is-ready', 'is-paused', 'is-ended');

        if (!nextMode) {
            video.classList.remove('is-covered');
            endScreen.setAttribute('aria-hidden', 'true');
            return;
        }

        if (nextMode === 'ended') {
            status.textContent = 'Ready for another look?';
            action.textContent = 'Watch again';
        } else if (nextMode === 'paused') {
            status.textContent = 'Your video is paused.';
            action.textContent = 'Continue watching';
        } else {
            status.textContent = 'See the treatment in motion.';
            action.textContent = 'Play video';
        }

        video.classList.add('is-covered');
        video.classList.add('is-' + nextMode);
        endScreen.setAttribute('aria-hidden', 'false');
    }

    window.onYouTubeIframeAPIReady = function () {
        player = new window.YT.Player('laser-video-player', {
            host: 'https://www.youtube-nocookie.com',
            videoId: video.getAttribute('data-video-id'),
            playerVars: {
                controls: 1,
                iv_load_policy: 3,
                rel: 0,
                modestbranding: 1,
                playsinline: 1,
                origin: window.location.origin
            },
            events: {
                onReady: function (event) {
                    event.target.getIframe().setAttribute('title', 'Laser hair removal treatment video');
                },
                onStateChange: function (event) {
                    if (event.data === window.YT.PlayerState.PLAYING) {
                        cover(null);
                    } else if (event.data === window.YT.PlayerState.PAUSED) {
                        cover('paused');
                    } else if (event.data === window.YT.PlayerState.ENDED) {
                        cover('ended');
                    }
                }
            }
        });
    };

    action.addEventListener('click', function () {
        var previousMode = mode;

        if (!player) {
            return;
        }

        cover(null);

        if (previousMode === 'ended') {
            player.seekTo(0, true);
        }

        player.playVideo();
    });

    var api = document.createElement('script');
    api.src = 'https://www.youtube.com/iframe_api';
    api.async = true;
    document.head.appendChild(api);
}());
