@extends('layouts.app')

@section('content')
<h3 class="red-text text-accent-1" style="margin-left: 30px;">เข้าสู่ระบบ</h3>
<form method="post" action="{{ url('/login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col l12 m12 s12">
            <blockquote class="valign" style="font-size: 18px;">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="red-text">{{ $error }}</p>
                    @endforeach
                @elseif (isset($loginError))
                    <p class="red-text">ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง</p>
                @else
                    <p>กรอกชื่อผู้ใช้งาน และรหัสผ่าน เพื่อเข้าสู่ระบบสมัครต่อไป</p>
                    <a href="/register">ยังไม่มีรหัสผ่าน คลิกที่นี่ เพื่อสมัคร</a>
                @endif
            </blockquote>
        </div>
        <div class="col l12 m12 s12">
            <div class="input-field col s12">
                <input name="username" id="username" type="text" class="validate" required>
                <label for="username" >ชื่อผู้ใช้</label>
            </div>
            <div class="input-field col s12">
                <input name="password" id="password" type="password" class="validate" required>
                <label for="password" >รหัสผ่าน</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 right-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">ถัดไป
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('extendScript')
<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 40, // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
@endsection

