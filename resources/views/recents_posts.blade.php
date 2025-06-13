@extends('layouts.app')

@section('title', 'recents posts')

@section('content')

    <x-hero title='<span class="hero-title-main">Suivez <span class="hero-title-highlight"> nos actualites!</span></span>'
        description="Restez informés sur nos activités, innovations et conseils santé." :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()"
        mask="assets/img/exclude.png" photo="assets/img/blog.png" />






@endsection
