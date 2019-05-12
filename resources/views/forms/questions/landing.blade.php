@extends('layouts.form')

@section('content')
            <h5 class="red-text text-accent-1">คำถาาาามมมมมมมม ~~</h5>
            <blockquote>
                <p>น้องสามารถเลือกทำข้อใดก่อนก็ได้</p>
                <p>ข้อใดที่ตอบ และกดบันทึกแล้ว ระบบจะเก็บข้อมูล</p>
            </blockquote>
            <div class="row">
                <div class="col m10 offset-m1 s12">
                    <ul class="collapsible" data-collapsible="accordion">
                    @for ($i = 1; $i <= $numOfAllQuestions; $i++)
                        <li>
                            @if($isAnswered[$i])
                            <a class="collapsible-header black-text" href="/home/questions/{{$i}}">
                                <span class="badge green-text">ตอบแล้ว</span>
                                <i class="material-icons green-text">done</i>
                                คำถามข้อที่ {{$i}}
                            </a>
                            @else
                            <a class="collapsible-header black-text" href="/home/questions/{{$i}}">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ {{$i}}
                            </a>
                            @endif
                        </li>
                    @endfor
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s6 left-align">
                    <a href="/home" class="btn waves-effect waves-light red accent-2">ย้อนกลับ
                        <i class="material-icons left">settings_backup_restore</i>
                    </a>
                </div>
            </div>
@endsection

@section('extendScript')
<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    firstCheckQuiz();
  });
</script>
@endsection