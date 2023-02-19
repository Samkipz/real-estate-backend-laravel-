<?php

namespace App\Console\Commands;

use App\Mail\IssueDemandsAttention;
use App\Mail\IssueRaisedMail;
use App\Models\Issue;
use App\Models\Project;
use App\Models\ProjectUnit;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailNewIssue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:emailnewissue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin = 'admin@mail.com';

//        if ($users->count() > 0) {
//            foreach ($users as $user) {
//                Mail::to($user)->send(new BirthDayWish($user));
//            }
//        }

//        $delta_time = time() - strtotime($timestamp);
//        $hours = floor($delta_time / 3600);
//        $delta_time %= 3600;
//        $minutes = floor($delta_time / 60);



//        $users = User::whereMonth('birthdate', date('m'))
//            ->whereDay('birthdate', date('d'))
//            ->get();


        $issues = DB::table('issues')->where('resolved',false)
            ->get();
        if ($issues->count() > 0){
            foreach ($issues as $issue){
                $delta_time = time() - strtotime($issue->created_at);
                $hours = floor($delta_time / 3600);

                $issue_number = $issue->issue_number;
                $tenant_name = User::find($issue->creator_id)->first()->name;
                $tenant_email = User::find($issue->creator_id)->first()->email;
                $unit_name = ProjectUnit::find($issue->project_units_id)->first()->name;
                $issue_detail = $issue->description;
                $project = DB::table('projects')->where('id', ProjectUnit::find($issue->project_units_id)->first());
                $project_name = $project->id->first()->name;
                $project_admin_email = DB::table('users')->where('id', $project->creator_id)->first()->email;
                \Log::info($project_admin_email);

                if ($hours >= 6){
                    Mail::to($project_admin_email)->send(new IssueRaisedMail($tenant_email, $tenant_name, $issue_number, $unit_name, $issue_detail));
                }
                if ($hours >= 24){
                    Mail::to($admin)->send(new IssueDemandsAttention($issue_number, $tenant_name, $unit_name, $issue_detail, $project_name));
                }
            }
        }



//        $unresolved_issue = Issue::all()->where('resolved', false)->all();
//
//        \Log::info($unresolved_issue);
//        $issue_number = $unresolved_issue->issue_number;
//        $tenant_name = User::find($unresolved_issue->creator_id)->first()->name;
//        $unit_name = ProjectUnit::find($unresolved_issue->project_units_id)->first()->name;
//        $issue_detail = $unresolved_issue->description;


//        if ($unresolved_issue->count() > 0) {
//            foreach ($unresolved_issue as $issue) {
//                $delta_time = time() - strtotime($issue->created_at);
//                $hours = floor($delta_time / 3600);
//                if ($hours >= 1){
//                    \Log::info($delta_time);
//
//                    Mail::to($admin)->send(new IssueDemandsAttention($issue_number, $tenant_name, $unit_name, $issue_detail));
//                }
////                \Log::info($delta_time);
//            }
//        }

//

        return 0;
    }
}
