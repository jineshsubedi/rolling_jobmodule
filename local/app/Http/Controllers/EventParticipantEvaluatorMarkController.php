<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EventEvaluator;
use App\EventParticipant;
use App\EventCategory;
use App\EventMark;
use App\EventResult;

class EventParticipantEvaluatorMarkController extends Controller
{
    public function index()
    {
        $evaluators = EventEvaluator::orderBy('name','asc')->get();
        $categories = EventCategory::orderBy('title','asc')->get();
        return view('eventparticipantevaluatormark', compact('evaluators','categories'));
    }

    public function getParticipants(Request $request)
    {
        $evaluator = EventEvaluator::find($request->evaluatorId);
        $participants = EventParticipant::where('branch_id', $evaluator->branch_id)->get();
        $response = array(
            'status' => 'success',
            'msg' => $participants
        );
        return response()->json($response);
    }
    public function saveEvaluation(Request $request)
    {
        $this->validate($request, [
            'participant' => 'required|integer',
            'evaluator' => 'required|integer',
            'category.*' => 'required',
            'marks.*' => 'required|max:10',
        ]);
        $total = 0;
        for($i=0;$i<count($request->marks);$i++){
            $total = $total + $request->marks[$i];
            $categoryMark[$i] = [
                'category_id' => $request->category[$i],
                'point' => $request->marks[$i]
            ];
        }
        $average = $total / count($request->marks);

        $data = [
            'participant_id' => $request->participant,
            'evaluator_id' => $request->evaluator,
            'markOnCategory' => json_encode($categoryMark),
            'average' => $average,
            'total' => $total
        ];
        $check = EventMark::where('participant_id', $request->participant)->where('evaluator_id', $request->evaluator)->first();
        if($check){
            EventMark::find($check->id)->update($data);
        }else{
            EventMark::create($data);
        }
        
        \Session::flash('alert-success', 'Participant evaluation done Successfully');
        return redirect('eventparticipation?&evaluator='.$request->evaluator);
    }

    public function getAudienceVoting(Request $request)
    {
        if ($request->session()->has('voting')) {
            $participants = '';
        }else{
            $participants = EventParticipant::orderBy('name', 'asc')->get();
        }
        return view('eventaudiencevote', compact('participants'));
    }
    public function audienceVote($id)
    {
        session(['voting' => 'yes']);
        $data = EventParticipant::find($id);
        $data->vote = $data->vote + 1;
        $data->save();
        return redirect()->route('getAudienceVoting');
    }
}
