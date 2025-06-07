<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Chat Clinique Toutsaint</title>
        <style>
            /* Reset et box sizing */
            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                background: #f1efef;
                font-family: 'Inter-Regular', sans-serif;
                height: 1624px;
                position: relative;
                overflow-x: hidden;
            }

            .chat {
                position: relative;
                height: 1624px;
                background: #f1efef;
                overflow: hidden;
                max-width: 1440px;
                margin: 0 auto;
            }

            .chat img{
                width: 20px;
                height: 20px
            }

            /* HEADER bleu */
            .rectangle-51 {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                max-width: 1440px;
                height: 126px;
                background: #1d77fe;
                z-index: 10;
            }

            .logo {
                position: absolute;
                top: 47px;
                left: 50%;
                transform: translateX(-50%);
                color: white;
                font-family: 'ArchivoBlack-Regular', sans-serif;
                font-size: 32px;
                letter-spacing: 0.2em;
                font-weight: 400;
                width: 221px;
                height: 58px;
                text-align: center;
                line-height: 58px;
                z-index: 11;
            }

            /* BULLE DE MESSAGE 1 (réception) */
            .group-142 {
                position: absolute;
                top: 358px;
                left: 72px;
                width: 845px;
                height: 220px;
                display: flex;
                align-items: center;
                gap: 20px;
                z-index: 5;
            }

            .group-68 {
                position: relative;
                width: 797px;
                height: 154px;
            }

            .rectangle-55 {
                position: absolute;
                top: 0;
                left: 0;
                width: 797px;
                height: 154px;
                background: white;
                border-radius: 30px;
                z-index: 1;
            }

            .bonjour-et-bienvenue-la-clinique-toutsaint-comment-puis-je-vous-aider-aujourd-hui {
                position: absolute;
                top: 46px;
                left: 24px;
                right: 24px;
                color: black;
                font-size: 24px;
                font-weight: 400;
                line-height: 1.4;
                white-space: pre-wrap;
                font-family: 'Inter-Regular', sans-serif;
                z-index: 2;
            }



            /* Groupe image (bouton ou icône) */
            .group-176 {
                widows: 20px;
                height: 20px;
            }

            /* BULLE DE MESSAGE 2 (envoi) */
            .group-143 {

            }

            .group-71 {
                position: relative;
                width: 797px;
                height: 154px;
            }

            .rectangle-54 {
                position: absolute;
                top: 0;
                left: 0;
                width: 797px;
                height: 154px;
                background: #1d77fe;
                border-radius: 30px;
                z-index: 1;
            }

            .je-voudrais-savoir-quelle-sont-vos-horaires-de-travail {
                position: absolute;
                top: 54px;
                left: 87px;
                right: 30px;
                color: black;
                font-family: 'Inter-Regular', sans-serif;
                font-size: 20px;
                font-weight: 400;
                line-height: 1.2;
                z-index: 2;
            }



            /* Group 177 (icônes) */
            .group-177 {
                position: absolute;
                top: 786px;
                left: 1210px;
                width: 124px;
                height: 45px;
                display: flex;
                gap: 34px;
                z-index: 7;
            }

            .solar-copy-bold {
                width: 45px;
                height: 45px;
                overflow: visible;
            }

            .lucide-edit {
                width: 45px;
                height: 45px;
                overflow: visible;
            }

            .group {
                position: relative;
                width: 79.15%;
                height: 79.15%;
                top: 8.35%;
                left: 12.5%;
                overflow: visible;
            }

            /* Flèche direction droite grande */
            .wi-direction-right {
                position: absolute;
                width: 178.33px;
                height: 178.33px;
                top: 152.7px;
                left: 195.32px;
                transform: translate(-178.32px, -152.7px);
                overflow: visible;
                aspect-ratio: 1;
                z-index: 8;
            }

            /* Menu 3 points en haut à droite */
            .qlementine-icons-menu-dots-16 {

            }

            /* FOOTER barre de saisie */
            .footer-bar {
                position: fixed;
                bottom: 0;
                left: 35px;
                width: calc(100% - 70px);
                max-width: 1360px;
                height: 112px;
                background: white;
                border-radius: 50px;
                display: flex;
                align-items: center;
                padding: 0 20px;
                gap: 20px;
                box-sizing: border-box;
                z-index: 20;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            }

            .footer-plus {
                font-size: 70px;
                color: #1d77fe;
                font-weight: 400;
                user-select: none;
                cursor: pointer;
                flex-shrink: 0;
                line-height: 1;
            }

            .footer-input {
                font-family: 'Inter-Regular', sans-serif;
                font-size: 24px;
                color: #757575;
                letter-spacing: 0.2em;
                font-weight: 400;
                border: none;
                outline: none;
                background: transparent;
                flex-grow: 1;
                padding: 12px 15px;
            }

            .footer-send {
                width: 97px;
                height: 112px;
                background: #1d77fe;
                border-radius: 0 50px 50px 0;
                border: none;
                cursor: pointer;
                flex-shrink: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .footer-send img {
                width: 45px;
                height: 45px;
                object-fit: contain;
            }
        </style>
    </head>

    <body>
        <div class="chat">
            <div class="rectangle-51"></div>
            <div class="logo">LOGO</div>

            <!-- Message reçu -->
            <div class="group-142">
                <div class="group-68">
                    <div class="rectangle-55">
                        <div class="bonjour-et-bienvenue-la-clinique-Toutsaint-comment-puis-je-vous-aider-aujourd-hui">
                            Bonjour et bienvenue à la Clinique !
                            <br />
                            Comment puis-je vous aider aujourd’hui ?
                        </div>
                    </div>
                </div>
            </div>
            <img class="polygon-1" src="{{ asset('assets/img/bad.png') }}" alt="Flèche message reçu" />
            <img class="group-176" src="{{ asset('assets/img/good.png') }}" alt="Icône message reçu" />

            <!-- Message envoyé -->
            <div class="group-143">
                <div class="group-71">
                    <div class="rectangle-54"></div>
                    <div class="je-voudrais-savoir-quelle-sont-vos-horaires-de-travail">
                        Je voudrais savoir quelle sont vos horaires de travail
                    </div>
                </div>
            </div>
            <img class="polygon-2" src="{{ asset('assets/img/copy.png') }}" alt="Flèche message envoyé" />

            <div class="group-177">
                <img class="solar-copy-bold" src="{{ asset('assets/img/copy.png') }}" alt="Copier" />
                <div class="lucide-edit">
                    <img class="group" src="{{ asset('assets/img/edit.png') }}" alt="Modifier" />
                </div>
            </div>

            <img class="wi-direction-right" src="{{ asset('assets/img/direction-right.png') }}" alt="Flèche droite" />
            <img class="qlementine-icons-menu-dots-16" src="{{ asset('assets/img/menu.png') }}" alt="Menu points" />

            <!-- Barre de saisie (footer) -->
            <div class="footer-bar">
                <div class="footer-plus">+</div>
                <input class="footer-input" type="text" placeholder="Posez votre question ici ..." />
                <button class="footer-send" aria-label="Envoyer">
                    <img src="{{ asset('assets/img/send.png') }}" alt="Envoyer" />
                </button>
            </div>
        </div>
    </body>

</html>
