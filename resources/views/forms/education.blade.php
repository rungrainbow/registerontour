@extends('layouts.form')

@section('content')
<h5 class="red-text text-accent-1 center-align">ข้อมูลสถานศึกษา</h5>
@if (count($errors) > 0)
    <div class="card-panel red white-text">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(isset($success))
<div class="card-panel green accent-4 white-text">{{ $success }}</div>
@endif
<form method="POST" action="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <ul class="collection" id="education-parent">
    <li class="collection-item">
        <div class="row row-in-li">
            <div class="input-field col s12 m3">
                <select name="level" class="browser-default" required>
                    <option value="" disabled selected>ระดับการศึกษา</option>
                    <option value="1" @if(((!isset($currentData['level'])) ? old('level') : $currentData['level']) == '1') selected @endif>ม.4</option>
                    <option value="2" @if(((!isset($currentData['level'])) ? old('level') : $currentData['level']) == '2') selected @endif>ม.5</option>
                    <option value="3" @if(((!isset($currentData['level'])) ? old('level') : $currentData['level']) == '3') selected @endif>ปวช.1</option>
                    <option value="4" @if(((!isset($currentData['level'])) ? old('level') : $currentData['level']) == '4') selected @endif>ปวช.2</option>
                </select>
            </div>
            <div class="input-field col s12 m9">
                <input name="school" type="text" class="validate" value="{{ (!isset($currentData['school'])) ? old('school') : $currentData['school'] }}">
                <label>โรงเรียน</label>
            </div>
            <div class="input-field col s12 m6">
                <input name="plan" type="text" class="validate" value="{{ (!isset($currentData['plan'])) ? old('plan') : $currentData['plan'] }}">
                <label>แผนการเรียน</label>
            </div>
            <div class="input-field col s12 m6">
                <input name="province" type="text" class="validate" required value="{{ (!isset($currentData['province'])) ? old('province') : $currentData['province'] }}">
                <label>จังหวัด</label>
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
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 21,
        max: new Date('2017/12/31'),
        format: 'yyyy/mm/dd'
    });
    const addNewEducation = function () {
      let newNodeData = '<div class="row"> <div class="input-field col s12 m3"> <select name="level[]" class="browser-default" required> <option value="" disabled selected>ระดับการศึกษา</option> <option value="1">ม.5</option> <option value="2">ม.6</option> <option value="3">ปวช.2</option> <option value="4">ปวช.3</option> </select> </div><div class="input-field col s12 m6"> <input name="plan[]" type="text" class="validate" value=""> <label>แผนการเรียน</label> </div><div class="input-field col s12 m3"> <input name="grade[]" type="number" max="4" min="0" step="0.01" class="validate" value=""> <label>เกรดเฉลี่ย</label> </div><div class="input-field col s12 m6"> <input name="school[]" type="text" class="validate" value=""> <label>โรงเรียน</label> </div><div class="input-field col s12 m6"> <input name="province[]" type="text" class="validate" required value=""> <label>จังหวัด</label> </div></div>';      
      let newNode = document.createElement('li');
      newNode.className = 'collection-item';
      newNode.innerHTML = newNodeData;
      let parent = document.getElementById('education-parent');
      let tempLast = parent.lastElementChild;
      parent.removeChild(tempLast);
      parent.appendChild(newNode);
      parent.appendChild(tempLast);
      console.log('clicked');
    }
</script>
@endsection