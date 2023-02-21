<?php

namespace App\Http\Controllers;

use App\Events\IssueRaised;
use App\Models\Issue;
use App\Models\Project;
use App\Models\ProjectUnit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::with(['issueCreator', 'comments'])->orderBy('id')->get();
        return  $issues;
//        $issues = Issue::with(['issueCreator']);

//        ->with([
//        'project' => function ($query) {
//            return $query->with(['admin', 'creator']);
//        }
//    ])
//        ->first()
//        $issues = Issue::all();
//        return response(['issues'=>$issues]);
    }

    public function tenantIssue($id)
    {
//        $user = Auth::user();
        $issues = Issue::with(['issueCreator', 'comments'])->where('creator_id', $id)->get();
        return  $issues;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $tenant = Auth::user();

        $project_units_id = ProjectUnit::where('tenant_id',$tenant->id)->first();
//        dd($project_units_id -> id);

        $issueDetails = [
            'issue_number' => '#' . Str::random(9),
            'issue_type_id' => $request->issue_type,
            'title' => $request->title,
            'description' => $request->description,
            'creator_id' => Auth::user()->id,
            'project_units_id' => $project_units_id -> id,
        ];


        $unit = ProjectUnit::where('tenant_id', $tenant->id)
//            ->with(['project.admin.', 'project.creator'])
            ->with([
                'project' => function ($query) {
                    return $query->with(['admin', 'creator']);
                }
            ])
            ->first();



        $tenant_email = Auth::user()->email;
        $admin_email = $unit->project->admin->email;
        $tenant_name = Auth::user()->name;
        $issue_number = $issueDetails['issue_number'];
        $unit_name = $unit->name;
        $issue_detail = $issueDetails['description'];

        $issue = Issue::create($issueDetails);
        event(new IssueRaised($admin_email, $tenant_email,$tenant_name,$issue_number,$unit_name,$issue_detail));

        return response()->json($issue, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('ok show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('ok update');
    }

    public function resolve($id)
    {
        dd('ok resolve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('ok delete');
    }
}
