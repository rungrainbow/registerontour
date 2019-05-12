@extends('layouts.app')

@section('content')
            <h3 class="red-text text-accent-1" style="margin-left: 30px;">ข้อมูลผู้ใช้งาน</h3>
            @if (count($errors) > 0)
                <blockquote>
                    @foreach ($errors->all() as $error)
                        <p class="red-text">{{ $error }}</p>
                    @endforeach
                </blockquote>
            @endif
            <form method="post" id="recheck">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col l6 m6 s12 valign-wrapper des">
                        <blockquote>
                            <p>ตั้งรหัสเพื่อใช้ในการเข้าสู่ระบบ การแก้ไขคำถาม และกรอกข้อมูลเพิ่มเติมในภายหลัง</p>
                            <p>ชื่อผู้ใช้งาน เป็นตัวอักษร หรือตัวเลขเท่านั้น</p>
                            <p>รหัสผ่าน 6 หลักขึ้นไป</p>
                            <a href="/login">สำหรับผู้มีรหัสผ่านแล้ว คลิกที่นี่</a>
                        </blockquote>
                    </div>
                    <div class="col l6 m6 s12">
                    <div class="input-field col s12">
                            <input name="email" id="email" type="email" class="validate" required value="{{ old('email') }}">
                            <label for="email">อีเมลล์</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="username" id="username" type="text" class="validate" required value="{{ old('username') }}">
                            <label for="username">ชื่อผู้ใช้งาน</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" class="validate" required>
                            <label for="password">รหัสผ่าน</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="password_confirmation" id="password_confirmation" type="password" class="validate" required>
                            <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 right-align">
                        <button class="btn waves-effect waves-light" type="submit">ถัดไป
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