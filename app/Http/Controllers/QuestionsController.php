<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\UserAnswer;

class QuestionsController extends Controller
{
    public function landing () {
        $numOfAllQuestions = Question::count();
        $userAnswer = UserAnswer::where('user_id', session('users')['id'])->get()->toArray();
        $userAnswerArr = [];
        for ($i=0;$i<=$numOfAllQuestions;$i++) {
            $temp = false;
            foreach($userAnswer as $val) {
                if($val['question_id'] == $i) {
                    $temp = true;
                    break;
                }
            }
            array_push($userAnswerArr, $temp);
        }
        return view('forms.questions.landing', [
            'numOfAllQuestions' => $numOfAllQuestions,
            'isAnswered' => $userAnswerArr
        ]);
    }

    public function showQuestion ($id) {
        $id = intval($id);
        $question = Question::where('id', $id)->first();
        $oldAnswer = UserAnswer::where('user_id', session('users')['id'])->where('question_id', $id)->first();
        if(is_numeric($id) && $question != null) {
            return view('forms.questions.question', [
                'id' => $id,
                'question' => $question->question,
                'answer' => $oldAnswer != null ? $oldAnswer->answer : ''
            ]);
        } else {
            return view('forms.questions.question', [
                'error' => true
            ]);;
        }
    }

    public function submitQuestion ($id, Request $request) {
        $this->validate($request, [
           'answer' => 'required|string' 
        ]);
        $id = intval($id);
        $question = Question::where('id', $id)->first();
        if(is_numeric($id) && $question != null) {
            UserAnswer::updateOrCreate([
                'user_id' => session('users')['id'],
                'question_id' => $id
            ],[
                'answer'=> $request->answer
            ]);
            return redirect('/home/questions');
        } else {
            return view('forms.questions.question', [
                'error' => true
            ]);
        }
    }
}
