<!DOCTYPE HTML>
<html>
<body>
จำนวนคนในชุดนี้: {{ sizeOf($allUser) }}
@foreach($allUser as $user)
  <div class="border answer">
    <table>
      <tr>
        <td class="w2cm">ID: {{$user->id}}</td>
        <td class="w6cm">ชื่อ: {{$user->name}}</td>
        <td class="w6cm">นามสกุล: {{$user->lastname}}</td>
        <td class="w6cm">เบอร์โทร: {{$user->telephone}}</td>
      </tr>
    </table>
    @foreach($user->answer as $answer)
    <table class="answer border">
      <tr>
        <tr>
          <td>ข้อที่ {{$answer['id']}}: {{$answer['question']}}</td>
        </tr>
        <tr>
          <td>ตอบ: {{$answer['answer']}}</td>
        </tr>
      </tr>
    </table>
    @endforeach
  </div>
  <hr>
  @if($loop->index % 2 == 1) <footer></footer> @endif
  @endforeach
</body>
</html>

<style>
.w6cm {
  width: 6cm;
}
.w2cm {
  width: 2cm;
}

.answer {
  width: 20cm;
}

.border {
  border: 1px;
  border-style: solid;
}

@media print {
  footer {
    page-break-after: always;
  }
}
</style>