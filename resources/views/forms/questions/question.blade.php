@extends('layouts.form')

@section('content')
@if(!isset($error))
<h5 class="red-text text-accent-1 center-align">คำถามข้อที่ {{ $id }}</h5>
@if (count($errors) > 0)
    <div class="card-panel red white-text">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form method="post">
<ul class="collection" id="camp-parent">
    <li class="collection-item">
        <blockquote>{{ $question }}</blockquote>
    </li>
    <li class="collection-item">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row row-in-li">
            <div class="input-field col s12">
                <textarea name="answer" class="materialize-textarea">{{$answer}}</textarea>
                <label for="q1answer">ตอบคำถามที่นี่</label>
            </div>
        </div>
    </li>
</ul>
<div class="row">
    <div class="col s6 left-align">
        <a href="/home/questions" class="btn waves-effect waves-light red accent-2">ย้อนกลับ
            <i class="material-icons left">settings_backup_restore</i>
        </a>
    </div>
    <div class="col s6 right-align">
        <button class="waves-effect waves-green btn green accent-4">
            <i class="material-icons right">send</i>
            บันทึก
        </button>
    </div>
</div>
</form>
@else
  <p class="center-align red-text">ขออภัย ไม่พบข้อมูล / URL ผิดพลาด</p>
@endif
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