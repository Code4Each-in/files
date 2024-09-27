<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset(config('app.asset_url').'assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link rel = "icon" href = "images/logoicon.png" type = "image/x-icon"> -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" >
    <link rel="stylesheet" href="{{ asset(config('app.asset_url').'assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(config('app.asset_url').'assets/css/slider.css') }}" />
    <link rel="stylesheet" href="{{ asset(config('app.asset_url').'assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset(config('app.asset_url').'assets/css/loader.css') }}" >
    <link rel="stylesheet" href="{{ asset(config('app.asset_url').'assets/css/dash.css') }}" >
</head>