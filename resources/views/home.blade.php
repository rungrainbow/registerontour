@extends('layouts.app')

@section('content')
<h4 class="red-text text-accent-1 header">กรอกข้อมูลเพิ่มเติม !</h4>
<blockquote>
    <p>สวัสดีครับ เรามาเพิ่มเติมส่วนที่หายไปกันเถอะ !</p>
    <p>น้องสามารถเลือกทำส่วนใดก่อนก็ได้</p>
    <p>หัวข้อที่ยังไม่สมบูรณ์จะเป็นสีแดง หัวข้อที่เสร็จสมบูรณ์แล้วจะเป็นสีเขียว</p>
    <p>เมื่อน้องกรอกข้อมูลครบทุกส่วนแล้ว ถือว่าเป็นการเสร็จสิ้นการสมัคร (เขียวทุกหัวข้อ)</p>
</blockquote>
<div class="row">
    <a class="col s12 m6 l4" href="/home/personal">
        <div class="card-pixel card @if($status['profile']) green accent-4 @else red accent-2 @endif">
            <div class="card-pixel card-content white-text center-align">
                <i class="material-icons medium">contacts</i>
                <p>ข้อมูลส่วนตัว</p>
            </div>
        </div>
    </a>
    <a class="col s12 m6 l4" href="/home/education">
        <div class="card-pixel card @if($status['education']) green accent-4 @else red accent-2 @endif" id="schoolInfoCard">
            <div class="card-pixel card-content white-text center-align">
                <i class="material-icons medium">work</i>
                <p>ข้อมูลสถานศึกษา</p>
            </div>
        </div>
    </a>
    <a class="col s12 m6 l4" href="/home/location">
        <div class="card-pixel card @if($status['location']) green accent-4 @else red accent-2 @endif" id="homeInfoCard">
            <div class="card-pixel card-content white-text center-align">
                <i class="material-icons medium">location_on</i>
                <p>ข้อมูลที่อยู่อาศัย</p>
            </div>
        </div>
    </a>
    <a class="col s12 m6" href="/home/parent">
        <div class="card-pixel card @if($status['parent']) green accent-4 @else red accent-2 @endif" id="parentInfoCard">
            <div class="card-pixel card-content white-text center-align">
                <i class="material-icons medium">supervisor_account</i>
                <p>ข้อมูลผู้ปกครอง</p>
            </div>
        </div>
    </a>
    <a class="col s12 l6 m12" href="/home/questions">
        <div class="card-pixel card @if($status['question']) green accent-4 @else red accent-2 @endif" id="answerCard">
            <div class="card-pixel card-content white-text center-align">
                <i class="material-icons medium">question_answer</i>
                <p>คำถามเข้าค่าย อิอิ ~</p>
            </div>
        </div>
    </a>
</div>
<div class="row">
    <div class="col s12 right-align">
        <a href="/logout" class="waves-effect waves-light btn grey">
            <i class="material-icons right">lock_outline</i>
            ออกจากระบบ
        </a>
    </div>
</div>
@endsection