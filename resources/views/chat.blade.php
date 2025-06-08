<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Chat Clinique Espoir sante</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    </head>

    <body>
        {{-- <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Inter&display=swap" rel="stylesheet" /> --}}
        <div class="chat-container">
            <header class="chat-header">
                <img class="chat-direction" src="{{ asset('assets/img/direction-right.png') }}" />
                <div><img class="chat-logo" src="{{ asset('assets/img/logo cercle bleu.png') }}" alt="logo"></div>
                <img class="chat-menu" src="{{ asset('assets/img/menu.png') }}" />

                <!-- Menu des actions -->
                <div class="chat-actions-menu" id="chatActionsMenu">
                    <div class="action-item">
                        <img class="action-icon" src="{{ asset('assets/img/new.png') }}" alt="Nouvelle discussion" />
                        <span class="action-label">Nouvelle discussion</span>
                    </div>
                    <div class="action-item delete">
                        <img class="action-icon" src="{{ asset('assets/img/supp.png') }}"
                            alt="Supprimer la discussion" />
                        <span class="action-label">Supprimer la discussion</span>
                    </div>
                </div>
            </header>

            <main class="chat-main">
                <div class="chat-bubble bot">
                    {{-- <img src="group-1760.svg" class="bot-avatar" /> --}}
                    <div class="bot-message">
                        Bonjour et bienvenue à la Clinique Espoir sante !<br />
                        Comment puis-je vous aider aujourd’hui ?
                    </div>
                    <div class="bot-icons">
                        <img src="{{ asset('assets/img/copy.png') }}" class="bot-pointer" />
                        <img src="{{ asset('assets/img/good.png') }}" class="bot-pointer" />
                        <img src="{{ asset('assets/img/bad.png') }}" class="bot-pointer" />
                    </div>
                </div>

                <div class="chat-bubble user">
                    <div class="user-message">
                        Je voudrais savoir quelle sont vos horaires de travail
                    </div>
                    {{-- <img src="{{asset('assets/img/copy.png')}}" class="user-pointer" /> --}}
                    <div class="bot-icons user-actions">
                        <img src="{{ asset('assets/img/copy.png') }}" class="copy-icon" />
                        <div class="edit-icon">
                            <img src="{{ asset('assets/img/edit.png') }}" />
                        </div>
                    </div>
                </div>
            </main>

            {{-- <div class="tap-question">
                <input class="chat-footer" placeholder="Posez votre question ici ...">
                <div class="add-icon" style="cursor: pointer;">+</div>
                <div class="send-button">
                    <img src="{{ asset('assets/img/send.png') }}" />
                </div>
            </div> --}}

            <div class="tap-question">
                <div class="chat-footer">
                    <div class="add-icon">+</div>
                    <input type="text" class="chat-input" placeholder="Posez votre question ici ..." />
                    <div class="send-button">
                        <img src="{{ asset('assets/img/send.png') }}" />
                    </div>
                </div>
            </div>

        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const menuIcon = document.querySelector(".chat-menu");
                const menu = document.getElementById("chatActionsMenu");

                menuIcon.addEventListener("click", function(e) {
                    e.stopPropagation(); // Empêche la fermeture immédiate après ouverture
                    if (menu.style.display === "block") {
                        menu.style.display = "none";
                        menu.classList.remove("show-from-left");
                    } else {
                        menu.style.display = "block";
                        // Force le reflow pour redémarrer l’animation
                        void menu.offsetWidth;
                        menu.classList.add("show-from-left");
                    }
                });

                document.addEventListener("click", function(e) {
                    if (!menu.contains(e.target) && !menuIcon.contains(e.target)) {
                        menu.style.display = "none";
                        menu.classList.remove("show-from-left");
                    }
                });
            });


            // rediriger vers la page prec
            const backButton = document.querySelector(".chat-direction");
            backButton.addEventListener("click", function() {
                window.history.back(); // Revenir à la page précédente
            });
        </script>





        {{-- <script src="{{asset('assets/js/script.js')}}"> --}}



    </body>

</html>
