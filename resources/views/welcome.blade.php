@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    {!!Breadcrumbs::render('welcome')!!}
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">    
                    Intranet v1.0       
            {{$username=trim(shell_exec('echo %username%'))}}
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="container">

    <div class="clearfix">

      <div class="column-1-2 input">
        <h3>Input:</h3>
        <input type="text" id="inputText" name="inputText" style="width: 100%" value=""/>
      </div>

      <div class="column-1-2 output">
        <h3>Output:</h3>
        <p id="outputText"></p>
        <script type="text/javascript">
          $(document).ready(function() {
            $("#inputText").on('keyup change input',function(e) {
              var source = $('#inputText').val();
              var preview = emojione.toImage(source);
              $('#outputText').html(preview);
            });
          });
        </script>
      </div>

    </div>

  </div>
@endsection
