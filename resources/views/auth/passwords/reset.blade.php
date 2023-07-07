@component('layouts.auth1')
    @slot('title') پنل کارشناس @endslot
    @slot('body')
        <style>
            .w50{
                width: 50%!important;
            }
            ::-webkit-input-placeholder { /* Edge */
                text-align: right!important;
            }

            :-ms-input-placeholder { /* Internet Explorer 10-11 */
                text-align: right!important;
            }

            ::placeholder {
                text-align: right!important;
            }
            .log_des_box p
            {
                font-size: 13px;
            }
            .log_des_box p a
            {
                color: darkred;
                font-size: 15px;
                margin-right: 5px;
            }
        </style>
        <div class="uk-width-1-4@m uk-align-center cont_box_1">
            <div class="cont_box">
                <div class="title_box">
                    <h3>
                        گذرواژه جدید خود را وارد نمایید
                    </h3>
                </div>
                {{ Form::open(array('route' => 'resetPassword-update')) }}
                <input type="hidden" name="token" value="{{$token}}">
                <div class="control_box">
                    <label for="password" class="float-right">گذرواژه جدید</label>
                    <input name="password" type="password" class="text-left" style="direction: ltr" placeholder="گذرواژه جدید">
                </div>
                <div class="control_box">
                    <label for="password_confirmation" class="float-right">تکرار گذرواژه</label>
                    <input name="password_confirmation" type="password" class="text-left" style="direction: ltr" placeholder="تکرار گذرواژه">
                </div>
                <div class="control_box">
                    <ul class="ul">
                        <li class="w-100 text-left">
                            <button type="submit">ثبت</button>
                        </li>
                    </ul>
                </div>
                {{ Form::close() }}
            </div>
            <!-- The Modal -->
        </div>
    @endslot
@endcomponent