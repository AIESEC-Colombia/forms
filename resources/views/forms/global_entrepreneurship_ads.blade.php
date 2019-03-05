@extends('layout.template')

@section('content')
    <div class="container">

        <div class="row" id="form">
            <div class="col s12 m12">
                <h2 class="header" id="title">@lang('forms.entrepreneurship')</h2>
            </div>
            <div class="col s12 m12">
                @lang('forms.entrepreneurship_message')
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">account_circle</i>
                <input id="firstName" name="first_name" type="text" class="validate">
                <label for="firstName">@lang('forms.first_name')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">perm_identity</i>
                <input id="lastName" name="last_name" type="text" class="validate">
                <label for="lastName">@lang('forms.last_name')*</label>
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
                <label for="email">@lang('forms.mail')*</label>
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
                <input id="password_confirmed" name="password_confirmed" type="password" class="validate">
                <label for="password_confirmed">@lang('forms.password_confirmed')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">email</i>
                <select id="organization" name="organization">
                    <option value="">@lang('forms.list_message',['field' => 'organización'])</option>
                    @foreach($organization as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.organization')*</label>
            </div>

            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">local_library</i>
                <select id="activities" name="activities">
                    <option value="" disabled selected>@lang('forms.activities')</option>
                    @foreach($activities as $activity)
                        <option value="{{$activity['name']}}">{{$activity['name']}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.activities')*</label>
            </div>

            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">flight_land</i>
                <select id="travelDate" name="travelDate">
                    <option value="" disabled selected>@lang('forms.travel_date')</option>
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
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">border_color</i>
                <select id="englishLevel" name="englishLevel">
                    <option value="" disabled selected>Nivel de Inglés?</option>
                    @foreach($english_level as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>¿Nivel de Inglés?*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">rowing</i>
                <select id="experience" name="experience">
                    <option value="" disabled selected>@lang('forms.preference_contact')</option>
                    @foreach($experience as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.preference_contact')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">trending_up</i>
                <select id="career" name="career">
                    <option value="" disabled selected>@lang('forms.career')</option>
                    @foreach($career as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.career')*</label>
            </div>
            <div class="input-field col s12 form-validate">
                <i class="material-icons prefix">border_color</i>
                <select id="semester" name="semester">
                    <option value="" disabled selected>@lang('forms.semester')</option>
                    @foreach($semester as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <label>@lang('forms.semester')*</label>
            </div>
            <p>
                <label class="form-validate">
                    <input type="checkbox" id="terms" name="terms"/>
                    <span>@lang('forms.first_terms_message') <a
                                id="btn-term"> @lang('forms.last_terms_message') </a></span>
                </label>
            </p>
            <div class="input-field col s12">
                <a data-url="inscripcion-exitosa-emprendedor" class="waves-effect waves-light btn"
                   id=btn-register>@lang('forms.register')</a>
            </div>
        </div>
    </div>
@endsection