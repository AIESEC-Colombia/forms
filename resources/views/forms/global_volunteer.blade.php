@extends('layout.template')

@section('content')
    <div class="container">

        @include('forms.messages')

        <div class="row" id="form">
            <div class="col s12 m12">
                <h2 class="header" id="title" style="background-color: '#30c39e'">@lang('forms.voluntary')</h2>
            </div>
            <div class="col s12 m12">
                @lang('forms.voluntary_message')
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">account_circle</i>
                <input id="first_name" name="first_name" type="text" class="validate">
                <label for="first_name">@lang('forms.first_name')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">perm_identity</i>
                <input id="last_name" name="last_name" type="text" class="validate">
                <label for="last_name">@lang('forms.last_name')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">phone</i>
                <input id="phone" name="phone" type="text" class="validate">
                <label for="phone">@lang('forms.phone')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">settings_cell</i>
                <input id="cellphone" name="cellphone" type="text" class="validate">
                <label for="cellphone">@lang('forms.cellphone')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">email</i>
                <input id="mail" name="mail" type="email" class="validate">
                <label for="mail">@lang('forms.mail')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">email</i>
                <select id="university" name="university">
                    <option value="" disabled selected>@lang('forms.list_message',['field' => 'universidad'])</option>
                    @foreach($universities as $university)
                        <option value="{{$university->id}}">{{$university->value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.university')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" name="password" type="password" class="validate">
                <label for="password">@lang('forms.password')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password_confirmation" name="password_confirmation" type="password" class="validate">
                <label for="password_confirmation">@lang('forms.password_confirmation')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">email</i>
                <select id="organization" name="organization">
                    @foreach($organization as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.organization')*</label>
            </div>

            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">flight_land</i>
                <select id="travelDate" name="travelDate">
                    @foreach($travel_date as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.travel_date')*</label>
            </div>

            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">group</i>
                <select id="preferenceContact" name="preferenceContact">
                    <option value="" disabled selected>@lang('forms.preference_contact')</option>
                    @foreach($preference_contact as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.preference_contact')*</label>
            </div>

            <p>
                <label class="form-validate">
                    <input type="checkbox" id="terms" name="terms"/>
                    <span>@lang('forms.first_terms_message') <a
                                id="btn-term"> @lang('forms.last_terms_message')</a></span>
                </label>
            </p>
            <div class="input-field col s12">
                <a data-url="inscripcion-exitosa-voluntario" data-is-voluntary="true"
                   class="waves-effect waves-light btn" id="btn-register"
                   style="background-color: '#30c39e'">@lang('forms.register')</a>
            </div>
        </div>
    </div>
@endsection