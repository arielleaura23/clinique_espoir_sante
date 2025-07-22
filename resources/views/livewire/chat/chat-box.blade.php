<div> 
    <div class="w-full flex flex-col h-full">
        {{-- HEADER --}}
        <header class="w-full flex items-center gap-4 px-4 py-3 border-b bg-white">
            <a href="{{ route('chat.index') }}" class="lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                </svg>
            </a>

            <x-avatar class="w-10 h-10" />
            <h6 class="font-semibold text-gray-800 truncate">
                {{ $selectedConversation->getReceiver()->email }}
            </h6>

            {{-- 🟢 Actions d’appel (droite) --}}
            <div class="ml-auto flex gap-2">
                <!-- Boutons d'appel -->
                <button onclick="showCallModal('audio', '{{ $selectedConversation->getReceiver()->name }}')"
                    class="p-2 rounded-full bg-white-200 hover:bg-gray-300" title="Appel vocal">
                    <img src="{{ asset('assets/img/appel.png') }}" alt="Appels" class="call-history-popup-icon" />
                </button>

                <button onclick="showCallModal('video', '{{ $selectedConversation->getReceiver()->name }}')"
                    class="p-2 rounded-full bg-white-200 hover:bg-gray-300" title="Appel vidéo">
                    <img src="{{ asset('assets/img/videocam.png') }}" alt="Appels video"
                        class="call-history-popup-icon" />
                </button>

            </div>
        </header>

        {{-- MESSAGES --}}
        <main id="conversation" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
            @foreach ($loadedMessages as $key => $message)
                <div class="flex gap-2 items-end {{ $message->sender_id === auth()->id() ? 'justify-end' : '' }}">
                    @if ($message->sender_id !== auth()->id())
                        <x-avatar class="w-8 h-8" />
                    @endif

                    <div
                        class="max-w-xs md:max-w-md px-4 py-2 rounded-xl text-sm
                        {{ $message->sender_id === auth()->id() ? 'bg-blue-500 text-white rounded-br-none' : 'bg-white border rounded-bl-none' }}">
                        {{ $message->body }}

                        <div class="text-xs mt-1 text-right opacity-70">
                            {{ $message->created_at->format('H:i') }}

                            {{-- Message status check --}}
                            @if ($message->sender_id === auth()->id())
                                @if ($message->isRead())
                                    <span title="Lu">✔✔</span>
                                @else
                                    <span title="Envoyé">✔</span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </main>

        {{-- FOOTER / ENVOI MESSAGE --}}
        <footer class="bg-white border-t p-3">
            <form wire:submit.prevent="sendMessage" class="flex items-center gap-3">
                <input wire:model.defer="body" type="text"
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none"
                    placeholder="Écris ton message ici..." maxlength="1700" autocomplete="off" />

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition disabled:opacity-50">
                    Envoyer
                </button>
            </form>

            @error('body')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </footer>
    </div>

    {{-- MODALE D'APPEL --}}
    {{-- <div id="callModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-[90%] md:w-[400px] rounded-lg shadow p-6 text-center">
            <h2 id="callTitle" class="text-lg font-semibold mb-2"></h2>
            <p id="callMessage" class="mb-4"></p>

            <div class="flex justify-center gap-4 mt-4">
                <button  onclick="acceptCall()" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Accepter
                </button>

                <button onclick="closeCallModal()" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Refuser
                </button>
            </div>
        </div>
    </div> --}}


</div>

<script>
    // const currentConversationId = @json($selectedConversation->id);
    // let currentCallType = 'audio';

    // function showCallModal(type, receiverName) {
    //     currentCallType = type;
    //     document.getElementById('callTitle').innerText = type === 'audio' ? 'Appel vocal' : 'Appel vidéo';
    //     document.getElementById('callMessage').innerText = `Voulez-vous lancer un appel ${type} avec ${receiverName} ?`;
    //     document.getElementById('callModal').classList.remove('hidden');
    // }

    // function closeCallModal() {
    //     document.getElementById('callModal').classList.add('hidden');
    // }

    // function acceptCall() {
    //     window.location.href = `/call/${currentConversationId}/demo?type=${currentCallType}`;
    // }
</script>
