@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')           
                {!! Form::open(['url' => 'login2','class'=>'form-horizontal','role'=>'form','method'=>'POST','style'=>'display:none']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />                    
                        
                    {!! Form::input('accountname','accountname',$id ,['class'=>'form-control'])!!}
                 
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" id="login" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i>Entrar
                            </button>
                            
                        </div>
                    </div>
                {!! Form::close()!!}
    <div align="center">{!!HTML::image("images/load/default.gif")!!}
        Redireccionando, por favor espere...
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
    $('#login').click();
});
</script>
@endpush
