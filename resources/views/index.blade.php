<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', '' ) - {{ config('app.name') }}</title>

    

  
    <style>
      /*
      #osm_map {
          position: absolute;
          width: 100%;
          height: 100%;
      }
      #barra_topo {
        position: fixed;
        height: 75px;
        z-index: 999;
        width: 100%;
      }
    
      .barra_pesquisa {
        position: relative;
        top: 50px;
      }
      */

      .center_obj {

        align-items: center;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
      }
      .invisivel {

        display: none;
    
      }
      
    </style>    

    @yield('css')
  </head>
  <body>    
    @yield('body')
  </body>


  @yield('js')

</html>