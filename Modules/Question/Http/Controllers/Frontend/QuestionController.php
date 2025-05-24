<?php

namespace Modules\Question\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Question\Entities\Question;
use Modules\Core\Traits\Dashboard\CrudDashboardController;
use Modules\Question\Http\Requests\Frontend\QuestionRequest;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('askQuestion');
    }

    public function show($id)
    {
        $question = Question::whereId($id)->with('comments')->withCount('comments')->firstOrFail();
        $question->increment('views');
        return view('question::frontend.show', [
            'question' => $question
        ]);
    }
    public function askQuestion(QuestionRequest $request): RedirectResponse
    {
        auth()->user()->questions()->create($request->validated());
        return back()->with('success', __("You successfully add you'r question"));
    }
}
