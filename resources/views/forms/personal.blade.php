@extends('layouts.form')

@section('content')
<h5 class="red-text text-accent-1 header">ข้อมูลส่วนตัว</h5>
<blockquote class="valign">
  @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
          <p class="red-text">{{ $error }}</p>
      @endforeach
  @endif
</blockquote>
<form action="" method="POST" enctype="multipart/form-data">
<ul class="collection" id="education-parent">
    <li class="collection-item">
        <div class="row row-in-li">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-field col s12 m4">
                    <input name="name" id="name" type="text" class="validate" value="{{ (!isset($currentData['name'])) ? old('name') : $currentData['name'] }}" required>
                    <label for="name">ชื่อจริง</label>
                </div>
                <div class="input-field col s12 m4">
                    <input name="lastname" id="lastname" type="text" class="validate" value="{{ (!isset($currentData['lastname'])) ? old('lastname') : $currentData['lastname'] }}" required>
                    <label for="lastname">นามสกุล</label>
                </div>
                <div class="input-field col s12 m2">
                    <input name="nickname" id="nickname" type="text" class="validate" value="{{ (!isset($currentData['nickname'])) ? old('nickname') : $currentData['nickname'] }}" required>
                    <label for="nickname">ชื่อเล่น</label>
                </div>
                <div class="input-field col s6 m2">
                    <select required name="gender">
                        <option value="">กรุณาเลือกเพศ</option>
                        <option value="1" @if(((!isset($currentData['gender'])) ? old('gender') : $currentData['gender']) == '1') selected @endif>ชาย</option>
                        <option value="2" @if(((!isset($currentData['gender'])) ? old('gender') : $currentData['gender']) == '2') selected @endif>หญิง</option>
                    </select>
                </div>
                <div class="input-field col s6 m2">
                    <input name="dob" id="dob" type="date" class="datepicker" value="{{ (!isset($currentData['dob'])) ? old('dob') : $currentData['dob'] }}" required>
                    <label for="dob">วันเกิด</label>
                </div>
                <div class="input-field col s12 m2">
                    <input name="religion" id="religion" type="text" class="validate" value="{{ (!isset($currentData['religion'])) ? old('religion') : $currentData['religion'] }}" required>
                    <label for="religion">ศาสนา</label>
                </div>
                <div class="input-field col s12 m4">
                    <input name="telephone" id="telephone" type="tel" maxlength="10" class="validate" required value="{{ (!isset($currentData['telephone'])) ? old('telephone') : $currentData['telephone'] }}">
                    <label for="telephone">เบอร์โทรศัพท์มือถือ</label>
                </div>
                <div class="input-field col s12 m4">
                    <input name="facebook" id="facebook" type="url" class="validate" value="{{ (!isset($currentData['facebook'])) ? old('facebook') : $currentData['facebook'] }}">
                    <label for="facebook">Facebook(ลิ้งค์)</label>
                </div>
                <div class="input-field col s12">
                    <input name="disase" id="disase" type="text" class="validate" value="{{ (!isset($currentData['disase'])) ? old('disase') : $currentData['disase'] }}">
                    <label for="disase">โรคประจำตัว</label>
                </div>
                <div class="input-field col s12">
                    <input name="allergies" id="allergies" type="text" class="validate" value="{{ (!isset($currentData['allergies'])) ? old('allergies') : $currentData['allergies'] }}">
                    <label for="allergies">สิ่งที่แพ้</label>
                </div>
                <div class="input-field col s12">
                    <input name="drug" id="drug" type="text" class="validate" value="{{ (!isset($currentData['drug'])) ? old('drug') : $currentData['drug'] }}">
                    <label for="drug">ยา / การรักษาเบื้องต้น</label>
                </div>
        </div>
    </li>
</ul>
<blockquote>
    <p>ไฟล์รูปภาพ (ขนาดไม่เกิน 2M)</p>
</blockquote>
<ul class="collection" id="education-parent">
    <li class="collection-item">
        <div class="file-field input-field">
            <div class="btn">
                <span>เลือกไฟล์</span>
                <input type="file" accept="image/*" name="picture" @if(isset($file) && $file == null) required @endif>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" value="{{ (isset($file)) ? $file : '' }}" type="text">
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
        format: 'yyyy/mm/dd',
        onSet: function(arg) {
            if ('select' in arg){ //prevent closing on selecting month/year
                this.close();
            }
        }
    });
</script>
@endsection