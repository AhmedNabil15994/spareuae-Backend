<?php

namespace Modules\Comment\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Modules\QSale\Entities\Ads;
use Modules\Garage\Entities\Garage;
use Modules\Question\Entities\Question;

class CommentsController extends Controller
{
    public function comment(Request $request, $id)
    {
        if (!auth()->check()) {

            $validated = $request->validate([
                'info.name'  => 'required|string',
                'info.email' => 'required|string',
                'body'       => 'required|string',
                'type'       => 'required|in:ads,garage-review,question',
                'info.stars'      => 'sometimes|integer|min:1'
            ]);
        } else {
            $validated = $request->validate([
                'body'       => 'required|string',
                'type'       => 'required|in:ads,garage-review,question',
            ]);
            $validated['user_id'] = auth()->id();
        }
        $commentModel = [
            'ads'           => Ads::find($id),
            'garage-review' => Garage::find($id),
            'question'      => Question::find($id),
        ];
        $type = Arr::pull($validated, 'type');
        $commentModel[$type]->comments()->create($validated);
        return back();
    }
}
