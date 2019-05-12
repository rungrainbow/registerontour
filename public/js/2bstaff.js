function redirectWithPost(url,name,value,token) {
    $.redirect(url, {name: value,'_token': token});
}

function checkAccept (token) {
    swal({
            title: "แน่ใจหรือไม่ ?",
            text: "เข้ามาแล้ว ต้องทำตามให้ได้นะ",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#26a69a",
            confirmButtonText: "สบายบรื๋อ",
            cancelButtonText: "อ่านใหม่ดีกว่า",
            closeOnConfirm: true
        },
        function () {
            window.location = '/register';
        }
    );
}

$('.preventForm').submit(function(e) {
    e.preventDefault()
    const tempThis = this
    $.post($(this).data('url'), $(this).serialize())
    .done(function (data) {
        $(tempThis).modal('close')
        if($(tempThis).data('mode') == 1) changeClassComplete ('#schoolInfoCard',1)
        else if($(tempThis).data('mode') == 2) changeClassComplete ('#homeInfoCard',2)
        else if($(tempThis).data('mode') == 3) changeClassComplete ('#parentInfoCard',3)
        else if($(tempThis).data('mode') == 4) changeClassComplete ('#a2bInfoCard',4)
    })
    .fail(function (data) {
        console.log(data)
    })
})

$('.answerQuiz').submit(function(e) {
    e.preventDefault()
    const tempThis = this
    $.post($(this).data('url'), $(this).serialize())
    .done(function (data) {
        $(tempThis).modal('close')
        checkQuiz('#answer'+$(tempThis).data('answernum')+'card',$(tempThis).data('answernum'))
    })
    .fail(function () {
        console.log('error')
    })
})

function changeClassComplete (id,mode) {
    $.post('/api/iscomplete', {
        '_token': $("meta[name='csrf-token']").attr('content'),
        'mode': mode
    })
    .done(function (data) {
        if (data.status)
        {
            addGreen(id)
        } else { 
            addRed(id)
        }
    })
}

function addRed(id) {
    $(id).addClass('red accent-2')
    $(id).removeClass('green accent-4') 
}

function addGreen(id) {
    $(id).removeClass('red accent-2') 
    $(id).addClass('green accent-4') 
}

function firstCheck () {
    $.post('/api/iscomplete', {
        '_token': $("meta[name='csrf-token']").attr('content'),
        'mode': '7'
    })
    .done(function (data) {
        if(data.m1) addGreen('#schoolInfoCard')
        else addRed('#schoolInfoCard')
        if(data.m2) addGreen('#homeInfoCard')
        else addRed('#homeInfoCard')
        if(data.m3) addGreen('#parentInfoCard')
        else addRed('#parentInfoCard')
        if(data.m4) addGreen('#a2bInfoCard')
        else addRed('#a2bInfoCard')
        if(data.m5) addGreen('#uploadDocCard')
        else addRed('#uploadDocCard')
        if(data.m6) addGreen('#answerCard')
        else addRed('#answerCard')
    })
    .fail(function () {

    })
}

function setAnswered(id,quizNumber) {
    $(id).empty();
    $(id).append('<span class="badge green-text">ตอบแล้ว</span><i class="material-icons green-text">done</i>คำถามข้อที่ '+quizNumber);
}

function firstCheckQuiz() {
    $.post('/api/answercheck', {
        '_token': $("meta[name='csrf-token']").attr('content'),
        'answer_number': '11'
    })
    .done(function (data) {
        if(data.answer1) setAnswered('#answer1card',1);
        if(data.answer2) setAnswered('#answer2card',2);
        if(data.answer3) setAnswered('#answer3card',3);
        if(data.answer4) setAnswered('#answer4card',4);
        if(data.answer5) setAnswered('#answer5card',5);
        if(data.answer6) setAnswered('#answer6card',6);
        if(data.answer7) setAnswered('#answer7card',7);
        if(data.answer8) setAnswered('#answer8card',8);
        if(data.answer9) setAnswered('#answer9card',9);
        if(data.answer10) setAnswered('#answer10card',10);
    })
}

function checkQuiz(id,answerNumber) {
    $.post('/api/answercheck', {
        '_token': $("meta[name='csrf-token']").attr('content'),
        'answer_number': answerNumber
    })
    .done(function (data) {
        if(data.status) setAnswered(id,answerNumber);
    })
}