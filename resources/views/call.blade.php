@extends('layouts.app')

@section('content')
    <h2>Appel avec {{ $receiver->name }}</h2>
    <div id="jitsi-container" style="height: 80vh;"></div>
@endsection

@section('scripts')
<script src='https://meet.jit.si/external_api.js'></script>
<script>
    const domain = "meet.jit.si";
    const options = {
        roomName: "{{ $roomName }}",
        width: "100%",
        height: 700,
        parentNode: document.querySelector('#jitsi-container'),
        userInfo: {
            displayName: "{{ Auth::user()->name }}"
        }
    };
    const api = new JitsiMeetExternalAPI(domain, options);
</script>
@endsection
