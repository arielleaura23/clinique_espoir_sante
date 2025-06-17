<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Discussions</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <style>
            /* Cacher la scrollbar mais garder le scroll fonctionnel */
            .chat-app-main__sidebar,
            .chat-app-main__list,
            .chat-app-main__messages,
            .chat-messages {
                scrollbar-width: none;
                /* Firefox */
                -ms-overflow-style: none;
                /* IE/Edge */
            }

            .chat-app-main__sidebar::-webkit-scrollbar,
            .chat-app-main__list::-webkit-scrollbar,
            .chat-app-main__messages::-webkit-scrollbar,
            .chat-messages::-webkit-scrollbar {
                display: none;
                /* Chrome, Safari, Opera */
            }

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
                overflow: hidden;
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
                position: fixed;
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
                display: block !important;
            }

            .options-button {
                background: none !important;
                border: none !important;
            }

            .options-menu button:hover {
                background: #f0f8ff;
            }

            .chat-app-main.chat-app-page.chat-app-unique {
                display: flex;
                flex-direction: column;
                height: 100vh;
                background: #fefeff;
                font-family: 'Inter', sans-serif;
            }

            .chat-app-main__header.chat-app-page__header.chat-app-unique__header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background: #5d5fef;
                color: #fff;
                padding: 0 32px;
                height: 86px;
                box-shadow: 0 4px 4px 0 rgba(241, 120, 182, 0.25);
            }

            .chat-app-main__header-left.chat-app-page__header-left.chat-app-unique__header-left {
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .chat-app-main__icon.chat-app-page__icon.chat-app-unique__icon {
                width: 24px;
                height: 24px;
            }

            .chat-app-main__avatar.chat-app-page__avatar.chat-app-unique__avatar {
                background: #7879f1;
                border-radius: 50%;
                width: 30px;
                height: 30px;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 18px;
            }

            .chat-app-main__info.chat-app-page__info.chat-app-unique__info {
                display: flex;
                flex-direction: column;
                margin-left: 8px;
            }

            .chat-app-main__id.chat-app-page__id.chat-app-unique__id {
                font-size: 12px;
                color: #fff;
            }

            .chat-app-main__title.chat-app-page__title.chat-app-unique__title {
                font-size: 16px;
                font-weight: 700;
                color: #fff;
            }

            .chat-app-main__header-actions.chat-app-page__header-actions.chat-app-unique__header-actions {
                display: flex;
                gap: 18px;
            }

            .chat-app-main__action.chat-app-page__action.chat-app-unique__action {
                width: 30px;
                height: 24px;
                cursor: pointer;
            }

            .chat-app-main__body.chat-app-page__body.chat-app-unique__body {
                display: flex;
                margin-top: 60px;
                flex: 1;
                min-height: 0;
            }

            .chat-app-main__sidebar.chat-app-page__sidebar.chat-app-unique__sidebar {
                width: 370px;
                background: #fdfdff;
                border-right: 1px solid #e1e2ff;
                display: flex;
                flex-direction: column;
                gap: 15px;
                position: fixed;
                left: 0;
                top: 86px;
                width: 370px;
                height: calc(100vh - 86px);
                z-index: 100;
                overflow-y: auto;
            }

            .chat-app-main__sidebar-header.chat-app-page__sidebar-header.chat-app-unique__sidebar-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 24px 16px 0 16px;
                font-weight: bold;
                font-size: 20px;
            }

            .chat-app-main__new.chat-app-page__new.chat-app-unique__new {
                background: #fff;
                border: none;
                border-radius: 8px;
                cursor: pointer;
            }

            .chat-app-main__search.chat-app-page__search.chat-app-unique__search {
                display: flex;
                align-items: center;
                padding: 12px 16px;
                gap: 8px;
            }

            .chat-app-main__search-input.chat-app-page__search-input.chat-app-unique__search-input {
                flex: 1;
                border-radius: 8px;
                border: 1px solid #e1e2ff;
                padding: 8px 12px;
            }

            .chat-app-main__search-icon.chat-app-page__search-icon.chat-app-unique__search-icon {
                width: 24px;
                height: 24px;
                cursor: pointer;
            }

            .chat-app-main__list.chat-app-page__list.chat-app-unique__list {
                flex: 1;
                overflow-y: auto;
                list-style: none;
                margin: 0;
                padding: 0 0 16px 0;
            }

            .chat-app-main__list-item.chat-app-page__list-item.chat-app-unique__list-item {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 16px;
                cursor: pointer;
                transition: background 0.2s;
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
                background: #fff;
                border: 1px solid #f5f1f1;
            }

            .chat-app-main__list-item.chat-app-page__list-item.chat-app-unique__list-item.active,
            .chat-app-main__list-item.chat-app-page__list-item.chat-app-unique__list-item:hover {
                background: #f5f1f1
            }

            .chat-app-main__list-avatar.chat-app-page__list-avatar.chat-app-unique__list-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
            }

            .chat-app-main__list-info.chat-app-page__list-info.chat-app-unique__list-info {
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .chat-app-main__list-name.chat-app-page__list-name.chat-app-unique__list-name {
                color: #000;
                font-size: 14px;
                font-family: 'Inter', sans-serif;
            }

            .chat-app-main__list-last.chat-app-page__list-last.chat-app-unique__list-last {
                font-size: 12px;
                color: #a1a1a1;
            }

            .chat-app-main__list-time.chat-app-page__list-time.chat-app-unique__list-time {
                font-size: 12px;
                color: #a1a1a1;
            }

            .chat-app-main__content.chat-app-page__content.chat-app-unique__content {
                flex: 1;
                display: flex;
                flex-direction: column;
                background: #fff;
                margin-left: 370px;
                margin-top: 50px;
            }

            .chat-app-main__messages.chat-app-page__messages.chat-app-unique__messages {
                flex: 1;
                padding: 32px;
                overflow-y: auto;
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .chat-input-area {
                position: fixed;
                left: 370px;
                bottom: 0;
                width: calc(100% - 370px);
                background: #fff;
                z-index: 200;
                box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.04);
                padding: 12px 32px;
            }

            /* Pour éviter que les messages passent sous l'input */
            .chat-messages {
                margin-bottom: 70px;
                overflow-y: auto;
                max-height: calc(100vh - 86px - 104px - 70px);
                /* header + profile header + input */
            }

            .chat-app-main__message.chat-app-page__message.chat-app-unique__message {
                display: flex;
                align-items: flex-end;
                gap: 12px;
            }

            .chat-app-main__message.received .chat-app-main__message-avatar.chat-app-page__message-avatar.chat-app-unique__message-avatar {
                order: 0;
            }

            .chat-app-main__message.sent .chat-app-main__message-avatar.chat-app-page__message-avatar.chat-app-unique__message-avatar {
                order: 2;
            }

            .chat-app-main__message-avatar.chat-app-page__message-avatar.chat-app-unique__message-avatar {
                background: #7879f1;
                border-radius: 50%;
                width: 30px;
                height: 30px;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 16px;
            }

            .chat-app-main__message-bubble.chat-app-page__message-bubble.chat-app-unique__message-bubble {
                background: #f1f1ff;
                border-radius: 12px;
                padding: 12px 18px;
                max-width: 60%;
            }

            .chat-app-main__message-bubble.chat-app-page__message-bubble.chat-app-unique__message-bubble.sent {
                background: #5d5fef;
                color: #fff;
            }

            .chat-app-main__message-text.chat-app-page__message-text.chat-app-unique__message-text {
                font-size: 14px;
            }

            .chat-app-main__message-time.chat-app-page__message-time.chat-app-unique__message-time {
                font-size: 11px;
                color: #a1a1a1;
                margin-top: 4px;
                text-align: right;
            }

            .chat-app-main__input-bar.chat-app-page__input-bar.chat-app-unique__input-bar {
                display: flex;
                align-items: center;
                padding: 16px 32px;
                border-top: 1px solid #e1e2ff;
                gap: 12px;
                background: #fff;
            }

            .chat-app-main__input.chat-app-page__input.chat-app-unique__input {
                flex: 1;
                border-radius: 8px;
                border: 1px solid #e1e2ff;
                padding: 10px 14px;
                font-size: 15px;
            }

            .chat-app-main__attach.chat-app-page__attach.chat-app-unique__attach,
            .chat-app-main__send.chat-app-page__send.chat-app-unique__send {
                background: none;
                border: none;
                cursor: pointer;
            }

            .call-history-recall-btn {
                background: #f4f5fe;
                border: none;
                border-radius: 50%;
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: 12px;
                cursor: pointer;
                transition: background 0.2s;
                box-shadow: 0 2px 8px rgba(29, 119, 254, 0.06);
            }

            .call-history-recall-btn img {
                width: 20px;
                height: 20px;
            }

            .call-history-recall-btn:hover {
                background: #1d77fe;
            }

            .call-history-recall-btn:hover img {
                filter: brightness(0) invert(1);
            }

            .call-history-popup-overlay {
                display: none;
                position: fixed;
                z-index: 9999;
                left: 0;
                top: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(29, 119, 254, 0.08);
                align-items: center;
                justify-content: center;
                animation: fadeIn 0.3s;
            }

            .call-history-popup-overlay.show {
                display: flex;
            }

            .call-history-popup-card {
                margin: 0 auto;
                width: 900px;
                background: #fff;
                border-radius: 18px;
                box-shadow: 0 8px 32px rgba(29, 119, 254, 0.13);
                padding: 32px 28px 24px 28px;
                min-width: 340px;
                max-width: 95vw;
                max-height: 80vh;
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                animation: fadeIn 0.3s;
                overflow: auto;
            }

            .call-history-popup-close {
                position: absolute;
                top: 14px;
                right: 18px;
                background: none;
                border: none;
                font-size: 2rem;
                color: #1d77fe;
                cursor: pointer;
                transition: color 0.2s;
                z-index: 2;
            }

            .call-history-popup-close:hover {
                color: #e94751;
            }

            .call-history-popup-header {
                display: flex;
                align-items: center;
                gap: 14px;
                margin-bottom: 18px;
            }


            .call-history-popup-title {
                font-size: 1.3rem;
                font-weight: 700;
                color: #1d77fe;
                font-family: "ArchivoBlack-Regular", sans-serif;
            }

            .call-history-popup-content {
                width: 100%;
                max-height: 60vh;
                overflow-y: auto;
            }

            .call-history-list {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .call-history-item {
                display: flex;
                align-items: center;
                gap: 14px;
                padding: 10px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .call-history-avatar {
                width: 38px;
                height: 38px;
                border-radius: 50%;
                object-fit: cover;
            }

            .call-history-info {
                flex: 1;
                display: flex;
                flex-direction: column;
                gap: 2px;
            }

            .call-history-name {
                font-weight: 600;
                color: #1d77fe;
                font-size: 15px;
            }

            .call-history-type {
                font-size: 12px;
                color: #757575;
            }

            .call-history-time {
                font-size: 12px;
                color: #b0b8c1;
                white-space: nowrap;
            }

            @media (max-width: 480px) {
                .call-history-popup-card {
                    padding: 18px 6vw 14px 6vw;
                    min-width: 0;
                }

                .call-history-popup-title {
                    font-size: 1.1rem;
                }

                .call-history-avatar {
                    width: 28px;
                    height: 28px;
                }

                .call-history-name {
                    font-size: 13px;
                }
            }

            .profile-header-main.profile-header-page.profile-header-unique {
                height: 100px;
                background: #fff;
                border: 1px solid #dfe0eb;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                box-sizing: border-box;
                padding: 0 10px;

                position: fixed;
                top: 70px;
                left: 370px;
                width: calc(100% - 370px);
                z-index: 101;
                box-sizing: border-box;
            }

            .profile-header-main__container.profile-header-page__container.profile-header-unique__container {
                display: flex;
                align-items: center;
                width: 100%;
                height: 100%;
                gap: 24px;
            }

            .profile-header-main__avatar.profile-header-page__avatar.profile-header-unique__avatar {
                width: 50.8px;
                height: 40px;
                border-radius: 64px;
                object-fit: cover;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .profile-header-main__info.profile-header-page__info.profile-header-unique__info {
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 2px;
            }

            .profile-header-main__id.profile-header-page__id.profile-header-unique__id {
                color: #000;
                font-family: "PublicSans-Regular", sans-serif;
                font-size: 12px;
                font-weight: 400;
            }

            .profile-header-main__name.profile-header-page__name.profile-header-unique__name {
                color: #000;
                font-family: "PublicSans-Bold", sans-serif;
                font-size: 16px;
                font-weight: 700;
            }

            .profile-header-main__actions.profile-header-page__actions.profile-header-unique__actions {
                display: flex;
                align-items: center;
                gap: 32px;
                margin-left: auto;
            }

            .profile-header-main__icon.profile-header-page__icon.profile-header-unique__icon {
                width: 25px;
                cursor: pointer;
            }

            .chat-sidebar-footer.chat-sidebar-footer-page.chat-sidebar-footer-unique {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                background: #fdfdff;
                border-top: 1px solid #e1e2ff;
                padding: 10px 0;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 24px;
                z-index: 10;
                min-height: 56px;
                box-sizing: border-box;
            }

            .chat-sidebar-footer__btn.chat-sidebar-footer-page__btn.chat-sidebar-footer-unique__btn {
                background: none;
                position: relative;
                border: none;
                padding: 0;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: background 0.2s;
                width: 44px;
                height: 44px;
            }

            .chat-sidebar-footer__btn:hover {
                background: #e1e2ff;
            }


            .chat-sidebar-footer__badge.chat-sidebar-footer-page__badge.chat-sidebar-footer-unique__badge {
                position: absolute;
                top: 4px;
                right: 4px;
                min-width: 18px;
                height: 18px;
                background: #f44336;
                color: #fff;
                font-size: 12px;
                font-weight: bold;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0 5px;
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.12);
                pointer-events: none;
                z-index: 2;
            }

            @media (max-width: 900px) {
                @media (max-width: 900px) {
                    .chat-app-main__sidebar.chat-app-page__sidebar.chat-app-unique__sidebar {
                        display: flex;
                        /* Affiche le aside sur mobile */
                        width: 100vw;
                    }

                    .chat-app-main__content.chat-app-page__content.chat-app-unique__content {
                        display: none;
                        width: 100% !important;
                        margin-left: 0 !important;
                        /* Masque la discussion sur mobile */
                    }

                    .profile-header-main.profile-header-page.profile-header-unique {
                        left: 0 !important;
                        width: 100vw !important;
                        min-width: 0 !important;
                        box-sizing: border-box;
                    }

                    .chat-input-area {
                        left: 0 !important;
                        width: 100vw !important;
                        min-width: 0 !important;
                        box-sizing: border-box;
                    }
                }
            }
        </style>

    </head>

    <body>
        <div class="chat-panel" id="chatPanel">
            <div class="chat-panel-bg">
                <div class="chat-app-main chat-app-page chat-app-unique">
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

                    <div class="chat-app-main__body chat-app-page__body chat-app-unique__body">
                        <aside class="chat-app-main__sidebar chat-app-page__sidebar chat-app-unique__sidebar">
                            <div
                                class="chat-app-main__sidebar-header chat-app-page__sidebar-header chat-app-unique__sidebar-header">
                                <span>Messages</span>
                                <button class="chat-app-main__new chat-app-page__new chat-app-unique__new">
                                    <img src="{{ asset('assets/img/edit.png') }}" width="18" alt="edit">
                                </button>
                            </div>
                            <div class="chat-app-main__search chat-app-page__search chat-app-unique__search">
                                <input type="text" placeholder="Rechercher un chat"
                                    class="chat-app-main__search-input chat-app-page__search-input chat-app-unique__search-input" />
                                <img alt="Rechercher"
                                    class="chat-app-main__search-icon chat-app-page__search-icon chat-app-unique__search-icon"
                                    src="{{ asset('assets/img/search_blue.png') }}" />
                            </div>
                            <ul class="chat-app-main__list chat-app-page__list chat-app-unique__list">
                                <li
                                    class="chat-app-main__list-item chat-app-page__list-item chat-app-unique__list-item active">
                                    <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                        class="chat-app-main__list-avatar chat-app-page__list-avatar chat-app-unique__list-avatar" />
                                    <div
                                        class="chat-app-main__list-info chat-app-page__list-info chat-app-unique__list-info">
                                        <span
                                            class="chat-app-main__list-name chat-app-page__list-name chat-app-unique__list-name">Marina
                                            Maliutina
                                        </span>
                                        <span
                                            class="chat-app-main__list-last chat-app-page__list-last chat-app-unique__list-last">Bonjour
                                            monsieur</span>
                                    </div>
                                    <span
                                        class="chat-app-main__list-time chat-app-page__list-time chat-app-unique__list-time">00:31</span>
                                </li>
                                <li
                                    class="chat-app-main__list-item chat-app-page__list-item chat-app-unique__list-item ">
                                    <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                        class="chat-app-main__list-avatar chat-app-page__list-avatar chat-app-unique__list-avatar" />
                                    <div
                                        class="chat-app-main__list-info chat-app-page__list-info chat-app-unique__list-info">
                                        <span
                                            class="chat-app-main__list-name chat-app-page__list-name chat-app-unique__list-name">Marina
                                            Maliutina
                                        </span>
                                        <span
                                            class="chat-app-main__list-last chat-app-page__list-last chat-app-unique__list-last">Bonjour
                                            monsieur</span>
                                    </div>
                                    <span
                                        class="chat-app-main__list-time chat-app-page__list-time chat-app-unique__list-time">00:31</span>
                                </li>
                                <li
                                    class="chat-app-main__list-item chat-app-page__list-item chat-app-unique__list-item ">
                                    <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                        class="chat-app-main__list-avatar chat-app-page__list-avatar chat-app-unique__list-avatar" />
                                    <div
                                        class="chat-app-main__list-info chat-app-page__list-info chat-app-unique__list-info">
                                        <span
                                            class="chat-app-main__list-name chat-app-page__list-name chat-app-unique__list-name">Marina
                                            Maliutina
                                        </span>
                                        <span
                                            class="chat-app-main__list-last chat-app-page__list-last chat-app-unique__list-last">Bonjour
                                            monsieur</span>
                                    </div>
                                    <span
                                        class="chat-app-main__list-time chat-app-page__list-time chat-app-unique__list-time">00:31</span>
                                </li>
                                <li
                                    class="chat-app-main__list-item chat-app-page__list-item chat-app-unique__list-item ">
                                    <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                        class="chat-app-main__list-avatar chat-app-page__list-avatar chat-app-unique__list-avatar" />
                                    <div
                                        class="chat-app-main__list-info chat-app-page__list-info chat-app-unique__list-info">
                                        <span
                                            class="chat-app-main__list-name chat-app-page__list-name chat-app-unique__list-name">Marina
                                            Maliutina
                                        </span>
                                        <span
                                            class="chat-app-main__list-last chat-app-page__list-last chat-app-unique__list-last">Bonjour
                                            monsieur</span>
                                    </div>
                                    <span
                                        class="chat-app-main__list-time chat-app-page__list-time chat-app-unique__list-time">00:31</span>
                                </li>
                                <li
                                    class="chat-app-main__list-item chat-app-page__list-item chat-app-unique__list-item ">
                                    <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                        class="chat-app-main__list-avatar chat-app-page__list-avatar chat-app-unique__list-avatar" />
                                    <div
                                        class="chat-app-main__list-info chat-app-page__list-info chat-app-unique__list-info">
                                        <span
                                            class="chat-app-main__list-name chat-app-page__list-name chat-app-unique__list-name">Marina
                                            Maliutina
                                        </span>
                                        <span
                                            class="chat-app-main__list-last chat-app-page__list-last chat-app-unique__list-last">Bonjour
                                            monsieur</span>
                                    </div>
                                    <span
                                        class="chat-app-main__list-time chat-app-page__list-time chat-app-unique__list-time">00:31</span>
                                </li>
                            </ul>

                            <div class="chat-sidebar-footer chat-sidebar-footer-page chat-sidebar-footer-unique">
                                <button
                                    class="chat-sidebar-footer__btn chat-sidebar-footer-page__btn chat-sidebar-footer-unique__btn"
                                    title="Discussions">
                                    <img width="18" src="{{ asset('assets/img/chat_blue.png') }}"
                                        alt="Discussions" />
                                    <span
                                        class="chat-sidebar-footer__badge chat-sidebar-footer-page__badge chat-sidebar-footer-unique__badge">3</span>
                                </button>
                                <button
                                    class="chat-sidebar-footer__btn chat-sidebar-footer-page__btn chat-sidebar-footer-unique__btn"
                                    title="Appels">
                                    <img src="{{ asset('assets/img/appel.png') }}" alt="Appels" />
                                    <span
                                        class="chat-sidebar-footer__badge chat-sidebar-footer-page__badge chat-sidebar-footer-unique__badge">1</span>
                                </button>
                            </div>
                        </aside>

                        <section class="chat-app-main__content chat-app-page__content chat-app-unique__content">
                            <div class="chat-panel" id="chatPanel">
                                <div class="chat-panel-bg">
                                    <!-- Chat input area -->
                                    <form action="#" class="chat-input-area" id="chat-form">
                                        <div class="input-bg">
                                            <input type="hidden" id="chat_id" value="1">
                                            <input type="text" class="message-input" id="messageInput"
                                                placeholder="Message..." />
                                            <button class="input-button send-button_sms" id="sendBtn"
                                                title="Envoyer">
                                                <img src="{{ asset('assets/img/send_sms.png') }}"
                                                    alt="Send message" />
                                            </button>
                                            <button class="input-button emoticon-button" id="emoticonBtn"
                                                title="Ajouter un emoji">
                                                <img src="{{ asset('assets/img/Emoticon.png') }}"
                                                    alt="Add emoticon" />
                                            </button>
                                            <button class="input-button attach-button" id="attachBtn"
                                                title="Joindre un fichier">
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
                                    </form>

                                    <div class="profile-header-main profile-header-page profile-header-unique">
                                        <div
                                            class="profile-header-main__container profile-header-page__container profile-header-unique__container">
                                            <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                                class="profile-header-main__avatar profile-header-page__avatar profile-header-unique__avatar" />
                                            <div
                                                class="profile-header-main__info profile-header-page__info profile-header-unique__info">

                                                <span
                                                    class="profile-header-main__name profile-header-page__name profile-header-unique__name">Marina
                                                    Maliutina
                                                </span>

                                                <span
                                                    class="profile-header-main__id profile-header-page__id profile-header-unique__id">En
                                                    ligne</span>
                                            </div>
                                            <div
                                                class="profile-header-main__actions profile-header-page__actions profile-header-unique__actions">
                                                <a href="{{ route('visio_consulting') }}">
                                                    <img src="{{ asset('assets/img/appel.png') }}" alt="Appel"
                                                        class="profile-header-main__icon profile-header-page__icon profile-header-unique__icon" />
                                                </a>
                                                <a href="{{ route('visio_consulting') }}">
                                                    <img src="{{ asset('assets/img/videocam.png') }}" alt="Visio"
                                                        class="profile-header-main__icon profile-header-page__icon profile-header-unique__icon" />
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('assets/img/info.png') }}" alt="Info"
                                                        class="profile-header-main__icon profile-header-page__icon profile-header-unique__icon" />
                                                </a>

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
                        </section>
                    </div>
                </div>
            </div>


            <!-- Popup Historique des appels -->
            <div id="callHistoryPopup" class="call-history-popup-overlay">
                <div class="call-history-popup-card">
                    <button class="call-history-popup-close" onclick="closeCallHistoryPopup()"
                        title="Fermer">&times;</button>
                    <div class="call-history-popup-header">
                        <img src="{{ asset('assets/img/phone_blue.png') }}" alt="Appels"
                            class="call-history-popup-icon" />
                        <div class="call-history-popup-title">Historique des appels</div>
                    </div>
                    <div class="call-history-popup-content">
                        <ul class="call-history-list">
                            <li class="call-history-item">
                                <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                    class="call-history-avatar" />
                                <div class="call-history-info">
                                    <span class="call-history-name">Marina Maliutina</span>
                                    <span class="call-history-type">Appel audio</span>
                                </div>
                                <span class="call-history-time">Aujourd'hui, 14:22</span>
                                <button class="call-history-recall-btn" title="Rappeler">
                                    <img src="{{ asset('assets/img/Appel.png') }}" alt="Rappeler" />
                                </button>
                            </li>
                            <li class="call-history-item">
                                <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                    class="call-history-avatar" />
                                <div class="call-history-info">
                                    <span class="call-history-name">Jean Dupont</span>
                                    <span class="call-history-type">Appel vidéo</span>
                                </div>
                                <span class="call-history-time">Hier, 18:05</span>
                                <button class="call-history-recall-btn" title="Rappeler">
                                    <img src="{{ asset('assets/img/Appel.png') }}" alt="Rappeler" />
                                </button>
                            </li>
                            <li class="call-history-item">
                                <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar"
                                    class="call-history-avatar" />
                                <div class="call-history-info">
                                    <span class="call-history-name">Jean Dupont</span>
                                    <span class="call-history-type">Appel vidéo</span>
                                </div>
                                <span class="call-history-time">Hier, 18:05</span>
                                <button class="call-history-recall-btn" title="Rappeler">
                                    <img src="{{ asset('assets/img/Appel.png') }}" alt="Rappeler" />
                                </button>
                            </li>
                        </ul>
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


        <script>
            function isMobile() {
                return window.innerWidth <= 900;
            }

            // Quand on clique sur un contact (li)
            document.querySelectorAll('.chat-app-main__list-item').forEach(item => {
                item.addEventListener('click', function() {
                    if (isMobile()) {
                        // Masquer le aside, afficher la discussion
                        document.querySelector('.chat-app-main__sidebar').style.display = 'none';
                        document.querySelector('.chat-app-main__content').style.display = 'block';
                        // Afficher le header de profil et l'input si besoin
                        let profileHeader = document.querySelector('.profile-header-main');
                        if (profileHeader) profileHeader.style.display = 'flex';
                        let inputArea = document.querySelector('.chat-input-area');
                        if (inputArea) inputArea.style.display = 'block';
                    }
                });
            });

            // Optionnel : bouton retour pour revenir à la liste sur mobile
            document.querySelectorAll('.chat-direction').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    if (isMobile()) {
                        document.querySelector('.chat-app-main__sidebar').style.display = 'flex';
                        document.querySelector('.chat-app-main__content').style.display = 'none';
                        let profileHeader = document.querySelector('.profile-header-main');
                        if (profileHeader) profileHeader.style.display = 'none';
                        let inputArea = document.querySelector('.chat-input-area');
                        if (inputArea) inputArea.style.display = 'none';
                        e.preventDefault();
                    }
                });
            });

            // Pour garder le bon affichage si on resize la fenêtre
            window.addEventListener('resize', function() {
                if (isMobile()) {
                    document.querySelector('.chat-app-main__sidebar').style.display = 'flex';
                    document.querySelector('.chat-app-main__content').style.display = 'none';
                    let profileHeader = document.querySelector('.profile-header-main');
                    if (profileHeader) profileHeader.style.display = 'none';
                    let inputArea = document.querySelector('.chat-input-area');
                    if (inputArea) inputArea.style.display = 'none';
                } else {
                    document.querySelector('.chat-app-main__sidebar').style.display = 'flex';
                    document.querySelector('.chat-app-main__content').style.display = 'flex';
                    let profileHeader = document.querySelector('.profile-header-main');
                    if (profileHeader) profileHeader.style.display = 'flex';
                    let inputArea = document.querySelector('.chat-input-area');
                    if (inputArea) inputArea.style.display = 'block';
                }
            });







            // Ouvre la popup quand on clique sur l'icône téléphone du footer
            document.querySelectorAll('.chat-sidebar-footer__btn[title="Appels"]').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('callHistoryPopup').classList.add('show');
                });
            });

            // Ferme la popup
            function closeCallHistoryPopup() {
                document.getElementById('callHistoryPopup').classList.remove('show');
            }

            // Fermer la popup si on clique en dehors de la carte
            document.getElementById('callHistoryPopup').addEventListener('click', function(e) {
                if (e.target === this) closeCallHistoryPopup();
            });
        </script>

        <script>
            // Fonction d'appel simulée
            function recallCall(name, type) {
                alert(`Appel ${type} vers ${name}...`);
            }

            // Ciblage des boutons "Rappeler" dans la popup
            document.querySelectorAll('.call-history-recall-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    // On récupère les infos du contact sur la même ligne
                    const item = btn.closest('.call-history-item');
                    const name = item.querySelector('.call-history-name').textContent.trim();
                    const type = item.querySelector('.call-history-type').textContent.trim();
                    recallCall(name, type);
                });
            });
        </script>

        <script>
            // script js pusher pour le chat

            // const chatId = document.getElementById('chat_id').value;
            // window.Echo.private(`chat.${chatId}`)
            //     .listen('MessageSent', (e) => {
            //         console.log('Nouveau message:', e.message);
            //         // Ajoute ici le code pour afficher le message dans ta page
            //     });

            // document.getElementById('chat-form').addEventListener('submit', function(e) {
            //     e.preventDefault();

            //     const content = document.getElementById('message-input').value;

            //     fetch('/send-message', {
            //             method: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/json',
            //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
            //                     'content')
            //             },
            //             body: JSON.stringify({
            //                 chat_id: chatId,
            //                 content: content
            //             })
            //         }).then(response => response.json())
            //         .then(data => {
            //             console.log(data.status);
            //             document.getElementById('message-input').value = '';
            //         });
            // });
        </script>
        </script>

        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        {{-- @vite('resources/js/app.js') --}}

    </body>

</html>
