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
            {{-- <img class="main-screen" src="screen0.png" alt="Video conference screen" /> --}}

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
                                <div class="badge-text">Host</div>
                            </div>
                            <div class="status-badge">
                                <div class="status-icon">
                                    <div class="muted-indicator"></div>
                                    <img class="audio-icon" src="{{ asset('assets/img/AudioOff.png') }}"
                                        alt="Audio muted" />
                                </div>
                                <div class="participant-name">Marina Maliutina</div>
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
                                <div class="participant-name">Jeans</div>
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

            <!-- Control toolbar -->
            <div class="control-toolbar">
                <button class="control-button audio-button">
                    <div class="button-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/AudioOff.png') }}" alt="Toggle audio" />
                </button>

                <button class="control-button video-button">
                    <div class="button-bg video-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/CameraOff.png') }}" alt="Toggle video" />
                </button>


                <button class="control-button end-call-button">
                    <div class="end-call-bg"></div>
                    <img class="end-call-icon" src="{{ asset('assets/img/call.png') }}" alt="End call" />
                </button>


                <button class="control-button chat-button">
                    <div class="button-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/Chat.png') }}" alt="Open chat" />
                    <div class="notification-indicator"></div>
                </button>

                <button class="control-button exit-button">
                    <div class="button-bg exit-bg"></div>
                    <img class="button-icon" src="{{ asset('assets/img/out.png') }}" alt="Exit call" />
                </button>
            </div>

            <!-- Chat panel -->
            <div class="chat-panel">
                <div class="chat-panel-bg">
                    <!-- Chat header -->
                    <div class="chat-header">
                        <h2 class="chat-title">Chat</h2>
                        <div class="participants-counter">
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
                        <button class="more-options-button">
                            <img src="{{ asset('assets/img/more.png') }}" alt="More options" />
                        </button>
                    </div>

                    <!-- Chat input area -->
                    <div class="chat-input-area">
                        <div class="input-bg">
                            <input type="text" class="message-input" placeholder="Message..." />
                            <button class="input-button send-button_sms">
                                <img src="{{ asset('assets/img/send_sms.png') }}" alt="Send message" />
                            </button>
                            <button class="input-button emoticon-button">
                                <img src="{{ asset('assets/img/Emoticon.png') }}" alt="Add emoticon" />
                            </button>
                            <button class="input-button attach-button">
                                <img src="{{ asset('assets/img/Attach.png') }}" alt="Attach file" />
                            </button>
                        </div>
                    </div>

                    <!-- Chat messages -->
                    <div class="chat-messages">
                        <!-- Received message -->
                        <div class="message-container received-message">
                            <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Marina's avatar" />
                            <div class="message-content">
                                <div class="sender-name">Marina Maliutina (Host)</div>
                                <div class="message-bubble">
                                    <div class="message-text">Thank you for participating</div>
                                </div>
                                <div class="message-time">14:32:34</div>
                            </div>
                        </div>

                        <!-- Sent message -->
                        <div class="message-container sent-message">
                            <div class="message-content">
                                <div class="sender-name">Jeans</div>
                                <div class="message-bubble sent-bubble">
                                    <div class="message-text sent-text">Thank you</div>
                                </div>
                                <div class="message-time sent-time">14:32:34</div>
                            </div>
                            <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Your avatar" />
                        </div>

                        <!-- Received message -->
                        <div class="message-container received-message">
                            <img class="avatar" src="{{ asset('assets/img/chat-contact.png') }}"
                                alt="Devon's avatar" />
                            <div class="message-content">
                                <div class="sender-name">Devon Hawkins</div>
                                <div class="message-bubble">
                                    <div class="message-text">
                                        I can't hear it well
                                        <br />
                                        😰
                                    </div>
                                </div>
                                <div class="message-time">14:32:34</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </body>

</html>
