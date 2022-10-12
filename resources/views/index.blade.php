<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Toy Robot Simulator</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    </head>
    <body>
        <div class="float-container">
            <span class="game-header"><p><h1>Toy Robot Simulator</h1></p></span>
            <div class="float-child-robotcompass">
            <div class="container">
              
              @if ($errors->any())
              <div class="row">
                <div class="alert text-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              </div>
              @endif
              
              <form method="POST" action="{{ route('play') }}">
                @csrf
                <div class="row">
                  <div class="col-25">
                    <label for="xaxis">X-Axis :</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="xaxis" name="xaxis" placeholder="X-axis.." value="{{ old('xaxis') }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="yaxis">Y-Axis :</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="yaxis" name="yaxis" placeholder="Y-axis.." value="{{ old('yaxis') }}">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="direction">Facing Direction:</label>
                  </div>
                  <div class="col-75">
                    <select id="direction" name="direction">
                      <option value="north">North</option>
                      <option value="south">South</option>
                      <option value="east">East</option>
                      <option value="west">West</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="robot_action">Robot Action(s):</label>
                  </div>
                  <div class="col-75">
                    <div class="field_wrapper">
                      <input type="text" name="robot_action[]" value="" placeholder="(move, left, right)" />
                      <a href="javascript:void(0);" class="add_button" title="Add field">+ Add Robot Action</a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <input type="submit" value="Play Robot">
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
          </div>
        </div>
    </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 5;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var fieldHTML = '<div><input type="text" name="robot_action[]" value="" placeholder="(move, left, right)"/><a href="javascript:void(0);" class="remove_button">- Remove Robot Action</a></div>';
    var x = 1; 
    
    $(addButton).click(function(){
        if(x < maxField){ 
            x++;
            $(wrapper).append(fieldHTML); 
        }
    });
    
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });
});
</script>