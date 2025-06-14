<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Chat Clinique Espoir sante</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <style>

            .chat-panel {
                width: 100% !important;
                max-width: 100% !important;
                position: relative !important;
                transition: width 0.2s;
                z-index: 10;
                transition: width 0.2s;
                z-index: 3;
                height: 100vh;
                box-shadow: -2px 0 8px rgba(0, 0, 0, 0.04);
                display: flex;
                flex-direction: column;
                flex-shrink: 0;
            }

            .chat-panel .chat-panel-bg .chat-header {
                background-color: #1d7eff !important;
                border-bottom: 1px solid #eaeaea !important;
                display: flex !important;
                align-items: center;
                justify-content: space-between;
                padding: 0 24px !important;
                height: 68px !important;
                position: relative;
                z-index: 10;
            }
            .chat-panel .chat-panel-bg .chat-header img{
                width: 50px;
            }
        </style>

    </head>

    <body>
        <!-- Chat panel -->
        <div class="chat-panel" id="chatPanel">
            <div class="chat-panel-bg">
                <!-- Chat header -->
                <div class="chat-header">
                    <a class="chat-direction" id="chatOptionsBtn" title="Options">
                        <img src="{{ asset('assets/img/direction-right.png') }}" alt="back" />
                        </button>

                        <a class="chat-logo" id="chatOptionsBtn" title="Options">
                            <img src="{{ asset('assets/img/logo cercle bleu.png') }}" alt="back" />
                        </a>

                        <button class="more-options-button" id="chatOptionsBtn" title="Options">
                            <img src="{{ asset('assets/img/more.png') }}" alt="More options" />
                        </button>
                        <!-- Menu options -->
                        <div class="chat-options-menu" id="chatOptionsMenu">
                            <button type="button">Supprimer la
                                conversation</button>
                            <button type="button">Signaler un
                                abus</button>
                        </div>
                </div>
                <!-- Chat input area -->
                <div class="chat-input-area">
                    <div class="input-bg">
                        <input type="text" class="message-input" id="messageInput" placeholder="Message..." />
                        <button class="input-button send-button_sms" id="sendBtn" title="Envoyer">
                            <img src="{{ asset('assets/img/send_sms.png') }}" alt="Send message" />
                        </button>
                        <button class="input-button emoticon-button" id="emoticonBtn" title="Ajouter un emoji">
                            <img src="{{ asset('assets/img/Emoticon.png') }}" alt="Add emoticon" />
                        </button>
                        <button class="input-button attach-button" id="attachBtn" title="Joindre un fichier">
                            <img src="{{ asset('assets/img/Attach.png') }}" alt="Attach file" />
                        </button>
                        <!-- Emoticon popup -->
                        <div class="emoticon-popup" id="emoticonPopup">
                            <button type="button">😀</button>
                            <button type="button">😂</button>
                            <button type="button">😍</button>
                            <button type="button">😰</button>
                            <button type="button">👍</button>
                            <button type="button">🙏</button>
                            <button type="button">🎉</button>
                            <button type="button">😎</button>
                            <button type="button">😢</button>
                            <button type="button">❤️</button>
                        </div>
                    </div>
                </div>
                <!-- Chat messages -->
                <div class="chat-messages" id="chatMessages">
                    <!-- Messages dynamiques ici -->
                    <div class="message-container received-message">
                        <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}" alt="Marina's avatar" />
                        <div class="message-content">
                            <div class="sender-name">Marina Maliutina</div>
                            <div class="message-bubble">
                                <div class="message-text">Thank you for participating</div>
                            </div>
                            <div class="message-time">14:32:34</div>
                        </div>
                    </div>
                    <div class="message-container sent-message">
                        <div class="message-content">
                            <div class="sender-name">Vous</div>
                            <div class="message-bubble sent-bubble">
                                <div class="message-text sent-text">Thank you</div>
                            </div>
                            <div class="message-time sent-time">14:32:34</div>
                        </div>
                        <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}" alt="Your avatar" />
                    </div>
                    <div class="message-container received-message">
                        <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}" alt="Devon's avatar" />
                        <div class="message-content">
                            <div class="sender-name">Devon Hawkins</div>
                            <div class="message-bubble">
                                <div class="message-text">
                                    I can't hear it well<br />😰
                                </div>
                            </div>
                            <div class="message-time">14:32:34</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- JS pour interactions -->
        <script>
            // Redimensionnement du chat-panel
            (function() {
                const chatPanel = document.getElementById('chatPanel');
                const handle = document.getElementById('chatResizeHandle');
                let isResizing = false;
                let startX = 0;
                let startWidth = 0;

                handle.addEventListener('mousedown', function(e) {
                    isResizing = true;
                    startX = e.clientX;
                    startWidth = chatPanel.offsetWidth;
                    document.body.style.userSelect = 'none';
                });

                document.addEventListener('mousemove', function(e) {
                    if (!isResizing) return;
                    let newWidth = startWidth - (e.clientX - startX);
                    newWidth = Math.max(180, Math.min(480, newWidth));
                    chatPanel.style.width = newWidth + 'px';
                });

                document.addEventListener('mouseup', function() {
                    if (isResizing) {
                        isResizing = false;
                        document.body.style.userSelect = '';
                    }
                });
            })();



            // Toggle chat options menu
            document.getElementById('chatOptionsBtn').onclick = function(e) {
                e.stopPropagation();
                document.getElementById('chatOptionsMenu').classList.toggle('show');
            };
            document.addEventListener('click', function() {
                document.getElementById('chatOptionsMenu').classList.remove('show');
                document.getElementById('emoticonPopup').classList.remove('show');
            });

            // Emoticon popup
            document.getElementById('emoticonBtn').onclick = function(e) {
                e.stopPropagation();
                document.getElementById('emoticonPopup').classList.toggle('show');
            };
            document.getElementById('emoticonPopup').onclick = function(e) {
                e.stopPropagation();
            };

            // Insert emoticon in input
            document.querySelectorAll('#emoticonPopup button').forEach(btn => {
                btn.onclick = function() {
                    const input = document.getElementById('messageInput');
                    input.value += this.textContent;
                    input.focus();
                };
            });

            // Send message
            document.getElementById('sendBtn').onclick = function() {
                sendMessage();
            };
            document.getElementById('messageInput').addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            function sendMessage() {
                const input = document.getElementById('messageInput');
                const text = input.value.trim();
                if (!text) return;
                const chat = document.getElementById('chatMessages');
                const now = new Date();
                const time = now.toLocaleTimeString();
                const msg = document.createElement('div');
                msg.className = 'message-container sent-message';
                msg.innerHTML = `
                <div class="message-content">
                    <div class="sender-name">Vous</div>
                    <div class="message-bubble sent-bubble">
                        <div class="message-text sent-text">${escapeHtml(text)}</div>
                    </div>
                    <div class="message-time sent-time">${time}</div>
                </div>
                <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}" alt="Your avatar" />
            `;
                chat.appendChild(msg);
                input.value = '';
                chat.scrollTop = chat.scrollHeight;
            }

            function escapeHtml(text) {
                var div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }


            // Chat panel toggle (simulate)
            document.querySelector('.chat-button').onclick = function() {
                const panel = document.getElementById('chatPanel');
                panel.style.display = (panel.style.display === 'none' ? '' : 'none');
            };

            // Audio/Video/End
            document.querySelector('.audio-button').onclick = function() {
                this.classList.toggle('active');
                const icon = this.querySelector('.button-icon');
                if (this.classList.contains('active')) {
                    icon.src = "{{ asset('assets/img/AudioOn.png') }}";
                } else {
                    icon.src = "{{ asset('assets/img/AudioOff.png') }}";
                }
            };
            document.querySelector('.video-button').onclick = function() {
                this.classList.toggle('active');
                const icon = this.querySelector('.button-icon');
                if (this.classList.contains('active')) {
                    icon.src = "{{ asset('assets/img/CameraOn.png') }}";
                } else {
                    icon.src = "{{ asset('assets/img/CameraOff.png') }}";
                }
            };
            document.querySelector('.end-call-button').onclick = function(e) {
                e.preventDefault();
                showInfoModal(
                    'Quitter la réunion',
                    'Voulez-vous vraiment quitter la réunion ?',
                    [{
                            text: 'Annuler',
                            action: closeInfoModal,
                            class: 'btn-secondary'
                        },
                        {
                            text: 'Quitter',
                            action: function() {
                                // Ici, on quitte la réunion (redirection ou fermeture)
                                window.location.href = '/'; // Mets ici la page de destination après la réunion
                            },
                            class: 'btn-danger'
                        }
                    ]
                );
            };

            // Participants chevron (affiche/masque les avatars)
            document.querySelector('.participants-counter .chevron-icon').onclick = function() {
                const counter = document.getElementById('participantsCounter');
                counter.classList.toggle('collapsed');
            };


            // Fonction générique pour ouvrir le modal avec actions personnalisées
            function showInfoModal(title, message, buttons = [{
                text: 'Fermer',
                action: closeInfoModal,
                class: 'btn-primary'
            }]) {
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalBody').innerHTML = message;
                const footer = document.getElementById('modalFooter');
                footer.innerHTML = '';
                buttons.forEach(btn => {
                    const button = document.createElement('button');
                    button.textContent = btn.text;
                    button.className = btn.class || 'btn-primary';
                    button.onclick = function(e) {
                        e.preventDefault();
                        btn.action();
                    };
                    footer.appendChild(button);
                });
                document.getElementById('infoModal').style.display = 'flex';
            }

            function closeInfoModal() {
                document.getElementById('infoModal').style.display = 'none';
            }

            // Boutons de fermeture du modal
            document.getElementById('closeModalBtn').onclick = closeInfoModal;

            // Supprimer la conversation
            document.querySelectorAll('#chatOptionsMenu button')[0].onclick = function(e) {
                e.stopPropagation();
                showInfoModal(
                    'Suppression',
                    'Voulez-vous vraiment supprimer la conversation ?',
                    [{
                            text: 'Annuler',
                            action: closeInfoModal,
                            class: 'btn-secondary'
                        },
                        {
                            text: 'Supprimer',
                            action: function() {
                                document.getElementById('chatMessages').innerHTML = '';
                                closeInfoModal();
                                showInfoModal('Suppression', 'La conversation a été supprimée.');
                            },
                            class: 'btn-danger'
                        }
                    ]
                );
            };

            // Signaler un abus
            document.querySelectorAll('#chatOptionsMenu button')[1].onclick = function(e) {
                e.stopPropagation();
                showInfoModal('Signalement', 'Votre signalement a bien été pris en compte. Merci.');
            };

            // Bouton "out" (partager le lien)
            document.querySelector('.exit-button').onclick = function(e) {
                e.preventDefault();
                const link = window.location.href;
                showInfoModal(
                    'Partager la consultation',
                    `<div>Voici le lien à partager pour rejoindre la consultation :</div>
 <div style="margin:10px 0;word-break:break-all;"><strong>${link}</strong></div>
 <button onclick="navigator.clipboard.writeText('${link}');this.textContent='Lien copié !';return false;" class="btn-primary" style="margin-top:8px;">Copier le lien</button>`
                );
            };

            // Ajout de pièce jointe
            document.getElementById('attachBtn').onclick = function(e) {
                e.preventDefault();
                // Crée un input file invisible
                let fileInput = document.getElementById('hiddenFileInput');
                if (!fileInput) {
                    fileInput = document.createElement('input');
                    fileInput.type = 'file';
                    fileInput.id = 'hiddenFileInput';
                    fileInput.style.display = 'none';
                    document.body.appendChild(fileInput);
                    fileInput.onchange = function() {
                        if (fileInput.files.length > 0) {
                            const file = fileInput.files[0];
                            const chat = document.getElementById('chatMessages');
                            const now = new Date();
                            const time = now.toLocaleTimeString();
                            const msg = document.createElement('div');
                            msg.className = 'message-container sent-message';
                            msg.innerHTML = `
                    <div class="message-content">
                        <div class="sender-name">Vous</div>
                        <div class="message-bubble sent-bubble">
                            <div class="message-text sent-text">
                                <span class="file-attachment">📎 ${escapeHtml(file.name)}</span>
                            </div>
                        </div>
                        <div class="message-time sent-time">${time}</div>
                    </div>
                    <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}" alt="Your avatar" />
                `;
                            chat.appendChild(msg);
                            chat.scrollTop = chat.scrollHeight;
                        }
                    };
                }
                fileInput.click();
            };

            // Boutons de fermeture du modal
            document.getElementById('closeModalBtn').onclick = closeInfoModal;
            document.getElementById('closeModalBtn2').onclick = closeInfoModal;
        </script>



    </body>

</html>
