@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="header">2B-STAFF</h1>
    <div class="collection">
        <div class="collection-item">
            <h5 class="red-text text-accent-1">คำถาาาามมมมมมมม ~~</h5>
            <blockquote>
                <p>น้องสามารถเลือกทำข้อใดก่อนก็ได้</p>
                <p>ข้อใดที่ตอบ และกดบันทึกแล้ว ระบบจะเก็บข้อมูล</p>
            </blockquote>
            <div class="row">
                <div class="col m10 offset-m1 s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <a class="collapsible-header black-text" href="#q1" id="answer1card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 1
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q2" id="answer2card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 2
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q3" id="answer3card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 3
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q4" id="answer4card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 4
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q5" id="answer5card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 5
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q6" id="answer6card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 6
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q7" id="answer7card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 7
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q8" id="answer8card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 8
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q9" id="answer9card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 9
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header black-text" href="#q10" id="answer10card">
                                <span class="badge red-text">ยังไม่ตอบ</span>
                                <i class="material-icons red-text">info_outline</i>
                                คำถามข้อที่ 10
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col s12 center-align">
                    <a class="waves-effect waves-light btn grey" href="/regis/step4">
                        <i class="material-icons left">settings_backup_restore</i>
                        ย้อนกลับ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="q1" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 1</h4>
        <blockquote>คิดว่า “พี่เลี้ยง” คืออะไร และถ้าเปรียบเทียบเป็นสิ่งๆหนึ่งจะเปรียบเทียบกับอะไร</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="1">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="1">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q1answer" class="materialize-textarea">{{ $currentData->answer1 }}</textarea>
                    <label for="q1answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q2" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 2</h4>
        <blockquote>คิดว่า “น้องค่าย” คืออะไร และถ้าเปรียบเทียบเป็นสิ่งๆหนึ่งจะเปรียบเทียบกับอะไร</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="2">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="2">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q2answer" class="materialize-textarea">{{ $currentData->answer2 }}</textarea>
                    <label for="q2answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q3" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 3</h4>
        <blockquote>ถ้าน้องในฐานะที่เป็นพี่ค่าย มีธุระที่จะต้องกลับบ้านในวันกิจกรรม หรือในสัปดาห์ที่น้องค่ายพรีเซนต์งาน น้องจะแก้ไขปัญหานี้อย่างไร</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="3">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q3answer" class="materialize-textarea">{{ $currentData->answer3 }}</textarea>
                    <label for="q3answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q4" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 4</h4>
        <blockquote>หากน้องได้รับมอบหมายให้ทำหน้าที่หนึ่ง แต่ขณะที่กำลังทำหน้าที่อยู่ มีพี่ เพื่อน หรือ คนอื่นในค่ายให้น้องไปช่วยทำงาน น้องจะทำอย่างไรกับสถานการณ์นี้</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="4">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="4">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q4answer" class="materialize-textarea">{{ $currentData->answer4 }}</textarea>
                    <label for="q4answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q5" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 5</h4>
        <blockquote>ถ้ามีพี่ เพื่อน หรือน้องค่ายที่น้องไม่ชอบในระหว่างอยู่ค่ายน้องจะทำอย่างไร</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="5">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="5">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q5answer" class="materialize-textarea">{{ $currentData->answer5 }}</textarea>
                    <label for="q5answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q6" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 6</h4>
        <blockquote>ถ้าน้องเจอน้องค่ายที่ไม่ให้ความร่วมมือในการทำกิจกรรม น้องจะแก้ไขปัญหานี้อย่างไร</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="6">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="6">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q6answer" class="materialize-textarea">{{ $currentData->answer6 }}</textarea>
                    <label for="q6answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q7" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 7</h4>
        <blockquote>ถ้าในปีที่น้องจัดค่ายอยู่ในช่วงวาระไว้ทุกข์ ไม่สามารถจัดกิจกรรมรื่นเริงได้ เช่น 
การสันทนาการ การตีกลอง และกิจกรรมที่ส่งเสียงดัง เป็นต้น น้องจะจัดกิจกรรมอะไรที่สร้างความสนุกสนานและมีความประทับใจ แทนกิจกรรมดังกล่าว เพราะอะไร
    </blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="7">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="7">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q7answer" class="materialize-textarea">{{ $currentData->answer7 }}</textarea>
                    <label for="q7answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q8" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 8</h4>
        <blockquote>ถ้าน้องค่ายหายไประหว่างทำกิจกรรม ควรทำอย่างไรกับสถานการณ์นี้ และถ้าไม่อยากให้เกิดสถานการณ์แบบนี้ควรวางแผนจัดการยังไง</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="8">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="8">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q8answer" class="materialize-textarea">{{ $currentData->answer8 }}</textarea>
                    <label for="q8answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q9" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 9</h4>
        <blockquote>ถ้าพูดถึงคำว่า “เดิน นั่ง ยก เต้น” น้องจะคิดถึงอะไร และคิดว่าท่าทางใดเหมาะสมกับน้องมากที่สุด</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="9">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="9">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q9answer" class="materialize-textarea">{{ $currentData->answer9 }}</textarea>
                    <label for="q9answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="q10" class="modal">
    <div class="modal-content">
        <h4 class="red-text text-accent-1">คำถามข้อที่ 10</h4>
        <blockquote>ให้น้องบรรยายสิ่งที่คิดว่าแสดงความเป็นตัวตนของน้องได้มากที่สุด (อย่างน้อย 9 ข้อ)</blockquote>
        <form action="" class="answerQuiz" data-url="/api/answer" data-answernum="10">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="answer_number" value="10">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="answer" id="q10answer" class="materialize-textarea">{{ $currentData->answer10 }}</textarea>
                    <label for="q10answer">ตอบ</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align">
                    <button class="waves-effect waves-green btn green accent-4">
                        <i class="material-icons right">send</i>
                        บันทึก
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
    $('.modal').modal();
    firstCheckQuiz();
  });
</script>
@endsection