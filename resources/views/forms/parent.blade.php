@extends('layouts.form')

@section('content')
<h5 class="red-text text-accent-1 center-align">ข้อมูลผู้ปกครอง</h5>
<blockquote class="valign">
  @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
          <p class="red-text">{{ $error }}</p>
      @endforeach
  @endif
</blockquote>
<blockquote>
  <p>น้องจะต้องกรอกข้อมูลในส่วนของผู้ปกครอง (ติดต่อในกรณีฉุกเฉิน)</p>
  <p>ในส่วนของข้อมูลบิดา มารดา ไม่จำเป็นต้องกรอกก็ได้</p>
</blockquote>
<form method="POST" enctype="multipart/form-data" action="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <ul class="collection" id="education-parent">
    <li class="collection-item">
        <div class="row">
          <div class="input-field col s12 m5">
              <input name="parentname" id="parentname" type="text" class="validate" value="{{ (!isset($currentData['parent'])) ? old('parentname') : $currentData['parent']['name'] }}" required>
              <label for="parentname">ชื่อผู้ปกครอง</label>
          </div>
          <div class="input-field col s12 m5">
              <input name="parentlastname" id="parentlastname" type="text" class="validate" value="{{ (!isset($currentData['parent'])) ? old('parentlastname') : $currentData['parent']['lastname'] }}" required>
              <label for="parentlastname">นามสกุล</label>
          </div>
          <div class="input-field col s12 m2">
              <input name="parenttel" id="parenttel" type="number" class="validate"value="{{ (!isset($currentData['parent'])) ? old('parenttel') : $currentData['parent']['telephone'] }}" required>
              <label for="parenttel">เบอร์โทรศัพท์</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m5">
              <input name="dadname" id="dadname" type="text" class="validate" value="{{ (!isset($currentData['dad'])) ? old('dadname') : $currentData['dad']['name'] }}">
              <label for="dadname">ชื่อบิดา</label>
          </div>
          <div class="input-field col s12 m5">
              <input name="dadlastname" id="dadlastname" type="text" class="validate" value="{{ (!isset($currentData['dad'])) ? old('dadlastname') : $currentData['dad']['lastname'] }}">
              <label for="dadlastname">นามสกุล</label>
          </div>
          <div class="input-field col s12 m2">
              <input name="dadtel" id="dadtel" type="number" class="validate" value="{{ (!isset($currentData['dad'])) ? old('dadtel') : $currentData['dad']['telephone'] }}">
              <label for="dadtel">เบอร์โทรศัพท์</label>
          </div>
        </div>
        <div class="row row-in-li">
          <div class="input-field col s12 m5"> 
              <input name="momname" id="momname" type="text" class="validate" value="{{ (!isset($currentData['mom'])) ? old('momname') : $currentData['mom']['name'] }}">
              <label for="momname">ชื่อมารดา</label>
          </div>
          <div class="input-field col s12 m5">
              <input name="momlastname" id="momlastname" type="text" class="validate" value="{{ (!isset($currentData['mom'])) ? old('momlastname') : $currentData['mom']['lastname'] }}">
              <label for="momlastname">นามสกุล</label>
          </div>
          <div class="input-field col s12 m2">
              <input name="momtel" id="momtel" type="number" class="validate" value="{{ (!isset($currentData['mom'])) ? old('momtel') : $currentData['mom']['telephone'] }}">
              <label for="momtel">เบอร์โทรศัพท์</label>
          </div>
        </div>
    </li>
</ul>
<blockquote>
    <p>เอกสารขออนุญาติผู้ปกครอง (รูปภาพ หรือไฟล์ PDF, ขนาดไม่เกิน 2M)</p>
    <a href="https://drive.google.com/open?id=0B4ENK_zdFW63RURtWjdPOVRmbFE" target="_blank">คลิ๊กที่นี่ เพื่อดาวน์โหลดเอกสาร</a>
</blockquote>
<ul class="collection" id="education-parent">
    <li class="collection-item">
        <div class="file-field input-field">
            <div class="btn">
                <span>เลือกไฟล์</span>
                <input type="file" accept=".pdf,image/*" name="approvefile" @if($file == null) required @endif>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" value="{{ $file }}" type="text">
            </div>
        </div>
    </li>
</ul>
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
</script>
@endsection