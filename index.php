<?php
$cache = time();
?><!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="manifest" href="/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Dul N'Nouk White</title>
    <meta name="description" content="Os Dul and Nouk White são uma banda de rock alternativo madeirense com um repertório constituído, maioritariamente, por temas originais que visitam géneros musicais bastante distintos como o rock, o fado, o blues, o pop, o jazz e a música do mundo.">
    <meta name="keywords" content="dul organic music madeira rock pop portugal">
    <meta name="author" content="dul and nouk white">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link  rel="stylesheet" href="/css/index.css?<?php echo $cache; ?>"/>
    <link rel="icon" type="image/jpg" href="img/favicon.jpg" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
<main>
    <header>
        <img src="img/fundo1.jpg" alt="Dul N'Nouk White"/>
    </header>
    <article>
        <h1>dul and nouk white</h1>
        <p>
            Os Dul and Nouk White são uma banda de rock alternativo madeirense com um repertório constituído, maioritariamente, por temas originais que visitam géneros musicais bastante distintos, tal como o rock, o fado, o blues, o pop, o jazz e a música do mundo. Contudo, a roupagem envolta a este repertório eclético faz com que a banda agregue algumas características sonoras que dão origem às suas peculiares composições, as quais, ao vivo, se tornam em autênticas Viagens.
            </p>
        <p>
            [ <i>" A música dos DUL é uma experiência singular através de temas que sugerem vários tipos de sentimentos. Visitam a alegria e a intervenção, com temas como a “Marcha do Povo Sangra” e “Fun&Farra”, abraça com bastante força a intensidade de uma viagem tribal, com temas como a “Pássaro de Corda”, e se recolhem novamente na introspeção sobre o amor, em temas como a “About a Boy” e o "Amor Epitelial". Quase no final desta eclética viagem emocional, dão também a provar uma pequena dose de saudosismo e nostalgia que se escondem, inocentemente, por detrás de interpretações muito próprias de temas como a “Gaivota”, de Amália Rodrigues, e “O Prelúdio Para a Laurindinha”, tema que junta a interpretação do conhecido tema "Laurindinha” de António Mourão, com um prelúdio criado pela própria banda. ” </i>&nbsp] — (in press)
        </p>
    </article>
    <footer>
        <a  href="https://www.facebook.com/dulandnoukwhite">
            <ion-icon name="logo-facebook"></ion-icon>
        </a>
        <a href="https://www.instagram.com/dulandnoukwhiteband/">
            <ion-icon name="logo-instagram"></ion-icon>
        </a>
        <a href="https://www.youtube.com/c/DulNNoukWhite">
            <ion-icon name="logo-youtube"></ion-icon>
        </a>
    </footer>
</main>
<audio>
    <source src="/mp3/Hino%20Loop.wav" data-out="8" type="audio/mpeg">
    <source src="/mp3/Fun%20&%20Farra%203%20(mp3cut.net).wav" data-out="4" type="audio/mpeg">
</audio>
<section class="permission muted">
    <ion-icon name="volume-mute-outline"></ion-icon>
    <ion-icon name="volume-off-outline"></ion-icon>
</section>
<script type="text/javascript">
    let volume = -5;
    let step = 5;
    document.querySelector('audio').addEventListener('timeupdate', function(e) {
        volume = volume + step;
        if (volume > 100) {
            volume = 100;
        }
        if (volume < 0) {
            volume = 0;
        }
        console.log(volume);
        document.querySelector('audio').volume = volume / 100;
    })
    document.querySelector( 'section.permission' ).addEventListener( 'click', function() {

        new Promise(function(resolve) {
            let audio = document.querySelector('audio');
            audio.addEventListener('ended', function() {
                volume = -5;
                step = 5;
                let currentTrack = audio.querySelector('.active');
                let nextTrack = currentTrack.nextElementSibling;
                if (nextTrack) {
                    currentTrack.classList.remove('active');
                    nextTrack.classList.add('active');
                    audio.src = nextTrack.src;
                    audio.onloadedmetadata = function() {
                        setTimeout(function() {
                            step = -5;
                        }, (audio.duration - Number(nextTrack.dataset.out)) * 1000);
                        audio.play().then(function() {

                        });
                    };
                } else {
                    let firstSource = audio.querySelector('source:first-child');
                    currentTrack.classList.remove('active');
                    firstSource.classList.add('active');
                    audio.src = firstSource.src;
                    audio.onloadedmetadata = function() {
                        setTimeout(function() {
                            step = -5;
                        }, (audio.duration - Number(firstSource.dataset.out)) * 1000);
                        audio.play().then(function() {

                        });
                    };
                }
            });
            if (audio.paused) {
                let firstSource = audio.querySelector('source:first-child');
                firstSource.classList.add('active');
                audio.paused = false;
                audio.src = firstSource.src;
                audio.onloadedmetadata = function() {
                    setTimeout(function() {
                        step = -5;
                    }, (audio.duration - Number(firstSource.dataset.out)) * 1000);
                    audio.play().then(function() {
                        resolve();
                    });
                };
            } else {
                audio.pause();
                audio.paused = true;
                resolve();
            }


        }).then(function() {
            document.querySelector('section.permission').classList.toggle('muted');
        })
    });
</script>
</body>
</html>