@extends('layouts.app')

@section('content')
<h5 class="red-text text-accent-1 center-align">ระบบตรวจคำตอบ กรุณาเข้าสู่ระบบ</h5>
<form method="post" action="{{ url('/checkanswer/login') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col l12 m12 s12">
            <blockquote class="valign">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="red-text">{{ $error }}</p>
                    @endforeach
                @elseif (isset($loginError))
                    <p class="red-text">ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง</p>
                @endif
            </blockquote>
        </div>
        <div class="col l12 m12 s12">
            <div class="input-field col s12">
                <input name="username" id="username" type="text" class="validate" required>
                <label for="username">ชื่อผู้ใช้</label>
            </div>
            <div class="input-field col s12">
                <input name="password" id="password" type="password" class="validate" required>
                <label for="password">รหัสผ่าน</label>
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
</script>
@endsection

