<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title !== "" ? $title : 'Animal System'}}</title>
    @vite('resources/css/app.css')

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body style="background-color: rgb(118, 171, 174)">
<x-messages/>


<style>
    .left-background,
    .right-background {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 50%; /* Adjust the width of the image */
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -1;
    }

    .left-background {
        left: 800px;
        background-image: url('{{ asset('images/paws.png') }}');
    }

    .right-background {
        right: 950px;
        background-image: url('{{ asset('images/paws.png') }}');
    }
</style>

<div class="left-background"></div>
<div class="right-background"></div>
