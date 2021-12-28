@extends('adminlte::page')

@section('title', 'Cambiar contraseña')

@section('content_header')
    <h1>Cambiar Contraseña</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cambiar Contraseña') }}</div>
                    <div class="card-body">
                        <div class="card">
                            <B>
                                <FONT COLOR="red">Importante</FONT>
                            </B>
                            <p>La contraseña debe ser entre 8 y 16 dígitos.</p>
                        </div>
                        @if (Session::get('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif

                        <form method="POST" action="{{ route('save_password') }}">
                            @csrf

                            {{-- <input type="hidden" name="token" value="{{$token }}"> --}}

                            <div class="form-group row">
                                <label for="old_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Anterior') }}</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password"
                                        class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                        required>
                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nueva contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                        required autocomplete="new-password">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new-password-confirmation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmar nueva contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="new-password-confirmation" type="password" class="form-control"
                                        name="new_password_confirmation" required
                                        autocomplete="new-password">{{-- El campo bajo validación debe tener un campo coincidente de {field}_confirmation. Por ejemplo, si el campo bajo validación es password, un password_confirmation campo coincidente debe estar presente en la entrada. --}}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar Contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
