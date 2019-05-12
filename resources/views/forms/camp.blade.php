@extends('layouts.form')

@section('content')
<h5 class="red-text text-accent-1 center-align">ข้อมูลค่ายที่เคยเข้าร่วม</h5>
<blockquote class="valign">
  @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
          <p class="red-text">{{ $error }}</p>
      @endforeach
  @endif
</blockquote>
<blockquote>
    <p>เมื่อกดบันทึกข้อมูลแล้ว จะไม่สามารถแก้ไขข้อมูลได้ แต่สามารถเพิ่มข้อมูลได้</p>
</blockquote>
<form method="POST" action="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <ul class="collection" id="camp-parent">
    <li class="collection-item">
        <div class="row row-in-li">
            <div class="input-field col s12 m6">
                <input name="campname[]" type="text" class="validate" value="">
                <label>ชื่อค่าย</label>
            </div>
            <div class="input-field col s12 m6">
                <input name="organizer[]" type="text" class="validate" value="">
                <label>จัดโดย</label>
            </div>
        </div>
    </li>
</ul>
<div class="row">
    <div class="col s12 center-align">
        <div id="add-camp" class="btn waves-effect waves-light green accent-4">เพิ่มข้อมูลค่ายที่เคยเข้า</div>
    </div>
</div>
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
      let newNodeData = '<div class="row row-in-li"> <div class="input-field col s12 m5"> <input name="campname[]" type="text" class="validate" value=""> <label>ชื่อค่าย</label> </div><div class="input-field col s12 m5"> <input name="organizer[]" type="text" class="validate" value=""> <label>จัดโดย</label> </div><div class="input-field col s12 m2 right-align btn waves-effect waves-light red accent-2" onclick="deleteThis(this)">ลบ</div></div>';      
      let newNode = document.createElement('li');
      newNode.className = 'collection-item';
      newNode.innerHTML = newNodeData;
      let parent = document.getElementById('camp-parent');
      parent.appendChild(newNode);
      console.log('clicked');
    }
    document.getElementById('add-camp').onclick = addNewEducation;
    function deleteThis(a) {
        let parent = document.getElementById('camp-parent');
        parent.removeChild(a.parentElement.parentElement);
    }
</script>
@endsection