<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Visio conference</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

    <body>
        <div class="video-conference">
            
            <!-- Participants sidebar -->
            <div class="participants-sidebar">
                <div class="participants-bg"></div>
                <div class="participants-list">
                    <!-- Host participant -->
                    <div class="participant-thumbnail">
                        <img class="participant-video" src="{{ asset('assets/img/doctor3.png') }}"
                            alt="Marina's video" />
                        <div class="participant-status">
                            <div class="status-badge host-badge">
                                <div class="badge-text">Createur</div>
                            </div>
                        </div>
                    </div>
                    <!-- Current user participant -->
                    <div class="participant-thumbnail">
                        <div class="participant-video-off"></div>
                        <div class="participant-initial">J</div>
                        <div class="participant-status">
                            <div class="status-badge user-badge">
                                <div class="badge-text">Me</div>
                            </div>
                            <div class="status-badge">
                                <div class="participant-name">Vous</div>
                            </div>
                        </div>
                        <div class="active-speaker-indicator"></div>
                    </div>
                    <!-- Other participants -->
                    <div class="participant-thumbnail">
                        <img class="participant-video" src="{{ asset('assets/img/doctor4.png') }}" alt="Emil's video" />
                        <div class="participant-status">
                            <div class="status-badge">
                                <div class="participant-name">Emil</div>
                            </div>
                        </div>
                    </div>
                    <div class="participant-thumbnail">
                        <div class="participant-video-off"></div>
                        <div class="participant-initial">DH</div>
                        <div class="participant-status">
                            <div class="status-badge">
                                <div class="participant-name">Devon Hawkins</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chat panel -->
            <div class="chat-panel" id="chatPanel">
                <div class="chat-resize-handle" id="chatResizeHandle"></div>
                <div class="chat-panel-bg">
                    <!-- Chat header -->
                    <div class="chat-header">
                        <h2 class="chat-title">Chat</h2>
                        <div class="participants-counter" id="participantsCounter">
                            <img class="participant-icon" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Participant" />
                            <img class="participant-icon" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Participant" />
                            <img class="participant-icon" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Participant" />
                            <img class="participant-icon" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Participant" />
                            <img class="participant-icon" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Participant" />
                            <div class="participant-count">12</div>
                            <img class="chevron-icon" src="{{ asset('assets/img/chevron.png') }}" alt="Show more" />
                        </div>
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
                            <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Marina's avatar" />
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
                            <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Your avatar" />
                        </div>
                        <div class="message-container received-message">
                            <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Devon's avatar" />
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

            <!-- Control toolbar -->
            <div class="control-toolbar">
                <button class="control-button audio-button" title="Activer/Désactiver le micro">
                    <div class="button-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/AudioOff.png') }}" alt="Toggle audio" />
                </button>
                <button class="control-button video-button" title="Activer/Désactiver la caméra">
                    <div class="button-bg video-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/CameraOff.png') }}" alt="Toggle video" />
                </button>
                <button class="control-button end-call-button" title="Terminer l'appel">
                    <div class="end-call-bg"></div>
                    <img class="end-call-icon" src="{{ asset('assets/img/call.png') }}" alt="End call" />
                </button>
                <button class="control-button chat-button" title="Afficher/Masquer le chat">
                    <div class="button-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/Chat.png') }}" alt="Open chat" />
                    <div class="notification-indicator"></div>
                </button>
                <button class="control-button exit-button" title="Partager le lien de la consultation">
                    <div class="button-bg exit-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/out.png') }}" alt="Exit call" />
                </button>
            </div>

        </div>

        <div class="modal-overlay" id="infoModal" style="display: none">
            <div class="modal-success" style="gap: 10px;">
                <div class="modal-header">
                    <div class="success-title">
                        <img class="icon-check" src="{{ asset('assets/img/check-circle.png') }}" alt="Icone" />
                        <h2 class="modal-title" id="modalTitle">Information</h2>
                    </div>
                    <img src="{{ asset('assets/img/fermer.png') }}" alt="Fermer" class="icon-close close-button"
                        id="closeModalBtn" />
                </div>
                <hr class="modal-separator" />
                <div class="modal-body" id="modalBody">
                    <button class="btn-secondary close-button">Supprimer</button>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <button class="btn-primary close-button" id="closeModalBtn2">Annuler</button>
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
