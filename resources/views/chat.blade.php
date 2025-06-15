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

            .chat-panel .chat-btn-menu {
                position: relative
            }

            .chat-panel .chat-panel-bg .chat-header {
                background-color: #1d7eff !important;
                border-bottom: 1px solid #eaeaea !important;
                display: flex !important;
                align-items: center;
                justify-content: space-between !important;
                padding: 0 24px !important;
                height: 68px !important;
                position: relative;
                z-index: 10;
            }

            .chat-panel .chat-panel-bg .chat-header img {
                width: 50px;
            }

            .chat-panel .chat-panel-bg .chat-header .menu-btn {
                width: 30px !important;
                cursor: pointer;
            }

            .chat-panel .chat-panel-bg .options-menu {
                display: none;
                background-color: #fff;
                width: 200px;
                border-radius: 8px;
                padding: 0;
                cursor: pointer;
                position: absolute;
                right: 0;
            }

            .options-menu button {
                background: none !important;
                border: none !important;
                width: 100%;
                text-align: left;
                padding: 10px 16px;
                font-size: 12px;
                color: #757575;
                cursor: pointer;
                transition: background 0.2s;
            }
            .options-menu.show {
                display: block!important;
            }

            .options-button {
                background: none !important;
                border: none !important;
            }

            .options-menu button:hover {
                background: #f0f8ff;
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

                        <div class="chat-btn-menu">
                            <button class="options-button" id="chatOptionsBtn" title="Options">
                                <img class="menu-btn" src="{{ asset('assets/img/menu.png') }}" alt="More options" />
                            </button>
                            <!-- Menu options -->
                            <div class="options-menu" id="chatOptionsMenu">
                                <button type="button">Supprimer la
                                    conversation</button>
                                <button type="button">Signaler un
                                    abus</button>
                            </div>
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
            // Toggle chat options menu
            document.querySelector('.options-button').onclick = function(e) {
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

            // Supprimer la conversation
            document.querySelectorAll('#chatOptionsMenu button')[0].onclick = function(e) {
                e.stopPropagation();
                if (confirm('Voulez-vous vraiment supprimer la conversation ?')) {
                    document.getElementById('chatMessages').innerHTML = '';
                    alert('La conversation a été supprimée.');
                }
            };

            // Signaler un abus
            document.querySelectorAll('#chatOptionsMenu button')[1].onclick = function(e) {
                e.stopPropagation();
                alert('Votre signalement a bien été pris en compte. Merci.');
            };

            // Ajout de pièce jointe
            document.getElementById('attachBtn').onclick = function(e) {
                e.preventDefault();
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

            // Retour arrière
            document.querySelector('.chat-direction').onclick = function() {
                window.history.back();
            };
        </script>



    </body>

</html>
