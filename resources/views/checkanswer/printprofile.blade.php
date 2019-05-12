<!DOCTYPE HTML>
<html>
  <body>
    จำนวนคนในชุดนี้: {{ sizeOf($allUser) }}
    @foreach ($allUser as $user)
      <table>
        <tr>
          <td class="w14cm">ID: {{$user->id}}</td>
          <td rowspan="7">
            <img src="/img/{{$user->image_file}}" alt="">
          </td>
        </tr>
        <tr>
          <td>ชื่อ: {{$user->name}}</td>
        </tr>
        <tr>
          <td>นามสกุล: {{$user->lastname}}</td>
        </tr>
        <tr>
          <td>เบอร์โทร: {{$user->telephone}}</td>
        </tr>
        <tr>
          <td>อาหารที่แพ้: {{$user->allergies}}</td>
        </tr>
        <tr>
          <td>โรคประจำตัว: {{$user->disase}}</td>
        </tr>
        <tr>
          <td>การรักษาเบื้องต้น: {{$user->drug}}</td>
        </tr>
      </table>
      <table>
        <tr>
          <td class="w7cm">เพศ: {{($user->gender == 1) ? 'ชาย' : 'หญิง'}}</td>
          <td class="w7cm">ศาสนา: {{ $user->religion }}</td>
          <td class="w7cm">แผนการเรียน: {{ $user->plan }}</td>
        </tr>
        <tr>
          <td class="w7cm">ระดับชั้น:
            @if($user->level == 1) ม.4
            @elseif($user->level == 2) ม.5
            @elseif($user->level == 3) ปวช.1
            @else ปวช.2
            @endif
          </td>
          <td class="w7cm">โรงเรียน: {{ $user->school }}</td>
        </tr>
        <tr>
          <td class="w7cm">ชื่อผู้ปกครอง: @if(isset($user->parent_firstname)) {{$user->parent_firstname}} @else ไม่มีข้อมูล @endif</td>
          <td class="w7cm">นามสกุลผู้ปกครอง: @if(isset($user->parent_lastname)) {{$user->parent_lastname}} @else ไม่มีข้อมูล @endif</td>
          <td class="w7cm">เบอร์โทร: @if(isset($user->parent_tel)) {{$user->parent_tel}} @else ไม่มีข้อมูล @endif</td>
        </tr>
        <tr>
          <td class="w7cm">เอกสารขออนุญาติ: @if(isset($user->approve_file)) ส่ง @else ไม่ได้ส่ง @endif</td>
          <td class="w7cm">ตอบคำถาม: @if(isset($user->allAnswer)) {{ $user->allAnswer }} @else ไม่มีข้อมูล @endif  ข้อ (
            @if(isset($user->allAnswer) && $user->allAnswer == $allQuestion) ครบ @else ไม่ครบ @endif
          )
          </td>
        </tr>
      </table>
      <hr>
      @if($loop->index % 3 == 2) <footer></footer> @endif
    @endforeach
  </body>
</html>

<style>
.w14cm {
  width: 14cm;
}
.w7cm {
  width: 7cm;
}
.w5cm {
  width: 5cm;
}
img {
  max-width: 5cm;
  max-height: 5cm;
}
@media print {
  footer {
    page-break-after: always;
  }
}
</style>