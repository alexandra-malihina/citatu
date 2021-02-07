<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Цитатник</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <script
        src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
        crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
        </div>
        <div id="header">            
            <div class="name">Цитатник</div>
            <div id="add"><span>Добавить</span></div>
        </div>        
        <div id="modal-window" >
           
                <div id="modal" >
                <span class="modal_close pointer">X</span>
                    <label for="author"> Автор:</label><small id="error_author"></small>
                    <input type="text" name="author" id="author" placeholder="Стетхем">
                    <label for="text">Цитата:</label><small id="error_text"></small>
                    <textarea name="text" id="text" cols="15" rows="5" placeholder="Нет ничего более вечного чем то, что обмотано синей изолентой."></textarea>

                    <input type="hidden" name="tags_input" id="tags_input">
                    <label id='tags_label' for="tags">Выберите теги:</label>
                    <div id="tags">
                        @foreach($tags as $tag)
                        <div class="tag pointer" data-id="{{$tag->id}}"  > {{$tag->name}}</div>
                        @endforeach
                    </div>
                    <small id="message_modal">От 1 до 3</small>

                    <div id="footer">                        
                        <button type="submit" id="add_citat" class="pointer" >Цитировать</a>
                    </div>
                    
</div>
            <div id="fade" class="pointer"></div>
        </div>
       

       <div id="content">
      @yield('content')
       </div>
        



    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
