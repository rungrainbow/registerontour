@extends('layouts.form')

@section('content')
<h5 class="red-text text-accent-1 header">ข้อมูลที่อยู่อาศัย</h5>
@if (count($errors) > 0)
    <div class="card-panel red white-text">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form method="post">
<ul class="collection" id="education-parent">
    <li class="collection-item">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row row-in-li">
            <div class="input-field col s4 m2">
                <input name="address" id="address" type="text" class="validate" required value="{{ (!isset($currentData['address'])) ? old('address') : $currentData['address'] }}">
                <label for="address">บ้านเลขที่</label>
            </div>
            <div class="input-field col s8 m4">
                <input name="moo" id="moo" type="number" class="validate" value="{{ (!isset($currentData['moo'])) ? old('moo') : $currentData['moo'] }}">
                <label for="moo">หมู่</label>
            </div>
            <div class="input-field col s12 m6">
                <input name="soi" id="soi" type="text" class="validate" value="{{ (!isset($currentData['soi'])) ? old('soi') : $currentData['soi'] }}">
                <label for="soi">ซอย</label>
            </div>
            <div class="input-field col s12 m6">
                <input name="street" id="street" type="text" class="validate" value="{{ (!isset($currentData['street'])) ? old('street') : $currentData['street'] }}">
                <label for="street">ถนน</label>
            </div>
            <div class="input-field col s12 m6">
                <input name="district" id="district" type="text" class="validate" required value="{{ (!isset($currentData['district'])) ? old('district') : $currentData['district'] }}">
                <label for="district">ตำบล</label>
            </div>
            <div class="input-field col s12 m5">
                <input name="area" id="area" type="text" class="validate" value="{{ (!isset($currentData['area'])) ? old('area') : $currentData['area'] }}" required>
                <label for="area">อำเภอ</label>
            </div>
            <div class="input-field col s12 m5">
                <input name="province" id="province" type="text" class="validate" value="{{ (!isset($currentData['province'])) ? old('province') : $currentData['province'] }}" required>
                <label for="province">จังหวัด</label>
            </div>
            <div class="input-field col s12 m2">
                <input name="postcode" id="postcode" type="text" class="validate" required value="{{ (!isset($currentData['postcode'])) ? old('postcode') : $currentData['postcode'] }}">
                <label for="postcode">รหัสไปรษณีย์</label>
            </div>
        </div>
    </ul>
</li>
<div class="row">
    <div class="col s6 left-align">
        <a href="/home" class="btn waves-effect waves-light red accent-2">ย้อนกลับ
            <i class="material-icons left">settings_backup_restore</i>
        </a>
    </div>
    <div class="col s6 right-align">
        <button class="btn waves-effect waves-light green accent-4" type="submit">บันทึกข้อมูล
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
</form>
@endsection

@section('extendScript')
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 21,
        max: new Date('2017/12/31'),
        format: 'yyyy/mm/dd'
    });
</script>
@endsection