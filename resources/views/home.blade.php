@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <vc-home :user="{{ Auth::user() }}" title="Bem vindo!" subtitle="Crie seus links de redirecionamento em poucos passos"></vc-home>
    </div>
@endsection
