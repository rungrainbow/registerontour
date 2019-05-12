@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="header">2B-STAFF</h1>
    <div class="collection">
        <div class="collection-item">
            <h5 class="red-text text-accent-1 header">กรอกข้อมูลเพิ่มเติม !</h5>
            <blockquote>
                <p>สวัสดีน้อง {{ $currentData->name }} {{ $currentData->lastname }} เรามาเพิ่มเติมส่วนที่หายไปกันเถอะ !</p>
                <p>น้องสามารถเลือกทำส่วนใดก่อนก็ได้</p>
                <p>หัวข้อที่ยังไม่สมบูรณ์จะเป็นสีแดง หัวข้อที่เสร็จสมบูรณ์แล้วจะเป็นสีเขียว</p>
                <p>เมื่อน้องกรอกข้อมูลครบทุกส่วนแล้ว ถือว่าเป็นการเสร็จสิ้นการสมัคร (เขียวทุกหัวข้อ)</p>
            </blockquote>
            <div class="row">
                <a class="col s12 m6 l4" href="#schoolinfo">
                    <div class="card red accent-2" id="schoolInfoCard">
                        <div class="card-content white-text center-align">
                            <i class="material-icons medium">assignment_ind</i>
                            <p>ข้อมูลสถานศึกษา</p>
                        </div>
                    </div>
                </a>
                <a class="col s12 m6 l4" href="#homeinfo">
                    <div class="card red accent-2" id="homeInfoCard">
                        <div class="card-content white-text center-align">
                            <i class="material-icons medium">location_on</i>
                            <p>ข้อมูลที่อยู่อาศัย</p>
                        </div>
                    </div>
                </a>
                <a class="col s12 m6 l4" href="#parentinfo">
                    <div class="card red accent-2" id="parentInfoCard">
                        <div class="card-content white-text center-align">
                            <i class="material-icons medium">contacts</i>
                            <p>ข้อมูลผู้ปกครอง</p>
                        </div>
                    </div>
                </a>
                <a class="col s12 m6 l4" href="#2binfo">
                    <div class="card red accent-2" id="a2bInfoCard">
                        <div class="card-content white-text center-align">
                            <i class="material-icons medium">info</i>
                            <p>ข้อมูลโครงการ 2B-KMUTT</p>
                        </div>
                    </div>
                </a>
                <a class="col s12 m6 l4" href="#uploadDocument">
                    <div class="card red accent-2" id="uploadDocCard">
                        <div class="card-content white-text center-align">
                            <i class="material-icons medium">done_all</i>
                            <p>ไฟล์เพิ่มเติม</p>
                        </div>
                    </div>
                </a>
                <a class="col s12 m6 l4" href="quiz">
                    <div class="card red accent-2" id="answerCard">
                        <div class="card-content white-text center-align">
                            <i class="material-icons medium">question_answer</i>
                            <p>คำถามเข้าค่าย อิอิ ~</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col s12 left-align">
                    <a href="/logout" class="waves-effect waves-light btn grey">
                        <i class="material-icons left">lock_outline</i>
                        ออกจากระบบ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="schoolinfo" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">ข้อมูลสถานศึกษา</h4>
        <form data-mode="1" data-url="/api/schoolinfo" class="preventForm" id="schoolinfoForm">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"></input>
            <div class="row">
                <div class="input-field col s12 m3">
                    <select name="education_grade" id="education_grade" class="modalSelect" required>
                        <option value="">ระดับการศึกษา</option>
                        <option @if($currentData->education_grade == 1) selected @endif value="1">ม.6</option>
                        <option @if($currentData->education_grade == 2) selected @endif value="2">ปวช.3</option>
                    </select>
                </div>
                <div class="input-field col s12 m6">
                    <input name="education_plan" id="education_plan" type="text" class="validate" value="{{ $currentData->education_plan }}">
                    <label for="education_plan">แผนการเรียน</label>
                </div>
                <div class="input-field col s12 m3">
                    <input name="grade" id="grade" type="number" max="4" min="0" step="0.01" class="validate" value="{{ $currentData->grade }}">
                    <label for="grade">เกรดเฉลี่ย</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="school" id="school" type="text" class="validate" value="{{ $currentData->school }}">
                    <label for="school">โรงเรียน</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="province" id="province" type="text" class="validate" required value="{{ $currentData->school_province }}">
                    <label for="province">จังหวัด</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        ส่งข้อมูล
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="homeinfo" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">ข้อมูลที่อยู่อาศัย</h4>
        <form data-mode="2" data-url="/api/homeinfo" class="preventForm" id="schoolinfoForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s4 m2">
                    <input name="address" id="address" type="text" class="validate" required value="{{ $currentData->homeaddress }}">
                    <label for="address">บ้านเลขที่</label>
                </div>
                <div class="input-field col s8 m4">
                    <input name="mooban" id="moobaan" type="text" class="validate" value="{{ $currentData->mooban }}">
                    <label for="moobaan">หมู่บ้าน</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="soi" id="soi" type="text" class="validate" value="{{ $currentData->soi }}">
                    <label for="soi">ซอย</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="street" id="street" type="text" class="validate" required value="{{ $currentData->street }}">
                    <label for="street">ถนน</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="district" id="district" type="text" class="validate" required value="{{ $currentData->district }}">
                    <label for="district">แขวง</label>
                </div>
                <div class="input-field col s12 m5">
                    <input name="area" id="area" type="text" class="validate" value="{{ $currentData->area }}" required>
                    <label for="area">เขต</label>
                </div>
                <div class="input-field col s12 m5">
                    <input name="province" id="province" type="text" class="validate" value="{{ $currentData->province }}" required>
                    <label for="province">จังหวัด</label>
                </div>
                <div class="input-field col s12 m2">
                    <input name="postcode" id="postcode" type="text" class="validate" required value="{{ $currentData->postcode }}">
                    <label for="postcode">รหัสไปรษณีย์</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        ส่งข้อมูล
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="parentinfo" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">ข้อมูลผู้ปกครอง</h4>
        <blockquote>
            <p>น้องจะต้องกรอกข้อมูลในส่วนของผู้ปกครอง (ติดต่อในกรณีฉุกเฉิน)</p>
            <p>ในส่วนของข้อมูลบิดา มารดา ไม่จำเป็นต้องกรอกก็ได้</p>
        </blockquote>
        <form data-mode="3" data-url="/api/parentinfo" class="preventForm" id="schoolinfoForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m5">
                    <input name="dadname" id="dadname" type="text" class="validate" value="{{ $currentData->dad_name }}">
                    <label for="dadname">ชื่อบิดา</label>
                </div>
                <div class="input-field col s12 m5">
                    <input name="dadlastname" id="dadlastname" type="text" class="validate" value="{{ $currentData->dad_lastname }}">
                    <label for="dadlastname">นามสกุล</label>
                </div>
                <div class="input-field col s12 m2">
                    <input name="dadtelephone" id="dadtelephone" type="text" class="validate" value="{{ $currentData->dad_telephone }}">
                    <label for="dadtelephone">เบอร์โทรศัพท์</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m5"> 
                    <input name="momname" id="momname" type="text" class="validate" value="{{ $currentData->mom_name }}">
                    <label for="momname">ชื่อมารดา</label>
                </div>
                <div class="input-field col s12 m5">
                    <input name="momlastname" id="momlastname" type="text" class="validate" value="{{ $currentData->mom_lastname }}">
                    <label for="momlastname">นามสกุล</label>
                </div>
                <div class="input-field col s12 m2">
                    <input name="momtelephone" id="momtelephone" type="text" class="validate" value="{{ $currentData->mom_telephone }}">
                    <label for="momtelephone">เบอร์โทรศัพท์</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m5">
                    <input name="parentname" id="parentname" type="text" class="validate" value="{{ $currentData->parent_name }}">
                    <label for="parentname">ชื่อผู้ปกครอง</label>
                </div>
                <div class="input-field col s12 m5">
                    <input name="parentlastname" id="parentlastname" type="text" class="validate" value="{{ $currentData->parent_lastname }}">
                    <label for="parentlastname">นามสกุล</label>
                </div>
                <div class="input-field col s12 m2">
                    <input name="parenttelephone" id="parenttelephone" type="text" class="validate"value="{{ $currentData->parent_telephone }}">
                    <label for="parenttelephone">เบอร์โทรศัพท์</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        ส่งข้อมูล
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="2binfo" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">ข้อมูลโครงการ 2B-KMUTT</h4>
        <form data-mode="4" data-url="/api/2binfo" class="preventForm" id="schoolinfoForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m5 l4">
                    <input name="2bgen" type="hidden" value="13">
                    <input id="2bgen" type="number" value="13" disabled>
                    <label for="2bgen">นักเรียนโครงการ 2B-KMUTT รุ่นที่</label>
                </div>
                <div class="input-field col s12 m7 l8">
                    <input name="researchgroup" id="researchgroup" type="text" class="validate" required value="{{ $currentData->a2b_researchgroup }}">
                    <label for="researchgroup">กลุ่มวิจัย</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="facility" id="facility" type="text" class="validate" value="{{ $currentData->a2b_department }}" required>
                    <label for="facility">คณะ / หน่วยงาน</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="department" id="department" type="text" class="validate" value="{{ $currentData->a2b_facility }}" required>
                    <label for="department">ภาควิชา</label>
                </div>
            </div>
            <h6 class="red-text text-accent-1">เข้าศึกษาต่อ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ที่</h6>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input name="facilityentrance" id="facilityentrance" type="text" class="validate" value="{{ $currentData->entrance_facility }}" required>
                    <label for="facilityentrance">คณะ / หน่วยงาน</label>
                </div>
                <div class="input-field col s12 m6">
                    <input name="departmententrance" id="departmententrance" type="text" class="validate" value="{{ $currentData->entrance_department }}" required>
                    <label for="departmententrance">ภาควิชา</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        ส่งข้อมูล
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="uploadDocument" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">ไฟล์เพิ่มเติม</h4>
        <blockquote>
            <p>ดาวน์โหลดเอกสาร <a href="https://goo.gl/uUQrpV" target="_blank">ขออนุญาติผู้ปกครอง</a> ให้ผู้ปกครองลงชื่อและอัพโหลดในสกุลไฟล์ .pdf</p>
        </blockquote>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Select</span>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" accept=".pdf" name="uploaddoc" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="เอกสารขออนุญาติผู้ปกครอง">
                    </div>
                </div>
            </div>
            <blockquote>
                <p>อัพโหลดรูปถ่าย 1 รูป</p>
            </blockquote>
            <div class="row">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Select</span>
                        <input type="file" accept="image/*" name="picture" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="รูปภาพ">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        ส่งข้อมูล
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extendScript')
<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal({
        ready: function (modal, trigger) {
            $('select.modalSelect').material_select()
        }
    })
    firstCheck()
  })
</script>
@endsection