<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UserProfile;
use App\UserLocation;
use App\UserAnswer;
use App\Question;
use App\UserFile;
use App\UserParent;

class CheckAnswerController extends Controller
{
    public function landing() {
        // dd(
        //     DB::table('users')
        //         ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
        //         ->leftJoin('user_educations', 'user_profiles.id', '=', 'user_educations.profile_id')
        //         ->leftJoin('user_parents', function ($join) {
        //             $join
        //                 ->on('user_profiles.id', '=', 'user_parents.profile_id')
        //                 ->where('user_parents.relation', 'like', 'parent');
        //         })
        //         ->leftJoin('user_locations', 'user_profiles.id', '=', 'user_locations.profile_id')
        //         ->get()
        // );
        // dd(
        //     User::select('id')->get()->toArray()
        // );
        $allUserId = User::select('id')->get()->toArray();
        foreach($allUserId as $value) {
            var_dump($value['id']);
        }
        return '';
    }

    public function download () {
        $question = Question::get()->toArray();
        $questionArr = [];
        foreach($question as $quiz) {
            $questionArr[$quiz['id']] = $quiz['question'];
        }
        $allUser = DB::table('users')
                ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                ->leftJoin('user_educations', 'user_profiles.id', '=', 'user_educations.profile_id')
                ->leftJoin('user_locations', 'user_profiles.id', '=', 'user_locations.profile_id')
                ->get()
                ->toArray();
        foreach($allUser as $val) {
            if($val->profile_id != null) {
                $parentInfo = UserParent::where('profile_id' , '=', $val->profile_id)
                                ->where('relation' , 'like', 'parent')
                                ->first();
                $val->parent_firstname = $parentInfo->name;
                $val->parent_lastname = $parentInfo->lastname;
                $val->parent_tel = $parentInfo->telephone;
            }
            
            $allAnswer = UserAnswer::where('user_id', '=', $val->id)->get()->toArray();
            $val->answer = [];
            foreach($allAnswer as $ansVal) {
                $val->answer[$ansVal['question_id']] = [
                    'question' => $questionArr[$ansVal['question_id']],
                    'answer' => $ansVal['answer']
                ];
            }

            $imageFile = UserFile::where('profile_id', '=', $val->profile_id)
                                ->where('directory', 'like', 'pictures')
                                ->first();
            $val->image_file = ($imageFile != null) ? $imageFile->file_name : null;

            $approveFile = UserFile::where('profile_id', '=', $val->profile_id)
                                ->where('directory', 'like', 'approve-file')
                                ->first();
            $val->approve_file = ($approveFile != null) ? $approveFile->file_name : null;
        }
        dd($allUser);
    }

    public function profile() {
        $allQuestion = sizeOf(Question::get()->toArray());
        $imageFile = null;
        $unsetArray = [];
        $allUser = DB::table('users')
                ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                ->leftJoin('user_educations', 'user_profiles.id', '=', 'user_educations.profile_id')
                ->leftJoin('user_locations', 'user_profiles.id', '=', 'user_locations.profile_id')
                ->get()
                ->toArray();
        foreach($allUser as $key => $val) {
            if($val->profile_id != null) {
                $parentInfo = UserParent::where('profile_id' , '=', $val->profile_id)
                                ->where('relation' , 'like', 'parent')
                                ->first();
                if($parentInfo != null) {
                    $val->parent_firstname = $parentInfo->name;
                    $val->parent_lastname = $parentInfo->lastname;
                    $val->parent_tel = $parentInfo->telephone;
                }
            }
            
            $val->allAnswer = sizeof(UserAnswer::where('user_id', '=', $val->user_id)->get()->toArray());
            if($val->allAnswer != $allQuestion) {
                array_push($unsetArray, $key);
            }

            $imageFile = UserFile::where('profile_id', '=', $val->profile_id)
                                ->where('directory', 'like', 'pictures')
                                ->first();
            $val->image_file = ($imageFile != null) ? $imageFile->file_name : null;

            $approveFile = UserFile::where('profile_id', '=', $val->profile_id)
                                ->where('directory', 'like', 'approve-file')
                                ->first();
            $val->approve_file = ($approveFile != null) ? $approveFile->file_name : null;
        }
        foreach($unsetArray as $unset) {
            unset($allUser[$unset]);
        }
        return view('checkanswer.printprofile', [
            'allUser' => $allUser,
            'allQuestion' => $allQuestion
        ]);
    }

    public function answer() {
        $allQuestion = Question::get()->toArray();
        $questionArr = [];
        foreach($allQuestion as $quiz) {
            $questionArr[$quiz['id']] = $quiz['question'];
        }
        $unsetArray = [];
        $allUser = DB::table('users')
                ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                ->get()
                ->toArray();
        foreach($allUser as $key => $val) {
            $allAnswer = UserAnswer::where('user_id', '=', $val->user_id)
                                    ->get()->toArray();
            if(sizeOf($allAnswer) != sizeOf($allQuestion)) {
                array_push($unsetArray, $key);
            } else {
                $val->answer = [];
                foreach($allAnswer as $ansVal) {
                    $val->answer[$ansVal['question_id']] = [
                        'id' => $ansVal['question_id'],
                        'question' => $questionArr[$ansVal['question_id']],
                        'answer' => $ansVal['answer']
                    ];
                }
            }
        }
        foreach($unsetArray as $unset) {
            unset($allUser[$unset]);
        }
        return view('checkanswer.printanswer', [
            'allUser' => $allUser,
            'allQuestion' => $allQuestion
        ]);
    }
}
