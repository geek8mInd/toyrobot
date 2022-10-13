<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Toy Robot Simulator</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="float-container">
            <span class="game-header"><p><h1>Toy Robot Simulator</h1></p></span>
            <div class="float-child-robotcompass">
            <div class="container">
              <form method="POST" action="{{ route('/') }}">
                @csrf
                <div class="row">
                  <div class="col-25">
                    <label for="xaxis">X-Axis :</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="xaxis" name="xaxis" placeholder="X-axis.." value="{{ $xaxis }}" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="yaxis">Y-Axis :</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="yaxis" name="yaxis" placeholder="Y-axis.." value="{{ $yaxis }}" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="direction">Facing Direction:</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="direction" name="direction" placeholder="Direction.." value="{{ $direction }}" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="robot_action">Robot Action(s):</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="actions" name="actions" placeholder="Actions.." value="{{ $actions }}" disabled>
                  </div>
                </div>
                <div class="row">
                  <input type="submit" value="Play Again">
                </div>
              </form>
            </div>
            </div>
            <div class="float-child-robotplace">
                <div class="mt-2">
                    <div id="grid-col">
                        @foreach($coordinatesList as $key => $value)
                            <div id="{{ $key }}" name="{{ $key }}" class="cell" @if ($current == $key)style="background-color: #ccc"@endif>@if ($current == $key){{ $key }}@else &nbsp; @endif</div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                  <p>{{ $remarks }}</p>
                </div>
          </div>
        </div>
    </body>
</html>